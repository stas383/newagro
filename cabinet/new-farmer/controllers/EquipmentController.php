<?php
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Equipment.php';
class EquipmentController{
    public function actionEquipment(){
        $id_user=$_SESSION['id_user'];
        $date['equipment_type']=DataBase::getTypeEquipment();
        $date['equipment']=Equipment::getEquipment($id_user);
        SRC::template('new-farmer','new', 'equipment', $date);
        return true;
    }
    public function actionCreateEquipment(){
        $id_user=$_SESSION['id_user'];
        $equipment_name=SRC::validator($_POST['equipment_name']);
        $equipment_inventory_number = SRC::validator($_POST['equipment_int_number']);
        $equipment_type=SRC::validator($_POST['equipment_type']);
        $equipment_aquisition=SRC::validator($_POST['equipment_aquisition']);
        $equipment_price=SRC::validator($_POST['equipment_Price']);
        $equipment_usage=SRC::validator($_POST['equipment_usage']);
        $equipment_capacity=SRC::validatorPrice($_POST['equipment_capacity']);
        $equipment_unit=SRC::validatorPrice($_POST['equipment_unit']);
        $equipment_width=SRC::validatorPrice($_POST['equipment_width']);
        $equipment_kind=SRC::validatorPrice($_POST['equipment_kind']);
        Equipment::createEquipment($id_user,$equipment_name,$equipment_inventory_number,$equipment_type,$equipment_capacity,$equipment_width,$equipment_aquisition,$equipment_price,$equipment_usage,$equipment_unit,$equipment_kind);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
    public function actionEditEquipment(){
        $id_user=$_SESSION['id_user'];
        $id_equipment=SRC::validator($_POST['ed_id_equipment']);
        $equipment_name=SRC::validator($_POST['ed_equipment_name']);
        $equipment_inventory_number = SRC::validator($_POST['ed_equipment_int_number']);
        $equipment_type=SRC::validator($_POST['ed_equipment_type']);
        $equipment_aquisition=SRC::validator($_POST['ed_equipment_acquisition']);
        $equipment_price=SRC::validator($_POST['ed_equipment_price']);
        $equipment_usage=SRC::validator($_POST['ed_equipment_usage']);
        $equipment_unit=SRC::validatorPrice($_POST['ed_equipment_unit']);
        $equipment_capacity=SRC::validatorPrice($_POST['ed_equipment_capacity']);
        $equipment_width=SRC::validatorPrice($_POST['ed_equipment_width']);
        $equipment_kind=SRC::validatorPrice($_POST['ed_equipment_kind']);
        Equipment::editEquipment($id_equipment,$id_user,$equipment_name,$equipment_inventory_number,$equipment_type,$equipment_capacity,$equipment_width,$equipment_aquisition,$equipment_price,$equipment_usage, $equipment_unit,$equipment_kind);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
    public function actionRemoveEquipment($id_equipment){
        $id_equipment=SRC::validatorPrice($id_equipment);
        $id_user=$_SESSION['id_user'];
        Equipment::removeEquipment($id_equipment,$id_user);
        SRC::redirect('/new-farmer/equipment');
        return true;
    }
}