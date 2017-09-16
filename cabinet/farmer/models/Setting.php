<?php
class Setting{
    //Список культур и пользовательских данных
    public static function getMyCropList(){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];

        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT * FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-2'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM  agri_crop_head WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-3'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['My-crop'] = $result->fetchAll();

        return $date;
    }
    //Загркзка баланса продукции
    public static function getDateBalanceProducts(){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM setting_balance_products WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //Сохранение баланса продукции
    public static function saveBalanceProducts($id_user, $sql){
        $db = Db::getConnection();
        $db->query("DELETE FROM setting_balance_products WHERE id_user=$id_user");
        $db->query("INSERT INTO setting_balance_products (id_user, crop, s1, s2, s3, s4, s5) VALUE $sql");

        return true;
    }
    //Загрузка настроек реализации
    public static function getDateSales(){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM setting_sales WHERE id_user=0 or id_user=$id ORDER BY id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sales'] = $result->fetchAll();
        foreach ($date['sales'] as $sales){
            for ($x=1; $x<=12;$x++){
                $ex[$sales['name']][$x]=$sales['s'.$x];
            }
        }
        $result = $db->query("SELECT * FROM agri_sales WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_sales'] = $result->fetchAll();
        foreach ($date['agri_sales'] as $agri_sales){
            for ($x=1; $x<=12;$x++){
                $ex[$agri_sales['crop_id'].'-3'][$x]=$agri_sales['s'.$x];
            }
        }

        return $ex;
    }
    //Сохранение настроек реализации
    public static function saveSettingSales($id_user, $sql, $sql2, $remove2){
        $db = Db::getConnection();
        $db->query("DELETE FROM setting_sales WHERE id_user=$id_user");
        $db->query("DELETE FROM agri_sales WHERE id_user=$id_user AND ($remove2)");

        $db->query("INSERT INTO setting_sales (id_user, name, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12) VALUE $sql");
        $db->query("INSERT INTO agri_sales (id_user, crop_id, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12) VALUE $sql2");

        return true;
    }
    //
    public static function saveSettingFinancialBank($sql_save, $bank){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $db->query("DELETE FROM setting_bank WHERE id_user=$id_user");
        $db->query("INSERT INTO setting_bank (id_user, b1, b2, b3, b4, b5, b6) VALUE ('$id_user','$bank[1]','$bank[2]','$bank[3]','$bank[4]','$bank[5]','$bank[6]')");
        $db->query("DELETE FROM cash_flow WHERE id_user=$id_user AND (name_cf=8 or name_cf=9 or name_cf=10)");
        $db->query("INSERT INTO cash_flow (id_user, name_cf, cf_1, cf_2, cf_3, cf_4, cf_5, cf_6, cf_7, cf_8, cf_9, cf_10, cf_11, cf_12) VALUE $sql_save");

        return true;
    }
    //Налаштування по заборгованості
    public static function getSettingFinancialBank(){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];

        $result = $db->query("SELECT * FROM cash_flow WHERE id_user='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['proc'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM setting_bank WHERE id_user='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['bank'] = $result->fetchAll();

        return $date;
    }
}