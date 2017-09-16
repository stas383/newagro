<?php
class SRC
{
        //Получает имя доменаа
		public static function getSrc()	{
            echo 'http://'.$_SERVER['SERVER_NAME'];
        }
        //Получение имени домена для возврата
        public static function getSrcR(){
            return 'http://'.$_SERVER['SERVER_NAME'];
        }
        //Вывод сообщений в нижней правой части
        public static function alert(){
            require_once ('view/alert.php');
        }
        //Добавление уведомнения
        public static function  addAlert($result, $status, $msg){
            if($result == true){
                $_SESSION['alert_status'] = $status;
                $_SESSION['alert_msg'] = $msg;
            }
        }
        //Удаление уведомнения
        public static function unsetAlert(){
            unset( $_SESSION['alert_status']);
            unset( $_SESSION['alert_msg']);
        }
        //Перенаправляет пользователей(используется в контроллер)
        public static function redirect($src = null){
            if($src == null) $src = $_SERVER['HTTP_REFERER'];
            header('Location:'.$src);
            exit();
        }
        //Загрузка шаблона страниц
        public static function template($cabinet, $template, $content, $date=null){
            $templatePath = ROOT.'/cabinet/'.$cabinet.'/config/templates.php';
            $templateArrayName = include($templatePath);

            foreach ($templateArrayName as $templateKey){
                if($templateKey == $template){
                    $templatePath = ROOT.'/cabinet/'.$cabinet.'/view/template'.ucfirst($template).'.php';
                    require_once ($templatePath);

                    SRC::alert();
                    SRC::unsetAlert();

                    break;
                }
            }
        }
        //Валидация данных
        public static function validator($string){
            $string = trim(htmlspecialchars(addslashes($string)));
            return $string;
        }
        //Валидация данных, замена в запятой на точку
        public static function validatorPrice($string){
            $string = trim(htmlspecialchars(addslashes(str_replace(',', '.', $string))));
            return $string;
        }
        //Транслитерация
        public static function translit($string){
            $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',
                'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
                'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',
                'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',
                'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
                'ь' => '-',   'ы' => 'y',   'ъ' => '-',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

                'А' => 'A',   'Б' => 'B',   'В' => 'V',
                'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
                'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',
                'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',
                'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
                'Ь' => '-',  'Ы' => 'Y',   'Ъ' => '-',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                ' ' => '_',
            );
            return strtr($string, $converter);
        }
        //Проверка куки
        public static function isCookie(){
            //Куки для языка
            if (!isset($_COOKIE['lang']) or $_COOKIE['lang'] == null) setcookie("lang", 'ua', time()+3600*24*7, '/');
            //Куки для валюты
            if (!isset($_COOKIE['currency']) or $_COOKIE['currency'] == null) setcookie("currency", 'UAH', time()+3600*24*7, '/');
            if (!isset($_COOKIE['currency_val']) or $_COOKIE['currency_val'] == null) setcookie("currency_val", 1, time()+3600*24*7, '/');
        }
        //
        public static function viewCab(){
            $cabbinet_item = ['farmer' => ['id'=>'farmer','item' => 'fa-line-chart bg-green', 'name_ua' => 'Фермер середній','name_en'=>'Farmer', 'cab_name'=>'Кабінет фермера'],
                              'distributor' => ['id'=>'distributor','item' => 'fa-shopping-basket bg-info', 'name_ua' => 'Дистрибютор','name_en'=>'Distributor', 'cab_name'=>'Кабінет дистрибютора'],
                              'add-crop' => ['id'=>'add-crop','item' => 'fa-leaf bg-orange', 'name_ua' => 'Культури','name_en'=>'Cultures', 'cab_name'=>'Кабінет додавання культур'],
                              'bank' => ['id'=>'bank','item' => 'fa-bank bg-blue', 'name_ua' => 'Банк','name_en'=>'Bank', 'cab_name'=>'Кабінет банка'],
                              'translate' => ['id'=>'translate','item' => 'fa-globe bg-blue', 'name_ua' => 'Словник','name_en'=>'Dictionary', 'cab_name'=>'Кабінет для перекладу'],
                              'farmer-small' => ['id'=>'farmer-small','item' => 'fa-globe bg-green', 'name_ua' => 'Фермер малий','name_en'=>'Farmer sm.', 'cab_name'=>'Кабінет фермера см.'],
                              'shop'=>['id'=>'shop', 'item'=>'fa-tasks bg-green', 'name_ua'=>'Таск менеджер', 'name_en'=>'Task manager', 'cab_name'=>''],
                              'new-farmer'=>['id'=>'new-farmer','item'=>'fa-tasks bg-green', 'name_ua'=>'NEW', 'name_en'=>'NEW','cab_name'=>'new-farmer'],
                            'business-farmer'=>['id'=>'business-farmer','item'=>'fa-tasks bg-green', 'name_ua'=>'business-farmer', 'name_en'=>'business-farmer','cab_name'=>'business-farmer'],

            ];
            return $cabbinet_item;
        }
        //
         public static function getLanguage($cabinet){
            $language=false;
            require_once(ROOT.'/cabinet/'.$cabinet.'/template/language/'.strtoupper($_COOKIE['lang']).'.php');
            return $language;
        }
}