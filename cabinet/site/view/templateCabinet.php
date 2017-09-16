<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
<style>
    body{
        background: #f1f1f3;
    }
    .login-logo img{
        width: 360px;
    }
    .login-page,
    .register-page {
        background: #f1f1f3;

    }

    body {
        font-family: "Open Sans" ,'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
    }
    .cabinet{
        width: 360px;
        margin: 0 auto;
        /*min-height: 100%;*/
        padding: 0;
        text-align: center;
    }
    .cabinet h4{
        color: #79a22a;
        font-size: 22px;
        margin-top: 10px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }
    .cabinet li:hover{
        background-color: #bac7b3;
        border-color: #698d24;
        cursor: pointer;
        color: fff;
        border-radius: 4px;
    }
    .cabinet li{
        text-align: center;
        text-decoration: none;
        list-style: none;
        margin: 0;
        height: 80px;
    }
    .cabinet li a{
        text-decoration: none;
        padding: 15px;
        display: block;
    }

    .cabinet li h4{
        color: #79a22a;
        font-family: "Open Sans",'Source Sans Pro', sans-serif;
        display: block;
        font-weight: bold;
        font-size: 19px;
        margin: 0;
        padding: 0 0 5px;
    }
    .cabinet li p{
        font-family: "Open Sans",'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #79a22a;
        font-size: 14px;
        margin: 0;
    }
    .bg-green{
        background-color: #00a65a !important;
        color: #fff !important;
    }
    .bg-info{
        background-color: #d9edf7 !important;
        color: #3c8dbc !important;
    }
    .bg-orange {
        background-color: #ff851b !important;
        color: #fff !important;
    }
    .bg-blue {
        background-color: #0073b7 !important;
        color: #fff !important;
    }
    .bg-sss{
        background-color: rgba(185, 185, 185, 0.47) !important;
        color: #fff !important;
    }
    .menu-icon{
        float: left;
        margin-left: 40px;
        margin-right: -20px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        text-align: center;
        line-height: 35px
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
    .menu{
        margin-top: 38px;
    }
</style>
<div class="menu">
<ul class="cabinet">
    <div class="login-logo">
        <a href="/"><img src="cabinet/site/template/img/logo.png"> </a>
    </div>
    <h4>Доступні кабінети</h4>
<?php
$cabinet_item = SRC::viewCab();
foreach ($_SESSION['cabinet'] as $cabinet)if($cabinet!=false){?>
    <li>
        <a  href="/<?php echo $cabinet?>">
            <i class="menu-icon fa <?php echo $cabinet_item[$cabinet]['item'];?>"></i>
            <h4><?if($_COOKIE['lang']=='gb'){echo $cabinet_item[$cabinet]['name_en'];} else{echo $cabinet_item[$cabinet]['name_ua'];}?></h4>
            <p><?php echo $cabinet_item[$cabinet]['cab_name']?></p>
        </a>

    </li>
<?} ?>
    <li>
        <a  href="/exit">
            <i class="menu-icon fa fa-sign-out bg-sss"></i>

            <h4>Вихід</h4>

        </a>

    </li>
</ul>
</div>