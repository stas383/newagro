<?php


class Users{

    //Обновление профиля общей части
    public static function saveProfileUser($id, $name, $last_name, $region, $phone){
        $db = Db::getConnection();

        $db->query("UPDATE users SET name = '$name', last_name = '$last_name', region = '$region', phone = '$phone' WHERE id_user = '$id'");
        return true;
    }

    //Обновление профиля части фермер
    public static function saveProfileFarmer ($id, $company_name, $specialization, $address, $position){
        $db = Db::getConnection();

        $db->query("UPDATE profile_farmer SET company_name = '$company_name', specialization = '$specialization', address = '$address', position = '$position' WHERE id_user = '$id'");
        return true;
    }

    public static function getDateUser($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT u.name, u.last_name, u.region, u.phone, pf.company_name, pf.specialization, pf.address, pf.position FROM users as u, profile_farmer as pf WHERE u.id_user = pf.id_user AND u.id_user = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userDate = $result->fetchAll();


        return $userDate;
    }
}