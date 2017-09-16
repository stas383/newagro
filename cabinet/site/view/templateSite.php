<?php

if (!$_COOKIE['lang'] || $_COOKIE['lang'] == '') {
    include("/cabinet/site/template/language/ua.php");
} else {
    include("/cabinet/site/template/language/" . $_COOKIE['lang'] . ".php");
}
?>
<html>
<head>
    <title>Agrianalytica</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/swiper/swiper.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/bootstrap.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/style.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/aa-style.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/blog-style.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/fonts/avdira.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/fonts/barkentina.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/fonts/robotoslab.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/fonts/intro.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/fonts/roboto.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/owlcarousel/owl.theme.default.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="<?php SRC::getSrc(); ?>/cabinet/site/template/js/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php SRC::getSrc(); ?>/cabinet/site/template/js/script.js" type="text/javascript" ></script>
    <script src="<?php SRC::getSrc(); ?>/cabinet/site/template/js/maskedinput.js" type="text/javascript"></script>
    <link href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/footer/style.css" rel="stylesheet" type="text/css" media="all">
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/block/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php SRC::getSrc(); ?>/cabinet/site/template/css/block/set1.css">
</head>
<body class="general">
<div class="navbar" style="height: 75px">
    <div class=" col-lg-12 menu-bar">
        <div class="col-md-2 logo">
            <a href="general"><img src="site/img/logo.gif" height="70"/></a>
        </div>
        <div class="col-md-9" id="myNavbar">
            <script>
                $(document).ready(function () {
                    $('.menu-bar ul.nav > li ').hover(function () {
                        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
                    }, function () {
                        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
                    });
                });
            </script>
            <ul class="nav nav-tabs nav-justified">
                <li>
                    <a href="general" ><?= $t['1'] ?></a>
                </li>
                <li class="dropdown  <?= $_SERVER["REQUEST_URI"] == '/about_program' ? 'active' : '' ?>">
                    <a href="about_program" <?= $_SERVER["REQUEST_URI"] == '/about_program' ? 'class="active"' : '' ?>><?= $t['2']?></a>
                    <ul class="dropdown-menu drop">
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/about_program?id=bplan' ? 'class="active"' : '' ?>  href="about_program?id=bplan"><?=$t['3']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/about_program?id=bplan_plus' ? 'class="active"' : '' ?>  href="about_program?id=bplan_plus"><?=$t['3']?>&nbsp;<sup class="bplan_plus"><i><?=$t['4']?></i></sup></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/about_program?id=bcontrol' ? 'class="active"' : '' ?>  href="about_program?id=bcontrol"><?=$t['5']?></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown <?= $url=='service'||$_SERVER["REQUEST_URI"] == '/service' ? 'active' : '' ?>">
                    <a href="service" ><?= $t['6']?></a>
                    <ul class="dropdown-menu drop">
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=farmers' ? 'class="active"' : '' ?> href="service?id=farmers"><?=$t['7']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=banks' ? 'class="active"' : '' ?>  href="service?id=banks"><?=$t['8']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=suppliers' ? 'class="active"' : '' ?>  href="service?id=suppliers"><?=$t['9']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=techno_providers' ? 'class="active"' : '' ?>  href="service?id=techno_providers"><?=$t['10']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=insurance_companies' ? 'class="active"' : '' ?>  href="service?id=insurance_companies"><?=$t['11']?></a>
                        </li>
                        <li>
                            <a <?=$_SERVER["REQUEST_URI"] == '/service?id=investors' ? 'class="active"' : '' ?>  href="service?id=investors"><?=$t['12']?></a>
                        </li>
                    </ul>
                </li>
                <li <?= $_SERVER["REQUEST_URI"] == '/about_us' ? 'class="active"' : '' ?>>
                    <a href="about_us" <?= $_SERVER["REQUEST_URI"] == '/about_us' ? 'class="active"' : '' ?>><?= $t['13'] ?></a>
                </li>
                <li>
                    <a href="blog" ><?= $t['14'] ?></a>
                </li>
                <li <?= $_SERVER["REQUEST_URI"] == '/contact' ? 'class="active"' : '' ?>>
                    <a href="contact" <?= $_SERVER["REQUEST_URI"] == '/contact' ? 'class="active"' : '' ?>><?= $t['15'] ?></a>
                </li>


                <li>
                    <? //if ( $_SESSION['login'] == TRUE ): ?>
<!--                        <a --><?//= $_SESSION['login'] <> 'farmer' ? 'href="in"' : 'id="login"' ?><!-- --><?//= $_SESSION['login'] == 'farmer' ? 'href="in"' : 'id="login"' ?><!--   style="font-weight: 500" class="login">--><?//=$t['145'] ?><!--</a>-->
                    <?// else: ?>
                        <a class="login" id="site_login" ><?=$t['16']?></a>
                    <?// endif; ?>
                </li>

                <li class="dropdown">
<!--                    <a>--><?//=!$_SESSION['lang'] || $_SESSION['lang']==''||$_SESSION['lang']=='ua'?'UA':$_SESSION['lang']?><!--</a>-->
                    <ul class="dropdown-menu drop">
                        <li <?=!$_SESSION['lang'] || $_SESSION['lang']==''||$_SESSION['lang']=='ua'?'class="active"':''?>><a <?=$_SESSION['lang']==''||$_SESSION['lang']=='ua'?'class="active"':''?> id="lang" type="button" data-lang="ua">UA</a></li>
                        <li <?=$_SESSION['lang']&&$_SESSION['lang']=='en'?'class="active"':''?>><a <?=$_SESSION['lang']&&$_SESSION['lang']=='en'?'class="active"':''?> id="lang" type="button" data-lang="en">EN</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
        <? if ($_SESSION['id_user'] != null) { ?>
            <div class="col-lg-12 top_line">
                <!--<b><img src="img/Telephone-Alt.png" width="15"/> +380501234567</b>
                <b><img src="img/mail.png" width="15"/> admin@sscukraine.com</b>-->

                <div style="float: right; margin-right: 10px;">
<!--                    --><?//= $_SESSION['prava'] == "admin" ? '<a href="admin/"><b>Перейти в адмін панель</b></a>' : '' ?>
<!--                    --><?//= $_SESSION['prava'] == "admin" || $_SESSION['login'] == "efarmer"  ? '<a href="modules/module/add-crop"><b>Додати культуру</b></a>' : '' ?>
<!--                    <a href="#"><b>--><?//= $_SESSION['login']; ?><!--,</b></a>-->
<!--                    <a href="system/logout.php"><b>--><?//=$t['17']?><!--</b></a>-->
                </div>
            </div>
        <? } ?>
    </div>

</div>
