<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 31.07.2017
 * Time: 11:20
 */
include_once ROOT.'/cabinet/new-farmer/models/TechnologyCard.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
class TechnologyCardController{
    public function actionTechnologyCard($id){
    	$id_user = $_SESSION['id_user'];
    	$date['field_management'] = TechnologyCard::getFieldManagement($id_user);
        $date['usage'] = DataBase::getFieldUsage();
        $id_crop= $date['field_management'][0]['field_id_crop'];
        if($id_crop==true){
            $date['crop_culture'] = TechnologyCard::getTechnologyCard($id_user,$id_crop);
        };
      
        $date['tech_cart'] = TechnologyCard::getListTechCart($id_user);
        $date['field'] = TechnologyCard::getField($id_user);

    	$date['id'] = $id; 
        SRC::template('new-farmer','new', 'TechnologyCard', $date);
        return true;
    }

    public function actionListTechnologyCard(){
        $id_user = $_SESSION['id_user'];
        $date['new_crop_culture']=TechnologyCard::getListTechnologyCard($id_user);
        $date['crop']=DataBase::getCropHead($id_user);
        $date['crop_us'] = DataBase::getCropHead($id_user);
        SRC::template('new-farmer','new','ListTechnologyCard',$date);
        return true;
    }

    public function actionCreateTechnologyCard(){
        $id_user=$_SESSION['id_user'];
        $techCard=SRC::validator($_POST['optionsRadios']);
        $id_field=SRC::validator($_POST['id_field']);
        if($techCard=='new'){
            $name=SRC::validator($_POST['name_tech_cart']);
            $id_crop=SRC::validator($_POST['id_crop']);
            $id_culture =  TechnologyCard::createTechnologyCard($id_user,$name,$id_crop);
        }else{
            $id_culture = $techCard;
        }
        TechnologyCard::editField($id_user,$id_field,$id_culture);
        SRC::redirect('/new-farmer/edit_technology_card/'.$id_culture);
        return true;
    }

    public function actionEditTechnologyCard($id){
        if ($id=='0'){
            SRC::redirect('/new-farmer/field_management');
        }else {
            $id = SRC::validator($id);
            $id_user = $_SESSION['id_user'];
            $date['action'] = DataBase::getActionLib($id_user);
            $date['units'] = DataBase::getUnits();
            foreach ($date['action'] as $action) {
                $date['lib'][$action['action_id']] = $action;
            }
            $date['TC'] = TechnologyCard::getNewAction($id_user, $id);

            $date['material_lib'] = DataBase::getMaterial($id_user);

            $date['storage'] = TechnologyCard::getStorage($id_user);

            $date['field'] = TechnologyCard::getFieldTech($id);
            $date['equipment_type'] = DataBase::getTypeEquipment();
            $date['equipment_unit'] = DataBase::getUnit();
            $date['only_tech'] = TechnologyCard::getTechWithoutField($id_user, $id);
            $date['id'] = $id;
            SRC::template('new-farmer', 'new', 'editTechnologyCard', $date);
        }
        return true;
    }

