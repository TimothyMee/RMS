

<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="RMS, Result Management System">
    <meta name="keywords" content="RMS, Result Management System, Timothy, Timothy-mee">

    <!-- Favicon-->
    {{--<link rel="icon" href="favicon.ico" type="image/x-icon">--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="/css/login2.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">

</head>

<body class="theme-blue">
<div class="authentication">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-9 col-md-8 col-xs-12 p-l-0">
                <div class="l-detail">
                    <h5 class="position">Welcome <h6>to the</h6></h5>
                    <h1>Result Management System</h1>
                    <h3 class="position">Sign in to start</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 p-r-0">
                <div class="card position">
                    <h4 class="l-login">Login</h4>

                    <form class="col-md-12" id="sign_in" method="POST" action="{{ route('auth.login') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Email" name="email" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <button class="btn btn-raised btn-info waves-effect" type="submit">SIGN IN</button>
{{--
                        <a href="sign-up.html" class="btn btn-raised waves-effect" type="submit">SIGN UP</a>
--}}
                        <a href="forgot-password.html">Forgot Password?</a>
                        <br>
                        <a href="{{route('register')}}">
                            Student and Don't have an account?
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="instance1"></div>
</div>

<script src="/js/login2/jparticles.html"></script>
<script src="/js/login2/particle.html"></script>

<script src="/js/login2/event.html"></script>
</body>

</html>
