<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 28.08.2017
 * Time: 11:59
 */
class Fact{

    public static function getFact($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_field nf, new_crop_culture ncc, new_lib_crop sch WHERE nf.field_id_culture = ncc.id_culture and sch.id_crop = nf.field_id_crop and nf.id_user = '$id_user' and nf.field_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }

    public static function getFactAction($id_user,$id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_action WHERE action_id_culture IN(SELECT field_id_culture FROM new_field WHERE id_field = '$id') ORDER BY action_date_start ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_fact WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $fact = $result->fetchAll();
        foreach ($fact as $arr_fact){
            $date['fact'][$arr_fact['fact_id_action']]=array(
                'fact_materials'=>unserialize($arr_fact['fact_materials']),
                'fact_employee'=>unserialize($arr_fact['fact_employee']),
                'fact_machines'=>unserialize($arr_fact['fact_machines']),
                'fact_services'=>unserialize($arr_fact['fact_services']),
            );
        }

        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        foreach ($res as $value){
            $date['action_type'][$value['action_id']] = $value;
        }

        $result = $db->query("SELECT * FROM new_material_price np, new_lib_material nm WHERE np.id_lib_material = nm.id_material and np.id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as $value){
            $date['material_lib'][$value['id_material_price']] = $value;
        }

        $result = $db->query("SELECT * FROM new_equipment WHERE id_user = '$id_user' AND equipment_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $equipment = $result->fetchAll();

        foreach ($equipment as $item) {
            $date['equipment'][$item['id_equipment']] = $item;
        }

        $result = $db->query("SELECT * FROM new_vehicles WHERE id_user = '$id_user' AND vehicles_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $vehicles = $result->fetchAll();

        foreach ($vehicles as $value){
            $date['vehicles'][$value['id_vehicles']] = $value;
        }

        $result = $db->query("SELECT * FROM new_employee WHERE id_user = '$id_user' AND employee_status='0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        foreach ($res as $value){
            $date['employee'][$value['id_employee']] = $value;
        }

        $result = $db->query("SELECT * FROM new_storage_material st, new_lib_material lm WHERE st.storage_id_user = '$id_user' and st.storage_material_status = '0' AND st.storage_material=lm.id_material");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $storage_material = $result->fetchAll();

        foreach ($storage_material as $arr_storage_material){
            $date['storage_material'][$arr_storage_material['storage_material_id']]=$arr_storage_material;
        }

        return $date;
    }

    public static function getMaterialStorage($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user = '$id_user' and storage_material_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }

    public static function getActualCosts($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_fact nf, new_field nef WHERE nf.id_user = '$id_user' and nf.field_id = nef.id_field");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_field'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_storage_material WHERE storage_id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as $value){
            $date['material'][$value['storage_material_id']] = $value;
        }
        return $date;
    }

    public static function CreateFact($id_user,$data_fact,$field_id,$stattie_id,$material,$amount,$price_one,$price_total){
        $db = Db::getConnection();
        $db->query("UPDATE new_storage_material SET storage_quantity = storage_quantity - '$amount' WHERE storage_material_id = '$material'");
        $db->query("INSERT INTO new_fact (id_user, fact_data, field_id, stattie_id, material, fact_amount, fact_price_one, price_total) 
                    VALUES ('$id_user','$data_fact','$field_id','$stattie_id','$material','$amount','$price_one','$price_total')");
        return true;
    }

    public static function saveFact($id_user,$id_action,$save_material,$save_employee,$save_fuel,$save_services){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_fact WHERE id_user='$id_user' AND fact_id_action='$id_action'");
        $db->query("INSERT INTO new_fact (id_user, fact_id_action,fact_materials,fact_employee,fact_machines,fact_services) 
                    VALUES ('$id_user','$id_action','$save_material','$save_employee','$save_fuel','$save_services')");
        return true;
    }

    public static function createSaleStorage($db,$id_user, $sale_material_id, $sale_date, $sale_quantity, $action_id){
        $db->query("INSERT INTO new_come_out(come_out_material_id,come_out_date,come_out_quantity,action_id,id_user,come_out_type) VALUES ('$sale_material_id','$sale_date','$sale_quantity','$action_id','$id_user',3)");
        return true;
    }
    public static function removeSaleStorage($id_user,$id_action){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_come_out WHERE id_user='$id_user' AND action_id='$id_action'");
        return  true;
    }
}