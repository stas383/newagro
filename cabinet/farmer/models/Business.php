<?php
class Business{
    //
    public static function addListCrop($crop_id,$area,$tillage,$type){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];
        $db->query("INSERT INTO crop_analytica(id_user, crop_id, area,tillage,type) VALUE ('$id','$crop_id','$area','$tillage',$type)");
        return true;
    }
    public static function editLease($value){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];
        $db->query("UPDATE analytica_date SET lease=$value WHERE id_user ='$id'");
        return true;
    }
    //Список культур
    public static function getList(){
        $db = Db::getConnection();
        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        return $date;
    }

    //Список культур и пользовательских данных
    public static function getMyCropList(){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];

        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT * FROM analytica_date WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['analytica_date'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-2'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id AND type=1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['My-crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id AND type=2");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['My-crop-2'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id AND type=3");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['My-crop-3'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM agri_crop_head WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_head_sql'] = $result->fetchAll();

        foreach ($date['agri_crop_head_sql'] as $agri_crop_head){
            $date['agri_crop_head'][$agri_crop_head['id_crop']]=array('name'=>$agri_crop_head['name_crop_ua']);
        }

        return $date;
    }

    //Изменение пользовательского списка культур
    public static function addMyCropList($sql, $sqlRemove, $sql2, $sqlRemove2, $sql3, $sqlRemove3){
        $db = Db::getConnection();
        $id = $_SESSION['id_user'];
        $db->query("INSERT INTO crop_analytica(id_user, crop_id, type) VALUE $sql");
        $db->query("DELETE FROM crop_analytica WHERE id_user=$id AND ($sqlRemove) AND type=1");
        $db->query("INSERT INTO crop_analytica(id_user, crop_id, type) VALUE $sql2");
        $db->query("DELETE FROM crop_analytica WHERE id_user=$id AND ($sqlRemove2) AND type=2");
        $db->query("INSERT INTO crop_analytica(id_user, crop_id, type) VALUE $sql3");
        $db->query("DELETE FROM crop_analytica WHERE id_user=$id AND ($sqlRemove3) AND type=3");

        return true;
    }

    //Изменение пользовательских данных
    public static function saveCropList($id, $type, $value, $user_id){
        $db = Db::getConnection();
        $db->query("UPDATE crop_analytica SET  $type = '$value' WHERE id = '$id' AND id_user='$user_id'");

        return true;
    }

    //
    public static function getMyZone($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM profile_farmer as pf, profile_region as rg WHERE pf.id_user=$id AND pf.region=rg.id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userDate = $result->fetchAll();
        $zone=$userDate[0]['zona'];

        return $zone;
    }
}