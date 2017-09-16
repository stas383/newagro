<?php


include_once ROOT.'/cabinet/farmer-small/models/Edit.php';


class EditController {

	public function actionEditCropSetting($id){

		$id_crop = $id;
		$id_user = $_SESSION['id_user'];
		$date = Edit::editCropSetting($id_crop, $id_user); 
		
		$date['id'] = $id;
		SRC::template('farmer-small', 'farm', 'editCropSetting', $date);

		return true;
	}

	public function actionSaveEditCropArea(){

		$id_crop = $_POST['id'];
		$area = $_POST['area'];

		Edit::editUpdateArea($id_crop, $area);
		echo "Збережено";
		return true;
	}
	public function actionSaveEditCropYaled(){

		$id_crop = $_POST['id'];
		$yaled = $_POST['yaled'];

		Edit::editUpdateYaled($id_crop, $yaled);
		echo "Збережено";
		return true;
	}

	public function actionSaveCropRevenue(){
		 $id = $_SESSION['id_user'];
		$id_crop = $_POST['id_crop'];
		$area = $_POST['area'];
		$crop_capacity = $_POST['crop_capacity'];
		$avr_price = $_POST['avr_price'];
		$market = $_POST['market'];
		$intermediaries_resellers = $_POST['intermediaries_resellers'];
		$other_channels = $_POST['other_channels'];
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
		Edit::editCropRevenue($id, $id_crop, $avr_price, $market, $intermediaries_resellers, $other_channels, $market_, $chanel, $insider, $price_market, $price_chanel , $price_insider);
		SRC::redirect('farmer-small');
		return true;
	}

	public function actionAddSome(){

        $material =  $_POST;
        $id_user = $_SESSION['id_user'];
		
		foreach ($material as $value) {
			$result = Edit::saveCrop1($id_user, $value);
		}
		SRC::redirect('/farmer-small');
		return true;
	}

	public function actionSaveTech(){

		$id = SRC::validator($_POST['id']);
		$name = SRC::validator($_POST['name']);

		$result = Edit::saveTech($id, $name );
		echo $result;
		return true;
	}
}