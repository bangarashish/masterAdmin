<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()){
            return redirect()->route('admin.dashboard')->with('success', 'You are already Logged in');
        }else{
            return view('admin::login');
        }
        
    }

   public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);
       
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Email or Password not match');
   }

   public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect('admin');
    }
    
}
