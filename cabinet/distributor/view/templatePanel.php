<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель управління дистрибютор</title>
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
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/dist/css/skins/skin-purple.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/other.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/distributor/template/css/style-distributor.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
</head>
<!--
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
<body class="hold-transition skin-purple sidebar-mini">
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
                            <li class="header">Виберіть валюту </li>
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
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/distributor/profile" class="btn btn-default btn-flat">Профіль</a>
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

            <!-- Sidebar user panel (optional) -->
            <!--      <div class="user-panel">-->
            <!--        <div class="pull-left image">-->
            <!--          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
            <!--        </div>-->
            <!--        <div class="pull-left info">-->
            <!--          <p>Alexander Pierce</p>-->
            <!--          <!-- Status -->-->
            <!--          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            <!--        </div>-->
            <!--      </div>-->

            <!--      <!-- search form (Optional) -->-->
            <!--      <form action="#" method="get" class="sidebar-form">-->
            <!--        <div class="input-group">-->
            <!--          <input type="text" name="q" class="form-control" placeholder="Search...">-->
            <!--              <span class="input-group-btn">-->
            <!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
            <!--                </button>-->
            <!--              </span>-->
            <!--        </div>-->
            <!--      </form>-->
            <!--      <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Навігація</li>
                <!-- Optionally, you can add icons to the links -->

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Насіння</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/distributor/add-seeds">Додати</a></li>
                        <li><a href="/distributor">Список товарів</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Добрива</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/distributor/add-fertilizers">Додати</a></li>
                        <li><a href="/distributor/list-fertilizers">Список товарів</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Засоби захисту рослин</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/distributor/add-ppa">Додати</a></li>
                        <li><a href="/distributor/list-ppa">Список товарів</a></li>
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
