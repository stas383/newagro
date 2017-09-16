<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.09.2017
 * Time: 14:56
 */
class Material{
    public static function getMaterial($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_material as lib,new_material_price as price WHERE lib.id_material=price.id_lib_material AND price.id_user=$id_user AND price.statys_material=0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

    public static function createMaterial($id_user, $id_material, $material_price){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_material_price (id_user, id_lib_material, price_material) VALUES ('$id_user','$id_material','$material_price')");
        return true;
    }
    public static function saveEditMaterial($id_user,$id_material_price,$id_lib_material,$price_material){
        $db = Db::getConnection();
        $db->query("UPDATE new_material_price SET id_lib_material='$id_lib_material', price_material='$price_material' WHERE id_user ='$id_user' AND id_material_price='$id_material_price'");
        return true;
    }
    public static function removeMaterial($id_user,$id_material_price){
        $db = Db::getConnection();
        $db->query("UPDATE new_material_price SET statys_material='1' WHERE id_user ='$id_user' AND id_material_price='$id_material_price'");
        return true;
    }
}