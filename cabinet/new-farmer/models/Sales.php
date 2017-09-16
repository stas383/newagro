<?php


class Sales{

	public static function getAnalytica($id_user){
		$db= Db::getConnection();
		$result = $db->query("SELECT * FROM new_field WHERE id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['analytica'] = $result->fetchAll();

		$db= Db::getConnection();
		$result = $db->query("SELECT * FROM new_lib_crop");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['crop'] = $result->fetchAll();

		return $date;
	}


	public static function updateStock($id_user, $sale_material_id, $sale_quantity,$sale_sum_total){
		$db = Db::getConnection();
		$db->query("UPDATE new_storage_material SET storage_quantity = storage_quantity - '$sale_quantity', storage_sum_total = storage_sum_total - '$sale_sum_total' WHERE storage_id_user = '$id_user' and storage_material_id = '$sale_material_id'");
		return true;
	}

	public static function createSale($id_user, $sale_material_id, $sale_date, $sale_quantity, $sale_sum_total,  $sale_type, $sale_comments){
		$db = Db::getConnection();
		$db->query("INSERT INTO new_come_out (id_user, come_out_date, come_out_material_id, come_out_quantity, come_out_sum_total,  come_out_type, come_out_comments) 
            VALUES('$id_user','$sale_date', '$sale_material_id', '$sale_quantity', '$sale_sum_total',  '$sale_type', '$sale_comments')");
		return true;
	}

	public static function getSale($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT lm.name_material, sm.storage_type_material, co.come_out_date, co.come_out_quantity, co.come_out_sum_total, co.come_out_comments FROM new_come_out co, new_lib_material lm, new_storage_material sm WHERE sm.storage_material_id = co.come_out_material_id and sm.storage_material =  lm.id_material and co.id_user = '$id_user' and co.come_out_type = '1'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['sales'] = $result->fetchAll();

		$result = $db->query("SELECT DISTINCT al.id_action, al.name_ua FROM sm_action_lib al, new_storage_material sm, new_come_out ns WHERE al.id_action = sm.storage_type_material and sm.storage_material_id = ns.come_out_material_id and ns.id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['material'] = $result->fetchAll();


		$result = $db->query("SELECT ch.name_crop_ua, ch.name_crop_en, ps.plane_sale_expected_yield, ps.plane_sale_avr_price, ps.plane_sale_revenue, ps.plane_sale_now FROM new_lib_crop ch, new_plane_sale ps WHERE ch.id_crop = ps.plane_sale_culture and  ps.id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['plane_sale'] = $result->fetchAll();

		$result = $db->query("SELECT ch.name_crop_ua, ch.name_crop_en, ch.id_crop, nf.id_field, nf.field_number, nf.field_name, nf.field_size, nf.field_yield FROM new_field nf, new_lib_crop ch WHERE ch.id_crop = nf.field_id_crop and nf.field_sale_status = '0' and nf.id_user = '$id_user' and nf.field_status='0' ORDER BY ch.id_crop DESC");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date['plane_sales'] = $result->fetchAll();

		return $date;
	}

	public static function planeSales($id_user, $plane_sale_culture, $plane_sale_expected_yield, $plane_sale_avr_price, $plane_sale_revenue, $plane_sale_now){
		$db = Db::getConnection();
		$result = $db->query("SELECT plane_sale_id FROM new_plane_sale WHERE plane_sale_culture = '$plane_sale_culture' and id_user = '$id_user'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$date = $result->fetchAll();
		if($date == false) {
            $db->query("INSERT INTO new_plane_sale(plane_sale_culture, plane_sale_expected_yield, plane_sale_avr_price, plane_sale_revenue, id_user, plane_sale_now) 
        VALUES('$plane_sale_culture','$plane_sale_expected_yield','$plane_sale_avr_price','$plane_sale_revenue','$id_user', '$plane_sale_now')");
        }else {
		    $db->query("DELETE FROM new_plane_sale WHERE id_user = '$id_user' and plane_sale_culture = '$plane_sale_culture'");
            $db->query("INSERT INTO new_plane_sale(plane_sale_culture, plane_sale_expected_yield, plane_sale_avr_price, plane_sale_revenue, id_user, plane_sale_now) 
        VALUES('$plane_sale_culture','$plane_sale_expected_yield','$plane_sale_avr_price','$plane_sale_revenue','$id_user', '$plane_sale_now')");
        }
		//$db->query("UPDATE new_field SET field_sale_status = '1' WHERE id_field = '$plane_sale_field' and id_user = '$id_user'");
		return true;
	}


	public static function createActualSale($id_user,$actual_sale_product, $actual_sale_date, $actual_sale_quantity, $actual_sale_sum, $actual_sale_per_unit,$actual_sale_comments){
		$db = Db::getConnection();

		$db->query("INSERT INTO new_actual_sales(id_user, actual_sale_product, actual_sale_date, actual_sale_quantity, actual_sale_sum, actual_sale_per_unit, actual_sale_comments) 
                    VALUES('$id_user', '$actual_sale_product', '$actual_sale_date', '$actual_sale_quantity', '$actual_sale_sum', '$actual_sale_per_unit', '$actual_sale_comments')");
		$db->query("UPDATE new_product_incoming SET product_now = product_now - $actual_sale_quantity WHERE id_user = '$id_user' and product_type = '$actual_sale_product'");
		return true;
	}

	public static function getSalesPrice($id_user){
	    $db = Db::getConnection();
        $result = $db->query("SELECT DISTINCT ch.name_crop_ua, ch.name_crop_en, ch.id_crop FROM new_lib_crop ch, new_field nf WHERE ch.id_crop = nf.field_id_crop and nf.field_sale_status = '0' and nf.field_status = '0' and  nf.id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_sales_price WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $results = $result->fetchAll();

        foreach ($results as $value){
            $date['price'][$value['id_crop']] = $value;
        }

        return $date;
    }

    public static function addPrice($id_user, $id_crop, $price_1,$price_2,$price_3,$price_4,$price_5,$price_6,$price_7,$price_8,$price_9,$price_10,$price_11,$price_12){
	    $db = Db::getConnection();
	    $result = $db->query("SELECT * FROM new_sales_price WHERE id_user = '$id_user' and id_crop = '$id_crop'");
	    $result->setFetchMode(PDO::FETCH_ASSOC);
	    $date = $result->fetchAll();
	    if($date == false){
            $db->query("INSERT INTO new_sales_price(id_user,id_crop,price_1,price_2,price_3,price_4,price_5,price_6,price_7,price_8,price_9,price_10,price_11,price_12) 
                        VALUES ('$id_user','$id_crop','$price_1','$price_2','$price_3','$price_4','$price_5','$price_6','$price_7','$price_8','$price_9','$price_10','$price_11','$price_12')");
        }else{
            $db->query("UPDATE new_sales_price SET price_1 = '$price_1',price_2 = '$price_2',price_3 = '$price_3',price_4 = '$price_4',price_5 = '$price_5',
                          price_6 = '$price_6',price_7 = '$price_7',price_8 = '$price_8',price_9 = '$price_9',price_10 = '$price_10',price_11 = '$price_11',price_12 = '$price_12' WHERE id_crop='$id_crop' and id_user = '$id_user'");
        }
        return true;
    }
}