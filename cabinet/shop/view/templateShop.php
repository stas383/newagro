<?php
 $language=SRC::getLanguage('farmer-small'); ?>
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
        .sidebar-menu a{
            font-size: 18px;
            color: #fff!important;;
        }

        .treeview-menu a{
            font-size: 17px!important;
            color: #fff!important;
            padding-left: 15px;

        }
        .sidebar li a:hover{
            background: #018c4c!important;
        }
        .sidebar .active a{
            background: rgb(0, 109, 59)!important
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
                                    <li class="user-footer" style="background: #289463!important;">
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
    <aside class="main-sidebar"  style="background-color: rgb(0, 166, 90);">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" >
                <li>
                    <a href="<?php SRC::getSrc();?>/shop">
                        <i class="fa fa-link"></i><span>Создать задачу</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SRC::getSrc();?>/shop/showTask">
                        <i class="fa fa-link"></i><span>Список відкритих задач</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SRC::getSrc();?>/shop/showCloseTask">
                        <i class="fa fa-link"></i><span>Список закритих задач</span>
                    </a>
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
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
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