@include('layout.universal.head')
<html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <title>Registration</title>
</head>
<body class="register-page" style="min-height: 586.8px;">
<div class="register-box">
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg"><b>Registration</b></p>
            <div class="input-group mb-3">
                @csrf
                <input type="email" class="form-control" placeholder="Email" id="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" id="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary btn-block" id="submit">Register</button>
                <a href="{{url('/userlogin')}}" class="text-center">I already have a membership</a>
            </center>

        </div>

    </div>
</div>
@include('layout.universal.footer-scripts')
<script>
    $(document).ready(function() {
        $(document).on("click", "#submit", function () {
            var email = $('#email').val()
            var password = $('#password').val()
            $.ajax({
                url: '{{url('login/reg')}}',
                type: "POST",
                dataType: 'html',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "email": email,
                    "password": password
                },
                success: function (response) {
                    if (response == 'success') {
                        toastr.success('Registration Successful!');
                        setTimeout(function(){
                            window.location.href = 'userlogin';
                        }, 1000);
                    } else {
                        toastr.error('Username Already Exists!');
                        setTimeout(1000);

                    }
                }
            });
        });
    });

</script>
</body>
</html>
