<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.08.2017
 * Time: 11:56
 */
class DataList{
    //action
    public static function createOrIdAction($id_user,$name,$type){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_action FROM b_lib_action WHERE action_name_ua = '$name' AND action_type=$type  AND (id_user=$id_user or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_action'] == false) {
            $db->query("INSERT INTO b_lib_action (action_name_ua, action_type, id_user) VALUE ('$name','$type','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_action'];
        }
        return $id;
    }

    //material
    public static function createOrIdMaterial($id_user,$name,$type){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_material FROM b_lib_material WHERE material_name_ua = '$name' AND material_type=$type  AND (id_user=$id_user or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_material'] == false) {
            $db->query("INSERT INTO b_lib_material (material_name_ua, material_type, id_user) VALUE ('$name','$type','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_material'];
        }
        return $id;
    }

    //crop
    public static function createOrIdCrop($id_user,$name){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_crop FROM b_lib_crop WHERE name_crop_ua = '$name' AND (id_user=$id_user or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_crop'] == false) {
            $db->query("INSERT INTO b_lib_crop (crop_name_ua, id_user) VALUE ('$name','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_crop'];
        }
        return $id;
    }

}