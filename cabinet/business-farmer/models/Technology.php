<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 21.08.2017
 * Time: 12:27
 */
class Technology{
    public static function getFieldList($id_company){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_field, field_number, field_area, field_name, id_crop, id_tc FROM b_field WHERE id_company = '$id_company'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $field){
            $ex['fields'][$field['id_field']]=$field;
            $ex['tc_field'][$field['id_tc']]=$field['field_name'];
        }
        return $ex;
    }
    public static function getTechnology($id_company){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM b_technology WHERE id_company = '$id_company'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    public static function createTechnology($id_company, $id_crop, $technology_name, $technology_note){
        $db=Db::getConnection();
        $db->query("INSERT INTO b_technology(id_company, id_crop, technology_name, technology_note) VALUES ('$id_company', '$id_crop', '$technology_name', '$technology_note')");
        $id = $db->lastInsertId();
        return $id;
    }
    public static function fieldTechnology($id_company,$id_technology,$id_field){
        $db=Db::getConnection();
        $db->query("UPDATE b_field SET id_tc=$id_technology WHERE id_company = $id_company and id_field = $id_field");
        return true;
    }
    //
    public static function copyTechnology($id_company,$id_technology){
        $db=Db::getConnection();
        $db->query("INSERT INTO b_technology (id_company,id_crop,technology_name,technology_note) SELECT id_company,id_crop,concat('Копія ',technology_name),concat('Копія технологічної карти ',technology_name) FROM b_technology WHERE id_company = $id_company AND id_technology=$id_technology");

        return true;
    }
}