<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27.06.2017
 * Time: 9:22
 */
include_once ROOT. '/cabinet/farmer/models/ConstructorEdit.php';


class ConstructorEditController{
    public function actionGetMaterials(){
        $id_user=$_SESSION['id_user'];
        $date=ConstructorEdit::getMyMaterials($id_user);
        SRC::template('farmer', 'panel', 'ConstructMaterials', $date);
        return true;
    }

    public function actionSaveEditMaterial(){
        $id_user=$_SESSION['id_user'];
        $edit_id=SRC::validatorPrice($_POST['edit_id']);
        $edit_crop=SRC::validatorPrice($_POST['edit_crop']);
        $edit_type_material=SRC::validatorPrice($_POST['edit_type_material']);
        $edit_material_subtype=SRC::validatorPrice($_POST['edit_material_subtype']);
        $edit_name_material=SRC::validator($_POST['edit_name_material']);
        $edit_qlt_material=SRC::validatorPrice($_POST['edit_qlt_material']);
        $edit_price_material=SRC::validatorPrice($_POST['edit_price_material']);
        ConstructorEdit::saveEditMaterial($id_user, $edit_id, $edit_crop, $edit_type_material, $edit_material_subtype, $edit_name_material, $edit_qlt_material, $edit_price_material);
        return true;
    }

    public function actionSaveEditAction(){
        $id_user=$_SESSION['id_user'];
        $action_id=SRC::validator($_POST['edit_action_id']);
        $name_action=SRC::validator($_POST['edit_name_action']);
        $drivers=SRC::validatorPrice($_POST['edit_drivers']);
        $driver_bonus=SRC::validatorPrice($_POST['edit_driver_bonus']);
        $driver_class=SRC::validatorPrice($_POST['edit_driver_class']);
        $workers=SRC::validatorPrice($_POST['edit_workers']);
        $worker_bonus=SRC::validatorPrice($_POST['edit_worker_bonus']);
        $worker_class=SRC::validatorPrice($_POST['edit_worker_class']);
        $name_power=SRC::validator($_POST['edit_name_power']);
        $name_working=SRC::validator($_POST['edit_name_working']);
        $fuel_type=SRC::validatorPrice($_POST['edit_fuel_type']);
        $productivity=SRC::validatorPrice($_POST['edit_productivity']);
        $fuel_cons=SRC::validatorPrice($_POST['edit_fuel_cons']);
        $result=ConstructorEdit::saveEditAction($id_user, $action_id, $name_action, $drivers, $driver_bonus, $driver_class, $workers, $worker_bonus, $worker_class, $name_power, $name_working, $fuel_type, $productivity, $fuel_cons);
        echo $result;
        return true;
    }

    public function actionGetEditPlan($id_action, $redirect){
        $redirect=SRC::validator($redirect);
        setcookie("redirect_plan", $redirect, time()+3600, '/');
        $id_user=$_SESSION['id_user'];
        $id_action=SRC::validator($id_action);
        $date=ConstructorEdit::getPlanEdit($id_action,$id_user);
        $date['id_action']=$id_action;
        SRC::template('farmer', 'panel', 'ConstructEditPlan', $date);
        return true;
    }
    public function actionSaveEditPlan(){
        $id_user=$_SESSION['id_user'];
        $id_plan=SRC::validator($_POST['id_plan']);
        $id_action=SRC::validator($_POST['id_action']);
        $start_date=SRC::validator($_POST['start_date']);
        $end_date=SRC::validator($_POST['end_date']);
        $id_materials=SRC::validator($_POST['plan_id_material']);
        $id_materials_arr=explode(',',$id_materials);
        $id_materials=false;
        foreach ($id_materials_arr as $value)if($value!=false and $value!=0){
            $id_materials.=$value.',';
        }
        $id_materials=substr($id_materials, 0, -1);
        $id_crop = ConstructorEdit::saveEditPlan($id_user, $id_plan, $id_action, $id_materials, $start_date, $end_date);
        $redirect = SRC::validator($_COOKIE['redirect_plan']);
        if($redirect==1) $redirect_plan="/farmer/create/crop-plan/".$id_crop;
        if($redirect==2) $redirect_plan="/farmer/budget/remains-plan/".$id_crop."/3";
        if($redirect==false) $redirect_plan="/farmer/create/crop-plan/".$id_crop;
        SRC::redirect($redirect_plan);
        return true;
    }

}