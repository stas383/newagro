<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27.06.2017
 * Time: 9:20
 */
class ConstructorEdit{
    //
    public static function getMyMaterials($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM agri_material WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_material'] = $result->fetchAll();

        $result = $db->query("SELECT id_crop,name_crop_ua FROM agri_crop_head WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $agri_crop_head = $result->fetchAll();

        foreach ($agri_crop_head as $value){
            $date['crop_head'][$value['id_crop']]=$value['name_crop_ua'];
        }

        $date['type_material_ua']=array(
            '1'=>'Насіння',
            '2'=>'Добрива',
            '3'=>'ЗЗР'
        );
        $date['type_material_en']=array(
            '1'=>'Seed',
            '2'=>'Fertilizers',
            '3'=>'PPA'
            );
        $date['material_subtype_ua']=array(
            "1"=>"Гербіцид",
            "2"=>"Фунгіцид",
            "3"=>"Інсектицид",
            "4"=>"Ретардант",
            "5"=>"Протруйник насіння",
            "6"=>"Десикант",
            "7"=>"Інші ЗЗР"
        );
        $date['material_subtype_en']=array(
            "1"=>"Herbicide",
            "2"=>"Fungicide",
            "3"=>"Insecticide",
            "4"=>"Retardant",
            "5"=>"Протруйник насіння",
            "6"=>"Desiccant",
            "7"=>"Other PPA"
        );

        return $date;
    }
    //сохранение редактирования материала
    public static function saveEditMaterial($id_user, $edit_id, $edit_crop, $edit_type_material, $edit_material_subtype, $edit_name_material, $edit_qlt_material, $edit_price_material){
        $db = Db::getConnection();
        $db->query("UPDATE agri_material SET id_crop='$edit_crop',type_material='$edit_type_material',subtype_material='$edit_material_subtype',name_material='$edit_name_material',qlt_material='$edit_qlt_material',price_material='$edit_price_material' WHERE id_user=$id_user AND id_material=$edit_id");
        return true;
    }
    //сохранение редактирования операции
    public static function saveEditAction($id_user, $action_id, $name_action, $drivers, $driver_bonus, $driver_class, $workers, $worker_bonus, $worker_class, $name_power, $name_working, $fuel_type, $productivity, $fuel_cons){
        $db = Db::getConnection();
        $db->query("UPDATE agri_action SET name_action='$name_action',drivers='$drivers',driver_bonus='$driver_bonus',driver_class='$driver_class',workers='$workers',worker_class='$worker_class',worker_bonus='$worker_bonus',name_power='$name_power',name_working='$name_working',fuel_type='$fuel_type',productivity='$productivity',fuel_cons='$fuel_cons' WHERE id_user=$id_user AND id=$action_id");
        return $name_action;
    }
    //
    public static function getPlanEdit($id_action,$id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM agri_crop_plan WHERE id_plan=$id_action AND id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_plan'] = $result->fetchAll();

        $crop_id= $date['agri_crop_plan'][0]['id_crop'];

        $result = $db->query("SELECT * FROM agri_action WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['my_action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM agri_material WHERE id_user=$id_user AND id_crop='$crop_id'  ORDER BY type_material");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $agri_material = $result->fetchAll();

        foreach ($agri_material as $my_material){
            $date['plan_material'][$my_material['id_material']]=$my_material;
        }

        return $date;
    }
    //
    public static function saveEditPlan($id_user, $id_plan, $id_action, $id_materials, $start_date, $end_date){
        $db = Db::getConnection();

        $db->query("UPDATE agri_crop_plan SET id_action='$id_action', id_materials='$id_materials', start_date='$start_date', end_date='$end_date' WHERE id_user=$id_user AND id_plan=$id_plan");

        $result = $db->query("SELECT * FROM agri_crop_plan WHERE id_plan=$id_plan  AND id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_plan'] = $result->fetchAll();


        return $date['agri_crop_plan'][0]['id_crop'];
    }


}