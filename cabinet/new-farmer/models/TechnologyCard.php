<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 31.07.2017
 * Time: 11:19
 */
class TechnologyCard{
    public static function editAction($action_id,$id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$action_work,$save_material,$save_services,$save_employee,$save_vehicles){
        $db = Db::getConnection();

        $db->query("UPDATE new_action SET action_action_id='$id_action',action_action_type_id='$id_action_type',
          action_date_start='$start_date',action_date_end='$end_date',action_unit='$unit', action_materials='$save_material', action_services='$save_services',action_work='$action_work', action_machines='$save_vehicles', action_employee='$save_employee'
         WHERE id_user ='$id_user' AND action_id='$action_id'");

        return true;
    }

    public static function getNewAction($id_user,$id_culture){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_action WHERE id_user='$id_user' AND action_id_culture=$id_culture ORDER BY action_date_start ASC");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date['new_action'] = $result->fetchAll();

        //Материалы
        $result = $db->query("SELECT * FROM new_lib_material lm, new_material_price pm WHERE pm.id_user='$id_user' AND pm.id_lib_material=lm.id_material");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $materials = $result->fetchAll();
        $date['new_material']=array();
        foreach ($materials as $material){
            $date['new_material'][$material['id_material_price']]=$material;
        }
        //Рабочие
        $result = $db->query("SELECT * FROM new_employee WHERE id_user='$id_user' AND employee_status='0'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $materials = $result->fetchAll();
        $date['new_employee']=array();
        foreach ($materials as $material){
            $date['new_employee'][$material['id_employee']]=$material;
        }

        $result = $db->query("SELECT * FROM new_vehicles WHERE id_user=$id_user AND vehicles_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $vehicles= $result->fetchAll();
        $date['vehicles']=array();
        foreach ($vehicles as $vehicle){
            $date['vehicles'][$vehicle['id_vehicles']]=$vehicle;
        }

        $result = $db->query("SELECT * FROM new_equipment WHERE id_user=$id_user and equipment_status ='0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $equipments= $result->fetchAll();
        $date['equipment']=array();
        foreach ($equipments as $equipment){
            $date['equipment'][$equipment['id_equipment']]=$equipment;
        }

        return $date;
    }
	public static function getTechnologyCard($id_user, $id_crop=false){
        $db = Db::getConnection();
        $crop=false;
        if($id_crop!=false){$crop='AND c.id_crop='.$id_crop;
        $result = $db->query("SELECT * FROM new_lib_crop h, new_crop_culture c WHERE c.id_user = '$id_user' AND c.id_crop=h.id_crop and c.tech_status = '0' $crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();}
        return $date;
	}

	public static function getListTechnologyCard($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop h, new_crop_culture c WHERE c.id_user = '$id_user' AND c.id_crop=h.id_crop and c.tech_status = '0' and copy_status = '0' ORDER BY name_crop_ua ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    //?
	public static function getFieldManagement($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop ch, new_field nf WHERE ch.id_crop = nf.field_id_crop and  nf.id_user = '$id_user' and nf.field_status = '0'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    //ok
    public static function getField($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_field WHERE id_user = '$id_user'");
        $result ->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }
    //ok
    public static function createTechnologyCard($id_user,$name,$id_crop){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop, tech_name) VALUES ('$id_user','$id_crop','$name')");
        $id_culture = $db->lastInsertId();
        return $id_culture;
    }
    //ok
    public static function createAction($id_user,$id_action,$id_action_type,$start_date,$end_date,$unit,$crop_id,$action_work,$save_material,$save_services,$save_vehicles,$save_employee){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_action (id_user,action_id_culture,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,action_work,action_materials,action_machines,action_services,action_employee) 
                                               VALUES ('$id_user','$crop_id','$id_action','$id_action_type','$start_date','$end_date','$unit','$action_work','$save_material','$save_vehicles','$save_services','$save_employee')");
        $action_id = $db->lastInsertId();
        return $action_id;
    }
    //ok
    public static function createNewMaterial($id_user, $id_material, $material_price,$material_unit){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_material_price (id_user, id_lib_material, price_material,material_unit) VALUES ('$id_user','$id_material','$material_price','$material_unit')");
        $id = $db->lastInsertId();
        return $id;
    }
    //ok
    public static function getListTechCart($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_crop_culture WHERE id_user = '$id_user' and tech_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
            $date['tech'][$value['id_crop']][$value['id_culture']]=$value;
        }

        $result = $db->query("SELECT * FROM new_crop_culture WHERE id_user = '$id_user' and tech_status = '0' and copy_status='0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
            $date[$value['id_crop']][$value['id_culture']]=$value;
        }
        return $date;
    }
    //ok
    public static function createNewTech($id_user,$id_crop,$tech_name,$yield,$area){
        $db = Db::getConnection();
        $db->query("INSERT INTO new_crop_culture(id_user, id_crop, tech_name,yield,area) VALUES('$id_user','$id_crop','$tech_name','$yield','$area')");
        $id = $db->lastInsertId();

        /*$db->query("UPDATE new_field SET field_id_culture = '$id' WHERE id_field = '$id_field' and id_user = '$id_user'");*/
        return $id;
    }
    //ok
    public static function removeTechCart($id_culture, $id_user){
        $db = Db::getConnection();
        $db->query("UPDATE new_crop_culture SET tech_status = '1' WHERE id_user = '$id_user' and id_culture = $id_culture");
        $db->query("UPDATE new_field SET field_id_culture = '0' WHERE id_user = '$id_user' and field_id_culture = '$id_culture'");
        return true;
    }
    //ok
    public static function getFieldTech($id){
        $db=Db::getConnection();
        $result = $db->query("SELECT sm.name_crop_ua, sm.name_crop_en, nf.field_id_crop, nf.field_number, nf.field_yield, nf.field_name, nf.field_size, nc.tech_name  FROM new_field nf, new_crop_culture nc, new_lib_crop sm 
                    WHERE nf.field_id_crop = sm.id_crop and nf.field_id_culture = '$id' and nc.id_culture = '$id' and nf.field_status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetch();
        return $date;
    }
    //ok
    public static function changeTechCart($id_user,$id_field,$id_tech_cart){
        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_id_culture = '$id_tech_cart' WHERE id_field = '$id_field' and id_user = '$id_user'");
        return true;
    }
    //or ???????????????
    public static function editField($id_user,$id_field,$id_culture){
        $db = Db::getConnection();
        $db->query("UPDATE new_field SET field_id_culture='$id_culture' WHERE id_user ='$id_user' AND id_field='$id_field'");
        return true;
    }
    //ok
    public static function copyTech($id_tech,$id_user,$amount_work){
        $db=Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop,tech_name,tech_status) SELECT id_user,id_crop,concat(tech_name),tech_status FROM new_crop_culture WHERE id_culture=$id_tech AND id_user=$id_user");
        $id_copy_tech = $db->lastInsertId();

        $db->query("UPDATE new_crop_culture SET copy_status = '1' WHERE id_culture = '$id_copy_tech'");

        $db->query("INSERT INTO new_action (id_user,action_id_culture,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,action_work,action_materials,action_machines,action_services,action_employee) 
        SELECT id_user,$id_copy_tech,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,$amount_work,action_materials,action_machines,action_services,action_employee FROM new_action WHERE action_id_culture=$id_tech AND id_user=$id_user");

        return $id_copy_tech;
    }

    public static function copyTechTemplate($id_tech,$id_user,$tech_name){
        $db=Db::getConnection();
        $db->query("INSERT INTO new_crop_culture (id_user,id_crop,tech_name,tech_status) SELECT id_user,id_crop,concat('$tech_name'),tech_status FROM new_crop_culture WHERE id_culture=$id_tech AND id_user=$id_user");
        $id_copy_tech = $db->lastInsertId();

        $db->query("INSERT INTO new_action (id_user,action_id_culture,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,action_work,action_materials,action_machines,action_services,action_employee) 
        SELECT id_user,$id_copy_tech,action_action_id,action_action_type_id,action_date_start,action_date_end,action_unit,action_work,action_materials,action_machines,action_services,action_employee FROM new_action WHERE action_id_culture=$id_tech AND id_user=$id_user");

        return $id_copy_tech;
    }
    //////////////

    public static function costsTechnologyCard($id_culture, $id_user){

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_action_employee nae, new_employee ne where ne.id_employee = nae.action_employee_id_employee and nae.action_employee_id_action IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['employee'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_equipment nae, new_equipment ne, new_vehicles nv where ne.id_equipment = nae.action_equipment_id and nv.id_vehicles = nae.action_vehicles_id and nae.action_equipment_action_id IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_material nam, new_storage_material nsm WHERE nsm.storage_material_id = nam.id_material and nam.id_action IN(SELECT action_id FROM new_action WHERE action_id_culture = '$id_culture' and id_user = '$id_user')");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material'] = $result->fetchAll();


        $result = $db->query("SELECT * FROM new_field nf, new_action na WHERE na.action_id_culture = nf.field_id_culture and na.action_id_culture = '$id_culture' and na.id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['operation']=$result->fetchAll();
        /*        foreach ($date['operation'] as $operation){
                    $date['operation'][$operation['action_id']]=$operation['name_en'];
                }*/
        foreach ($date['action'] as $action) {
            foreach ($date['employee'] as $employee)if($action['action_id'] == $employee['action_employee_id_action']) {
                $date['sum_pay'][$employee['action_employee_id_action']] += $employee['action_employee_pay'];
            }
            foreach ($date['material'] as $material)if($action['action_id'] == $material['id_action']) {
                $date['sum_material'][$material['id_action']] += $material['action_material_norm']*$material['storage_sum_unit']*$action['field_size'];
            }
            foreach ($date['operation'] as $operation)if($action['action_action_id']==$operation['action_id']){
                foreach ($date['equipment'] as $equipment)if($equipment['action_equipment_action_id']== $action['action_id']) {
                    $date['sum_equipment'][$equipment['action_equipment_action_id']] += $operation['rate']*$action['field_size'];
                }
            }
        }
        foreach ($date['material'] as $material){
            $date['sum_type_material'][$material['storage_type_material']] += $material['action_material_norm']*$material['storage_sum_unit']*$action['field_size'];
        }
        return $date;
    }

    public static function getStorage($id_user){
        $db= Db::getConnection();
        $result = $db->query("SELECT * FROM new_storage_material as m, new_storage as s WHERE storage_id_user=$id_user AND m.storage_location=s.storage_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date= $result->fetchAll();
        return $date;
    }
    public static function removeActionAdd($action_id,$id_user){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_action_employee WHERE action_employee_id_action='$action_id' AND action_employee_id_user='$id_user'");
        $db->query("DELETE FROM new_action_equipment WHERE action_equipment_action_id='$action_id' AND id_user='$id_user'");
        //$db->query("DELETE FROM new_action_material WHERE id_action='$action_id' AND id_user='$id_user'");

        return true;
    }

    public static function removeOperation($id,$id_user){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_action WHERE action_id = '$id' and id_user = '$id_user'");
        return true;
    }

    public static function getTechWithoutField($id_user,$id){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_crop_culture ncc, new_lib_crop nlc WHERE ncc.id_crop = nlc.id_crop and ncc.id_user = '$id_user' and ncc.tech_status ='0' and ncc.id_culture = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetch();
        return $date;
    }

    public static function saveEditTechCardList($id_user,$edit_name_tech_card,$edit_crop_type,$edit_crop_id,$edit_yield,$edit_area,$edit_tech_id){
        $db = Db::getConnection();
        $db->query("UPDATE new_crop_culture SET tech_name = '$edit_name_tech_card',id_crop = '$edit_crop_id',yield = '$edit_yield', area='$edit_area' WHERE id_user = '$id_user' and id_culture = '$edit_tech_id'");


        return true;
    }
}