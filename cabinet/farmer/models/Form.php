<?php
 class Form{
     //загрузка культур
     public static function getMyCrop($id){
         $db = Db::getConnection();

         if($_COOKIE['lang']=='ua')$lang='ua';
         if($_COOKIE['lang']=='gb')$lang='en';

         $result = $db->query("SELECT a.crop_id, h.name_crop_$lang AS name_crop_ua  FROM crop_analytica AS a, crop_head AS h WHERE a.id_user=$id AND a.type=1 AND a.crop_id=h.id_crop");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $date[1] = $result->fetchAll();

         $result = $db->query("SELECT a.crop_id, h.name_crop_$lang AS name_crop_ua FROM crop_analytica AS a, crop_head_veg AS h WHERE a.id_user=$id AND a.type=2 AND a.crop_id=h.id_crop");
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
     //сохранение формы 50
     public static function saveForm50($sql_save, $year){
         $db = Db::getConnection();
         $id = $_SESSION['id_user'];
         $db->query("DELETE FROM form50_date WHERE id_user=$id AND year=$year");
         $db->query("INSERT INTO form50_date (id_user, year, crop, f1, f2, f3, f4, f5, f6, f7) VALUE $sql_save");

         return true;
     }
     //загрузка заголовков
     public static function getForm1Title($table){
         $db = Db::getConnection();
         if($table==1) $sql="type=1 or type=2";
         if($table==2) $sql="type=3 or type=4 or type=5 or type=6";
         $result = $db->query("SELECT b, UA, EN, type  FROM form_title WHERE $sql");
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
     public static function  getForm1mTitle($table){
         $db = Db::getConnection();
         if($table==1) $sql="type=1 or type=2";
         if($table==2) $sql="type=3 or type=4";
         $result = $db->query("SELECT b, UA, EN, type  FROM form_m_title WHERE $sql");
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
     //сохранение формы 1, 2
     public static function saveForm1($id_user, $sql_save, $table){
         $db = Db::getConnection();
         $db->query("DELETE FROM form1_date WHERE id_user=$id_user AND table_id=$table");
         $db->query("INSERT INTO form1_date (id_user, table_id, b, s2014, e2014, e2015, e2016) VALUE $sql_save");

         return true;
     }
     public static function saveForm1m($id_user, $sql_save, $table){
         $db = Db::getConnection();
         $db->query("DELETE FROM form1_date WHERE id_user=$id_user AND table_id=$table");
         $db->query("INSERT INTO form1_date (id_user, table_id, b, s2014, e2014, e2015, e2016) VALUE $sql_save");
         return true;
     }



     public static function verificationForm1($id, $year){
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM date_form1 WHERE year='$year' AND id_user='$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $resultDate = $result->fetchAll();
        if($resultDate != false) return true;

        return false;
    }
    public static function getCodeList(){
        $db = Db::getConnection();

        $result = $db->query("SELECT b FROM form_title WHERE NOT b='' AND (type='1' or type='2')");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $code = $result->fetchAll();

        return $code;
    }
    public static function createDate($year, $id_user, $code){
        $db = Db::getConnection();
        foreach ($code as $key){
            $codeQuery = $key['b'];
                $db->query("INSERT INTO date_form1 (id_user, year, code)
                    VALUE ('$id_user', '$year', '$codeQuery')");
        }
        return true;
    }
    //
    public static function getDateForm50($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT  code  FROM form50_code");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //
    public static function valideteForm50($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT code FROM form50_date WHERE id_user = '$id'");
        if($result != false) return false;
        return true;

    }
    //
    public static function saveFormExport($db, $id_user,$pole,$value,$kod){
        if($value==false)$value=0;
        $db->query("UPDATE form1_date SET $pole = '$value' WHERE id_user='$id_user' AND b='$kod'");
        return true;
    }
    //
    public static function testForm12($db,$id_user,$title1,$title2){
        $result = $db->query("SELECT * FROM form1_date WHERE id_user = '$id_user' AND table_id=1");
        if($result != false) {
            foreach ($title1 as $form1) {
                if ($form1['b'] == true) {
                    $db->query("INSERT INTO form1_date (id_user, table_id, b) VALUE ('$id_user','1',{$form1['b']})");
                }
            }
        };
        $result = $db->query("SELECT * FROM form1_date WHERE id_user = '$id_user' AND table_id=2");
        if($result != false) {
            foreach ($title2 as $form2) {
                if ($form2['b'] == true) {
                    $db->query("INSERT INTO form1_date (id_user, table_id, b) VALUE ('$id_user','2',{$form2['b']})");
                }
            }
        };
        return true;
    }
}