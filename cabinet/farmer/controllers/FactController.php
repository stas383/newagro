<?php

include_once ROOT. '/cabinet/farmer/models/Business.php';
include_once ROOT. '/cabinet/farmer/models/Fact.php';

class FactController{
		public function actionGetFact(){
		$user_id = $_SESSION['id_user'];
		$date = Fact::getCropList();

		$date['stattie_name_ua'] = array(
			1=>'ewr',
			2=>'aswe',
			3=>'adf',
			4=>'sdfa',
			);
		SRC::template('farmer', 'panel', 'getFact', $date);
		return true;
	}
	public function actionSaveField(){
		$user_id = $_SESSION['id_user'];
		$name_field = $_POST['name_field'];
		$area_field = $_POST['area_field'];
		Fact::saveField($user_id, $name_field, $area_field);
		return true;
	}
	public function actionGetFactRevenues(){
	    SRC::template('farmer','panel','getFactRevenues');
	    return true;
    }
}