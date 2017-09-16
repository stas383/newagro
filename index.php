<?php
session_start();
//var_dump($_SESSION['cabinet']);
//Временное обозначение сессий
//
//session_unset($_SESSION['cabinet']);

//$_SESSION['lang'] = 'ua';
//$_SESSION['id_user'] = 1;
if ($_SESSION['crop']==false) $_SESSION['crop']='';
if($_SESSION['lang']=='ua'){
setcookie("lang", "gb", time()+3600*24*7, '/');}
// 1. Общие настройки
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
//Определение калинета пользователя или отправка его на сайт


require_once (ROOT.'/components/RouterCab.php');
$routerCab = new RouterCab();
$routerCabPath = $routerCab->runCab();
require_once(ROOT.'/cabinet/'.$routerCabPath.'/components/Router.php');


//require_once(ROOT.'/cabinet/'.$routerCabPath.'/test.php');
require_once(ROOT.'/components/Db.php');
require_once(ROOT.'/components/Src.php');

//Работа с куки
SRC::isCookie();
// 3. Установка соединения с БД


// 4. Вызор Router
//echo $routerCabPath;x
$router = new Router();
$router->run();
//unset($_SESSION['cabinet']);
//$_SESSION['cabinet'] = array('distributor', 'farmer','add-crop');
