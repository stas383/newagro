<?php
    $language=SRC::getLanguage('farmer-small');
?>
<!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Панель управління фермером</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.6 -->
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
            <!--LINK-->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/flag-icon/css/flag-icon.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/AdminLTE.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/skins/skin-green.min.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/select2/select2.min.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/other.css">
            <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/farmer-small/template/css/style-farmer.css">
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/farmer-small/template/js/script.js"></script>
    <script>
        $(document).ready(function () {
            function setCookie(name, value) {
                document.cookie = name + "=" + value + "; path=/";
            }
            function getCookie(name) {
                var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
                if (r) return r[2];
                else return "";
            }
            var sidebar= getCookie("sidebar");
            if(sidebar==false){
                localStorage.setItem('sidebar', 'on')
                setCookie("sidebar", "ofe")
            }
            $('#sidebar-toggle').click(sidebar_toggle);
            function sidebar_toggle() {
                var sidebar= getCookie("sidebar");
                if(sidebar=='ofe'){
                    setCookie("sidebar", "sidebar-collapse")
                }
                if(sidebar=='sidebar-collapse'){
                    setCookie("sidebar", "ofe")
                }
            }
            $('.lang').click(sidebar_toggles);
            function sidebar_toggles() {
                var lang= getCookie("lang");
                if(lang=='ua'){
                    setCookie("lang", "ua")
                }
                if(lang=='gb'){
                    setCookie("lang", "gb")
                }
            }
        });
    </script>
    <style>
        body {
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif!important;
            font-size: 14px;
            line-height: 1.53857143;
            color: #79a22a;
            background-color: #fff;
        }
        h3, .h3 {
            font-size: 1;
        }
        .content-wrapper, .right-side {
            min-height: 100%;
            background-color: #f1f1f3;
            z-index: 800;
        }
        /*right sidebar*/
        .control-sidebar-bg, .control-sidebar {
            top: 0;
            right: -230px;
            width: 230px;
            -webkit-transition: right 0.3s ease-in-out;
            -o-transition: right 0.3s ease-in-out;
            transition: right 0.3s ease-in-out;
            border-left: 1px solid rgba(121, 162, 42, 0.3);
        }
        .skin-green .treeview-menu>li>a, .control-sidebar-dark .control-sidebar-menu > li > a .menu-info > p{
            color: #79a22a;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a {
            background: #79a22a;
            color: #fafafa;
            box-shadow: 0 1px 0px rgba(0, 0, 0, 0.1);
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus {
            border-left-color: #008d4c;
            border-bottom-color: #79a22a;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover {
            color: #f1f1f3;
        }
        .control-sidebar-dark .control-sidebar-heading, .control-sidebar-dark .control-sidebar-subheading:hover {
            color: #79a22a;
            font-weight: 500;
            font-size: 18px;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:hover, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:focus, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:active {
            background: #6d9126;
            color: #fff;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:active {
            background: #79a22a;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:active {
            background: #79a22a;
            color: #fafafa;
            box-shadow: 0 1px 0px rgba(0, 0, 0, 0.1);
        }
        .control-sidebar-dark .control-sidebar-menu > li > a:hover {
            background: rgba(121, 162, 42, 0.3);
            color: #fff;
        }
        .control-sidebar-dark, .control-sidebar-dark + .control-sidebar-bg {
            background: #fafafa;
        }
        .control-sidebar-dark .control-sidebar-heading, .control-sidebar-dark .control-sidebar-subheading {
            color: #79a22a;
            font-weight: 500;
            font-size: 18px;
        }
        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,a:active {
            color: #f1f1f3!important;
        }
        @media (min-width: 1280px) {
            .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
                float: left!important;
            }
        }

        .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:hover, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:focus, .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:active {
            color: #fafafa!important;
        }
        @media (max-width: 767px){
            .content-wrapper, .right-side, .main-footer {
                -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
                -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
                -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
                transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
                margin-left: 40px!important;
                z-index: 820;
            }
        }
        @media (max-width: 1080px){
            .table {
                width: 80%;
                max-width: 80%;
                margin-bottom: 20px;
            }
        }
        @media (max-width: 767px) {
            .main-header .navbar {
                margin: 0;
                margin-top: -50px;
            }
        }
        @media (max-width: 767px) {
            .main-sidebar, .left-side {
                -webkit-transform: translate(-270px, 0);
                -ms-transform: translate(-270px, 0);
                -o-transform: translate(-270px, 0);
                transform: translate(-270px, 0);
            }
        }
        /**/

        .content {
            min-height: 250px;
            padding: 15px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        .content-wrapper, .right-side, .main-footer {
            -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
            -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
            -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
            transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
            margin-left: 270px;
            z-index: 820;
        }
        .border_ridht {
            border-right: 1px solid #004f27!important;
        }
        .flag-icon {
            background-size: contain;
            background-position: 50%;
            background-repeat: no-repeat;
            position: relative;
            display: inline-block;
            width: 1.33333333em;
            line-height: 1.53857143;
        }
        .box-header > .box-tools {
            position: absolute;
            right: 10px;
            top: -15px;
        }
        .box-body {
            padding: 0px!important;
        }
        .table tr:hover {
            background: rgba(121, 162, 42, 0.3);
            cursor: pointer;
        }
        .main-sidebar, .left-side {
            position: absolute;
            top: 0;
            left: 0;
            padding-top: 50px;
            min-height: 100%;
            width: 270px;
            border-left: 1px solid #bac7b3;
            border-right: 1px solid rgba(121, 162, 42, 0.3);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .main-header .sidebar-toggle {
            float: left;
            background-color: transparent;
            background-image: none;
            padding: 15px 15px;
            font-family: fontAwesome;
            margin-left: -2px;
        }
        .skin-green .main-header .navbar, .skin-green .main-header .logo {
            background-color: #79a22a;
        }
        .main-header .logo {
            -webkit-transition: width 0.3s ease-in-out;
            -o-transition: width 0.3s ease-in-out;
            transition: width 0.3s ease-in-out;
            display: block;
            float: left;
            height: 52px;
        }
        .skin-green .main-header .navbar .sidebar-toggle:hover, .skin-green .main-header .logo:hover{
            background-color: #6d9126;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            height: 52px;
        }
        .skin-green .sidebar a {
            color: #79a22a;
            font-family: "Open Sans";
            font-size: 16px;
            font-weight: 700;
        }
        .main-footer {
            background: #fafafa;
            padding: 15px;
            color: #79a22a;
            border-top: 1px solid rgba(121, 162, 42, 0.3);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            display: block;
            width: 100%;
            height: 42px;
            padding: 6px 12px;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.42857143;
            color: #79a22a!important;
            background-color: #fff;
            background-image: none;
            border: 1px solid rgba(121, 162, 42, 0.5);
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .form-control:focus {
            border-color: #79a22a;
            box-shadow: none;
        }
        .form-control::-moz-placeholder, .form-control::-webkit-input-placeholder,  .form-control:-ms-input-placeholder  {
            color: #79a22a!important;
            opacity: 1;
        }
        .form-control::-webkit-input-placeholder{
            color: #bac7b3!important;
        }
        .inpt:focus {
            border-color: #79a22a !important;
            box-shadow: none!important;
        }
        .navbar-nav > .user-menu > .dropdown-menu > li.user-header > p {
            z-index: 5;
            color: #79a22a;
            font-size: 16px;
            margin-top: 10px;
        }
        .navbar-nav > .user-menu > .dropdown-menu {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
            padding: 1px 0 0 0;
            border-top-width: 0;
            width: 280px;
            margin-top: 2px;
        }
        .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a:hover, .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:hover, .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a:hover {
            background: rgba(121, 162, 42, 0.3);
            text-decoration: none;
        }
        .navbar-nav > .user-menu .user-image {
            float: left;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: ;
            margin-top: -2px;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background-color: #;
        }
        .btn-primary:active:hover, .btn-primary.active:hover, .open>.dropdown-toggle.btn-primary:hover,
        .btn-primary:active:focus, .btn-primary.active:focus, .open>.dropdown-toggle.btn-primary:focus,
        .btn-primary:active.focus, .btn-primary.active.focus, .open>.dropdown-toggle.btn-primary.focus {
            background-color: #6d9126;
            border-color: #255625;
        }
        .btn-danger {
            background-color: #dd4b39;
            border-color: #d73925;
            /*height: 40px;*/
        }
        .btn-success {
            background-color: #79a22a;
            border-color: #008d4c;
            /*height: 40px;*/
            font-weight: 600;
        }
        .btn-success:hover, .btn-success:active, .btn-success.hover {
            background-color: #6d9126;
        }
        .btn-success:focus {
            background-color: #6d9126;
            border-color: #255625;
        }
        .btn-primary {
            background-color: #79a22a;
            border-color: #255625;
        }
        .btn-primary:hover, .btn-primary:active, .btn-primary.hover {
            background-color: #6d9126;
        }
        .btn-primary:focus, .btn-primary.focus {
            color: #fff;
            background-color: #6d9126;
            border-color: #255625;
        }
        .skin-green .main-header li.user-header {
            background-color: #fafafa;
            color: #79a22a;
        }
        .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a {
            color: #008d4c;
        }
        .navbar-nav > .notifications-menu > .dropdown-menu > li.header, .navbar-nav > .messages-menu > .dropdown-menu > li.header, .navbar-nav > .tasks-menu > .dropdown-menu > li.header {
            background-color: #ffffff;
            border-bottom: 1px solid #f4f4f4;
            color: #79a22a;
            font-weight: 700;
        }
        table,tr, th, td{
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
        }

        .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
            background-color: #6d9126 !important;
        }
        .info-box-number a:hover, .info-box-number:active, .info-box-number:focus {
            color: #008d4c!important;
        }
        .skin-green .main-header .navbar .nav>li>a:hover, .skin-green .main-header .navbar .nav>li>a:active, .skin-green .main-header .navbar .nav>li>a:focus, .skin-green .main-header .navbar .nav .open>a, .skin-green .main-header .navbar .nav .open>a:hover, .skin-green .main-header .navbar .nav .open>a:focus, .skin-green .main-header .navbar .nav>.active>a {
            background: rgba(0,0,0,0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            color: #f6f6f6;
            height: 52px;
        }
        .box {
            position: relative;
            border-radius: 3px;
            background: #fafafa;
            border-top: 3px solid #bac7b3;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .box-header {
            color: #79a22a!important;
            display: block;
            padding: 10px;
            position: relative;
        }
        .box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {
            color: #79a22a!important;
            font-weight: 500!important;
        }
        .box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {
            display: inline-block;
            font-size: 18px!important;
            margin: 0;
            line-height: 1;
            color: #79a22a;
            font-weight: 500!important;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: "Open Sans", "Helvetica Neue", 'Helvetica', 'Arial', sans-serif;
            font-size: 18px;
        }
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px!important;
        }
        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
        }
        .skin-green .treeview-menu>li>a{
            border-left: 3px solid transparent!important;
        }
        .skin-green .treeview-menu>li>a:hover{
            border-left: 3px solid #008d4c!important;
            color: #008d4c!important;
        }
        .skin-green .treeview-menu>li>a:active{
            border-left: 3px solid #008d4c!important;
            background: #bac7b3;
        }
        .skin-green .sidebar-menu>li>.treeview-menu {
            margin: 0 0px;
            background: none;
            padding-left: 0px;

        }
        .skin-green .sidebar-menu>li>.treeview-menu:hover {
            padding-left: 0px;
            margin: 0 0px;
        }
        .skin-green .sidebar-menu>li>a {
            font-weight: 700;
        }
        .sidebar-menu .treeview-menu > li > a{
            padding: 12px 5px 12px 15px!important;
            display: block;
        }
        .skin-green .sidebar-menu>li.header {
            color: #aaaaaa;
            background: none;
            font-size: 16px;
        }
        .sidebar-menu li.header {
            padding: 10px 25px 10px 15px!important;
            font-size: 12px;
        }
        .sidebar .active a {
            /*background: rgba(121, 162, 42, 0.3!important;*/
        }
        .skin-green .wrapper, .skin-green .main-sidebar, .skin-green .left-side {
            background-color: #fafafa;
        }
        .sidebar-menu a{
            font-size: 18px;
            color: #008d4c!important;;
        }
        skin-green .treeview-menu>li>a:active {
            background: #bac7b3;
            border-left-color: #008d4c;
        }
        .treeview-menu a{
            font-size: 16px!important;
            color: #008d4c!important;
            padding-left: 15px;
            font-weight: 700;
        }
        .sidebar li a:hover{
            background: #f1f1f3!important;
            color: #008d4c!important;
        }
        .active  a{
            color:  #008d4c!important;
        }
        .sidebar .active > a{
            color: #008d4c !important;
            border-left: 3px solid #008d4c!important;
            font-weight: 800;
        }
        .sidebar .treeview-menu .active > a{
            background: #f1f1f3!important;
            color: #008d4c!important;
            border-left: 3px solid #008d4c!important;
        }

         .skin-green .sidebar-menu>li.active>a {
            background: #f1f1f3;
            border-left-color: #008d4c;
            font-weight: 800;
        }
        .skin-green .sidebar-menu>li:hover>a, .skin-green .sidebar-menu>li.active>a {
             color: #008d4c;
             background: #f1f1f3;
             border-left-color: #008d4c;
         }


    </style>
</head>
<!--sidebar-collapse
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini <?php echo $_COOKIE['sidebar'] ?>">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<? echo SRC::getSrc()."/$cabinet";?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>A</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Agri</b>Analytica</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" id="sidebar-toggle" class="sidebar-toggle"  data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span><?php echo SRC::validator($_COOKIE['currency']);?></span>
                        </a>
                        <ul class="dropdown-menu widthDropDown">
                            <li class="header">Виберіть валюту <?=$_COOKIE['currency_val'] ?> </li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="/currency/uah">
                                            UAH
                                        </a>
                                    </li>
                                    <li><!-- start notification -->
                                        <a href="/currency/usd">
                                            USD
                                        </a>
                                    </li>
                                    <li><!-- start notification -->
                                        <a href="/currency/eur">
                                            EUR
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="flag-icon flag-icon-<?php echo SRC::validator($_COOKIE['lang']);?>"></span>
                                    <!--                            <span class="label label-warning">3</span>-->
                                </a>
                                <ul class="dropdown-menu widthDropDown">
                                    <li class="header">Виберіть мову</li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <li><!-- start notification -->
                                                <a href="/language/ua" class="lang" value="ua">
                                                    <span class="flag-icon flag-icon-ua"></span> Українська
                                                    
                                                </a>
                                            </li>
                                            <li><!-- start notification -->
                                                <a href="/language/gb" class="lang" value="gb">
                                                    <span class="flag-icon flag-icon-gb"></span> English
                                                    
                                                </a>
                                            </li>
<!--                                            <li><!-- start notification -->
<!--                                                <a href="/language/ru">-->
<!--                                                    <span class="flag-icon flag-icon-ru"></span> Русский-->
<!--                                                </a>-->
<!--                                            </li>-->
                                            <!-- end notification -->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/farmer-icon.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/farmer-icon.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'] .' - ' .$_COOKIE['position'];?>
                                            <small><?=$language['farmer-small']['19'];?> <?php echo  $_COOKIE['last_login'];?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer" style="background: rgba(121, 162, 42, 0.3)!important;">
                                        <div class="pull-left">
                                            <a href="/farmer/profile" class="btn btn-default btn-flat"><?=$language['farmer-small']['17'];?> </a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="/exit" class="btn btn-default btn-flat"><?=$language['farmer-small']['18'];?></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#"  data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"  style="background-color: #fafafa;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" >
                <li class="header">Навігація<?=$language['farmer']['115'];?></li>
                <li id="sm_menu_1">
                    <a href="<?php SRC::getSrc();?>/farmer-small/crops">
                        <i class="fa fa-link"></i><span><?=$language['farmer-small']['1'];?></span>
                    </a>
                     <ul class="treeview-menu">
                        <li id="sm_menu_1_1">
                            <a href="<?php SRC::getSrc();?>/farmer-small/crops">
                                <span><?=$language['farmer-small']['2'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_1_2">
                            <a href="<?php SRC::getSrc();?>/farmer-small/tech-cart">
                                <span><?=$language['farmer-small']['3'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_1_3">
                            <a href="<?php SRC::getSrc();?>/farmer-small/add-crop">
                                <span><?=$language['farmer-small']['4'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_1_4">
                            <a href="<?php SRC::getSrc();?>/farmer-small/add-equipment">
                                <span><?=$language['farmer-small']['5'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_1_5">
                            <a href="">
                                <span><?=$language['farmer-small']['6'];?></span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="sm_menu_1_5_1">
                                    <a href="<?php SRC::getSrc();?>/farmer-small/budget-crop">
                                        <span><?=$language['farmer-small']['6'];?></span>
                                    </a>
                                </li>
                                <li id="sm_menu_1_5_2">
                                    <a href="<?php SRC::getSrc();?>/farmer-small/budget-month">
                                        <span><?=$language['farmer-small']['7'];?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li id="sm_menu_1_6">
                            <a href="<?php SRC::getSrc();?>/farmer-small/budget-cash-flow">
                                <span><?=$language['farmer-small']['8'];?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="sm_menu_2">
                    <a href="#">
                        <i class="fa fa-link"></i><span><?=$language['farmer-small']['9'];?></span>
                    </a>
                    <ul class="treeview-menu"> 
                        <li id="sm_menu_2_1">
                            <a href="<?php SRC::getSrc();?>/farmer-small/fact">
                                <span><?=$language['farmer-small']['10'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_2_2">
                            <a href="<?php SRC::getSrc();?>/farmer-small/revenus-fact">
                                <span><?=$language['farmer-small']['11'];?></span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?php SRC::getSrc();?>/farmer-small/other-fact">
                                <span><?=$language['farmer-small']['12'];?></span>
                            </a>
                        </li> -->
                        <li id="sm_menu_2_3">
                            <a href="<?php SRC::getSrc();?>/farmer-small/crop-fact">
                                <span><?=$language['farmer-small']['6'];?></span>
                            </a>
                        </li>
                        <li id="sm_menu_2_4">
                            <a href="<?php SRC::getSrc();?>/farmer-small/month-fact">
                                <span><?=$language['farmer-small']['7'];?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="sm_menu_3">
                    <a href="#">
                        <i class="fa fa-link"></i><span><?=$language['farmer-small']['13']?></span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="sm_menu_3_1">
                            <a href="<?php SRC::getSrc();?>/farmer-small/budget-financial">
                                <span><?=$language['farmer-small']['14']?></span>
                            </a>
                        </li>
                        <li id="sm_menu_3_2">
                            <a href="<?php SRC::getSrc();?>/farmer-small/budget-graphs">
                                <span><?=$language['farmer-small']['15']?></span>
                            </a>
                        </li>
                        <li id="sm_menu_3_3">
                            <a href="<?php SRC::getSrc();?>/farmer-small/budget-fact-graphs">
                                <span><?=$language['farmer-small']['16']?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#" style="color:#72afd2">Company</a>.</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-refresh"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Доступні кабінети</h3>
                <ul class="control-sidebar-menu">
                    <?php $cabinet_item = SRC::viewCab();
                    foreach ($_SESSION['cabinet'] as $item)if($item!=false){?>
                        <li>
                            <a href="/<?=$cabinet_item[$item]['id']?>"]>
                                <i class="menu-icon fa <?php echo $cabinet_item[$item]['item'];?>"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading"><?if($_COOKIE['lang']=='gb'){echo $cabinet_item[$item]['name_en'];} else{echo $cabinet_item[$item]['name_ua'];}?></h4>
                                    <p><?=$cabinet_item[$item]['cab_name']?></p>
                                </div>
                            </a>
                        </li>
                    <?}?>
                </ul>
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php SRC::getSrc(); ?>/lib/dist/js/app.min.js"></script>
</body>
</html>