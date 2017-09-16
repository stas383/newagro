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
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/skins/skin-green.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/other.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/bank/template/css/style-farmer.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>


</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>A</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Agri</b>Analytica</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
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
                                    <li><!-- start notification -->
                                        <a href="/language/ru">
                                            <span class="flag-icon flag-icon-ru"></span> Русский
                                        </a>
                                    </li>
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
                            <img src="<?php SRC::getSrc(); ?>/cabinet/bank/template/images/farmer-icon.png" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php SRC::getSrc(); ?>/cabinet/bank/template/images/farmer-icon.png" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'] .' - ' .$_COOKIE['position'];?>
                                    <small>Остання активність <?php echo  $_COOKIE['last_login'];?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer" style="background: #289463!important;">
                                <div class="pull-left">
                                    <a href="/bank/profile" class="btn btn-default btn-flat">Профіль        </a>
                                </div>
                                <div class="pull-right">
                                    <a href="/exit" class="btn btn-default btn-flat">Вихід</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                <li class="header">Навігація</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/bank"><i class="fa fa-link"></i><span>Список аграріїв</span></a></li>
                <?php if($date['sidebar_menu']=='on'){?>
                <li class="header"><?php echo $_SESSION['bank_user_name']?></li>
                <li><a href="/bank/budget"><i class="fa fa-link"></i><span>Операційний бюджет по культурах</span></a></li>
                <li>
                    <a href="/bank/budget-month">
                        <i class="fa fa-link"></i><span>Операційний бюджет помісячно</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/bank/budget-cash-flow">
                        <i class="fa fa-link"></i><span>Рух грошових коштів помісячно (Cash Flow)</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Аналіз фінансово-економічної діяльності</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/bank/budget/financial">Фінансово-економічні показники</a></li>
                        <li><a href="/bank/budget/graphs">Графічний порівняльний аналіз (бенчмаркінг)</a></li>
                        <li><a href="/bank/analysis/solvency">Оцінка платоспроможності</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Фактичні дані</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#">Форма №50-сг
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/bank/form50/2014">2014</a></li>
                                <li><a href="/bank/form50/2015">2015</a></li>
                                <li><a href="/bank/form50/2016">2016</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/bank/form/1">Ф.1 Баланс</a>
                        </li>
                        <li>
                            <a href="/bank/form/2">Ф.2 Звіт про фін.результати</a>
                        </li>
                        <li>
                            <a href="/bank/form_m/1">Ф.1-м Баланс</a>
                        </li>
                        <li>
                            <a href="/bank/form_m/2">Ф.2-м Звіт про фін.результати</a>
                        </li>
                        <? }?>
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
                                    <h4 class="control-sidebar-subheading"><?=$cabinet_item[$item]['name']?></h4>
                                    <p><?=$cabinet_item[$item]['cab_name']?></p>
                                </div>
                            </a>
                        </li>
                    <?}?>
                </ul>
                <!-- /.control-sidebar-menu -->
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
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php SRC::getSrc(); ?>/lib/dist/js/app.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
