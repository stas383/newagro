<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Agrianalytica</title>
    <link href="<?php SRC::getSrc();?>/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php SRC::getSrc();?>/cabinet/add-crop/template/css/style.css" rel="stylesheet">
    <link href="<?php SRC::getSrc();?>/lib/dashboard.css" rel="stylesheet">
    <link href="<?php SRC::getSrc();?>/lib/other.css" rel="stylesheet">
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/jquery-3.2.0.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/lib/script.js"></script>
    <script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/add-crop/template/js/script.js"></script>
    <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<body>
<?php var_dump($_SESSION['crop']);?>
<div class="navbar navbar-inverse navbar-fixed-top  <?php if($_SESSION['crop']== '_veg') echo 'veg';?>" role="navigation"">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: #fff;">agrianalytica</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<!--                <li><a href="#">Dashboard</a></li>-->
<!--                <li><a href="#">Settings</a></li>-->
<!--                <li><a href="#">Profile</a></li>-->
                <li>
                    <a>
                    <select onchange="window.location.href=this.options[this.selectedIndex].value" style="height:20px; padding:0px 12px;" class="form-control">
                        <option value="<?php SRC::getSrc();?>/add-crop/cabinet/1" >Рослинництво</option>
                        <option value="<?php SRC::getSrc();?>/add-crop/cabinet/2" <?php if($_SESSION['crop']== '_veg') echo "selected";?>>Овочівництво</option>
                    </select>
                    </a>
                </li>
                <li><a href="/exit" style="color: #fff;">Вихід</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar ">
            <ul class="nav nav-sidebar">
                <li><a>Культури</a>
                    <ul>
                        <li><a href="<?php SRC::getSrc();?>/add-crop">Культури</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-crop">Додати культуру</a></li>
                    </ul>
                </li>
                <li ><a>Паливо</a>
                    <ul>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-fuel">Види палива</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-fuel">Додати паливо</a></li>
                    </ul>
                </li>
                <li><a>Операції</a>
                    <ul>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-action-type">Типи операцій</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-action-type">Додати тип операції</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-action">Операції</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-action">Додати операцію</a></li>
                    </ul>
                </li>
                <li><a>Техніка</a>
                    <ul>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-equipment">Техніка</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-equipment">Додати техніку</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-working">Трактора</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-power">с/г машини</a></li>
                    </ul>
                </li>
                <li><a>Матеріали</a>
                    <ul>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-material-subtype">Вид ЗЗР</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-material-subtype">Додати вид ЗЗР</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-material-ppa">Матеріали ЗЗР</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-material-ppa">Додати матеріал ЗЗР</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-material-seeds ">Насіння</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-material-seeds">Додати насіння</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/list-material-fertilizers">Добрива</a></li>
                        <li><a href="<?php SRC::getSrc();?>/add-crop/add-material-fertilizers">Додати добрива</a></li>
                    </ul>
                </li>
                <li><a href="<?php SRC::getSrc();?>/add-crop/list-plan">Технологічна карта</a></li>

            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php require_once ('cabinet/'.$cabinet.'/view/content'.ucfirst($content).'.php');?>
        </div>
    </div>
</div>
</body>
</html>
