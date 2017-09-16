<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 15:49
 */
class Vehicles{
    public static function getVehicles($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_vehicles WHERE id_user = '$id_user' and vehicles_status = 0 ORDER BY vehicles_kind DESC");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    public static function createVehicles($id_user,$vehicles_kind, $vehicles_name, $vehicles_license,$vehicles_inventory_number, $vehicles_fuel, $vehicles_acquisition, $vehicles_power, $vehicles_load_capacity, $vehicles_depreciation, $vehicles_amount_of_amortization,$vehicles_usage_year,$vehicles_purchase_price){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_vehicles(id_user, vehicles_kind, vehicles_name, vehicles_license,vehicles_inventory_number, vehicles_fuel, vehicles_acquisition, vehicles_power,vehicles_load_capacity, vehicles_depreciation, vehicles_amount_of_amortization,vehicles_usage_year,vehicles_purchase_price) 
            VALUES ('$id_user','$vehicles_kind', '$vehicles_name','$vehicles_license','$vehicles_inventory_number','$vehicles_fuel','$vehicles_acquisition', '$vehicles_power','$vehicles_load_capacity', '$vehicles_depreciation', '$vehicles_amount_of_amortization', '$vehicles_usage_year','$vehicles_purchase_price')");
        return true;
    }
    public static function editVehicles($id_user, $id_vehicles, $vehicles_kind, $vehicles_name, $vehicles_license,$vehicles_inventory_number, $vehicles_fuel, $vehicles_acquisition, $vehicles_power,$vehicles_load_capacity, $vehicles_depreciation, $vehicles_amount_of_amortization,$vehicles_usage_year,$vehicles_purchase_price){
        $db = Db::getConnection();
        $db->query("UPDATE new_vehicles SET vehicles_kind='$vehicles_kind', vehicles_name='$vehicles_name',vehicles_license='$vehicles_license',vehicles_inventory_number='$vehicles_inventory_number', vehicles_fuel='$vehicles_fuel',vehicles_acquisition='$vehicles_acquisition', vehicles_power='$vehicles_power',vehicles_load_capacity='$vehicles_load_capacity', vehicles_depreciation= '$vehicles_depreciation',vehicles_amount_of_amortization='$vehicles_amount_of_amortization',vehicles_usage_year='$vehicles_usage_year',vehicles_purchase_price='$vehicles_purchase_price'  WHERE id_user ='$id_user' AND id_vehicles='$id_vehicles'");
        return true;
    }
    public static function removeVehicles($id_vehicles,$id_user){
        $db = Db::getConnection();
        $db->query("UPDATE new_vehicles SET vehicles_status='1' WHERE id_user ='$id_user' AND id_vehicles='$id_vehicles'");
        return true;
    }
}