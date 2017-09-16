<?php
class Store{
    //Список культур
    public static function getMyMaterial($my_crop){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM crop_analytica WHERE id=$my_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['my_crop'] = $result->fetchAll();

        $id_crop = $date['my_crop']['0']['crop_id'];

        $result = $db->query("SELECT * FROM crop_head WHERE id_crop=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_head'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_plan WHERE crop_id=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_plan'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM action WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM  material_plan");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_plan'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM material_ppa WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM material_seeds WHERE crop_id=$id_crop AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM material_fertilizers WHERE crop_id=$id_crop AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers'] = $result->fetchAll();

        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM store_basket WHERE user_id=$id_user AND crop_id=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['store_basket'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_fertilizers WHERE id_crop=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_ppa WHERE id_crop=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_seeds WHERE id_crop=$id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_seeds'] = $result->fetchAll();

        $zona = $_SESSION["zone"];
        $yaled =1;
        foreach ($date['crop_plan'] as $crop_plan) if(($crop_plan['tillage'] == 0 or $crop_plan['tillage'] == $date['my_crop']['0']['tillage'])
        and $crop_plan['material_id_1']!=0 or $crop_plan['material_id_2']!=0 or $crop_plan['material_id_3']!=0){
            foreach ($date['action'] as $action)if($action['id_action']==$crop_plan['action_id']) {
                $actionEx[$crop_plan['id']]=$action;
            }
            $materialQltMass[$crop_plan['id']]=0;
            for ($p = 1; $p <= 3; $p++) {
                foreach ($date['material_plan'] as $material_plan[$p]) if($material_plan[$p]['id_material_plan'] == $crop_plan['material_id_'.$p]) {
                    if ($material_plan[$p]['table_id'] == 1) {$material_table = "material_seeds"; $zona_table[$crop_plan['id']][$p]="material_qty_z".$zona;}
                    if ($material_plan[$p]['table_id'] == 2) {$material_table = "material_fertilizers"; $zona_table[$crop_plan['id']][$p]="material_qty_z".$zona;}
                    if ($material_plan[$p]['table_id'] == 3) {$material_table = "material_ppa"; $zona_table[$crop_plan['id']][$p]="material_qty";}
                    foreach ($date[$material_table] as $material[$p]) if($material_plan[$p]['material_id_y'.$yaled] == $material[$p]['id_material']){
                        $name_material_distributor[$p]=false;
                        foreach ($date['store_basket'] as $basket)if($basket['plan_id']== $crop_plan['id'] and $basket['nomer_id']==$p){
                            if($basket['table_type']==1) $table="distributor_material_seeds";
                            if($basket['table_type']==2) $table="distributor_material_fertilizers";
                            if($basket['table_type']==3) $table="distributor_material_ppa";
                            foreach ($date[$table] as $disrtibutor_material)if($disrtibutor_material['id_material']==$basket['material_id']){
                                $name_material_distributor[$p]=$disrtibutor_material['material_name'];
                            }
                        }
                        $materialEx[$material_plan[$p]['table_id']][]= array(
                            "name_material_ua"=> $material[$p]['name_material_ua'],
                            "action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                            "crop_plan"=>$crop_plan['id'],
                            "nomer"=>$p,
                            "crop"=>$id_crop,
                            "name_material_distributor"=>$name_material_distributor[$p]
                        );
                    }
                }
            }
        }
        return $materialEx;
    }

    //загрузка списка материалов
    public static function getListMaterial($table, $id_crop){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM $table,store_fabricator,profile_distributor WHERE $table.id_crop=$id_crop AND $table.fabricator= store_fabricator.id AND $table.id_user=profile_distributor.id_user AND $table.status_delete = 0 ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }

    //добавление в корзину
    public static function addBasket($id_user, $id_crop, $plan, $nomer, $table, $material, $price){
        $db = Db::getConnection();
        $db->query("DELETE FROM store_basket WHERE user_id=$id_user AND plan_id=$plan AND nomer_id=$nomer");
        $db->query("INSERT INTO store_basket (user_id,crop_id,plan_id,nomer_id, table_type ,material_id) VALUE ('$id_user', '$id_crop', '$plan', '$nomer', '$table', '$material')");

        return true;
    }

    //калькулятор
    public static function getPlan(){

    }
}