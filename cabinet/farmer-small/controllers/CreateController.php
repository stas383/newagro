<?php

include_once ROOT.'/cabinet/farmer-small/models/Create.php';
include_once ROOT.'/cabinet/farmer-small/models/Plan.php';
class CreateController{

    public function actionAddCulture(){
        $id_user = $_SESSION['id_user'];
        $result = Plan::getListPlan($id_user);
        SRC::template('farmer-small', 'farm', 'lisrCropRevenue', $result);
        return true;
    }
    public function actionListEquipment(){
        $id_user = $_SESSION['id_user'];
        $result = Create::getList($id_user);
        $result['equipment'] = Plan::getListEquipment($id_user);
        SRC::template('farmer-small', 'farm', 'listEquipment', $result);
        return true;
    }

    public function actionSaveCrop(){
        $id = $_SESSION['id_user'];
        $crop_name = SRC::validator($_POST['id_crop']);
        $id_crop=Create::saveLibCrop($id,$crop_name);
        $area = SRC::validator($_POST['area']);
        $crop_capacity = SRC::validator($_POST['crop_capacity']);
        $avr_price = SRC::validator($_POST['avr_price']);
        $intermediaries_resellers =SRC::validator($_POST['intermediaries_resellers']);
        $market = SRC::validator($_POST['market']);
        $other_channels = SRC::validator($_POST['other_channels']);
        $chanel = [];
        $insider = [];
        $market_ = [];
        $price_chanel = [];
        $price_insider = [];
        $price_market = [];
        for($i=1;$i<=13;$i++){
            $chanel[$i] = SRC::validator($_POST['channel_'.$i]);
            $insider[$i] = SRC::validator($_POST['insider_'.$i]);
            $market_[$i] = SRC::validator($_POST['market_'.$i]);
            $price_chanel[$i] = SRC::validator($_POST['price_channel_'.$i]);
            $price_insider[$i] = SRC::validator($_POST['price_insider_'.$i]);
            $price_market[$i] = SRC::validator($_POST['price_market_'.$i]);
        };
        $result = Create::saveCrop($id, $id_crop, $area, $avr_price, $crop_capacity, $intermediaries_resellers, $market, $other_channels, $market_, $chanel, $insider, $price_market, $price_chanel , $price_insider);
        SRC::addAlert($result, 1, 'Культуру додано');
        SRC::redirect("/farmer-small/list-plan/$result");
        return true;

}

    public function  actionAddCrop(){
        $id_user = $_SESSION['id_user'];
        $name_crop_ua = SRC::validator($_POST['name_crop_ua']);
        $name_crop_en = SRC::validator($_POST['name_crop_en']);
        Create::addCrop($id_user,$name_crop_ua,$name_crop_en);
        SRC::redirect('/farmer-small/add-crop');
    }

    public function  actionAddEquipment(){
        $id_user = $_SESSION['id_user'];
        $name_ua = SRC::validator($_POST['name_ua']);
        Create::addEquipment($id_user, $name_ua);
        SRC::redirect('/farmer-small/add-crop');
    }

    public function actionContent(){

        $date = Create::getContent();
        SRC::template('farmer-small','farm', 'Test', $date);
        return true;
    }

        public function actionSaveTranslate(){

        $id = $_POST['id_crop'];
        $name = $_POST['name'];
        Create::saveTranslate($id, $name);

            echo 'Запис відредаговано!';
        return true;
    }

    public function actionSaveField(){
        $id_user = $_SESSION['id_user'];
        $name_field = $_POST['name_field'];
        $area_field = $_POST['area_field'];

        Create::saveField($id_user, $name_field, $area_field);
        return true;
    }
}