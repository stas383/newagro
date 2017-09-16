<?php


class Action {
    // Загрузка списка типов операций
    public static function getListActionType(){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_action_type, name_action_type_ua, unit FROM action_type_veg");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listActionType = $result->fetchAll();

        return $listActionType;
    }

    // Загрузка списка операций
    public static function getListAction(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM action_veg, action_type_veg WHERE action_veg.action_type=action_type_veg.id_action_type AND NOT action_veg.status_delete = 1");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listAction = $result->fetchAll();

        return $listAction;
    }

    //Добавление нового типа операций в БД
    public static function addСreateActionType($name, $unit){
        $db = Db::getConnection();

        $db->query("INSERT INTO action_type_veg (name_action_type_ua, unit) VALUE ('$name', '$unit')");

        return true;
    }

    //Редактирование типов операций
    public  static function editSaveActionType($id, $type, $value){
        $db = Db::getConnection();

        $db->query("UPDATE action_type_veg SET $type = '$value' WHERE id_action_type = '$id'");

        return true;
    }

    //Добавление операций в БД
    public static function addСreateAction($name_action_ua, $action_type, $drivers, $driver_class, $driver_bonus, $workers, $worker_class, $worker_bonus){
        $db = Db::getConnection();

        $db->query("INSERT INTO action_veg (name_action_ua, action_type, drivers, driver_class, driver_bonus, workers, worker_class, worker_bonus) 
              VALUE ('$name_action_ua', '$action_type', '$drivers', '$driver_class', '$driver_bonus', '$workers', '$worker_class', '$worker_bonus')");

        return true;
    }

    //Удаление оперепиции
    public static function removeAction($id){
        $db = Db::getConnection();

        $db->query("UPDATE action_veg SET status_delete = '1' WHERE id_action = $id");

        return true;
    }

    //Загрузка операций
    public static function getActionId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_action, name_action_ua, action_type, drivers, driver_class, driver_bonus, workers, worker_class, worker_bonus, status_delete 
                              FROM action_veg WHERE id_action = $id");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idAction['action'] = $result->fetchAll();

        $result = $db->query("SELECT id_action_type, name_action_type_ua FROM action_type_veg");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idAction['action_type'] = $result->fetchAll();

        return $idAction;
    }


    //Редактирование операций
    public static function editSaveAction($id, $name_action_ua, $action_type, $drivers, $driver_class, $driver_bonus, $workers, $worker_class, $worker_bonus){
        $db = Db::getConnection();

        $db->query("UPDATE action_veg SET name_action_ua = '$name_action_ua', action_type = '$action_type', drivers = '$drivers', driver_class = '$driver_class', driver_bonus = '$driver_bonus', workers = '$workers', worker_class = '$worker_class', worker_bonus = '$worker_bonus' WHERE id_action = '$id'");

        return true;
    }

}