<?php
$language=SRC::getLanguage('new-farmer');
?>
<?php
$top_menu=array(
    $language['new-farmer']['1']=>array(
        $language['new-farmer']['2']=>'/new-farmer/equipment',
        $language['new-farmer']['3']=>'/new-farmer/vehicles',
        $language['new-farmer']['4']=>'/new-farmer/employee',
        'bd materials'=>'/new-farmer/materials',
        //$language['new-farmer']['53']=>'/new-farmer/sales_price',
    ),
    'Технології вирощування'=>'/new-farmer/list_technology_card',
    $language['new-farmer']['5']=>'/new-farmer/field_management',
    $language['new-farmer']['136']=>'/new-farmer/fact_tech_card',
    //$language['new-farmer']['7']=>'/new-farmer/all_needed_material',
    $language['new-farmer']['8']=>'/new-farmer/storage',
    $language['new-farmer']['9']=>'/new-farmer/sales',
    $language['new-farmer']['195']=>'/new-farmer/other_cost',
    $language['new-farmer']['10']=>array(
        $language['new-farmer']['11']=> array(
            $language['new-farmer']['14']=>'/new-farmer/budget',
            $language['new-farmer']['12']=>'/new-farmer/budget_per_crop',
            $language['new-farmer']['13']=>'/new-farmer/budget_per_month',
            'Cash Flow'=>'/new-farmer/budget_cash_flow',
            ),
        'fact'=>array(
            'Fact per field'=>'/new-farmer/fact_budget_field',
            'Fact per crop'=>'/new-farmer/fact_budget_crop',
            'Fact per month'=>'/new-farmer/fact_budget_month',
            'Fact Cash Flow'=>'/new-farmer/fact_cash_flow',
        ),
        //'actual income/costs'=>'/new-farmer/fact_budget',

        $language['new-farmer']['15']=>'/new-farmer/graphs_plan',
        'financial'=>'/new-farmer/financial',
        ),
);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель управління дистрибютор</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/lib/flag-icon/css/flag-icon.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php SRC::getSrc(); ?>/cabinet/new-farmer/template/css/newstyle.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/jquery.easydropdown.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/js/script.js"></script>
</head>
<!-- ADD THE CLASS layout-top-navn TO REMOVE THE SIDEBAR. -->
<body class="layout-top-navn skin-green-light bodyn" style="height: auto; min-height: 100%;">
<div class="wrappern" style="height: auto;">
    <script type="text/javascript">
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
    <header class="main-headern">
        <div class="navibar navibar-static-top">
            <div class="navibar-header">
                <a href="#" class="navibar-brand navi navibar-navn"><img src="<?php SRC::getSrc();?>/cabinet/new-farmer/template/img/logo-wh.png" width="100px"></a>

