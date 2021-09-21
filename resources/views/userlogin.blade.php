@include('layout.universal.head')
<html>
<head>
    <title>Login</title>
</head>

<body class="register-page" style="min-height: 586.8px;">

<form method ="POST" action={{url('login')}}>
    @csrf
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg"><b>Login</b></p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                    <a href="{{url('/register')}}" class="text-center">No Account yet? Register Here</a>
                </center>

            </div>

        </div>
    </div>
</form>
@include('layout.universal.footer-scripts')

@if(\Session::has('success'))
    <script type="text/javascript">
        toastr.success('Login Success!');
        setTimeout(function(){
            window.location.href = 'index';
        }, 1000);
    </script>
@endif

@if(\Session::has('adminSuccess'))
    <script type="text/javascript">
        toastr.success('Login Success!');
        setTimeout(function(){
            window.location.href = 'admin-index';
        }, 1000);
    </script>
@endif

@if(\Session::has('failed'))
    <script type="text/javascript">toastr.error('Incorrect Username/Password!')</script>
@endif


</body>
</html>
