<?php

class Shop{

    public static function getTask(){
        $db= Db::getConnection();
        
        $result = $db->query("SELECT * from task_worker");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as $value) {
            $date['worker'][$value['id']] = $value;
        }

        $result = $db->query("SELECT * from task_priority");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as $value) {
            $date['priority'][$value['id']] = $value;
        }

        $result = $db->query("SELECT * FROM tasks WHERE status = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['task'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM tasks WHERE status = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['close_task'] = $result->fetchAll();

        return $date;
    }

    public static function getEmail($id_worker){

        $db = Db::getConnection();

        $result = $db->query("SELECT email from task_worker WHERE id = '$id_worker'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        return $date;
    }

    public static function AddTasks($id_user, $priority, $id_worker, $date_start, $date_end, $time_to_do, $description){
        $db = Db::getConnection();
        $db->query("INSERT INTO tasks (id_user, priority, worker_id, date_start, date_end, time_to_do, description, status) VALUES ('$id_user','$priority','$id_worker','$date_start','$date_end','$time_to_do','$description', '0')");

        return true;
    }

    public static function CloseTask($id,$date_close, $time_close){
        $db=Db::getConnection();
        $db->query("UPDATE tasks SET status = '1', date_close = '$date_close', time_close = '$time_close' WHERE id = '$id'");
        return true;
    }

}