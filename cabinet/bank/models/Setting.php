<?php
class Setting{
    //Список культур и пользовательских данных
    public static function getMyCropList(){
        $db = Db::getConnection();
        $id = $_SESSION['bank_user_id'];
        $result = $db->query("SELECT * FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-2'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['My-crop'] = $result->fetchAll();

        return $date;
    }
    //Загркзка баланса продукции
    public static function getDateBalanceProducts(){
        $db = Db::getConnection();
        $id = $_SESSION['bank_user_id'];
        $result = $db->query("SELECT * FROM setting_balance_products WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }

    //Загрузка настроек реализации
    public static function getDateSales(){
        $db = Db::getConnection();
        $id = $_SESSION['bank_user_id'];
        $result = $db->query("SELECT * FROM setting_sales WHERE id_user=0 or id_user=$id ORDER BY id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sales'] = $result->fetchAll();
        foreach ($date['sales'] as $sales){
            for ($x=1; $x<=12;$x++){
                $ex[$sales['name']][$x]=$sales['s'.$x];
            }
        }
        return $ex;
    }
}