<?php


class Fuel {
    // Загрузка списка топлива
    public static function getListFuel(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM fuel_type_veg");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listFuel = $result->fetchAll();

        return $listFuel;
    }

    //Добавление нового топлива в базу
    public static function addOneFuel($name, $price){
        $db = Db::getConnection();

        $db->query("INSERT INTO fuel_type_veg(name_fuel_ua, price_fuel) VALUE ('$name', '$price')");

        return true;
    }

    //Редактирование топлива
    public  static function editSaveFuel($id, $type, $value){
        $db = Db::getConnection();

        $db->query("UPDATE fuel_type_veg SET $type = '$value' WHERE id_fuel = '$id'");

        return true;
    }
}