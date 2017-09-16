<?php

include_once ROOT. '/cabinet/shopadm/models/Material.php';

class MaterialController{

    //Бизнесс план, загрузка культур
    public function actionListSeeds()
    {

        $id = $_SESSION['id_user'];

        $dateSeeds = Material::getDateSeedsId($id);

        SRC::template('shopadm', 'panel', 'seeds', $dateSeeds);

        return true;
    }

    //Загрузка страницы добавления семян
    public function actionAddSeeds(){

        $date['crop'] = Material::getListMaterialCrop();
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'addSeeds', $date);

        return true;
    }

    public function actionCreateSeeds(){
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $id_user = $_SESSION['id_user'];
        $material_name = SRC::validator($_POST['material_name']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        //var_dump($id_fabricator );
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']), 3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);
        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        if(!empty(SRC::validatorPrice($_POST["save_price_pdv"]))){
            $save_price_pdv = number_format(SRC::validatorPrice($_POST["save_price_pdv"], 3, '.', ''));
        }else $save_price_pdv = 0;

        if(!empty(SRC::validatorPrice($_POST["save_m_1000"]))){
            $save_m_1000 = number_format(SRC::validatorPrice($_POST["save_m_1000"], 3, '.', ''));
        }else $save_m_1000 = 0;

        if(!empty(SRC::validatorPrice($_POST["save_1po_seeds"]))){
            $save_1po_seeds = number_format(SRC::validatorPrice($_POST["save_1po_seeds"], 3, '.', ''));
        }else $save_1po_seeds = 0;

        if(!empty(SRC::validatorPrice($_POST["save_rec_qty"]))){
            $save_rec_qty = number_format(SRC::validatorPrice($_POST["save_rec_qty"], 3, '.', ''));
        }else $save_rec_qty = 0;

        $return = Material::createSeeds($id_user, $id_crop, $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive, $save_price_pdv, $save_m_1000, $save_1po_seeds, $save_rec_qty);

        SRC::addAlert($return, 1, 'Новий матеріал успішно доданий');
        SRC::redirect('/distributor');
        return true;
    }

    //загрузка страницы редактирования
    public function actionEditSeeds($id){

        $id_user = $_SESSION['id_user'];

        $date['crop'] = Material::getListMaterialCrop();
        $date['dateSeed'] = Material::getMaterialSeedsId($id, $id_user);
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'editSeeds', $date);

        return true;
    }

    //Схранение апдейта
    public function actionSaveSeeds(){
        $id_material = SRC::validator($_POST['id_material']);
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
       //$fabricator = SRC::validator($_POST['fabricator']);
        $id_user = $_SESSION['id_user'];
        $material_name = SRC::validator($_POST['material_name']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']), 3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);
        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        if(!empty(SRC::validatorPrice($_POST["save_price_pdv"]))){
            $save_price_pdv = number_format(SRC::validatorPrice($_POST["save_price_pdv"], 3, '.', ''));
        }else $save_price_pdv = 0;

        if(!empty(SRC::validatorPrice($_POST["save_m_1000"]))){
            $save_m_1000 = number_format(SRC::validatorPrice($_POST["save_m_1000"], 3, '.', ''));
        }else $save_m_1000 = 0;

        if(!empty(SRC::validatorPrice($_POST["save_1po_seeds"]))){
            $save_1po_seeds = number_format(SRC::validatorPrice($_POST["save_1po_seeds"], 3, '.', ''));
        }else $save_1po_seeds = 0;

        if(!empty(SRC::validatorPrice($_POST["save_rec_qty"]))){
            $save_rec_qty = number_format(SRC::validatorPrice($_POST["save_rec_qty"], 3, '.', ''));
        }else $save_rec_qty = 0;

        $return = Material::saveSeeds($id_material, $id_user, $id_crop, $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive, $save_price_pdv, $save_m_1000, $save_1po_seeds, $save_rec_qty);


        SRC::addAlert($return, 1, 'Матеріал успішно відредаговано');
        SRC::redirect('/distributor');
        return true;
    }



    //Загрузка страницы СЗР
    public function actionListPpa(){
        $id = $_SESSION['id_user'];

        $date = Material::getListMaterialSubtypePpa($id);

        SRC::template('distributor', 'panel', 'ppa', $date);

        return true;
    }

    //Загрузка страницы Удобрений
    public function actionListFertilizers(){
        $id = $_SESSION['id_user'];

        $date = Material::getListMaterialFer($id);

        SRC::template('distributor', 'panel', 'fertilizers', $date);

        return true;
    }

    //Загрузка страницы  редактирования Удобрений
    public function actionEditFertilizers($id){
        $id_user = $_SESSION['id_user'];

        $date['crop'] = Material::getListMaterialCrop();
        $date['dateSeed'] = Material::getMaterialFerId($id, $id_user);
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'editFertilizers', $date);

        return true;
    }

    //Добавление новых СЗР
    public function actionAddFertilizers(){
        $date['crop'] = Material::getListMaterialCrop();
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'addFertilizers', $date);

        return true;
    }

    //Создание Удобрений
    public function actionCreateFertilizers(){
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);
            var_dump($id_fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        $id_user = $_SESSION['id_user'];
        $material_name = SRC::validator($_POST['material_name']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']), 3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);
        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        $return = Material::createFer($id_user, $id_crop, $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive);

        SRC::addAlert($return, 1, 'Новий матеріал успішно доданий');
        SRC::redirect('/distributor/list-fertilizers');
        return true;
    }

    //Сохранение Удобрений
    public function actionSaveFertilizers(){
        $id_material = SRC::validator($_POST['id_material']);
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        $id_user = $_SESSION['id_user'];
        $material_name = SRC::validator($_POST['material_name']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']),3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);
        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        $return = Material::saveFer($id_material,$id_user, $id_crop, $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive);

        SRC::addAlert($return, 1, 'Матеріал успішно відредаговано');
        SRC::redirect('/distributor/list-fertilizers');
        return true;
    }

    //Добавление новых СЗР
    public function actionAddPpa(){
        $date['crop'] = Material::getListMaterialCrop();
        $date['subtype'] = Material::getListMaterialSubType();
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'addPpa', $date);

        return true;
    }

    //Загрузка страницы  редактирования Удобрений
    public function actionEditPpa($id){
        $id_user = $_SESSION['id_user'];

        $date['crop'] = Material::getListMaterialCrop();
        $date['dateSeed'] = Material::getMaterialPpaId($id, $id_user);
        $date['subtype'] = Material::getListMaterialSubType();
        $date['fabricator'] = Material::getListFabricator();

        SRC::template('distributor', 'panel', 'EditPpa', $date);

        return true;
    }

    //Сохранение СЗР
    public function actionCreatePpa(){
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        $id_user = $_SESSION['id_user'];
        $material_subtype = SRC::validator($_POST['material_subtype']);
        $material_name = SRC::validator($_POST['material_name']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']), 3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);
        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        $return = Material::createPpa($id_user, $id_crop, $material_subtype , $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive);

        SRC::addAlert($return, 1, 'Новий матеріал успішно доданий');
        SRC::redirect('/distributor/list-ppa');
        return true;
    }
    //Сохранение СЗР
    public function actionSavePpa(){
        $id_material = SRC::validator($_POST['id_material']);
        $new =  $material_exclusive = 0;
        $id_crop = SRC::validator($_POST['id_crop']);
        $fabricator = SRC::validator($_POST['fabricator']);
        $result = Material::validateFabricator($fabricator);
        if($result == false){
            $id_fabricator = Material::createNewFabricator($fabricator);

        }else{
            $id_fabricator = $result[0]['id'];
        }
        $id_user = $_SESSION['id_user'];
        $material_subtype = SRC::validator($_POST['material_subtype']);
        $material_name = SRC::validator($_POST['material_name']);
        $material_qty = SRC::validatorPrice($_POST['material_qty']);
        $material_price = number_format(SRC::validatorPrice($_POST['material_price']), 3, '.', '');
        $price_two = number_format(SRC::validatorPrice($_POST['price_two']), 3, '.', '');
        $time_term = number_format(SRC::validatorPrice($_POST['time_term']), 3, '.', '');
        $discount = number_format(SRC::validatorPrice($_POST['discount']), 3, '.', '');
        $description = SRC::validator($_POST['description']);

        if(!isset($_POST['new']) or SRC::validator($_POST['new']) == 'on') $new = 1;
        if(!isset($_POST['material_exclusive']) or  SRC::validator($_POST['material_exclusive']) == 'on') $material_exclusive = 1;

        $return = Material::savePpa($id_material, $id_user, $id_crop, $material_subtype , $id_fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive);

        SRC::addAlert($return, 1, 'Новий матеріал успішно доданий');
        SRC::redirect('/distributor/list-ppa');
        return true;
    }

    //Удаление материалов
    public function actionRemoveMaterial($table, $id){
        $table = 'distributor_material_'.$table;
        $result = Material::removeMaterial($table, $id);

        SRC::addAlert($result, 1, 'Матеріал успішно видаленний!');

        SRC::redirect();

        return true;
    }

}

