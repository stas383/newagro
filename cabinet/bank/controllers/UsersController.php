<?php

include_once ROOT. '/cabinet/bank/models/Users.php';

class UsersController{

    //Загрузка страницы прфоиля
    public function actionProfile()
    {
        $userDate = Users::getDateUser(SRC::validator($_SESSION['id_user']));

        SRC::template('farmer', 'panel', 'profile', $userDate);

        return true;

    }

    //Сохранение профиля
    public function actionSaveProfile(){
        $id = SRC::validator($_SESSION['id_user']);
        $company_name = SRC::validator($_POST['company_name']);
        $specialization = SRC::validator($_POST['specialization']);
        $region = SRC::validator($_POST['region']);
        $address = SRC::validator($_POST['address']);
        $name = SRC::validator($_POST['name']);
        $last_name = SRC::validator($_POST['last_name']);
        $position = SRC::validator($_POST['position']);
        $phone = SRC::validator($_POST['phone']);
        $zona = SRC::validator($_POST['zona']);
        $_SESSION["zone"]=$zona;


        $result = Users::saveProfileUser($id, $name, $last_name, $phone);
        $result = Users::saveProfileFarmer ($id, $company_name, $specialization, $address, $position, $region);

        setcookie("name_user", $name, time()+3600*24*7, '/');
        setcookie("last_name_user", $last_name, time()+3600*24*7, '/');


        SRC::addAlert($result, 1, 'Профіль успішно збережений!');
        SRC::redirect();

        return true;
    }

}

