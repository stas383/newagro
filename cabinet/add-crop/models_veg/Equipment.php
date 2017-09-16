<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.03.2017
 * Time: 17:05
 */

class Equipment{
    // Загрузка списка операций, тракторов, прицепов, топлива
    public static function getListActionWorkingPowerFuel()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM action_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM fuel_type_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['fuel'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM working_eqt_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['working'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM power_eqt_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['power'] = $result->fetchAll();

        return $data;
    }

    // Загрузка списка пар техники
    public static function getListEquipment()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM equipment_veg AS eq, action_veg As ac, fuel_type_veg AS fuel, working_eqt_veg AS wor, power_eqt_veg AS pow WHERE eq.action_id=ac.id_action AND eq.fuel_type_id=fuel.id_fuel AND eq.working_eqt_id=wor.id_working AND eq.power_eqt_id=pow.id_power AND NOT eq.status_delete = 1 ORDER BY id_equipment");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }

    //Добавление трактора
    public static function createWorking($working_name){
        $db = Db::getConnection();
        $db->query("INSERT INTO  working_eqt_veg(name_working_ua) VALUE ('$working_name')");
        $working_eqt_id = $db->lastInsertId();
        return $working_eqt_id;
    }

    //Добавление машины
    public static function createPower($power_name){
        $db = Db::getConnection();
        $db->query("INSERT INTO  power_eqt_veg(name_power_ua) VALUE ('$power_name')");
        $power_eqt_id = $db->lastInsertId();
        return $power_eqt_id;
    }

    //Длбавление пары техники
    public static function createEquipment($working_eqt_id, $power_eqt_id, $action_id, $fuel_type_id, $fuel_cons, $productivity){
        $db = Db::getConnection();
        $db->query("INSERT INTO  equipment_veg(action_id, working_eqt_id, power_eqt_id, fuel_type_id, 
              fuel_cons_1, fuel_cons_2, fuel_cons_3, fuel_cons_4, fuel_cons_5, fuel_cons_6, fuel_cons_7, fuel_cons_8, fuel_cons_9,
              productivity_1,productivity_2,productivity_3,productivity_4,productivity_5,productivity_6,productivity_7,productivity_8,productivity_9)
                VALUE ('$action_id','$working_eqt_id','$power_eqt_id','$fuel_type_id',
                '$fuel_cons[1]','$fuel_cons[2]','$fuel_cons[3]','$fuel_cons[4]','$fuel_cons[5]','$fuel_cons[6]','$fuel_cons[7]','$fuel_cons[8]','$fuel_cons[9]',
                '$productivity[1]','$productivity[2]','$productivity[3]','$productivity[4]','$productivity[5]','$productivity[6]','$productivity[7]','$productivity[8]','$productivity[9]')");
        return true;
    }

    //Загрузка одной пары
    public static function getOneEquipment($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM equipment_veg WHERE id_equipment=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data['OneEquipment'] = $result->fetchAll();
        return $data;
    }

    //Сохранение изменений
    public static function editSaveEquipment($id_equipment, $working_eqt_id, $power_eqt_id, $action_id, $fuel_type_id, $fuel_cons, $productivity){
        $db = Db::getConnection();
        $save="";
        for ($p = 1; $p <= 9; $p++) {
            $save=$save."fuel_cons_".$p."='".$fuel_cons[$p]."', productivity_".$p."='".$productivity[$p]."', ";
        }
        $db->query("UPDATE equipment_veg SET $save action_id='$action_id', working_eqt_id='$working_eqt_id', power_eqt_id='$power_eqt_id', fuel_type_id='$fuel_type_id' WHERE id_equipment = '$id_equipment'");
        return true;
    }

    //Удаление пары техники
    public static function removeEquipment($id){
        $db = Db::getConnection();
        $db->query("UPDATE equipment_veg SET status_delete = '1' WHERE id_equipment = $id");
        return true;
    }

    //Список тракторов
    public static function getListWorking(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM working_eqt_veg WHERE NOT id_working = 1 ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }

    //Список с/г машин
    public static function getListPower(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM power_eqt_veg WHERE NOT id_power = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }

    //Сохранения изменений в названиях
    public  static function editSaveEquipmentName($id, $type, $value){
        $db = Db::getConnection();
        $table= $type."_eqt_veg";
        $name = "name_".$type."_ua";
        $id_sql="id_".$type;
        $db->query("UPDATE $table SET  $name = '$value' WHERE $id_sql = $id");
        return true;
    }
}