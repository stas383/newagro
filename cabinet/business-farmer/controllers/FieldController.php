<?php
include_once ROOT. '/cabinet/business-farmer/models/Field.php';
include_once ROOT. '/cabinet/business-farmer/models/DataBase.php';
include_once ROOT. '/cabinet/business-farmer/models/DataList.php';

class FieldController{
    //
    public function actionField(){
        $id_company=$_SESSION['id_user'];
        $date['zone']=DataBase::getZone();
        $date['type_land']=DataBase::getTypeLand();
        $date['type_soil']=DataBase::getTypeSoil();
        $date['field']=Field::getField($id_company);
        $date['crop']=DataBase::getCrop();

        foreach ($date['field'] as $value){
           $date['summ_area']+= $value['field_area'];
        }


        SRC::template('business-farmer','panel','field',$date);
        return true;
    }
    //
    public function actionCreateField(){
        $id_company=$_SESSION['id_user'];
        $field_number=SRC::validator($_POST['field_number']);
        $field_name=SRC::validator($_POST['field_name']);
        $field_area=SRC::validator($_POST['field_area']);
        $field_yield=SRC::validator($_POST['field_yield']);
        $id_crop=DataList::createOrIdCrop($id_company, SRC::validator($_POST['id_crop']));
        $field_zone=SRC::validator($_POST['field_zone']);
        $field_subdivision=SRC::validator($_POST['field_subdivision']);
        $field_type_land=SRC::validator($_POST['field_type_land']);
        $field_type_soil=SRC::validator($_POST['field_type_soil']);
        $field_group=SRC::validator($_POST['field_group']);
        $field_class=SRC::validator($_POST['field_class']);
        $field_note=SRC::validator($_POST['field_note']);
        $field_distance=SRC::validator($_POST['field_distance']);
        Field::createField($id_company, $field_number, $field_name, $field_area, $field_yield, $id_crop, $field_zone, $field_subdivision, $field_type_land, $field_type_soil, $field_group, $field_class, $field_note, $field_distance);
        SRC::redirect();
        return true;
    }
    //
    public function actionEditField(){
        $id_company=$_SESSION['id_user'];
        $id_field=SRC::validator($_POST['id_field']);
        $field_number=SRC::validator($_POST['field_number']);
        $field_name=SRC::validator($_POST['field_name']);
        $field_area=SRC::validator($_POST['field_area']);
        $field_yield=SRC::validator($_POST['field_yield']);
        $id_crop=DataList::createOrIdCrop($id_company, SRC::validator($_POST['id_crop']));
        $field_zone=SRC::validator($_POST['field_zone']);
        $field_subdivision=SRC::validator($_POST['field_subdivision']);
        $field_type_land=SRC::validator($_POST['field_type_land']);
        $field_type_soil=SRC::validator($_POST['field_type_soil']);
        $field_group=SRC::validator($_POST['field_group']);
        $field_class=SRC::validator($_POST['field_class']);
        $field_note=SRC::validator($_POST['field_note']);
        $field_distance=SRC::validator($_POST['field_distance']);
        Field::editField($id_company ,$id_field ,$field_number ,$field_subdivision ,$field_zone ,$field_area ,$field_type_land ,$field_type_soil ,$field_distance ,$field_note, $field_name ,$field_yield ,$id_crop ,$field_group ,$field_class);
        SRC::redirect();
        return true;
    }
}