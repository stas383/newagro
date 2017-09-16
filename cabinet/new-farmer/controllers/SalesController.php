<?php

include_once ROOT.'/cabinet/new-farmer/models/Sales.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
class SalesController {

	public function actionSales(){
		$id_user = $_SESSION['id_user'];
		
		$date= Sales::getSale($id_user);

		foreach ($date['plane_sales'] as $plane_sales){
		    $date['sum_crop'][$plane_sales['id_crop']]++;
		    $date['sum_yield'][$plane_sales['id_crop']] += $plane_sales['field_yield']*$plane_sales['field_size']*100;
        }

		SRC::template('new-farmer','new','sales',$date);
		return true;
	}

	public function actionCreateSales(){

		$id_user = $_SESSION['id_user'];
		$sale_material_id = SRC::validatorPrice($_POST['sale_id_material']);
		$sale_date = SRC::validator($_POST['sale_date']);
		$sale_quantity = SRC::validatorPrice($_POST['sale_quantity']);
		$sale_sum_total = SRC::validatorPrice($_POST['sale_sum_total']);
		$sale_comments = SRC::validator($_POST['sale_comments']);
		$sale_stock = SRC::validatorPrice($_POST['sale_stock']);
		$sale_type = SRC::validatorPrice($_POST['type_out']);
		if($sale_quantity>$sale_stock){
			SRC::redirect('/new-farmer/storage');
		}else{
			//Sales::updateStock($id_user, $sale_material_id, $sale_quantity,$sale_sum_total);

            Sales::createSale($id_user, $sale_material_id, $sale_date, $sale_quantity, $sale_sum_total, $sale_type, $sale_comments);
            include_once ROOT.'/cabinet/new-farmer/models/Storage.php';
            Storage::updatePriceAndMass();
            SRC::redirect('/new-farmer/storage');
		}
		
		return true;
	}

	public function actionPlaneSale(){
		$id_user = $_SESSION['id_user'];
		$plane_sale_culture = SRC::validatorPrice($_POST['culture']);
		$plane_sale_expected_yield = SRC::validatorPrice($_POST['expected_yield']);
		$plane_sale_now = SRC::validatorPrice($_POST['plane_to_sale']);
		$plane_sale_avr_price = SRC::validatorPrice($_POST['avr_price']);
		$plane_sale_revenue = SRC::validatorPrice($_POST['revenue']);

		Sales::planeSales($id_user, $plane_sale_culture, $plane_sale_expected_yield, $plane_sale_avr_price, $plane_sale_revenue,$plane_sale_now);
	}

	public function actionActualSale(){
		$id_user = $_SESSION['id_user'];
		$actual_sale_product = SRC::validatorPrice($_POST['actual_sale_product']);
		$actual_sale_date = SRC::validator($_POST['actual_sale_date']);
		$actual_sale_quantity = SRC::validatorPrice($_POST['actual_sale_quantity']);
		$actual_sale_sum = SRC::validatorPrice($_POST['actual_sale_sum']);
		$actual_sale_per_unit = SRC::validatorPrice($_POST['actual_sale_per_unit']);
		$actual_sale_comments = SRC::validator($_POST['actual_sale_comments']);

		Sales::createActualSale($id_user,$actual_sale_product, $actual_sale_date, $actual_sale_quantity, $actual_sale_sum, $actual_sale_per_unit,$actual_sale_comments);
		SRC::redirect('/new-farmer/storage');
	}


	public function actionAddSalePrice(){
	    $id_user = $_SESSION['id_user'];
        $date = Sales::getSalesPrice($id_user);
	    SRC::template('new-farmer','new','salePrice',$date);
    }

    public function actionAddPrice(){
	    $id_user = $_SESSION['id_user'];
	    $id_crop = SRC::validatorPrice($_POST['id_crop']);
	    $price_1 = SRC::validatorPrice($_POST['price_1']);
	    $price_2 = SRC::validatorPrice($_POST['price_2']);
	    $price_3 = SRC::validatorPrice($_POST['price_3']);
	    $price_4 = SRC::validatorPrice($_POST['price_4']);
	    $price_5 = SRC::validatorPrice($_POST['price_5']);
	    $price_6 = SRC::validatorPrice($_POST['price_6']);
	    $price_7 = SRC::validatorPrice($_POST['price_7']);
	    $price_8 = SRC::validatorPrice($_POST['price_8']);
	    $price_9 = SRC::validatorPrice($_POST['price_9']);
	    $price_10 = SRC::validatorPrice($_POST['price_10']);
	    $price_11 = SRC::validatorPrice($_POST['price_11']);
	    $price_12 = SRC::validatorPrice($_POST['price_12']);
        Sales::addPrice($id_user, $id_crop, $price_1,$price_2,$price_3,$price_4,$price_5,$price_6,$price_7,$price_8,$price_9,$price_10,$price_11,$price_12);
        SRC::redirect('/new-farmer/sales_price');
	    return true;
    }
}