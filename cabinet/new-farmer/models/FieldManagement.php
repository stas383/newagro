<?php 


class FieldManagement{

   public static function getFieldManagement($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop ch, new_field nf WHERE ch.id_crop=nf.field_id_crop and nf.field_status = '0' and nf.id_user = '$id_user'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }


    public static function createCropCulture($id_user,$id_crop, $name_tech_cart){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop, tech_name) VALUES ('$id_user','$id_crop','$name_tech_cart')");
        $id_culture = $db->lastInsertId();

        return $id_culture;
    }
     public static function createFieldManagement($id_user, $id_crop, $field_number, $field_name, $field_size, $field_rent,$field_usage){
        $db= Db::getConnection();
        $db->query("INSERT INTO new_field (field_number, field_name, field_size, field_usage, field_id_crop, field_status, field_rent, id_user) VALUES ('$field_number','$field_name','$field_size', '$field_usage', '$id_crop','0', '$field_rent', '$id_user')");
        return true;
    }

    public static function getCrop($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    public static function getCropCulture($id_user){

        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop h, new_crop_culture c WHERE c.id_user = '$id_user' AND c.id_crop=h.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;

    }
    public static function editField($id_user,$id_field,$table,$value){

        $db = Db::getConnection();
        $db->query("UPDATE new_field SET $table='$value' WHERE id_user ='$id_user' AND id_field='$id_field'");
        return true;
    }


    public static function editAllField($id_field,$id_user, $ed_field_number, $ed_field_name, $ed_field_area,$crop){
        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_number = '$ed_field_number', field_name = '$ed_field_name', field_size = '$ed_field_area',field_id_crop = '$crop', field_yield = '', field_id_culture = '0' WHERE id_field = '$id_field' and id_user = '$id_user'");

        return true;
    }

    public static function removeField($id_field, $id_user){
        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_status = '1' WHERE id_field = '$id_field'");
        return true;
    }

    public static function getRentPay($id_user){
        $db = Db::getConnection();
        $result= $db->query("SELECT `value` FROM new_rent WHERE id_user = '$id_user' and costs_type = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetch();
        return $date;
    }

    public static function saveRentPay($id_user,$value,$costs_type){
        $db = Db::getConnection();

        $result= $db->query("SELECT `value` FROM new_rent WHERE id_user = '$id_user' and costs_type = '$costs_type'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetch();
        if($date == false){
            $db->query("INSERT INTO new_rent(id_user, `value`,costs_type) VALUES('$id_user','$value','$costs_type')");
        }
        else{
            $db->query("UPDATE new_rent SET `value` = '$value' WHERE id_user = '$id_user' and costs_type = '$costs_type'");
        }
        return true;
    }

    public static function getCosts($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_other_costs WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }

    public static function saveCosts($id_user,$costs_plan,$costs_type,$costs_comments){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_other_costs WHERE id_user = '$id_user' and costs_type = '$costs_type'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetch();
        if($date == false) {
            $db->query("INSERT INTO new_other_costs (id_user, costs_plan, costs_type, costs_comments) VALUES ('$id_user','$costs_plan','$costs_type','$costs_comments')");
        }else{
            $db->query("UPDATE new_other_costs SET costs_plan = '$costs_plan' WHERE id_user = '$id_user' and costs_type = '$costs_type'");
        }
        return true;
    }

    public static function changeStatus($id_user,$id_field,$status){

        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_technology_status='$status' WHERE id_field = '$id_field' and id_user = '$id_user'");
        return true;
    }
}