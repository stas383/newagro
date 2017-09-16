<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 06.06.2017
 * Time: 14:25
 */
class Plan{

    public static function getListPlan($id_user){
        $db=Db::getConnection();
        /*
        $result = $db->query("SELECT * from sm_crop_head ch, sm_crop_culture cc, sm_crop_analytica ca WHERE ch.id_crop = cc.id_crop and cc.id = ca.id_crop and ca.id_user = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['crop'] = $result->fetchAll();
        */

        $result = $db->query("SELECT * FROM sm_crop_head WHERE id_user = $id_user or id_user=0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['crop_us'] = $result->fetchAll();

        $result = $db->query("SELECT price_rent FROM sm_rent_price WHERE id_user = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['price_rent'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM sm_crop_head ch, sm_crop_culture cc WHERE ch.id_crop = cc.id_crop AND cc.id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['tech_cart'] = $result->fetchAll();




        $result = $db->query("SELECT * FROM sm_crop_head ch, sm_crop_culture cc, sm_crop_analityca ca WHERE ch.id_crop = cc.id_crop and cc.id = ca.id_crop and ca.id_user = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['my_crop'] = $result->fetchAll();
        return $list;
    }

    public static function getEditPlan($id_crop, $id_plan)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_action WHERE id=$id_crop and crop_id = $id_plan");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['plan'] = $result->fetchAll();


        $result = $db->query("SELECT * from sm_crop_head ch, sm_crop_culture cc WHERE $id_plan = cc.id and cc.id_crop = ch.id_crop ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['crop_head'] = $result->fetchAll();

        $result = $db->query("SELECT * from sm_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $var = $result->fetchAll();

        foreach ($var as $item) {
            $list['lib'][$item['id_action']] = $item;
        }

        foreach ($list['plan'] as $id_mat) {
            $material = explode(',', $id_mat['id_materials']);
        }
        //var_dump($list['plan']);
            foreach ($material as $key){
                if($key != 0){
                    $result = $db->query("SELECT * FROM sm_material_plan where crop_id = $id_plan and id_material_plan = $key");
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $list_m = $result->fetchAll();

                    foreach ($list_m as $value) {
                        $list['material'][$value['id_material_plan']] = $value;
                    }
                }
            }
            return $list;
        }

    public static function getListForecast($id, $id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_crop_head ch, sm_crop_culture cc, sm_crop_analityca ca WHERE ch.id_crop = cc.id_crop and cc.id = ca.id_crop and ca.id_user = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['data'] = $result->fetchAll();

        return $list;
    }

    public static function getListAction($crop_id,$id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * from sm_action  where id_user = $id_user and crop_id = $crop_id ORDER BY start_date");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['action'] = $result->fetchAll();


        $result = $db->query("SELECT * from sm_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $var = $result->fetchAll();

        foreach ($var as $item){
            $list['lib'][$item['id_action']]=$item;
        }
        return $list;
    }
  public static function getListMaterial($crop_id){
        $db = Db::getConnection();

            $result = $db->query("SELECT * from sm_material_plan mp, sm_crop_analityca ca where mp.crop_id = ca.id_crop and ca.id = $crop_id");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $list = $result->fetchAll();
            foreach ($list as $value){
                $data[$value['id_material_plan']] = $value;
            }
            return $data;
    }

    public static function getListActionForecast($crop_id,$id_user)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * from sm_action sa, sm_crop_analityca ca  where ca.id_user = $id_user and sa.crop_id= ca.id_crop and ca.id = $crop_id ORDER BY start_date");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['action']  = $result->fetchAll();

        $result = $db->query("SELECT * from sm_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $var = $result->fetchAll();

        foreach ($var as $item){
            $list['lib'][$item['id_action']]=$item;
        }
        return $list;
    }
    public static  function  getListEquipment($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM sm_depreciation WHERE id_user = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list = $result->fetchAll();
        return $list;
    }

    public static function removeEquipment($id){
        $db = Db::getConnection();
        $db->query("DELETE FROM sm_depreciation WHERE id_depreciation = $id");
        return true;

    }

    public static function removeCrop($id){
        $db = Db::getConnection();
        $db->query("DELETE FROM sm_crop_analityca WHERE id = $id");
        $db->query("DELETE FROM sm_sales_prod WHERE id_crop = $id");
        return $result;
    }

    public static function UpdatePlan($id,$id_user,$id_action,$id_action_type, $start_date,  $end_date, $str, $unit,  $payment_for_all_area, $payment_for_all_area_own,$payment_for_all_area_rent, $payment_for_all_other){
        $db = Db::getConnection();
        $result = $db->query("UPDATE sm_action SET id_action = $id_action, id_action_type = $id_action_type, start_date = '$start_date', end_date = '$end_date', id_materials = '$str', unit = $unit, payment_for_all_area = $payment_for_all_area,
                              payment_for_all_area_own = $payment_for_all_area_own, payment_for_all_area_rent = $payment_for_all_area_rent, payment_for_all_other = $payment_for_all_other 
                              WHERE id = $id and id_user = $id_user");

        return true;
    }
    public static function UpdateMaterial($material_id, $material_name, $material_norm, $material_price, $id_user, $id_crop, $val){

        $db=Db::getConnection();
        $result = $db->query("UPDATE sm_material_plan SET material_id = '$material_id', material_name = '$material_name', material_norm = '$material_norm', material_price = '$material_price'
                              WHERE user_id = $id_user and crop_id = $id_crop and id_material_plan = $val");

        return true;
    }

    public static function saveRent($id_user, $rent_price){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_user FROM sm_rent_price WHERE id_user = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetchAll();

        if($user[0]['id_user'] == false){
            $db->query("INSERT INTO sm_rent_price (price_rent, id_user) VALUES ('$rent_price','$id_user')");
        }
        else{
            $db->query("UPDATE sm_rent_price SET price_rent = '$rent_price' WHERE id_user = $id_user");
        }
        return true;
    }


    public static function getMaterialBase($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT name_crop_ua,name_crop_en, id from sm_crop_head ch, sm_crop_culture cc WHERE $id_user = cc.id_user and cc.id_crop = ch.id_crop ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['crops'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM sm_material_plan WHERE user_id = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $material = $result->fetchAll();

        $result = $db->query("SELECT id_action, name_ua, name_en FROM sm_action_lib WHERE (user_id = $id_user or user_id = 0)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['materials'] = $result->fetchAll();

        foreach ($material as $value) { 
            foreach ($list['materials'] as $item){    
                foreach ($list['crops'] as $key)if($key['id']==$value['crop_id'] and $item['id_action'] == $value['material_id']) {

                    $list['base'][] = array(
                        'id' => $key['id'],
                        'id_material_plan' => $value['id_material_plan'],
                        'name_crop_ua' => $key['name_crop_ua'],
                        'name_crop_en' => $key['name_crop_en'],
                        'id_material_type'=>$item['id_action'],
                        'material_type_name_ua' => $item['name_ua'],
                        'material_type_name_en' => $item['name_en'],
                        'material_name' => $value['material_name'],
                        'material_norm' => $value['material_norm'],
                        'material_price' => $value['material_price']
                        );
                }
            }
        }

        return $list;
    }

    public static function newAnalytica($id_user, $id_crop, $field_name,$field_area,$tech_name){

        $db = Db::getConnection();

        $db->query("INSERT INTO sm_crop_culture (id_user, id_crop,tech_name) VALUES ('$id_user', '$id_crop','$tech_name')");

        $result = $db->lastInsertId();

        $db->query("INSERT INTO sm_crop_analityca (id_crop, area, id_user, field_name) VALUES ('$result', '$field_area', '$id_user','$field_name')");

        return true;
    }

    public static function getAnalytica($id_user,$field_name,$field_area,$tech_cart){

        $db = Db::getConnection();

        $db->query("INSERT INTO sm_crop_analityca (id_crop, area, id_user, field_name) VALUES ('$tech_cart', '$field_area', '$id_user','$field_name')");

        return true;
    }
}