<?php
 class Form{
     //загрузка культур
     public static function getMyCrop($id){
         $db = Db::getConnection();

         $result = $db->query("SELECT a.crop_id, h.name_crop_ua FROM crop_analytica AS a, crop_head AS h WHERE a.id_user=$id AND a.type=1 AND a.crop_id=h.id_crop");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date[1] = $result->fetchAll();

         $result = $db->query("SELECT a.crop_id, h.name_crop_ua FROM crop_analytica AS a, crop_head_veg AS h WHERE a.id_user=$id AND a.type=2 AND a.crop_id=h.id_crop");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date[2] = $result->fetchAll();

         return $date;
     }
     //загрузка формы 50
     public static function getForm50($id, $year){
         $db = Db::getConnection();

         $result = $db->query("SELECT * FROM form50_date WHERE id_user=$id AND year=$year");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date = $result->fetchAll();

         return $date;
     }
     //загрузка заголовков
     public static function getForm1Title($table){
         $db = Db::getConnection();
         if($table==1) $sql="type=1 or type=2";
         if($table==2) $sql="type=3 or type=4 or type=5 or type=6";
         $result = $db->query("SELECT *  FROM form_title WHERE $sql");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date = $result->fetchAll();

         return $date;
     }
     public static function getForm1mDate(){
         $db = Db::getConnection();
         $result = $db->query("SELECT b FROM form_title");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date = $result->fetchAll();
         return $date;
     }
     public static function  getForm1mTitle($table)
     {
         $db = Db::getConnection();
         if($table==1) $sql="type=1 or type=2";
         if($table==2) $sql="type=3 or type=4";
         $result = $db->query("SELECT b, UA, type  FROM form_m_title WHERE $sql");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $title = $result->fetchAll();
        /* $form1_m_title_active = [];
         foreach ($title as $key) {
             foreach ($form1_m_merge as $item) {
                 if(($key['b'] == $item and $key['type'] == 1) ||($key['b'] == ' ' and $key['type'] == 1) ) {
                     $form1_m_title_active[$key['b']] = $key['UA'];
                 }
             }

         }*/
         return $title;
     }


     //загрузка данных формы 1,2
     public static function getForm1Date($id_user, $table){
         $db = Db::getConnection();
         $result = $db->query("SELECT *  FROM form1_date WHERE id_user=$id_user AND table_id=$table");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date = $result->fetchAll();

         foreach ($date as $ex){
             $ex_date[$ex["b"]]["s14"]=$ex["s2014"];
             $ex_date[$ex["b"]]["e14"]=$ex["e2014"];
             $ex_date[$ex["b"]]["e15"]=$ex["e2015"];
             $ex_date[$ex["b"]]["e16"]=$ex["e2016"];
         }

         return $ex_date;
     }
}