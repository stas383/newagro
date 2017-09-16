<?php

include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Crop.php';

class CropController {

    public function actionCabinet($id){
        if($id==1) $_SESSION['crop']='';
        if($id==2) $_SESSION['crop']='_veg';
        SRC::redirect();
        return true;
    }

	public function actionIndex(){
        SRC::template('add-crop', 'panel', 'listCrop');
		return true;
	}

    public function actionAddCrop(){
        SRC::template('add-crop', 'panel', 'addCrop');
        return true;
    }
    public function actionListCrop(){
        $listCrop= Crop::getListCrop();
        SRC::template('add-crop', 'panel', 'listCrop', $listCrop);

        return true;
    }
    public function actionCreateCrop(){
        $name_crop_ua = trim(htmlspecialchars(stripslashes($_POST['name_crop_ua'])));
        $yield_min = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['yield_min']))));
        $yield_max = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['yield_max']))));
        $cleaning_qty = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['cleaning_qty']))));
        $drying_qty = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['drying_qty']))));
        $cleaning_price = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['cleaning_price']))));
        $drying_price = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['drying_price']))));
        $storing_price = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['storing_price']))));
        $selling_price = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['selling_price']))));
        $other_operating_1 = SRC::validator($_POST['other_operating_1']);
        $other_operating_2 = SRC::validator($_POST['other_operating_2']);
        $other_operating_3 = SRC::validator($_POST['other_operating_3']);
        $result = Crop::createCrop($name_crop_ua, $yield_min, $yield_max, $cleaning_qty, $drying_qty, $cleaning_price, $drying_price, $storing_price, $selling_price, $other_operating_1, $other_operating_2, $other_operating_3);
        SRC::addAlert($result, 1, 'Ok!');
        SRC::redirect('/add-crop');
        return true;
    }

    //Загрузка страницы редактирование культуры
    public function actionEditCrop($id){

        $idCrop = Crop::getCropId($id);

        SRC::template('add-crop', 'panel', 'editCrop', $idCrop);

        return true;
    }

    //Сохранение редактирования культур
    public function actionEditSaveCrop(){
        $id = SRC::validator($_POST['id']);
        $name_crop_ua = SRC::validator($_POST['name_crop_ua']);
        $yield_min = SRC::validatorPrice($_POST['yield_min']);
        $yield_max = SRC::validatorPrice($_POST['yield_max']);
        $cleaning_qty = SRC::validatorPrice($_POST['cleaning_qty']);
        $drying_qty = SRC::validatorPrice($_POST['drying_qty']);
        $cleaning_price = SRC::validatorPrice($_POST['cleaning_price']);
        $drying_price = SRC::validatorPrice($_POST['drying_price']);
        $storing_price = SRC::validatorPrice($_POST['storing_price']);
        $selling_price = SRC::validatorPrice($_POST['selling_price']);
        $other_operating_1 = SRC::validator($_POST['other_operating_1']);
        $other_operating_2 = SRC::validator($_POST['other_operating_2']);
        $other_operating_3 = SRC::validator($_POST['other_operating_3']);
                $result = Crop::editSaveCrop($id, $name_crop_ua, $yield_min, $yield_max, $cleaning_qty, $drying_qty, $cleaning_price, $drying_price, $storing_price, $selling_price, $other_operating_1, $other_operating_2, $other_operating_3);
        SRC::addAlert($result, 1, 'Зміни успішно збережені!');
        SRC::redirect('/add-crop');
        return true;
    }

    //Удаление культуры
    public function actionRemoveCrop($id){
        $result = Crop::removeCrop($id);
        SRC::addAlert($result, 1, 'Культура успішно видалена!');
        SRC::redirect();
        return true;
    }
}

