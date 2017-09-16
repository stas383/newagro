<?php

include_once ROOT. '/cabinet/distributor/models/Distributor.php';

class DistributorController {

    //Загрузка страницы профиля
    public function actionProfile(){

        $dateDistributor = Distributor::getDateProfile(SRC::validator($_SESSION['id_user']));

        SRC::template('distributor', 'panel', 'profile', $dateDistributor);
        return true;
    }
    //Сохранение профиля
    public function actionSaveProfile(){
        $id = $_SESSION['id_user'];
        $company_name = $_POST['company_name'];
        $distributor_type = $_POST['distributor_type'];
        $address = $_POST['address'];
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $position = $_POST['position'];
        $phone = $_POST['phone'];
        $img = $this->saveImg();
        $result = Distributor::saveProfileDistibutor($id, $company_name, $distributor_type, $address, $position );
        $result = Distributor::saveProfileUser($id, $name, $last_name, $phone);
        setcookie("name_user", $name, time()+3600*24*7, '/');
        setcookie("last_name_user", $last_name, time()+3600*24*7, '/');
        SRC::addAlert($result, 1, $img);

        SRC::redirect();

        return true;
}

public function saveImg() {
    $path = $_SERVER['DOCUMENT_ROOT'].'/cabinet/distributor/template/images/distributor/';
    $id = $_SESSION['id_user'];
    if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 )) {
        $tmp_name = $_FILES['userfile']['tmp_name'];
        move_uploaded_file($tmp_name, $path . $id . '.png');
        $msg = 'Профіль успішно збережений!';
        return $msg;
    }
    else
    {
        $msg = 'Помилка завантаження зображення';
        return $msg;
    }
   return true;
}
}