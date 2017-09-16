<?php
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/FieldManagement.php';
include_once ROOT.'/cabinet/new-farmer/models/TechnologyCard.php';
class FieldManagementController{

	public function actionFieldManagement(){
        $id_user=$_SESSION['id_user'];
	    $date['usage']=DataBase::getFieldUsage();
        $date['field']=FieldManagement::getFieldManagement($id_user);
        $date['crop_us']=FieldManagement::getCrop($id_user);
        $date['crop_culture']=FieldManagement::getCropCulture($id_user);
        $date['rent_pay']=FieldManagement::getRentPay($id_user);
        $date['tech_cart'] = TechnologyCard::getListTechCart($id_user);

		SRC::template('new-farmer','new','fieldManagement', $date);
		return true;
	}

	public function actionCreateFieldManagement(){
        $id_user=$_SESSION['id_user'];
        $field_number=SRC::validator($_POST['field_number']);
        $field_name=SRC::validator($_POST['field_name']);
        $field_size=SRC::validator($_POST['field_area']);
        $field_rent = SRC::validatorPrice($_POST['field_rent']);
        $field_usage = SRC::validatorPrice($_POST['field_usage']);
        $id_culture = SRC::validator($_POST['crop']);

        FieldManagement::createFieldManagement($id_user, $id_culture, $field_number, $field_name, $field_size, $field_rent,$field_usage);

        SRC::redirect('/new-farmer/field_management');
	    return true;
    }
    public function actionEditField(){
        $id_user=$_SESSION['id_user'];
        $id_field=SRC::validatorPrice($_POST['id']);
        $table=SRC::validatorPrice($_POST['table']);
        $value=SRC::validatorPrice($_POST['value']);
        switch ($table){
            case 1:
                $table_name='field_size';
                break;
            case 2:
                $table_name='field_usage';
                break;
            case 3:
                $table_name='field_yield';
                break;
        }
        if($table_name!=false)FieldManagement::editField($id_user,$id_field,$table_name,$value);
	    return true;
    }

    public function actionEditAllField(){
        $id_user = $_SESSION['id_user'];
        $id_field = SRC::validatorPrice($_POST['ed_field_id']);
        $ed_field_number = SRC::validatorPrice($_POST['ed_field_number']);
        $ed_field_name = SRC::validator($_POST['ed_field_name']);
        $ed_field_area = SRC::validatorPrice($_POST['ed_field_area']);
        $crop = SRC::validatorPrice($_POST['crop']);
        FieldManagement::editAllField($id_field,$id_user, $ed_field_number, $ed_field_name, $ed_field_area,$crop);
        SRC::redirect('/new-farmer');
        return true;
    }

    public function actionRemoveField($id){
        $id_field = $id;
        $id_user = $_SESSION['id_user'];
        FieldManagement::removeField($id_field, $id_user);
        SRC::redirect('/new-farmer/field_management');
        return true;
    }

    public function actionSaveRentPay(){
        $id_user = $_SESSION['id_user'];
        $value = SRC::validatorPrice($_POST['value']);
        $costs_type = SRC::validatorPrice($_POST['costs_type']);
        FieldManagement::saveRentPay($id_user,$value,$costs_type);
        return true;
    }

    public function actionSaveCosts(){
        $id_user = $_SESSION['id_user'];
        $costs_plan = SRC::validatorPrice($_POST['costs_plan']);
        $costs_type = SRC::validatorPrice($_POST['costs_type']);
        $costs_comments = SRC::validator($_POST['costs_comments']);

        FieldManagement::saveCosts($id_user,$costs_plan,$costs_type,$costs_comments);

    }

    public function actionChangeStatus(){
        $id_user = SRC::validatorPrice($_SESSION['id_user']);
        $id_field = SRC::validatorPrice($_POST['id_field']);
        $status=SRC::validatorPrice($_POST['status']);
        FieldManagement::changeStatus($id_user,$id_field,$status);
    }

}