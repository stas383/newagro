<?php

class Translate{

    public static function getCrop(){
        $db= Db::getConnection();
        $result = $db->query("SELECT id_action, name_action_ua, name_action_en FROM action");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT id_action_type, name_action_type_ua, name_action_type_en FROM action_type");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action_type'] = $result->fetchAll();

        $result = $db->query("SELECT id_action_type, name_action_type_ua, name_action_type_en FROM action_type_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action_type_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_action, name_action_ua, name_action_en FROM action_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action_veg'] = $result->fetchAll();

         $result = $db->query("SELECT id_zone, name_zone_ua, name_zone_en FROM climatic_zone");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['climatic_zone'] = $result->fetchAll();

        $result = $db->query("SELECT id_crop, name_crop_ua, name_crop_en FROM crop_head");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_head'] = $result->fetchAll();


        $result = $db->query("SELECT id_crop, name_crop_ua, name_crop_en FROM crop_head_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_head_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_fuel, name_fuel_ua, name_fuel_en FROM fuel_type");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['fuel_type'] = $result->fetchAll();

        $result = $db->query("SELECT id_fuel, name_fuel_ua, name_fuel_en FROM fuel_type_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['fuel_type_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_fertilizers");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_fertilizers_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_ppa");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_ppa_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_seeds");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, name_material_en FROM material_seeds_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_subtype, name_subtype_ua, name_subtype_en FROM material_subtype");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_subtype'] = $result->fetchAll();

        $result = $db->query("SELECT id_subtype, name_subtype_ua, name_subtype_en FROM material_subtype_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_subtype_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_power, name_power_ua, name_power_en FROM power_eqt");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['power_eqt'] = $result->fetchAll();

        $result = $db->query("SELECT id_power, name_power_ua, name_power_en FROM power_eqt_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['power_eqt_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_power_type, name_power_type_ua, name_power_type_en FROM power_type");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['power_type'] = $result->fetchAll();

        $result = $db->query("SELECT id_power_type, name_power_type_ua, name_power_type_en FROM power_type_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['power_type_veg'] = $result->fetchAll();

        $result = $db->query("SELECT id_tillage, name_tillage_ua, name_tillage_en FROM tillage_types");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['tillage_types'] = $result->fetchAll();

        $result = $db->query("SELECT id_working, name_working_ua, name_working_en FROM working_eqt");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['working_eqt'] = $result->fetchAll();


        $result = $db->query("SELECT id_working, name_working_ua, name_working_en FROM working_eqt_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['working_eqt_veg'] = $result->fetchAll();

        return $date;
    }


    public static function AddTranslate($id, $table,$title,$name_id, $value){
        $db = Db::getConnection();
        $db->query("UPDATE $table SET $title = '$value' WHERE $name_id = '$id'");

        return true;
    }

}