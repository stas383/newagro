<?php
include_once ROOT. '/cabinet/business-farmer/models/Sowing.php';
include_once ROOT. '/cabinet/business-farmer/models/DataBase.php';
include_once ROOT. '/cabinet/business-farmer/models/DataList.php';
class SowingController{
    public function actionSowing(){
        $id_company=$_SESSION['id_user'];
        $date['zone']=DataBase::getZone();
        $date['type_land']=DataBase::getTypeLand();
        $date['type_soil']=DataBase::getTypeSoil();
        $date['crop']=DataBase::getCrop();
        $date['sowing']=Sowing::getSowing($id_company);
        foreach ( $date['sowing'] as $sowing){
            $date['field_sowing'][]=$sowing['id_field'];
        }
        $date['field_list']=Sowing::getFieldList($id_company);
        SRC::template('business-farmer','panel','sowing',$date);
        return true;
    }
    public function actionCreateSowing(){
        $id_company=$_SESSION['id_user'];
        $id_field=SRC::validator($_POST['id_field']);
        $id_crop=DataList::createOrIdCrop($id_company, SRC::validator($_POST['id_crop']));
        $sowing_yield=SRC::validator($_POST['sowing_yield']);
        Sowing::createSowing($id_company,$id_field,$id_crop,$sowing_yield);
        SRC::redirect();
        return true;
    }
    public function actionEditSowing(){
        $id_company=$_SESSION['id_user'];
        $id_sowing=SRC::validator($_POST['id_sowing']);
        $id_crop=DataList::createOrIdCrop($id_company, SRC::validator($_POST['id_crop']));
        $sowing_yield=SRC::validator($_POST['sowing_yield']);
        Sowing::getEditSowing($id_company,$id_sowing,$id_crop,$sowing_yield);
        SRC::redirect();
        return true;
    }
}