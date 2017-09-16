<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 06.06.2017
 * Time: 14:25
 */
include_once ROOT.'/cabinet/farmer-small/models/Plan.php';
include_once ROOT.'/cabinet/farmer-small/models/Create.php';
include_once ROOT.'/cabinet/farmer-small/models/Action.php';

class PlanController{

    public function actionEditPlan($id_plan, $id_crop)
    {
        $date  = Plan::getEditPlan($id_crop, $id_plan);
        $date['id_crop'] = $id_crop;
        $date['id_plan'] = $id_plan;
        foreach ($date['plan'] as $crop_plan) {
            $id_material = explode(',', $crop_plan['id_materials']);
        }

        foreach ($date['material'] as $material){
                $date[$material['id_material_plan']][] = array(
                    'id' => $material['id_material_plan'],
                    'name_material' => $date['lib'][$material['material_id']]['name_ua'],
                    'name'=>$material['material_name'],
                    'norm'=>$material['material_norm'],
                    'price' => $material['material_price'],
                );
            }
        SRC::template('farmer-small', 'farm', 'editPlan', $date);
        return true;
    }

    public function actionCrops(){
        $id_user = $_SESSION['id_user'];
        $date = Plan::getListPlan($id_user);


        SRC::template('farmer-small', 'farm', 'chooseCrop', $date);
        return true;
    }


    public function actionListPlan($id){
        $id_user = $_SESSION['id_user'];
        $date['crop'] = Plan::getListPlan($id_user);
        $date['crop_plan'] = Plan::getListAction($id,$id_user);
        $date['material'] = Plan::getListMaterial($id);
        $date['action'] = Create::getList($id_user);
        $date['base'] = Plan::getMaterialBase($id_user);
        $date['id']= $id;
        SRC::template('farmer-small', 'farm', 'listPlan', $date);
        return true;
    }

     public function actionListForecast($id){
         $id_user = $_SESSION['id_user'];

         $date['crop'] = Plan::getListPlan($id_user);
         $date['data'] = Plan::getListForecast($id,$id_user);
         $date['crop_plan'] = Plan::getListActionForecast($id,$id_user);
         $date['material'] = Plan::getListMaterial($id);
         $date['lib'] = Create::getList($id_user);
         //echo '<pre>'; var_dump($date['lib']['lib']);die;
         foreach ($date['crop_plan']['action'] as $ex_action){
             $date['action'][$ex_action['id_action_type']][]=array(
                 'id'=>$ex_action['id'],
                 'name'=>$date['lib']['lib'][$ex_action['id_action']]['name_ua'],
                 'start_date'=>$ex_action['start_date'],
                 'end_date'=>$ex_action['end_date'],
                 'unit'=>$date['lib']['lib'][$ex_action['unit']]['name'],
                 'id_materials'=>$ex_action['id_materials'],
                 'payment_for_all_area'=>$ex_action['payment_for_all_area'],
                 'payment_for_all_area_own'=>$ex_action['payment_for_all_area_own'],
                 'payment_for_all_area_rent'=>$ex_action['payment_for_all_area_rent'],
                 'payment_for_all_other'=>$ex_action['payment_for_all_other'],
             );
            /*echo "<pre>";
            var_dump($date['try']);
            die;*/
         }
          foreach ($date['material'] as $value)if($value['material_id'] == 20) {
                $date['try'][] = array(
                    'id' => $value['material_id'],
                    'name' => $value['material_name'],
                    'price' => $value['material_price'],
                    'norm' => $value['material_norm']
                    );
            }
             /*echo '<pre>';
               var_dump($date['action']);
               echo '</pre>';*/
         $date['id']= $id;

        SRC::template('farmer-small','farm','listForecast', $date);
        return true;

     }
     public function actionRemoveDepreciation($id){

         $id_equipment = $id;
         $result = Plan::removeEquipment($id_equipment);
         SRC::redirect('/farmer-small/add-equipment');
         return true;
     }