    public function actionSaveEditTechnologyCard(){
        $id_user = $_SESSION['id_user'];
        $crop_id=SRC::validator($_POST['crop_id']);
        //$action_id = SRC::validator($_POST['action_action_id']);
        $id_action_type=SRC::validator($_POST['list_id_action_type']);
        $action_name =  SRC::validator($_POST['action_id']);
        $id_action = DataBase::saveLib($id_user,$action_name,2);
        $start_date =  SRC::validator($_POST['strat_data']);
        $end_date =  SRC::validator($_POST['end_data']);
        $unit =  SRC::validator($_POST['id_action_unit']);
        $action_work=SRC::validatorPrice($_POST['work']);
        ////services////
        $services= json_decode($_POST['ex_services']);
        $save_services = array();
        if($services!=false) {
            foreach ($services as $ex_services) {
                $save_services[]=array(
                    'name'=>SRC::validator($ex_services->{'name'}),
                    'amount'=>SRC::validatorPrice($ex_services->{'amount'}),
                    'price'=>SRC::validatorPrice($ex_services->{'price'})
                );
            }
        }
        $save_services = serialize( $save_services );
        ////material////
        $materiale= json_decode($_POST['ex_material']);
        $save_material = array();
        if($materiale!=false) {

            foreach ($materiale as $ex_material) {
                $save_material[]=array(
                    'id'=>SRC::validator($ex_material->{'id'}),
                    'norm'=>SRC::validatorPrice($ex_material->{'norm'})
                );
            }
            $save_material = serialize( $save_material );
        }
        ////employee////
        $employee= json_decode($_POST['ex_employe']);
        $save_employee=array();
        if($employee!=false){
        foreach ($employee as $ex_employee) {
            $save_employee[] = array(
                'id' => SRC::validator($ex_employee->{'id'}),
                'pay' => SRC::validator($ex_employee->{'pay'})
            );
        }
        $save_employee = serialize( $save_employee );
        }
        ////vehicles////
        $vehicles= json_decode($_POST['ex_vehicles']);
        $save_vehicles=array();
        if($vehicles!=false){
            foreach ($vehicles as $ex_vehicles){
                $equipments= $ex_vehicles->{'id_equipment'};
                $id_equipment='';
                foreach ($equipments as $value){
                    $id_equipment.=SRC::validator($value->{'id'}).",";
                }
                $id_equipment=substr($id_equipment, 0, -1);
                $save_vehicles[]=array(
                    'id_veh'=>SRC::validator($ex_vehicles->{'id_vehicles'}),
                    'id_equ'=>$id_equipment,
                    'fuel'=>SRC::validator($ex_vehicles->{'fuel'})
                );
            }
            $save_vehicles = serialize( $save_vehicles );
        }
        TechnologyCard::createAction($id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$crop_id,$action_work,$save_material,$save_services,$save_vehicles,$save_employee);
        SRC::redirect();
        return true;
    }
/////////////////////////////UPDATE/////////////////////////////////////////////////////////
    public function actionUpdateActionPlan(){
        $id_user = $_SESSION['id_user'];
        $action_id = SRC::validator($_POST['action_action_id']);
        $id_action_type=SRC::validator($_POST['list_id_action_type']);
        $action_name =  SRC::validator($_POST['action_id']);
        $id_action = DataBase::saveLib($id_user,$action_name,2);
        $start_date =  SRC::validator($_POST['strat_data']);
        $end_date =  SRC::validator($_POST['end_data']);

        $unit =  SRC::validator($_POST['id_action_unit']);
        $action_work=SRC::validatorPrice($_POST['work']);
        ////services////
        $services= json_decode($_POST['ex_services']);
        $save_services = array();
        if($services!=false) {
            foreach ($services as $ex_services) {
                $save_services[]=array(
                    'name'=>SRC::validator($ex_services->{'name'}),
                    'amount'=>SRC::validatorPrice($ex_services->{'amount'}),
                    'price'=>SRC::validatorPrice($ex_services->{'price'})
                );
            }
        }
        $save_services = serialize( $save_services );
        ////material////
        $materiale= json_decode($_POST['ex_material']);
        $save_material = array();
        if($materiale!=false) {

            foreach ($materiale as $ex_material) {
                $save_material[]=array(
                    'id'=>SRC::validator($ex_material->{'id'}),
                    'norm'=>SRC::validatorPrice($ex_material->{'norm'})
                );
            }
            $save_material = serialize( $save_material );
        }
        ////employee////
        $employee= json_decode($_POST['ex_employe']);
        $save_employee=array();
        if($employee!=false){

            foreach ($employee as $ex_employee) {
                $save_employee[] = array(
                    'id' => SRC::validator($ex_employee->{'id'}),
                    'pay' => SRC::validatorPrice($ex_employee->{'pay'})
                );
            }
            $save_employee = serialize( $save_employee );
        }
        ////vehicles////
        $vehicles= json_decode($_POST['ex_vehicles']);
        $save_vehicles=array();
        if($vehicles!=false){
            foreach ($vehicles as $ex_vehicles){
                $equipments= $ex_vehicles->{'id_equipment'};
                $id_equipment='';
                foreach ($equipments as $value){
                    $id_equipment.=SRC::validator($value->{'id'}).",";
                }
                $id_equipment=substr($id_equipment, 0, -1);
                $save_vehicles[]=array(
                    'id_veh'=>SRC::validator($ex_vehicles->{'id_vehicles'}),
                    'id_equ'=>$id_equipment,
                    'fuel'=>SRC::validatorPrice($ex_vehicles->{'fuel'})
                );
            }
            $save_vehicles = serialize( $save_vehicles );
        }

        TechnologyCard::editAction($action_id,$id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$action_work,$save_material,$save_services,$save_employee,$save_vehicles);
        SRC::redirect();
        return true;
    }

