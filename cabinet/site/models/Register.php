<?php
//Модель регистрации
class Register{
    //--
    public static function registered($name, $last_name, $phone, $email, $password, $date){
        $db = Db::getConnection();
                    $db->query("INSERT INTO users (name, last_name, phone, email, password, type_user, data_register )
                    VALUE ('$name', '$last_name', '$phone', '$email', '$password', 'farmer', '$date')");
                    $db->query("DELETE  FROM validate_info WHERE email = '$email'");
        return true;
     }
     //--
     public static function getId($email){
         $db = Db::getConnection();
         $result = $db->query("SELECT id_user FROM users WHERE email='$email'");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $idList = $result->fetchAll();
         return $idList;
     }
     //--
     public static function saveValidate($name, $last_name, $phone, $password, $verify_code, $email){
         $db = Db::getConnection();
         $db->query("INSERT INTO validate_info (name, last_name, phone, password, verify_code, email)
                    VALUE ('$name', '$last_name', '$phone', '$password', '$verify_code', '$email')");
         return true;
     }
    //--
     public static function getVerify($verify_code, $email){
         $db = Db::getConnection();
         $result = $db->query("SELECT id, name, last_name, phone, password, verify_code FROM validate_info WHERE verify_code='$verify_code' AND email = '$email'");
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $row = $result->fetchAll();

         $verifyList = array();
             $verifyList['id'] = $row[0]['id'];
             $verifyList['name'] = $row[0]['name'];
             $verifyList['last_name'] = $row[0]['last_name'];
             $verifyList['phone'] = $row[0]['phone'];
             $verifyList['password'] = $row[0]['password'];
             $verifyList['verify_code'] = $row[0]['verify_code'];
         return $verifyList;
     }
}