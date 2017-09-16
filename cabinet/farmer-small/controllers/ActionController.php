<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 12.06.2017
 * Time: 15:54
 */
include_once ROOT.'/cabinet/farmer-small/models/Action.php';
include_once ROOT.'/cabinet/farmer-small/models/Create.php';
class ActionController{

    public function actionSaveAction(){
         $str=false;
        $user_id = $_SESSION['id_user'];
        $crop_id = SRC::validator($_POST['crop_id']);
        $i = 0;
        $mat_count = SRC::validator($_POST['material_count']);
        if ($mat_count < 7) {
            while ($i <$mat_count) {
                $i++;
                $material[$i] =  SRC::validator($_POST['material_' . $i]);
                $material_name[$i] =  SRC::validator($_POST['material_name_' . $i]);
                $material_type[$i] = SRC::validator($_POST['material_type_'. $i]);
                $material_norm[$i] =  SRC::validator($_POST['material_norm_' . $i]);
                $material_price[$i] =  SRC::validator($_POST['material_price_' . $i]);
                $material_id[] = Action::saveMaterial($material[$i],$material_type[$i],$material_name[$i],$material_norm[$i],$material_price[$i], $user_id, $crop_id);
                $str= implode(',',$material_id);
            }
            $action_type_name =  SRC::validator($_POST['id_action_type']);
            $action_name =  SRC::validator($_POST['action_id']);
            $id_action_type= Action::saveLib($user_id,$action_type_name,1);
            $id_action= Action::saveLib($user_id,$action_name,2);
            $start_date =  SRC::validator($_POST['strat_data']);
            $end_date =  SRC::validator($_POST['end_data']);
            $unit =  SRC::validator($_POST['id_action_unit']);
            $payment_for_all_area = SRC::validator($_POST['payment_for_all_area']);
            $payment_for_all_area_own = SRC::validator($_POST['payment_for_all_area_own']);
            $payment_for_all_area_rent = SRC::validator($_POST['payment_for_all_area_rent']);
            $payment_for_all_other = SRC::validator($_POST['payment_for_all_other']);
            if(!isset($str)){
                $str = 0;
            }

            $result = Action::saveAction($id_action,$id_action_type, $user_id, $crop_id, $start_date,$end_date, $str, $unit, $payment_for_all_area, $payment_for_all_area_own, $payment_for_all_area_rent, $payment_for_all_other);

            SRC::addAlert($result, 1, 'Операція створена успішно');
            SRC::redirect("/farmer-small/list-plan/$crop_id");
        }
        else{
            //SRC::addAlert();
        }
        return true;
    }

    public function actionSaveEquipment(){
        $name_ua = $_POST['name_ua'];
        $id_user =  SRC::validator($_SESSION['id_user']);
        $id_equipment = Create::addEquipment($id_user, $name_ua);
        $purchase_year =  SRC::validator($_POST['purchase_year']);
        $use_term =  SRC::validator($_POST['use_term']);
        $purchase_price =  SRC::validator($_POST['purchase_price']);
        $depreciation = SRC::validator($_POST['depreciation']);
        $amount_of_amortization =  SRC::validator($_POST['amount_of_amortization']);
        $result = Action::saveEquipment($id_equipment ,$id_user, $purchase_year,$use_term, $purchase_price, $depreciation, $amount_of_amortization);

        SRC::redirect('/farmer-small/add-equipment');
        SRC::addAlert($result, 1, 'Техніка успішно додана');

        return true;
    }
}