     public function actionSaveEditPlan(){
         $id_user = SRC::validator($_SESSION['id_user']);
         $id = SRC::validator($_POST['id_planu']);
         $id_crop = SRC::validator($_POST['crop_id']);
         $action_name = SRC::validator($_POST['name_ua2']);
         $action_type_name  = SRC::validator($_POST['name_ua1']);
         $id_action_type= Action::saveLib($id_user,$action_type_name,1);
         $id_action= Action::saveLib($id_user,$action_name,2);
         $start_date = SRC::validator($_POST['start_date']);
         $end_date = SRC::validator($_POST['end_date']);
         $payment_for_all_area = SRC::validator($_POST['payment_for_all_area']);
         $payment_for_all_area_own = SRC::validator($_POST['payment_for_all_area_own']);
         $payment_for_all_area_rent = SRC::validator($_POST['payment_for_all_area_rent']);
         $payment_for_all_other = SRC::validator($_POST['payment_for_all_other']);
         if($_POST['unit'] == 'га'){
             $unit = 15;
         }elseif ($_POST['unit'] == 'т'){$unit = 16;}

         $id_mat = SRC::validator($_POST['id_materials']);
         $id_material = explode(',',$id_mat);

        $x=0;
         foreach ($id_material as $val){
             $x++;
             $material_[$x] =  SRC::validator($_POST['material' . $val]);
             $material_id_[$x] = Action::saveLib($id_user,$material_[$x],4);
             $material_name_[$x] =  SRC::validator($_POST['material_name'.$val]);
             $material_norm_[$x] =  SRC::validator($_POST['material_norm'.$val]);
             $material_price_[$x] =  SRC::validator($_POST['material_price'.$val]);
             $result = Plan::UpdateMaterial($material_id_[$x], $material_name_[$x], $material_norm_[$x], $material_price_[$x], $id_user, $id_crop, $val);
         }
         $i = 0;
         $mat_count = SRC::validator($_POST['material_count']);
             while ($i <$mat_count) {
                 $i++;
                 $material[$i] =  SRC::validator($_POST['material_' . $i]);
                 $material_name[$i] =  SRC::validator($_POST['material_name_' . $i]);
                 $material_norm[$i] =  SRC::validator($_POST['material_norm_' . $i]);
                 $material_price[$i] =  SRC::validator($_POST['material_price_' . $i]);
                 $material_id[] = Action::saveMaterial($material[$i],$material_name[$i],$material_norm[$i],$material_price[$i], $id_user, $id_crop);
                 $str= implode(',',$material_id);
             }
             if($str != '') {
                 array_push($id_material, $str);
             }
        $new_mat = implode(',',$id_material);
        $result = Plan::UpdatePlan($id, $id_user, $id_action, $id_action_type, $start_date,  $end_date, $new_mat, $unit, $payment_for_all_area, $payment_for_all_area_own,$payment_for_all_area_rent,$payment_for_all_other );
         SRC::redirect("/farmer-small/list-forecast/$id_crop");
         return true;
     }


     public function actionTechCart(){

        $id_user = $_SESSION['id_user'];
        $date['crop'] = Plan::getListPlan($id_user);

        SRC::template('farmer-small','farm','techCart', $date);
        return true;
     }


     public function actionRemoveCrop($id){

        $id_crop = $id;
        Plan::removeCrop($id_crop);
        SRC::redirect('/farmer-small');
        return true;
     } 

     public function actionSaveRent(){

        $id_user = $_SESSION['id_user'];
        $rent_price = $_POST['rent_price'];
        Plan::saveRent($id_user, $rent_price);
        echo "Збережено";
        return true;

     }


     public function actionMaterialBase(){

        $id_user = $_SESSION['id_user'];

        $date = Plan::getMaterialBase($id_user);
        SRC::template('farmer-small','farm','materialBase', $date);
        return true;
     }


     public function actionSaveAnalytica(){

        $id_user = $_SESSION['id_user'];

        $field_name = $_POST['name_field'];
        $field_area = $_POST['area_field'];
        $id_crop = $_POST['crop'];
        $tech_cart = $_POST['optionsRadios'];
        $tech_name = $_POST['name_tech_cart'];

        if($tech_cart == 'new'){
             Plan::newAnalytica($id_user, $id_crop,$field_name,$field_area,$tech_name);
        } else{
            Plan::getAnalytica($id_user,$field_name,$field_area,$tech_cart );
        }

        SRC::redirect('/farmer-small');

        return true;
     }

}