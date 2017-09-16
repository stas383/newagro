<?php


class Plan {
    // Загрузка списка
    public static function getListPlan($Crop_id){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_head'] = $result->fetchAll(); 

        $result = $db->query("SELECT * FROM action WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua,yield_level FROM material_ppa WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua FROM material_seeds WHERE crop_id=$Crop_id AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT id_material, name_material_ua, yield_level FROM material_fertilizers WHERE crop_id=$Crop_id AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_plan cr, action ac WHERE cr.crop_id=$Crop_id AND ac.id_action=cr.action_id ORDER BY number_order");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_plan'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM  material_plan");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_plan'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM  action_type");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action_type'] = $result->fetchAll();

        return $date;
    }

    //Добавеление материала в план
    public static function addMaterialPlan($material_table, $material_id_y1, $material_id_y2, $material_id_y3){
        $db = Db::getConnection();
        $db->query("INSERT INTO  material_plan(table_id, material_id_y1, material_id_y2, material_id_y3) 
              VALUE ('$material_table', '$material_id_y1', '$material_id_y2', '$material_id_y3')");
        $material_id = $db->lastInsertId();

        return $material_id;
    }

    //Добавеление плана
    public static function addPlan($crop_id, $tillage, $action_id, $material_id, $strat_data, $end_data){
        $db = Db::getConnection();
        $db->query("INSERT INTO crop_plan (crop_id, tillage, action_id, material_id_1, material_id_2, material_id_3, strat_data, end_data) 
              VALUE ('$crop_id', '$tillage', '$action_id', '$material_id[1]', '$material_id[2]', '$material_id[3]', '$strat_data', '$end_data')");
        return true;
    }

    //Сохранение парной операции
    public  static function editSaveParentOper($id, $parent){
        $db = Db::getConnection();

        $db->query("UPDATE crop_plan SET  parent_id = '$parent' WHERE id = '$id'");

        return true;
    }
    //Сохранение номера
    public  static function editSaveNumberOrder($id, $value){
        $db = Db::getConnection();

        $db->query("UPDATE crop_plan SET  number_order = '$value' WHERE id = '$id'");

        return true;
    }


    //Загрузка одного плана
    public  static  function getOnePlan($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM crop_plan  WHERE id=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //Удаление материалов из плана
    public static function removeMaterialPlan($id){
        $db = Db::getConnection();
        $db->query("DELETE FROM material_plan WHERE id_material_plan=$id");
        return true;
    }
    //Сохранение изменений в плане
    public static function saveEditPlan($id, $tillage, $action_id, $material_id, $strat_data, $end_data){
        $db = Db::getConnection();
        $db->query("UPDATE crop_plan SET  tillage = '$tillage', action_id='$action_id', material_id_1='$material_id[1]', material_id_2='$material_id[2]', material_id_3='$material_id[3]', strat_data='$strat_data', end_data='$end_data' WHERE id = '$id'");
        return true;
    }
    //Удаление из плана
    public static function removePlan($id1,$id2,$id3,$id4){
        $db = Db::getConnection();
        $db->query("DELETE FROM crop_plan WHERE id=$id1");
        $db->query("DELETE FROM material_plan WHERE id_material_plan=$id2");
        $db->query("DELETE FROM material_plan WHERE id_material_plan=$id3");
        $db->query("DELETE FROM material_plan WHERE id_material_plan=$id4");
        return true;
    }



}