<!--                <button type="button" class="navibar-toggle collapsen" data-toggle="collapse" data-target="#navibar-collapse">-->
<!--                    <i class="fa fa-bars"></i>-->
<!--                </button>-->
                <div class="navibar-custom-menun">
                    <ul class="navi navibar-navn">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="messages-menu">
                            <!-- Menu toggle button -->
                            <a href="/language/ua" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span class="flag-icon flag-icon-<?php echo SRC::validator($_COOKIE['lang']);?>"></span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern">Виберіть мову</li>
                                <li class="footern"><a href="/language/ua" value="ua" class="lang">Українська</a></li>
                                <li class="footern"><a href="/language/gb" value="gb" class="lang">English</a></li>
                                
                            </ul>
                        </li>
                        <li class="messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown" aria-expanded="false">
                                <span>UAH</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <li class="headern" style="margin-right: -5px;">Виберіть валюту</li>
                                <li class="footern"><a href="#">UAH</a></li>
                                <li class="footern"><a href="#">USD</a></li>
                                <li class="footern"><a href="#">EUR</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- User Account Menu -->
                        <li class="smalln user user-menun dropdown-togglen">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-togglen" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../dist/img/user2-160x160.jpg" class="user-imagen" alt="User Image">
                                <!-- hidden-xsn hides the username on smalln devices so only the image appears. -->
                                <span class="hidden-xsn"><?php echo  $_COOKIE['name_user'] .' ' .$_COOKIE['last_name_user'];?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menun">
                                <?php $cabinet_item = SRC::viewCab();
                                foreach ($_SESSION['cabinet'] as $item)if($item!=false){?>
                                    <li>
                                        <a href="<?=SRC::getSRC();?>/<?=$cabinet_item[$item]['id']?>/">
                                            <i class="menu-icon fa <?php echo $cabinet_item[$item]['item'];?>"></i><?if($_COOKIE['lang']=='gb'){echo $cabinet_item[$item]['name_en'];} else{echo $cabinet_item[$item]['name_ua'];}?>
                                        </a>
                                    </li>
                                <?}?>
                        
                                <!-- Menu Footer-->
                                <li class="user-footern">
                                    <div class="pull-leftn">
                                        <a href="<? echo SRC::getSRC();?>/farmer/profile" class="btn btn-default btn-flat">Профіль</a>
                                    </div>
                                    <div class="pull-rightn">
                                        <a href="/exit" class="btnn btn-defaultn btn-flatn">Вихід</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="content-wrappern" style="min-height: 207px;">
        <div class="containern">
            <section class="contentn">
                <div class="boxn box-defaultn">
                    <div class="box-bodyn2">
                        <div class="containern">
                            <div class="collapsen navibar-collapse pull-leftn" id="navibar-collapse">
                                <ul class="navi navibar-navn" id="top_menu">
                                    <?php foreach ($top_menu as $menu_text=>$menu_href){
                                        if(is_string($menu_href)) {?>
                                            <li><a href="<?=$menu_href?>"><?=$menu_text?></a></li>
                                        <?}else{?>
                                            <li class="dropdownn fixed_width">
                                                <a href="#" class="dropdown-togglen fixed_width" data-toggle="dropdown" aria-expanded="false"><?=$menu_text?><span class="caretn"></span></a>
                                                <ul class="dropdown-menu dropdown-menun" role="menu">
                                                    <?foreach ($menu_href as $menu_text_1=>$menu_href_1){
                                                        if(is_string($menu_href_1)){?>
                                                            <li class="fixed_width"><a href="<?=$menu_href_1 ?>"><?=$menu_text_1 ?></a></li>
                                                        <?}else{?>
                                                            <li class="dropdownn dropdown2 fixed_width">
                                                                <a href="#" class="dropdown-togglen fixed_width" data-toggle="dropdown" aria-expanded="false"><?=$menu_text_1 ?>
                                                                    <i class="fa fa-angle-right pull-right" style="color: #fff; margin-top: 5px"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menun2 fixed_width">
                                                                    <?foreach ($menu_href_1 as $menu_text_1_1=>$menu_href_1_1){?>
                                                                        <li class="fixed_width"><a class="fixed_width" href="<?=$menu_href_1_1 ?>"><?=$menu_text_1_1 ?></a></li>
                                                                    <?}?>
                                                                </ul>
                                                            </li>
                                                        <?}}?>
                                                </ul>
                                            </li>
                                        <?}} ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrappern -->
    <footer class="main-footern">
        <div class="containern" style="text-align: center; color: #fffefe; margin-top: 7px;">

            <strong>Copyright © 2014-2016 <a href="https://#">A</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrappern -->
<!-- jQuery 3 -->
<!-- jQuery 2.2.3 -->
<script src="<?php SRC::getSrc(); ?>/lib/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php SRC::getSrc(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php SRC::getSrc(); ?>/lib/dist/js/app.min.js"></script>


<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('.right-siden').animate({-->
<!--            'background-blend-mode': 'hard-light',-->
<!--        }, 1000);-->
<!--    })-->
<!--</script>-->


</body>
</html>