    public function actionCostsTechnologyCard($id){
        $id_culture = $id;
        $id_user = $_SESSION['id_user'];
        $date = TechnologyCard::costsTechnologyCard($id_culture, $id_user);
        SRC::template('new-farmer','new','costsTechnologyCard',$date);
    }
//
    public function actionCreateMaterial(){
        $id_user = $_SESSION['id_user'];
        $name_material=SRC::validator($_POST['name_material']);
        $id_type_material=SRC::validator($_POST['id_type_material']);
        $key_material=SRC::validator($_POST['key_material_'+$id_type_material]);
        $id_material=DataBase::saveLibMaterial($id_user,$name_material,$id_type_material,$key_material);
        $material_price=SRC::validator($_POST['price_material']);
        $material_unit=SRC::validator($_POST['unit_material']);
        $id=TechnologyCard::createNewMaterial($id_user, $id_material, $material_price,$material_unit);
        echo $id;
        return true;
    }

    public function actionChangeTechCart(){
        $id_user = $_SESSION['id_user'];
        $id_field = SRC::validatorPrice($_POST['id_field']);
        $id_tech_cart = SRC::validatorPrice($_POST['id_tech_cart']);
        TechnologyCard::changeTechCart($id_user,$id_field,$id_tech_cart);
        return true;
    }

    public function actionCreateNewTech(){
        $id_user = $_SESSION['id_user'];
        $id_crop = SRC::validatorPrice($_POST['id_crop']);
        $tech_name = SRC::validator($_POST['tech_name']);
        $yield = SRC::validatorPrice($_POST['crop_yield']);
        $area = SRC::validatorPrice($_POST['area']);
        $id = TechnologyCard::createNewTech($id_user,$id_crop,$tech_name,$yield,$area);
        echo $id;
        return true;
    }

    public function actionRemoveTech($id){
        $id_user = $_SESSION['id_user'];
        $id_culture = $id;
        TechnologyCard::removeTechCart($id_culture,$id_user);
        SRC::redirect('/new-farmer/list_technology_card');
        return true;
    }
    public function actionCopyTech($id_tech){
        $id_tech=SRC::validatorPrice($id_tech);
        $id_user = $_SESSION['id_user'];
        $id_copy=TechnologyCard::copyTech($id_tech,$id_user);
        SRC::redirect();
        return true;
    }
    public function actionCopyTechTemplate(){
        $id_tech=SRC::validatorPrice($_POST['id_culture']);
        $tech_name=SRC::validator($_POST['tech_name']);
        $tech_name=SRC::validator($tech_name);
        $id_user = $_SESSION['id_user'];
        $id_copy=TechnologyCard::copyTechTemplate($id_tech,$id_user,$tech_name);
        echo $id_copy;
        return true;
    }
    public function actionCopyTechField($id_tech,$id_field,$amount_work){
        $id_tech=SRC::validatorPrice($id_tech);
        $id_field=SRC::validatorPrice($id_field);
        $amount_work=SRC::validatorPrice($amount_work);
        $id_user = $_SESSION['id_user'];
        $id_copy=TechnologyCard::copyTech($id_tech,$id_user,$amount_work);
        TechnologyCard::changeTechCart($id_user,$id_field,$id_copy);
        SRC::redirect();
        return true;
    }

    public function actionRemoveOperation($id_operation){
        $id = $id_operation;
        $id_user = $_SESSION['id_user'];
        TechnologyCard::removeOperation($id,$id_user);
        SRC::redirect();
        return true;
    }

    public function actionEditTechCardList(){
        $id_user = $_SESSION['id_user'];
        $edit_name_tech_card = SRC::validator($_POST['edit_name_tech_card']);
        $edit_crop_type = SRC::validatorPrice($_POST['edit_crop_type']);
        $edit_crop_id = SRC::validatorPrice($_POST['edit_crop_list_select']);
        $edit_yield = SRC::validatorPrice($_POST['edit_yield']);
        $edit_area = SRC::validatorPrice($_POST['edit_area']);
        $edit_tech_id = SRC::validator($_POST['edit_id_culture']);

        TechnologyCard::saveEditTechCardList($id_user,$edit_name_tech_card,$edit_crop_type,$edit_crop_id,$edit_yield,$edit_area,$edit_tech_id);
    }
}