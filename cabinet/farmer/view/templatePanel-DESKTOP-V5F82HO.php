<?php $language=SRC::getLanguage('farmer'); ?>
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
        <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/farmer/template/css/style-farmer.css">
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
            });
        </script>
        <style>
            .skin-green .wrapper,
            .skin-green .main-sidebar,
            .skin-green .left-side {
                background-color: #fafafa;
            }
            .skin-green .sidebar a {
                color: #79a22a;
                font-family: "Open Sans";
                font-size: 16px;
                font-weight: 700;
            }
            .skin-green .sidebar-menu>li:hover>a, .skin-green .sidebar-menu>li.active>a {
                color: #d7c731;
                background: none ;
                border-left-color: #d7c731;
            }
            .skin-green .sidebar-menu>li.header {
                color: #aaaaaa;
                background: none;
                font-size: 16px;
            }
            body {
                font-family: "Open Sans", "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.53857143;
                color: #333;
                background-color: #fff;
            }
            .content-wrapper, .right-side {
                min-height: 100%;
                background-color: #f1f1f3;
                z-index: 800;
            }
            .skin-green .main-header .navbar, .skin-green .main-header .logo {
                background-color: #79a22a;
            }
            .skin-green .main-header .navbar .sidebar-toggle:hover, .skin-green .main-header .logo:hover{
                background-color: #6d9126;
            }
            .nav-tabs-custom > .tab-content {
                background: #fafafa;
                padding: 10px;
                border-bottom-right-radius: 3px;
                border-bottom-left-radius: 3px;
            }
            .nav-tabs-custom > .nav-tabs > li.active {
                border-top-color: #d7c731;
            }
            .col-md-9 {
                position: relative;
                min-height: 1px;
                padding-left: 75px;
                padding-right: 15px;
            }
                .col-md-9 {
                    width: 94%;
                }
            .main-sidebar, .left-side {
                position: absolute;
                top: 0;
                left: 0;
                padding-top: 50px;
                min-height: 100%;
                width: 200px;
            }
            .form-control {
                display: block;
                width: 100%;
                height: 42px;
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
                                <li class="header">Виберіть мову </li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li><!-- start notification -->
                                            <a href="/language/ua">
                                                <span class="flag-icon flag-icon-ua"></span> Українська
                                            </a>
                                        </li>
                                        <li><!-- start notification -->
                                            <a href="/language/gb">
                                                <span class="flag-icon flag-icon-gb"></span> English
                                            </a>
                                        </li>
<!--                                        <li><!-- start notification -->
<!--                                            <a href="/language/ru">-->
<!--                                                <span class="flag-icon flag-icon-ru"></span> Русский-->
<!--                                            </a>-->
<!--                                        </li>-->
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
                                        <small>Остання активність <?php echo  $_COOKIE['last_login'];?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer" style="background: #289463!important;">
                                    <div class="pull-left">
                                        <a href="/farmer/profile" class="btn btn-default btn-flat"><?=$language['farmer']['103'];?> </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/exit" class="btn btn-default btn-flat"><?=$language['farmer']['114'];?></a>
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
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header"><?=$language['farmer']['115'];?></li>
                    <!-- Optionally, you can add icons to the links -->

                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span><?php echo $language['farmer']['1']?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                             </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer' ? 'class="active"' : '' ?>><a href="/farmer">Структура посівних площ</a></li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/fact' ? 'class="active"' : '' ?>><a href="/farmer/fact">Додати фактичні дані</a></li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget/graphs' ? 'class="active"' : '' ?>>
                                <a href="#">Технологічна карта
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?=$_SERVER["REQUEST_URI"] == '"/farmer/create/crop' ? 'class="active"' : '' ?>>
                                        <a href="/farmer/create/crop"><i class="fa fa-link"></i> <span>Сформувати технологічну карту</span></a>
                                    </li>
                                    <li <?=$_SERVER["REQUEST_URI"] == '"/farmer/create/crop' ? 'class="active"' : '' ?>>
                                        <a href="/farmer/budget/remains-plan/0/0"><i class="fa fa-link"></i> <span>Мої технологічні карти</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>






                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget' ? 'class="active"' : '' ?>><a href="/farmer/budget"><i class="fa fa-link"></i><span><?php echo $language['farmer']['121']?></span></a></li>
                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget-month' ? 'class="active"' : '' ?>>
                        <a href="/farmer/budget-month">
                            <i class="fa fa-link"></i><span><?php echo $language['farmer']['122']?></span>
                        </a>
                    </li>
                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget-cash-flow' ? 'class="active"' : '' ?> class="treeview">
                        <a href="/farmer/budget-cash-flow">
                            <i class="fa fa-link"></i><span><?php echo $language['farmer']['123']?></span>
                        </a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span><?php echo $language['farmer']['42']?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                             </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget/financial' ? 'class="active"' : '' ?>><a href="/farmer/budget/financial"><?php echo $language['farmer']['43']?></a></li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/budget/graphs' ? 'class="active"' : '' ?>><a href="/farmer/budget/graphs"><?php echo $language['farmer']['60']?></a></li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/analysis/solvency' ? 'class="active"' : '' ?>><a href="/farmer/analysis/solvency"><?php echo $language['farmer']['61']?></a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span><?php echo $language['farmer']['67']?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                             </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="#"><?php echo $language['farmer']['68']?>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form50/2014' ? 'class="active"' : '' ?>><a href="/farmer/form50/2014">2014</a></li>
                                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form50/2015' ? 'class="active"' : '' ?>><a href="/farmer/form50/2015">2015</a></li>
                                    <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form50/2016' ? 'class="active"' : '' ?>><a href="/farmer/form50/2016">2016</a></li>
                                </ul>
                            </li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form/1' ? 'class="active"' : '' ?>>
                                <a href="/farmer/form/1"><?php echo $language['farmer']['117']?></a>
                            </li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form/2' ? 'class="active"' : '' ?>>
                                <a href="/farmer/form/2"><?php echo $language['farmer']['118']?></a>
                            </li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form_m/1' ? 'class="active"' : '' ?>>
                                <a href="/farmer/form_m/1"><?php echo $language['farmer']['120']?></a>
                            </li>
                            <li <?=$_SERVER["REQUEST_URI"] == '/farmer/form_m/2' ? 'class="active"' : '' ?>>
                                <a href="/farmer/form_m/2"><?php echo $language['farmer']['119']?></a>
                            </li>

                        </ul>
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