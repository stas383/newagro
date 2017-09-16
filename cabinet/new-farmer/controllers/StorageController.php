<?php

include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/Storage.php';
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/TechnologyCard.php';


class StorageController{

	public function actionStorage(){
		$id_user = $_SESSION['id_user'];
		Storage::updatePriceAndMass();
		/*$date['material_type'] = DataBase::getActionLib($id_user);*/
		//$date['material_types'] = DataBase::getActionLibs($id_user);
		$date['material_lib'] = DataBase::getMaterial($id_user);
		$date['storage'] = Storage::getStorage($id_user);
		$date['incoming_material'] = Storage::getIncomingMaterial($id_user);
		$date['field_management'] = TechnologyCard::getFieldManagement($id_user);
		$date['fuel'] = DataBase::getTypeFuel();
		$date['fert'] = DataBase::getTypeFert();
		$date['ppa'] = DataBase::getTypePPA();
		$date['products'] = Storage::getProducts($id_user);
		$date['crop'] = DataBase::getCropName($id_user);


		/*foreach ($date['storage']['storage_material_fact'] as $storage_material){
            $total_price[$storage_material['storage_material_id']]=0;
            $total_price_sale[$storage_material['storage_material_id']]=0;

		    foreach ($date['incoming_material'] as $incoming_material)if($incoming_material['come_out_material_id']==$storage_material['storage_material_id']) {
                if($incoming_material['come_out_type']==1){
                    $total_price_sale[$storage_material['storage_material_id']]+=$incoming_material['come_out_sum_total'];
                }
                if($incoming_material['come_out_type']==2){
                    $total_price[$storage_material['storage_material_id']]+=$incoming_material['come_out_sum_total'];
                }

            }
            $date['ex']['storage_price'][$storage_material['storage_material_id']]=
                ($total_price_sale[$storage_material['storage_material_id']]+$total_price[$storage_material['storage_material_id']])/($date['incoming_material']['out_material'][$storage_material['storage_material_id']]+$date['incoming_material']['come_material'][$storage_material['storage_material_id']]);

            $date['ex']['storage_quantity'][$storage_material['storage_material_id']]=$date['incoming_material']['come_material'][$storage_material['storage_material_id']]-
                $date['incoming_material']['out_material'][$storage_material['storage_material_id']];
        }*/



		SRC::template('new-farmer','new','storage',$date);
		return true;
	}

	public function actionCreateStorage(){
		$id_user = $_SESSION['id_user'];
		$storage_type_material = SRC::validatorPrice($_POST['storage_type_material']);
		if($storage_type_material == 2){
            $storage_subtype_material = SRC::validatorPrice($_POST['storage_subtype_fert']);
            $storage_unit = SRC::validatorPrice($_POST['storage_unit_fert']);
        }elseif ($storage_type_material == 3){
            $storage_subtype_material = SRC::validatorPrice($_POST['storage_subtype_ppa']);
            $storage_unit = SRC::validatorPrice($_POST['storage_unit_ppa']);
        }elseif ($storage_type_material == 4){
            $storage_subtype_material = SRC::validatorPrice($_POST['storage_subtype_fuel']);
            $storage_unit = SRC::validatorPrice($_POST['storage_unit_fuel']);
        }else{
            $storage_subtype_material = SRC::validatorPrice($_POST['storage_subtype_material']);
            $storage_unit = SRC::validatorPrice($_POST['storage_unit_seed']);
        }

        if($storage_unit == '3'){
            $storage_quantity = SRC::validatorPrice($_POST['storage_quantity'])*1000;
        }else{
            $storage_quantity = SRC::validatorPrice($_POST['storage_quantity']);
        }
		$storage_material = DataBase::saveLibMaterial($id_user,SRC::validator($_POST['name_material']),$storage_type_material);
		$storage_sum_total = SRC::validatorPrice($_POST['storage_sum_total']);
		$storage_date = SRC::validator($_POST['storage_date']);
		//$storage_name = SRC::validator($_POST['storage_location']);
		$storage_comments = SRC::validator($_POST['storage_comments']);
		//$storage_id = Storage::saveStorage($id_user,$storage_name);
        $storage_type =2;

		$storage_material_id = Storage::createStorage($id_user,$storage_type_material,$storage_subtype_material,$storage_material,$storage_unit,$storage_quantity,$storage_sum_total,$storage_date, $storage_comments);

		Storage::createIncomingMaterial($id_user,$storage_date,$storage_material_id,$storage_quantity,$storage_sum_total,$storage_type,$storage_comments);
		SRC::redirect('/new-farmer/storage');
		return true;
	}

	public function actionIncomingStorage(){
		$id_user = $_SESSION['id_user'];
		$incoming_date = SRC::validator($_POST['incoming_date']);
		$incoming_material = SRC::validatorPrice($_POST['incoming_material']);
		$incoming_quantity = SRC::validatorPrice($_POST['incoming_quantity']);
		$incoming_sum_total = SRC::validatorPrice($_POST['incoming_sum_total']);
		$incoming_type = SRC::validatorPrice($_POST['type_come']);
		$incoming_comments = SRC::validator($_POST['incoming_comments']);
		
		//Storage::changeStorageStock($id_user, $incoming_material, $incoming_quantity,$incoming_sum_total);

        Storage::createIncomingMaterial($id_user, $incoming_date, $incoming_material, $incoming_quantity, $incoming_sum_total, $incoming_type, $incoming_comments);
        Storage::updatePriceAndMass();
        SRC::redirect('/new-farmer/storage');
		return true;
	}



	public function actionGetAllNeedMaterial(){

		//$id_budget=SRC::validatorPrice($id_budget);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
		//$date['material_types'] = DataBase::getActionLibs($id_user);
		$date['storage'] = Storage::getStorage($id_user);
		SRC::template('new-farmer','new','allNeedMaterial',$date);
	}


	public function actionIncomingProducts(){

		$id_user = $_SESSION['id_user'];
		$product_date = SRC::validator($_POST['product_date']);
		$product_type = SRC::validatorPrice($_POST['product_type']);
		$product_storage_location = Storage::saveStorage($id_user,SRC::validatorPrice($_POST['product_storage_location']));
		$product_quantity = SRC::validatorPrice($_POST['product_quantity']);
		$product_comments = SRC::validator($_POST['product_comments']);

		Storage::saveIncomingProducts($product_date,$product_type,$product_storage_location,$product_quantity,$product_comments,$id_user);

		SRC::redirect('/new-farmer/storage');
	}
}