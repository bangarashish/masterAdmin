<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Panel </title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css')}}" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
             <a style="font-weight: 800; font-size: 32px; " href="index.php" class="h1 text-decoration-none "> Reset Password </a> </div>
            <div class="card-body">
               
                <form action="{{ route('reset.password.post') }}" method="POST">
                   @csrf
                    <div class="input-group mb-3"> 
                        <input type="email" name="email" class="form-control" placeholder="Enter email id">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
                        </div>
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Sign In</button> </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>