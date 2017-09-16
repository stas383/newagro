<?php

class Create{

        public static function saveLibCrop($id_user, $name_ua){
            $db=Db::getConnection();
            $res = $db->query("SELECT id_crop FROM sm_crop_head WHERE name_crop_ua = '$name_ua' AND (id_user=$id_user or id_user=0)");
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res_1 = $res->fetchAll();
            if($res_1[0]['id_crop'] == false) {
                $db->query("INSERT INTO sm_crop_head (name_crop_ua, id_user) VALUE ('$name_ua','$id_user')");
                $id = $db->lastInsertId();
            }else{
                $id=$res_1[0]['id_crop'];
            }
            return $id;
        }

        public static function getList($user_id){
             $db=Db::getConnection();

            $result = $db->query("SELECT * from sm_crop_head where id_user =$user_id or id_user =0");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $list['head'] = $result->fetchAll();

            $result = $db->query("SELECT * FROM sm_action_lib WHERE user_id=$user_id or user_id=0");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $lib = $result->fetchAll();
            foreach ($lib as $item){
                $list['lib'][$item['id_action']]=array(
                    'id_action' => $item['id_action'],
                    'name_ua'=>$item['name_ua'],
                    'name_en'=>$item['name_en'],
                    'type'=>$item['type'],
                );
            }
            return $list;
        }
        public static  function addCrop($id_user, $name_crop_ua, $name_crop_en){
            $db=Db::getConnection();
            $result= $db->query("INSERT INTO sm_crop_head (name_crop_ua, name_crop_en, id_user) VALUE ('$name_crop_ua','$name_crop_en','$id_user')");

            return $result;
        }
    public static  function addEquipment($id_user, $name_ua){
        $db=Db::getConnection();
        $res = $db->query("SELECT id_action FROM sm_action_lib WHERE name_ua = '$name_ua'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_action'] == false) {
            $result = $db->query("INSERT INTO sm_action_lib (name_ua, type, user_id) VALUE ('$name_ua','5','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_action'];
        }
        return $id;
    }

        public static  function saveCrop($id, $id_crop,$area,$avr_price,$crop_capacity, $intermediaries_resellers, $market,$other_channels, $market_,$chanel,$insider,$price_market, $price_chanel,$price_insider){
            $db=Db::getConnection();
            $db->query("INSERT INTO sm_crop_culture (id_user, id_crop, area, avr_price, crop_capacity, intermediaries_resellers, market, other_channels)
            VALUE ('$id','$id_crop','$area','$avr_price','$crop_capacity','$intermediaries_resellers','$market','$other_channels')");
            $result = $db->lastInsertId();

            $db->query("INSERT INTO sm_sales_prod(id_crop, id_user, type_employe, avr_price, sp_1, sp_2, sp_3, sp_4, sp_5, sp_6, sp_7, sp_8, sp_9, sp_10 ,sp_11, sp_12) 
            VALUE ('$result','$id','market_procent', '$market_[13]', '$market_[1]', '$market_[2]', '$market_[3]', '$market_[4]', '$market_[5]', '$market_[6]', '$market_[7]', '$market_[8]','$market_[9]','$market_[10]','$market_[11]','$market_[12]'),
                  ('$result','$id','market_price', '$price_market[13]', '$price_market[1]', '$price_market[2]', '$price_market[3]', '$price_market[4]', '$price_market[5]', '$price_market[6]', '$price_market[7]', '$price_market[8]','$price_market[9]','$price_market[10]','$price_market[11]','$price_market[12]'),
                  ('$result','$id','insider_procent', '$insider[13]','$insider[1]','$insider[2]','$insider[3]','$insider[4]','$insider[5]','$insider[6]','$insider[7]','$insider[8]','$insider[9]','$insider[10]','$insider[11]','$insider[12]'),
                  ('$result','$id','insider_price', '$price_insider[13]','$price_insider[1]','$price_insider[2]','$price_insider[3]','$price_insider[4]','$price_insider[5]','$price_insider[6]','$price_insider[7]','$price_insider[8]','$price_insider[9]','$price_insider[10]','$price_insider[11]','$price_insider[12]'),                 
                  ('$result','$id','chanel_procent','$chanel[13]','$chanel[1]','$chanel[2]','$chanel[3]','$chanel[4]','$chanel[5]','$chanel[6]','$chanel[7]','$chanel[8]','$chanel[9]','$chanel[10]','$chanel[11]','$chanel[12]'),
                  ('$result','$id','chanel_price','$price_chanel[13]','$price_chanel[1]','$price_chanel[2]','$price_chanel[3]','$price_chanel[4]','$price_chanel[5]','$price_chanel[6]','$price_chanel[7]','$price_chanel[8]','$price_chanel[9]','$price_chanel[10]','$price_chanel[11]','$price_chanel[12]')");
            return $result;
        }


        public static function getContent(){
            $id_user = $_SESSION['id_user'];
            $db=Db::getConnection();
            $result=$db->query("SELECT * FROM sm_crop_head WHERE (id_user = '$id_user' or id_user = 0)");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $date_crop_head=$result->fetchAll();
            return $date_crop_head;
        }

        public static function saveTranslate($id, $name){

            $db = Db::getConnection();
            $db->query("UPDATE sm_crop_head SET name_crop_en = '$name' WHERE id_crop = $id");
            return true;
        }

        public static function saveField($id_user, $name_field, $area_field){

             $db = Db::getConnection();
            
            $db->query("INSERT INTO sm_field (id_user, name_field, area_field) VALUES ('$id_user', '$name_field', '$area_field')");
            SRC::redirect('farmer-small/content');
            return true;
        }
}