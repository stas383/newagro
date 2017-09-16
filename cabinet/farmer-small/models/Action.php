<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 12.06.2017
 * Time: 15:55
 */

class Action{

    public static function saveLib($id_user, $name_ua, $type){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_action FROM sm_action_lib WHERE name_ua = '$name_ua' AND type=$type  AND (user_id=$id_user or user_id=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_action'] == false) {
            $db->query("INSERT INTO sm_action_lib (name_ua, type, user_id) VALUE ('$name_ua','$type','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_action'];
        }
        return $id;
    }


    public static function saveMaterial($material, $material_type, $material_name, $material_norm, $material_price, $user_id, $crop_id){
        $db = Db::getConnection();

        $db->query("INSERT INTO sm_material_plan(material_id,material_type, material_name, material_norm, material_price, user_id, crop_id)
                        VALUE ('$material','71', '$material_name','$material_norm', '$material_price', '$user_id', '$crop_id')");
        $material_id = $db->lastInsertId();
        return $material_id;
    }
    public static function saveAction($id_action,$id_action_type,$user_id, $crop_id, $start_date,$end_date, $str, $unit, $payment_for_all_area, $payment_for_all_area_own, $payment_for_all_area_rent, $payment_for_all_other){
        $db = Db::getConnection();
        $db->query("INSERT INTO sm_action(id_action, id_action_type,id_user, crop_id, start_date, end_date, id_materials, unit, payment_for_all_area, payment_for_all_area_own, payment_for_all_area_rent, payment_for_all_other)
                    VALUE ('$id_action', '$id_action_type', '$user_id','$crop_id', '$start_date', '$end_date', '$str', '$unit','$payment_for_all_area','$payment_for_all_area_own','$payment_for_all_area_rent','$payment_for_all_other')");

        return true;
    }


    public static function saveEquipment($id_equipment ,$id_user, $purchase_year, $use_term, $purchase_price, $depreciation, $amount_of_amortization){

        $db = Db::getConnection();
        $db->query("INSERT INTO sm_depreciation(id_equipment, id_user, purchase_year, use_term, purchase_price, depreciation, amount_of_amortization)
                    VALUE ('$id_equipment','$id_user','$purchase_year','$use_term','$purchase_price','$depreciation','$amount_of_amortization')");
        return true;
    }
}