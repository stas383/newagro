<?php
class Sowing{
    public static function createSowing($id_company,$id_field,$id_crop,$sowing_yield){
        $db = Db::getConnection();
        $db->query("INSERT INTO b_sowing (id_company, id_field, id_crop, sowing_yield) VALUES ('$id_company','$id_field','$id_crop','$sowing_yield')");
        return true;
    }
    public static function getSowing($id_company){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM b_sowing WHERE id_company = '$id_company'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    public static function getFieldList($id_company){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_field, field_number, field_area FROM b_field WHERE id_company = '$id_company'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $field){
            $ex[$field['id_field']]=$field;
        }
        return $ex;
    }
    public static function getEditSowing($id_company,$id_sowing,$id_crop,$sowing_yield){
        $db= Db::getConnection();
        $db->query("UPDATE b_sowing SET id_crop='$id_crop', sowing_yield='$sowing_yield' WHERE id_sowing=$id_sowing AND id_company=$id_company");
        return true;
    }
}