<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.08.2017
 * Time: 12:29
 */
class Field{
    public static function createField($id_company, $field_number, $field_name, $field_area, $field_yield, $id_crop, $field_zone, $field_subdivision, $field_type_land, $field_type_soil, $field_group, $field_class, $field_note, $field_distance){
        $db = Db::getConnection();
        $db->query("INSERT INTO b_field (id_company, field_number,field_name, field_subdivision, field_zone, field_area, field_type_land, field_type_soil, field_distance, field_note, field_group, field_class, id_crop, field_yield)
  VALUES ('$id_company','$field_number','$field_name','$field_subdivision','$field_zone','$field_area','$field_type_land','$field_type_soil','$field_distance','$field_note','$field_group','$field_class','$id_crop','$field_yield')");

        return true;
    }
    public static function getField($id_company){
        $db = Db::getConnection();
        $result = $db->query("SELECT *,f.id_crop as id_crop FROM b_field f LEFT OUTER JOIN b_technology t ON f.id_tc=t.id_technology WHERE f.id_company = '$id_company'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    public static function editField($id_company ,$id_field ,$field_number ,$field_subdivision ,$field_zone ,$field_area ,$field_type_land ,$field_type_soil ,$field_distance ,$field_note, $field_name ,$field_yield ,$id_crop ,$field_group ,$field_class){
        $db=Db::getConnection();
        $db->query("UPDATE b_field SET field_number='$field_number', field_subdivision='$field_subdivision', field_zone='$field_zone', field_area='$field_area', field_type_land='$field_type_land', field_type_soil='$field_type_soil', field_distance='$field_distance', field_note='$field_note', field_name='$field_name', field_yield='$field_yield', id_crop='$id_crop', field_group='$field_group', field_class='$field_class' WHERE id_company='$id_company' AND id_field='$id_field'");

        return true;
    }
}