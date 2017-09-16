<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 14:26
 */
class Equipment{
    public static function getEquipment($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_equipment WHERE id_user = '$id_user' and equipment_status = 0 ORDER BY equipment_type ASC ");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

    public static function createEquipment($id_user,$equipment_name,$equipment_inventory_number, $equipment_type,$equipment_capacity,$equipment_width,$equipment_aquisition,$equipment_price,$equipment_usage,$equipment_unit,$equipment_kind){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_equipment(id_user, equipment_name,equipment_inventory_number, equipment_type, equipment_capacity,  equipment_width, equipment_unit, equipment_aquisition, equipment_price, equipment_usage,equipment_kind) VALUES ('$id_user','$equipment_name','$equipment_inventory_number','$equipment_type','$equipment_capacity','$equipment_width', '$equipment_unit','$equipment_aquisition','$equipment_price','$equipment_usage','$equipment_kind')");
        return true;
    }

    public static function editEquipment($id_equipment,$id_user,$equipment_name,$equipment_inventory_number,$equipment_type,$equipment_capacity,$equipment_width,$equipment_aquisition,$equipment_price,$equipment_usage,$equipment_unit,$equipment_kind){
        $db = Db::getConnection();
        $db->query("UPDATE new_equipment SET equipment_name='$equipment_name', equipment_inventory_number='$equipment_inventory_number', equipment_type='$equipment_type', equipment_capacity='$equipment_capacity', equipment_width='$equipment_width', equipment_unit = '$equipment_unit', equipment_aquisition = '$equipment_aquisition', equipment_price = '$equipment_price', equipment_usage = '$equipment_usage', equipment_kind = '$equipment_kind' WHERE id_user ='$id_user' AND id_equipment='$id_equipment'");
        return true;
    }

    public static function removeEquipment($id_equipment,$id_user){
        $db = Db::getConnection();
        $db->query("UPDATE new_equipment SET equipment_status='1' WHERE id_user ='$id_user' AND id_equipment='$id_equipment'");
        return true;
    }

}