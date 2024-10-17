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
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <form action="{{ route('reset.password.post') }}" method="POST">
                   @csrf
                    <div class="input-group mb-3"> 
                    <input type="hidden" name="token" value="{{ $token }}">
                        <input type="email" name="email" class="form-control" placeholder="Enter email id">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3"> 
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3"> 
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Sign In</button> </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
    <script>
    window.onload = function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none';
            }, 10000); // 10 seconds
        }
    };
</script> 
   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>