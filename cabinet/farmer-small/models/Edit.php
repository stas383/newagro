<?php


class Edit {

	public static function saveCrop($id_user, $name_ua){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_crop FROM sm_crop_head WHERE name_ua = '$name_ua' AND (user_id=$id_user or user_id=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_crop'] == false) {
            $db->query("INSERT INTO sm_crop_head (name_ua, user_id) VALUE ('$name_ua',$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_crop'];
        }
        return $id;
    }


	public static function editCropSetting($id_crop, $id_user){

		$db=Db::getConnection();
		$result = $db->query("SELECT * FROM sm_crop_head ch, sm_crop_culture cc, sm_crop_analityca ca WHERE ch.id_crop = cc.id_crop and cc.id = ca.id_crop and ca.id_user = $id_user ");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$list['my_crop'] = $result->fetchAll();


		$result = $db->query("SELECT * FROM sm_crop_head WHERE id_user=$id_user or id_user=0");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$var = $result->fetchAll();

		$result = $db->query("SELECT * FROM sm_sales_prod WHERE id_crop = $id_crop");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$list['proc'] = $result->fetchAll();

		foreach ($var as $value) {
			$list['head'][$value['id_crop']] = $value;
		}
		return $list;
	}

	public static function editUpdateArea($id_crop, $area){

		$db = Db::getConnection();
		$result = $db->query("UPDATE sm_crop_analityca SET area = $area WHERE id = $id_crop");
		return true;
	}
		public static function editUpdateYaled($id_crop, $yaled){

		$db = Db::getConnection();
		$result = $db->query("UPDATE sm_crop_analityca SET yaled = $yaled WHERE id = $id_crop");
		return true;
	}


	public static function editCropRevenue($id, $id_crop, $avr_price, $market, $intermediaries_resellers, $other_channels,  $market_, $chanel, $insider, $price_market, $price_chanel , $price_insider){
		$db = Db::getConnection();
		$db->query("UPDATE sm_crop_culture SET  avr_price = '$avr_price', market = '$market', intermediaries_resellers = '$intermediaries_resellers', other_channels = '$other_channels' WHERE id = $id_crop");

		$res= $db->query("SELECT id_crop FROM sm_sales_prod WHERE $id_crop = id_crop");
		$res->setFetchMode(PDO::FETCH_ASSOC);
        $result = $res->fetch();
		if($result == false){
			$db->query("INSERT INTO sm_sales_prod(id_crop, id_user, type_employe, sp_13, sp_1, sp_2, sp_3, sp_4, sp_5, sp_6, sp_7, sp_8, sp_9, sp_10 ,sp_11, sp_12)

            VALUE ('$id_crop','$id','market_procent', '$market_[13]', '$market_[1]', '$market_[2]', '$market_[3]', '$market_[4]', '$market_[5]', '$market_[6]', '$market_[7]', '$market_[8]','$market_[9]','$market_[10]','$market_[11]','$market_[12]'),
                  ('$id_crop','$id','market_price', '$price_market[13]', '$price_market[1]', '$price_market[2]', '$price_market[3]', '$price_market[4]', '$price_market[5]', '$price_market[6]', '$price_market[7]', '$price_market[8]','$price_market[9]','$price_market[10]','$price_market[11]','$price_market[12]'),
                  
                  ('$id_crop','$id','insider_procent', '$insider[13]','$insider[1]','$insider[2]','$insider[3]','$insider[4]','$insider[5]','$insider[6]','$insider[7]','$insider[8]','$insider[9]','$insider[10]','$insider[11]','$insider[12]'),
                  ('$id_crop','$id','insider_price', '$price_insider[13]','$price_insider[1]','$price_insider[2]','$price_insider[3]','$price_insider[4]','$price_insider[5]','$price_insider[6]','$price_insider[7]','$price_insider[8]','$price_insider[9]','$price_insider[10]','$price_insider[11]','$price_insider[12]'),                 
                  ('$id_crop','$id','chanel_procent','$chanel[13]','$chanel[1]','$chanel[2]','$chanel[3]','$chanel[4]','$chanel[5]','$chanel[6]','$chanel[7]','$chanel[8]','$chanel[9]','$chanel[10]','$chanel[11]','$chanel[12]'),
                  ('$id_crop','$id','chanel_price','$price_chanel[13]','$price_chanel[1]','$price_chanel[2]','$price_chanel[3]','$price_chanel[4]','$price_chanel[5]','$price_chanel[6]','$price_chanel[7]','$price_chanel[8]','$price_chanel[9]','$price_chanel[10]','$price_chanel[11]','$price_chanel[12]')");

		}
		else{
			$db->query("UPDATE sm_sales_prod SET sp_13 = '$market_[13]', sp_1 = '$market_[1]', sp_2 = '$market_[2]', sp_3 = '$market_[3]', sp_4 = '$market_[4]',sp_5 = '$market_[5]',sp_6 = '$market_[6]',sp_7 =  '$market_[7]',sp_8 = '$market_[8]',sp_9 = '$market_[9]', sp_10 = '$market_[10]',sp_11 = '$market_[11]',sp_12 = '$market_[12]' WHERE id_crop = $id_crop and type_employe = 'market_procent'");
				
			$db->query("UPDATE sm_sales_prod SET sp_13 = '$price_market[13]', sp_1 = '$price_market[1]', sp_2 = '$price_market[2]', sp_3 = '$price_market[3]', sp_4 = '$price_market[4]',sp_5 = '$price_market[5]',sp_6 = '$price_market[6]',sp_7 =  '$price_market[7]',sp_8 = '$price_market[8]',sp_9 = '$price_market[9]', sp_10 = '$price_market[10]',sp_11 = '$price_market[11]',sp_12 = '$price_market[12]' WHERE id_crop = $id_crop and type_employe = 'market_price'");

			$db->query("UPDATE sm_sales_prod SET sp_13 = '$insider[13]', sp_1 = '$insider[1]', sp_2 = '$insider[2]', sp_3 = '$insider[3]', sp_4 = '$insider[4]',sp_5 = '$insider[5]',sp_6 = '$insider[6]',sp_7 =  '$insider[7]',sp_8 = '$insider[8]',sp_9 = '$insider[9]', sp_10 = '$insider[10]',sp_11 = '$insider[11]',sp_12 = '$insider[12]' WHERE id_crop = $id_crop and type_employe = 'insider_procent' ");

			$db->query("UPDATE sm_sales_prod SET sp_13 = '$price_insider[13]', sp_1 = '$price_insider[1]', sp_2 = '$price_insider[2]', sp_3 = '$price_insider[3]', sp_4 = '$price_insider[4]',sp_5 = '$price_insider[5]',sp_6 = '$price_insider[6]',sp_7 =  '$price_insider[7]',sp_8 = '$price_insider[8]',sp_9 = '$price_insider[9]', sp_10 = '$price_insider[10]',sp_11 = '$price_insider[11]',sp_12 = '$price_insider[12]' WHERE id_crop = $id_crop and type_employe = 'insider_price'");

			$db->query("UPDATE sm_sales_prod SET sp_13 = '$chanel[13]', sp_1 = '$chanel[1]', sp_2 = '$chanel[2]', sp_3 = '$chanel[3]', sp_4 = '$chanel[4]',sp_5 = '$chanel[5]',sp_6 = '$chanel[6]',sp_7 =  '$chanel[7]',sp_8 = '$chanel[8]',sp_9 = '$chanel[9]', sp_10 = '$chanel[10]',sp_11 = '$chanel[11]',sp_12 = '$chanel[12]' WHERE id_crop = $id_crop and type_employe = 'chanel_procent'");

			$db->query("UPDATE sm_sales_prod SET sp_13 = '$price_chanel[13]', sp_1 = '$price_chanel[1]', sp_2 = '$price_chanel[2]', sp_3 = '$price_chanel[3]', sp_4 = '$price_chanel[4]',sp_5 = '$price_chanel[5]',sp_6 = '$price_chanel[6]',sp_7 =  '$price_chanel[7]',sp_8 = '$price_chanel[8]',sp_9 = '$price_chanel[9]', sp_10 = '$price_chanel[10]',sp_11 = '$price_chanel[11]',sp_12 = '$price_chanel[12]' WHERE id_crop = $id_crop and type_employe = 'chanel_price'");
				
		}

		return true;
	}




	public static function getList($user_id){
		$db = Db::getConnection();

		$result = $db->query("SELECT * from sm_crop_head where id_user =$user_id or id_user =0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['head'] = $result->fetchAll();
        return true;
	}

	public static function saveCrop1($id_user, $material_id){
		$db = Db::getConnection();

		$result = $db->query("INSERT INTO sm_crop_culture (id_user, id_crop) VALUE ('$id_user', '$material_id')");
		return true;
	}


	/*public static function saveTech($id,$name){
		$db = Db::getConnection();
		$db->query("INSERT INTO sm_tech_cart (name, crop_id) VALUE ('$name', '$id')");
		$last_id = $db->lastInsertId();
		return $last_id;
	}*/
}