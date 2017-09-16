<?php
class User{
    public static function getListUser($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM b_users WHERE id_company = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }
    public static function createUser($id_user, $password, $name, $last_name, $position,$save_access){
        $db=Db::getConnection();
        $db->query("INSERT INTO b_users(id_company, password, name, last_name, position, access) VALUES ('$id_user', '$password', '$name', '$last_name', '$position', '$save_access')");
        $id = $db->lastInsertId();
        return $id;
    }
    public static function editUser($b_id_user, $id_user, $name, $last_name, $position,$save_access){
        $db=Db::getConnection();
        $db->query("UPDATE b_users SET name='$name', last_name='$last_name', position='$position', access='$save_access' WHERE id_company = $id_user and id_user_b = $b_id_user");
        return true;
    }
}