<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 28.08.2017
 * Time: 11:59
 */
include_once ROOT.'/cabinet/new-farmer/models/Fact.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';

class FactController{

    public function actionFact(){
        $id_user = $_SESSION['id_user'];
        $date['field'] = Fact::getFact($id_user);
        $date['crop'] = DataBase::getCropName($id_user);
        $date['storage_material']=Fact::getMaterialStorage($id_user);
        $date['fact'] = Fact::getActualCosts($id_user);

        SRC::template('new-farmer','new','fact', $date);
    }

    public function actionCreateFact(){
        $id_user = $_SESSION['id_user'];
        $data_fact = SRC::validator($_POST['data_fact']);
        $field_id = SRC::validator($_POST['field_id']);
        $stattie_id = SRC::validator($_POST['stattie_id']);
        if($stattie_id==17){
            $material = SRC::validator($_POST['material_seed']);
        }elseif($stattie_id==18){
            $material = SRC::validator($_POST['material_fertilizers']);
        }elseif($stattie_id==19){
            $material = SRC::validator($_POST['material_ppa']);
        }elseif($stattie_id==20){
            $material = SRC::validator($_POST['material_fuel']);
        }else{
            $material = SRC::validator($_POST['material']);
        }

        $amount = SRC::validatorPrice($_POST['amount']);
        $price_one = SRC::validatorPrice($_POST['price_one']);
        $price_total = SRC::validatorPrice($_POST['price_total']);

        Fact::CreateFact($id_user,$data_fact,$field_id,$stattie_id,$material,$amount,$price_one,$price_total);
        SRC::redirect('/new-farmer/add_fact');
        return true;
    }



    public function actionFactTechCard($id_field){
        $id = $id_field;
        $id_user = $_SESSION['id_user'];
        $date['field'] = Fact::getFact($id_user);
        $date['action'] = Fact::getFactAction($id_user,$id);

        $date['material_lib'] = DataBase::getMaterial($id_user);
        $date['id'] = $id_field;

        SRC::template('new-farmer','new','factTechCard',$date);
    }

    public function actionSaveFact(){
        $id_user=$_SESSION['id_user'];
        $id_action=SRC::validator($_POST['save_fact_id_action']);
        ////services////
        $services= json_decode($_POST['save_services_fact']);
        $save_services = array();
        if($services!=false) {
            foreach ($services as $ex_services) {
                $save_services[]=array(
                    'name'=>SRC::validator($ex_services->{'name'}),
                    'price'=>SRC::validatorPrice($ex_services->{'price'}),
                    'date'=>SRC::validatorPrice($ex_services->{'date'})
                );
            }
        }
        $save_services = serialize( $save_services );
        ////material////
        $materiale= json_decode($_POST['save_material_fact']);
        $save_material = array();
        if($materiale!=false) {

            foreach ($materiale as $ex_material) {
                $save_material[]=array(
                    'id'=>SRC::validator($ex_material->{'id'}),
                    'norm'=>SRC::validator($ex_material->{'norm'}),
                    'date'=>SRC::validatorPrice($ex_material->{'date'})
                );
            }

            $save_material = serialize( $save_material );
        }

        ////employee////
        $employee= json_decode($_POST['save_employee_fact']);
        $save_employee=array();
        if($employee!=false){
            foreach ($employee as $ex_employee) {
                $save_employee[] = array(
                    'id' => SRC::validator($ex_employee->{'id'}),
                    'pay' => SRC::validator($ex_employee->{'pay'}),
                    'date'=>    SRC::validator($ex_employee->{'date'})
                );
            }
            $save_employee = serialize( $save_employee );
        }
        ////fuel////
        $fuele= json_decode($_POST['save_fuel_fact']);
        $save_fuel = array();
        if($fuele!=false) {

            foreach ($fuele as $ex_fuel) {
                $save_fuel[]=array(
                    'id_mat'=>SRC::validator($ex_fuel->{'id'}),
                    'norm'=>SRC::validator($ex_fuel->{'norm'}),
                    'date'=>SRC::validatorPrice($ex_fuel->{'date'})
                );
            }
            $save_fuel = serialize( $save_fuel );
        }
        Fact::saveFact($id_user,$id_action,$save_material,$save_employee,$save_fuel,$save_services);
        SRC::redirect();
        return true;
    }
}