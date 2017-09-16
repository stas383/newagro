<?php


class Distributor{

    //Обновление профиля общей части
    public static function getDateProfile($id){
        $db = Db::getConnection();
        $profile_distributor = $db->query("SELECT * FROM profile_distributor WHERE id_user = '$id'");
        $profile_distributor->setFetchMode(PDO::FETCH_ASSOC);
        $profile = $profile_distributor->fetchAll();
        if($profile==false){
            $db->query("INSERT INTO profile_distributor (id_user) VALUE ('$id')");
        }
        $result = $db->query("SELECT u.name, u.last_name, u.phone, pd.company_name, pd.address, pd.position, pd.distributor_type FROM users as u, profile_distributor as pd WHERE u.id_user = pd.id_user AND u.id_user = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $dateDistributor = $result->fetchAll();


        return $dateDistributor;
    }

    //Обновление профиля части дистрибютора
    public static function saveProfileDistibutor($id, $company_name, $distributor_type, $address, $position ){
        $db = Db::getConnection();

        $db->query("UPDATE profile_distributor SET company_name = '$company_name', distributor_type = '$distributor_type', address = '$address', position = '$position' WHERE id_user = '$id'");
        return true;
    }
    public static function createProfileDistributor($id, $position, $address , $company_name, $distributor_type){
        $db = Db::getConnection();
        $db->query("INSERT INTO profile_distributor(id_user, position, address, company_name, distributor_type) VALUE ('$id', '$position', '$address', '$company_name', '$distributor_type')");
        return true;
    }
    //Обновление профиля части пользователь
    public static function saveProfileUser ($id, $name, $last_name, $phone){
        $db = Db::getConnection();

        $db->query("UPDATE users SET name = '$name', last_name = '$last_name', phone = '$phone' WHERE id_user = '$id'");
        return true;
    }

//    //Обновление профиля части фермер
//    public static function saveProfileFarmer ($id, $company_name, $specialization, $address, $position){
//        $db = Db::getConnection();
//
//        $db->query("UPDATE profile_farmer SET company_name = '$company_name', specialization = '$specialization', address = '$address', position = '$position' WHERE id_user = '$id'");
//        return true;
//    }
//
//    public static function getDateUser($id){
//        $db = Db::getConnection();
//
//        $result = $db->query("SELECT u.name, u.last_name, u.region, u.phone, pf.company_name, pf.specialization, pf.address, pf.position FROM users as u, profile_farmer as pf WHERE u.id_user = pf.id_user AND u.id_user = '$id'");
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//        $userDate = $result->fetchAll();
//
//
//        return $userDate;
//    }
}