<?php


class Crop {
    // Загрузка списка культур

    public static function getListCrop(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM crop_head WHERE NOT status_delete = 1");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listCrop = $result->fetchAll();

        return $listCrop;
    }

    //Добавление новой культуры в БД
    public static function createCrop($name_crop_ua, $yield_min, $yield_max, $cleaning_qty, $drying_qty, $cleaning_price, $drying_price, $storing_price, $selling_price, $other_operating_1, $other_operating_2, $other_operating_3){
        $db = Db::getConnection();
        $db->query("INSERT INTO crop_head (	name_crop_ua, yield_min, yield_max, cleaning_qty, drying_qty, cleaning_price, drying_price, storing_price, selling_price, other_operating_1, other_operating_2, other_operating_3)
                VALUE ('$name_crop_ua','$yield_min','$yield_max','$cleaning_qty','$drying_qty','$cleaning_price','$drying_price','$storing_price','$selling_price', '$other_operating_1','$other_operating_2' ,'$other_operating_3' )");
        return true;
    }

    //Загрузка одной культуры
    public static function getCropId($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM crop_head WHERE id_crop=$id");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idCrop = $result->fetchAll();

        return $idCrop;
    }

    //Редактирование культуры
    public static function editSaveCrop($id, $name_crop_ua, $yield_min, $yield_max, $cleaning_qty, $drying_qty, $cleaning_price, $drying_price, $storing_price, $selling_price, $other_operating_1, $other_operating_2, $other_operating_3){
        $db = Db::getConnection();
        $db->query("UPDATE crop_head SET name_crop_ua = '$name_crop_ua', yield_min = '$yield_min', yield_max = '$yield_max', cleaning_qty = '$cleaning_qty', drying_qty = '$drying_qty', cleaning_price = '$cleaning_price', drying_price = '$drying_price', storing_price = '$storing_price', selling_price = '$selling_price', other_operating_1 = '$other_operating_1', other_operating_2 = '$other_operating_2', other_operating_3 = '$other_operating_3'
                    WHERE id_crop = '$id'");
        return true;
    }

    //Удаление культуры
    public static function removeCrop($id){
        $db = Db::getConnection();
        $db->query("UPDATE crop_head SET status_delete = '1' WHERE id_crop = $id");

        return true;
    }
}