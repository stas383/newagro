<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.08.2017
 * Time: 14:54
 */
class Login{
    public static function getUsers($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT id_user_b,id_company,name,last_name,position FROM b_users WHERE id_company = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }
    public static function signIn($id_user, $id_user_b, $password){
        $db = Db::getConnection();
        $result =  $db->query("SELECT id_user_b, name, last_name,access,position FROM  b_users WHERE  id_user_b = '$id_user_b' AND password = '$password' AND id_company='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $Date = $result->fetchAll();
        return $Date;
    }
}