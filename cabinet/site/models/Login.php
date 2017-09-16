<?php


class Login{

    //
    public static function signIn($email, $password){

        $db = Db::getConnection();
        $result =  $db->query("SELECT type_user, id_user, name, last_name FROM users  WHERE  email = '$email' AND password = '$password'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $Date = $result->fetchAll();

        return $Date;
    }
    public static function profileFarmer($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM profile_farmer WHERE id_user='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $Date = $result->fetchAll();
        return $Date;
    }
}