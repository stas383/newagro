<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 21.08.2017
 * Time: 12:27
 */
include_once ROOT. '/cabinet/business-farmer/models/DataBase.php';
include_once ROOT. '/cabinet/business-farmer/models/DataList.php';
include_once ROOT. '/cabinet/business-farmer/models/Technology.php';

class TechnologyController{
    public function actionTechnologySheet(){
        $id_company=$_SESSION['id_user'];
        $date['crop']=DataBase::getCrop();
        $date['tc']=Technology::getTechnology($id_company);
        $date['field_list']=Technology::getFieldList($id_company);
        SRC::template('business-farmer', 'panel','technologySheet',$date);
        return true;
    }
    public function actionCreateTechnology(){
        $id_company=$_SESSION['id_user'];
        $id_crop=DataList::createOrIdCrop($id_company, SRC::validator($_POST['id_crop']));
        $technology_name=SRC::validator($_POST['technology_name']);
        $technology_note=SRC::validator($_POST['technology_note']);
        $id_technology=Technology::createTechnology($id_company, $id_crop, $technology_name, $technology_note);
        $id_field=SRC::validator($_POST['id_field']);
        if($id_field!=0)Technology::fieldTechnology($id_company,$id_technology,$id_field);
        SRC::redirect();
        return true;
    }
    public function actionCopyTechnology($id_technology){
        $id_company=$_SESSION['id_user'];
        $id_technology=SRC::validatorPrice($id_technology);
        Technology::copyTechnology($id_company,$id_technology);
        SRC::redirect();
        return true;
    }
    public function actionEditTechnology(){

        SRC::template('business-farmer','panel','editTechnology');
        return true;
    }
}