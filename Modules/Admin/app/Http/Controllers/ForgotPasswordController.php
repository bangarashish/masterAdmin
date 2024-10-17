<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str; 

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForgetPasswordForm()
    {
        return view('admin::auth.forgotPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(64);

        $existingUser = DB::table('users')
                        ->where('email', $request->email)
                        ->first();
        if(!$existingUser) {
            return back()->with('message', 'No search results');
        }
       
        $existingToken = DB::table('password_reset_tokens')
                         ->where('email', $request->email)
                         ->first();

        if ($existingToken) {
            return back()->with('message', 'A password reset request has already been sent to this email.');
        }

        $user = DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()

        ]);

        // Mail::send('admin::email.forgetPassword', ['token' => $token], function($message) use($request){
           
        //     // dd($token);
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        try {
            Mail::send('admin::email.forgetPassword', ['token' => $token], function($message) use($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        }   catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
        return back()->with('message', 'We have e-mailed your password reset link!');
    }


    public function showResetPasswordForm($token) { 

        return view('admin::auth.resetPassword', ['token' => $token]);

     }

    public function submitResetPasswordForm(Request $request)
    {
         $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
         ]);

         $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }

         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();
         return redirect('/login')->with('message', 'Your password has been changed!');

     }
}
