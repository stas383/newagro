<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 15:38
 */
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Vehicles.php';
class VehiclesController{
    public function actionVehicles(){
        $id_user=$_SESSION['id_user'];
        $date['fuel_type']=DataBase::getTypeFuel();
        $date['vehicles']=Vehicles::getVehicles($id_user);
        $date['kind_vehicles'] = DataBase::getKindVeh();
        SRC::template('new-farmer','new', 'vehicles', $date);
        return true;
    }
    public function actionCreateVehicles(){
        $id_user=$_SESSION['id_user'];
        $vehicles_kind = SRC::validatorPrice($_POST['vehicle_kind']);
        $vehicles_name=SRC::validator($_POST['vehicles_name']);
        $vehicles_license=SRC::validator($_POST['vehicles_license']);
        $vehicles_inventory_number = SRC::validator($_POST['vehicle_int_number']);
        $vehicles_fuel=SRC::validator($_POST['vehicles_fuel']);
        $vehicles_acquisition=SRC::validatorPrice($_POST['vehicles_acquisition']);
        $vehicles_power=SRC::validatorPrice($_POST['vehicles_power']);
        $vehicles_load_capacity=SRC::validatorPrice($_POST['load_capacity']);
        $vehicles_usage_year = SRC::validatorPrice($_POST['usage_year']);
        $vehicles_purchase_price = SRC::validatorPrice($_POST['purchase_price']);
        $vehicles_current_year = SRC::validatorPrice($_POST['current_year']);
        if($vehicles_usage_year==false){
            $vehicles_depreciation = 0;
        }else{
            $vehicles_depreciation = $vehicles_purchase_price*1000/$vehicles_usage_year;
        }
        $vehicles_amount_of_amortization = $vehicles_depreciation * ($vehicles_current_year - $vehicles_acquisition);
        
        Vehicles::createVehicles($id_user,$vehicles_kind, $vehicles_name, $vehicles_license, $vehicles_inventory_number, $vehicles_fuel, $vehicles_acquisition, $vehicles_power,$vehicles_load_capacity, $vehicles_depreciation, $vehicles_amount_of_amortization,$vehicles_usage_year,$vehicles_purchase_price);
        SRC::redirect('/new-farmer/vehicles');
        return true;
    }
    public function actionEditVehicles(){
        $id_user=$_SESSION['id_user'];
        $id_vehicles=SRC::validator($_POST['id_vehicles']);
        $vehicles_kind=SRC::validatorPrice($_POST['vehicle_kind']);
        $vehicles_name=SRC::validator($_POST['vehicles_name']);
        $vehicles_license=SRC::validator($_POST['vehicles_license']);
        $vehicles_inventory_number=SRC::validator($_POST['vehicle_int_number']);
        $vehicles_fuel=SRC::validator($_POST['vehicles_fuel']);
        $vehicles_acquisition=SRC::validatorPrice($_POST['vehicles_acquisition']);
        $vehicles_power=SRC::validatorPrice($_POST['vehicles_power']);
        $vehicles_load_capacity=SRC::validatorPrice($_POST['load_capacity']);
        $vehicles_usage_year = SRC::validatorPrice($_POST['usage_year']);
        $vehicles_purchase_price = SRC::validatorPrice($_POST['purchase_price']);
        $vehicles_current_year = SRC::validatorPrice($_POST['current_year']);
        if($vehicles_usage_year==false){
            $vehicles_depreciation = 0;
        }else{
            $vehicles_depreciation = $vehicles_purchase_price/$vehicles_usage_year;
        }
        $vehicles_amount_of_amortization = $vehicles_depreciation * ($vehicles_current_year - $vehicles_acquisition);
        Vehicles::editVehicles($id_user, $id_vehicles, $vehicles_kind, $vehicles_name, $vehicles_license, $vehicles_inventory_number, $vehicles_fuel, $vehicles_acquisition, $vehicles_power,$vehicles_load_capacity, $vehicles_depreciation, $vehicles_amount_of_amortization,$vehicles_usage_year,$vehicles_purchase_price);
        SRC::redirect('/new-farmer/vehicles');
        return true;
    }
    public function actionRemoveVehicles($id_vehicles){
        $id_vehicles=SRC::validatorPrice($id_vehicles);
        $id_user=$_SESSION['id_user'];
        Vehicles::removeVehicles($id_vehicles,$id_user);
        SRC::redirect('/new-farmer/vehicles');
        return true;
    }
}