<?php

include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Material.php';

class MaterialController {
    //Загрузка страницы добавления видов СЗР
    public function actionAddMaterialSubtype()
    {

        SRC::template('add-crop', 'panel', 'addMaterialSubtype');

        return true;
    }

    //Загрузка списка видов СЗР
    public function actionListMaterialSubtype()
    {

        $listMaterialSubtype= Material::getListMaterialSubType();
        SRC::template('add-crop', 'panel', 'listMaterialSubtype', $listMaterialSubtype);

        return true;
    }

    //Добавление нового вида СЗР
    public function actionCreateMaterialSubtype(){
        $name = trim(htmlspecialchars(stripslashes($_POST['name'])));
        $result = Material::createMaterialSubtype($name);

        SRC::addAlert($result, 1, 'Новий підтип ЗЗР успішно доданий!');

        SRC::redirect();

        return true;
    }

    //Редактирование вида СЗР
    public function actionEditSaveMaterialSubtype(){
        $id = SRC::validator($_POST['id']);
        $type = SRC::validator($_POST['type']);
        $value = SRC::validatorPrice($_POST['value']);

        $result = Material::editSaveMaterialSubType($id, $type, $value);

        echo 'Запис відредаговано!';

        return true;
    }

    //Загрузка страницы добавление материалов СЗР
    public function actionAddMaterialPpa(){

        $listMaterialType = Material::getListMaterialSubType();
        SRC::template('add-crop', 'panel', 'addMaterialPpa', $listMaterialType);

        return true;
    }

