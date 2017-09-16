<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.09.2017
 * Time: 14:56
 */
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Material.php';
class MaterialController{
    public function actionGetMaterials(){

        $id_user=$_SESSION['id_user'];
        $date['material']=Material::getMaterial($id_user);
        $date['type_material']=DataBase::getTypeMaterial();
        $date['ppa_material']=DataBase::getTypePPA();
        $date['material_lib']=DataBase::getMaterial($id_user);
        SRC::template('new-farmer','new','material',$date);
        return true;
    }
    public function actionCreateMaterial(){
        $id_user=$_SESSION['id_user'];
        $name_material=SRC::validator($_POST['name_material']);
        $id_type_material=SRC::validator($_POST['type_material']);
        $key_material=SRC::validator($_POST['sub_type_material']);
        $id_lib_material=DataBase::saveLibMaterial($id_user,$name_material,$id_type_material,$key_material);
        $price_material=SRC::validator($_POST['price_material']);
        Material::createMaterial($id_user,$id_lib_material,$price_material);
        SRC::redirect();
        return true;
    }
    public function actionSaveEditMaterial(){
        $id_user=$_SESSION['id_user'];
        $id_material_price=SRC::validator($_POST['id_material_price']);
        $name_material=SRC::validator($_POST['name_material']);
        $id_type_material=SRC::validator($_POST['type_material']);
        $key_material=SRC::validator($_POST['sub_type_material']);
        $id_lib_material=DataBase::saveLibMaterial($id_user,$name_material,$id_type_material,$key_material);
        $price_material=SRC::validatorPrice($_POST['price_material']);
        Material::saveEditMaterial($id_user,$id_material_price,$id_lib_material,$price_material);
        SRC::redirect();
        return true;
    }
    public function actionRemoveMaterial($id_material_price){
        $id_material_price=SRC::validatorPrice($id_material_price);
        $id_user=$_SESSION['id_user'];
        Material::removeMaterial($id_user,$id_material_price);
        SRC::redirect();
        return true;
    }
}