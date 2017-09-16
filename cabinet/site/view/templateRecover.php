<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgriAnalytica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .register-logo img{
    width: 360px;
    }
    .login-page,
    .register-page {
    background: #f1f1f3;
    margin-top:-5%;
    }
    html, body {
        height: 0%;
    }
    .register-box-msg{
    color: #79a22a;
    font-size: 19px;
    text-align: center;
    padding: 0 0px 0px 0px;
    margin-top: -15px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    padding-bottom: 15px;
    }
    .register-box-body, .register-box-body {
    background: none;
    padding: 0px;
    border-top: 0;
    color: #bac7b3;
    text-align: center;
    }
    .form-control::-webkit-input-placeholder {
    color: #bac7b3;
    }
    .form-control {
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 12px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #79a22a;
    background-color: #fff;
    background-image: none;
    border: 1px solid #79a22a;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-control:focus {
    border-color: #008d4c;
    box-shadow: none;
    }
    .login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
    color: #79a22a;
    }
    .form-control-feedback {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    display: block;
    width: 38px;
    height: 34px;
    line-height: 42px;
    text-align: center;
    pointer-events: none;
    }
    .btn.btn-flat {
    border-radius: 4px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-width: 1px;
    width: 100%;
    height: 40px;
    }
    .btn-primary {
    background-color: #79a22a;
    border-color: #698d24;
    width: 360px;
    }
    .btn-primary:focus, .btn-primary.focus {
    color: #fff;
    background-color: #008d4c;
    border-color: #008d4c;
    }
    .btn-primary:active:hover, .btn-primary.active:hover, .open>.dropdown-toggle.btn-primary:hover, .btn-primary:active:focus, .btn-primary.active:focus, .open>.dropdown-toggle.btn-primary:focus, .btn-primary:active.focus, .btn-primary.active.focus, .open>.dropdown-toggle.btn-primary.focus {
    color: #fff;
    background-color: #008d4c;
    border-color: #008d4c;}

    .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #008d4c;
    border-color: #008d4c;
    }
    body {
    font-family: "Open Sans" ,'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.active {
    background-color: #008d4c;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.hover {
    background-color: #698D24;
    }
    #go, .text-center{
    text-decoration:  underline;
    }
    a {
    color: #79a22a;
    font-family: "Open Sans";
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    }
    a:active,
    a:hover{
    color: #698D24;
    text-decoration:  underline;
    }
    a:focus{
    color: #008d4c;
    text-decoration:  underline;
    }
    .radio, .checkbox {
        position: relative;
        display: block;
        margin-top: -0px;
        margin-bottom: 10px;
    }
    .col-xs-8 {
        width: 100%;
    }
    .col-xs-4 {
    width: 100%;
    padding-bottom: 15px;
    position: relative;
    min-height: 1px;
    padding-left: 0px;
    }
    .row {
         margin-left: 0px;
        margin-right: -15px;
    }
    .checkbox, .icheck{
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    color: #79a22a;
        text-align: center;
    }
    .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
    position: absolute;
    input[type="radio"], input[type="checkbox"] {
    margin: 0px 0 0;
    margin-top: 1px \9;
    line-height: normal;
    }


    .icheck > label {
    }
    </style>
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><img src="cabinet/site/template/img/logo.png"> </a>
        </div>
        <div class="register-box-body">
            <p class="register-box-msg"> Відновлення паролю</p>
            <form action="/recover" method="post">
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="retype_password" class="form-control" placeholder="Повторіть пароль" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                        <label>

                                <input id="checkRules" type="checkbox"  required>

                                    Я погоджуюсь з
                                    <a href="# "id="go">правилами</a>
                        </label>
                    </div>
                    </div>
                    <div class="col-xs-4" style="padding-left: 0px;">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Відновити</button>
                    </div>
                </div>
            </form>
<!--            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i>
                    Sign up using Facebook
                </a>
            </div>
            <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i>
                    Sign up using Google+
                </a>
            </div>-->
            <a href="/login" class="text-center">Я вже зареєстрований</a>
        </div>
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php SRC::getSrc(); ?>/lib/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increseArea: '20%'
            });
        });
    </script>
</body>
</html>