    //Добавление нового материала СЗР
    public function actionCreateMaterialPpa(){
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
        $subtype_id = SRC::validator($_POST['subtype_id']);
        $unit = SRC::validator($_POST['unit']);

        $yield_level = SRC::validator($_POST['yield_level']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = SRC::validatorPrice($_POST['material_price']);

        $result = Material::createMaterialPpa($name_material_ua, $subtype_id, $unit, $yield_level, $material_qty, $material_price);

        SRC::addAlert($result, 1, 'Новий матеріл ЗЗР додано!');

        SRC::redirect();

        return true;
    }

    //Загрузка страницы  списка материалов СЗР
    public function actionListMaterialPpa(){

        $listMaterial = Material::getListMaterialPpa();
        SRC::template('add-crop', 'panel', 'listMaterialPpa', $listMaterial);

        return true;
    }

    //Загрука страницы редактирование СЗР
    public function actionEditMaterialPpa($id){
        $idMaterial = Material::getMaterialPpaId($id);

        SRC::template('add-crop', 'panel', 'editMaterialPpa', $idMaterial);

        return true;
    }

    //Сохранение редактируемого материала СЗР
    public function actionEditSaveMaterialPpa(){
        $id = SRC::validator($_POST['id']);
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
        $subtype_id = SRC::validator($_POST['subtype_id']);
        $unit = SRC::validator($_POST['unit']);
        $yield_level = SRC::validator($_POST['yield_level']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = SRC::validatorPrice($_POST['material_price']);

        $result = Material::editSaveMaterialPpa($id,$name_material_ua, $subtype_id, $unit, $yield_level, $material_qty, $material_price);

        SRC::addAlert($result, 1, 'Матеріл ЗЗР відредаговано!');

        SRC::redirect('/add-crop/list-material-ppa');

        return true;
    }

    //Загрузка страницы добавление семян
    public function actionAddMaterialSeeds(){

        $listMaterialCrop = Material::getListMaterialCrop();
        SRC::template('add-crop', 'panel', 'addMaterialSeeds', $listMaterialCrop);

        return true;
    }

    //Добавление новых семян
    public function actionCreateMaterialSeeds(){
        $crop_id = SRC::validator($_POST['crop_id']);
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
        $unit = SRC::validator($_POST['unit']);
        $selection = SRC::validator($_POST['selection']);
        $material_price = SRC::validatorPrice($_POST['material_price']);
        $material_qty_z1 = SRC::validatorPrice($_POST['material_qty_z1']);
        $material_qty_z2 = SRC::validatorPrice($_POST['material_qty_z2']);
        $material_qty_z3 = SRC::validatorPrice($_POST['material_qty_z3']);

        $result = Material::createMaterialSeeds($name_material_ua,$selection, $crop_id, $unit, $material_price, $material_qty_z1, $material_qty_z2, $material_qty_z3);

        SRC::addAlert($result, 1, 'Нове насіння додано!');

        SRC::redirect();

        return true;
    }

    //Загрузка страницы  списка семян
    public function actionListMaterialSeeds(){

        $listMaterialSeeds = Material::getListMaterialSeeds();

        SRC::template('add-crop', 'panel', 'listMaterialSeeds', $listMaterialSeeds);

        return true;
    }

    //Загрузка страницы редактирования семян
    public function actionEditMaterialSeeds($id){

        $idMaterial = Material::getMaterialSeedsId($id);

        SRC::template('add-crop', 'panel', 'editMaterialSeeds', $idMaterial);

        return true;
    }

    //Сохранение редактируемых семян
    public function actionEditSaveMaterialSeeds(){
        $id = SRC::validator($_POST['id']);
        $crop_id = SRC::validator($_POST['crop_id']);
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
        $unit = SRC::validator($_POST['unit']);
        $selection = SRC::validator($_POST['selection']);
        $material_price = SRC::validatorPrice($_POST['material_price']);
        $material_qty_z1 = SRC::validatorPrice($_POST['material_qty_z1']);
        $material_qty_z2 = SRC::validatorPrice($_POST['material_qty_z2']);
        $material_qty_z3 = SRC::validatorPrice($_POST['material_qty_z3']);

        $result = Material::editSaveMaterialSeeds($id, $name_material_ua, $selection, $crop_id, $unit, $material_price, $material_qty_z1, $material_qty_z2, $material_qty_z3);

        SRC::addAlert($result, 1, 'Насіння відредаговано!');

        SRC::redirect();

        return true;
    }

    //Загрузка страницы добавления удобрений
    public function actionAddMaterialFertilizers(){

        $listMaterialCrop = Material::getListMaterialCrop();

        SRC::template('add-crop', 'panel', 'addMaterialFertilizers', $listMaterialCrop);

        return true;
    }

    //Добавление новых удобрений
    public function actionCreateMaterialFertilizers(){


        $crop_id = SRC::validator($_POST['crop_id']);
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
//        $yield_level = SRC::validator($_POST['yield_level']);
        $material_price = SRC::validatorPrice($_POST['material_price']);

        for ($i=1; $i<=3; $i++){
            for ($j=1; $j<=3; $j++){
                $material_qty[$i][$j] = SRC::validatorPrice($_POST['material_qty_z'.$i.$j]);
                if($material_qty[$i][$j] == false) $material_qty[$i][$j] = 0;
            }
            $result = Material::createMaterrialFertilizers($name_material_ua, $crop_id, $i, $material_price, $material_qty[$i][1], $material_qty[$i][2], $material_qty[$i][3]);

        }

        SRC::addAlert($result, 1, 'Нове добрив додано!');

        SRC::redirect();

        return true;
    }

    //Загрузка списка удобрений
    public function actionListMaterialFertilizers(){

        $listMateral = Material::getListMaterialFertilizers();

        SRC::template('add-crop', 'panel', 'listMaterialFertilizers', $listMateral);

        return true;
    }

    //Загрузка редактирования удобрений
    public function actionEditMaterialFertilizers($id){
        $idMaterial = Material::getMaterialFertilizersId($id);

        SRC::template('add-crop', 'panel', 'editMaterialFertilizers', $idMaterial);

        return true;
    }

    //Сохранение редактирования удобрений
    public function actionEditSaveMaterialFertilizers(){
        $id = SRC::validator($_POST['id']);
        $last_crop = SRC::validator($_POST['last_crop']);
        $last_name_material_ua = SRC::validator($_POST['last_name_material_ua']);
        $crop_id = SRC::validator($_POST['crop_id']);
        $name_material_ua = SRC::validator($_POST['name_material_ua']);
//        $yield_level = SRC::validator($_POST['yield_level']);
        $material_price = SRC::validatorPrice($_POST['material_price']);
        $material_qty_z1 = SRC::validatorPrice($_POST['material_qty_z1']);
            if($material_qty_z1 == false) $material_qty_z1 = 0;
        $material_qty_z2 = SRC::validatorPrice($_POST['material_qty_z2']);
            if($material_qty_z2 == false) $material_qty_z2 = 0;
        $material_qty_z3 = SRC::validatorPrice($_POST['material_qty_z3']);
            if($material_qty_z3 == false) $material_qty_z3 = 0;
        $result = Material::editSaveMaterialFertilizersOther($last_crop, $last_name_material_ua,$name_material_ua, $crop_id, $material_price);
        $result = Material::editSaveMaterialFertilizers($id, $material_qty_z1, $material_qty_z2, $material_qty_z3);

        SRC::addAlert($result, 1, 'Нове добрив додано!');

        SRC::redirect('/add-crop/list-material-fertilizers');

        return true;
    }

    //Удаление материалов
    public function actionRemoveMaterial($table, $id){
        $table = 'material_'.$table;
        $result = Material::removeMaterial($table, $id);

        SRC::addAlert($result, 1, 'Матеріал успішно видалений!');
        SRC::redirect();

        return true;
    }
    public function actionAddMaterialWater(){
        

        return true;
    }

}

