<?php
class Business{
    //Список культур и пользовательских данных
    public static function getUserList(){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM profile_farmer ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //
    public static function getUser($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM profile_farmer WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
}