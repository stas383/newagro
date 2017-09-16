<?php


class Users{

    //Обновление профиля общей части
    public static function saveProfileUser($id, $name, $last_name, $phone){
        $db = Db::getConnection();

        $db->query("UPDATE users SET name = '$name', last_name = '$last_name', phone = '$phone' WHERE id_user = '$id'");
        return true;
    }

    //Обновление профиля части фермер
    public static function saveProfileFarmer ($id, $company_name, $specialization, $address, $position, $region){
        $db = Db::getConnection();

        $db->query("UPDATE profile_farmer SET company_name = '$company_name', specialization = '$specialization', address = '$address', position = '$position', region = '$region' WHERE id_user = '$id'");
        return true;
    }

    public static function getDateUser($id){
        $db = Db::getConnection();
        $profile_farmer = $db->query("SELECT * FROM profile_farmer WHERE id_user = '$id'");
		$profile_farmer->setFetchMode(PDO::FETCH_ASSOC);
        $profile = $profile_farmer->fetchAll();
        if($profile==false){
          $db->query("INSERT INTO profile_farmer (id_user) VALUE ('$id')");
        }
        $result = $db->query("SELECT u.name, u.last_name, u.phone, pf.company_name, pf.specialization, pf.address, pf.position, rg.id, rg.areas FROM users as u, profile_farmer as pf, profile_region as rg WHERE u.id_user = pf.id_user AND u.id_user = '$id' AND pf.region = rg.id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userDate["1"] = $result->fetchAll();

        $result = $db->query("SELECT * FROM profile_region");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userDate["2"] = $result->fetchAll();

        return $userDate;
    }
}