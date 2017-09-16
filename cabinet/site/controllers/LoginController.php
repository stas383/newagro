<?php

include_once ROOT. '/cabinet/site/models/Login.php';

class LoginController{
    //Загрузка страницы авторизации
    public function actionLogin(){
        if(isset($_SESSION['id_user'])){
            SRC::redirect('/panel');
        }
        SRC::template('site', 'login', 'login');
    return true;
    }
    //Авторизация пользователя
    public function actionSingnIn(){
        $email = SRC::validator($_POST['email']);
        $password = SRC::validator(md5($_POST['password']));
        $result = Login::signIn($email, $password);
        if($result){
            $_SESSION['cabinet'] = explode(',',','.$result[0]['type_user']);
            $id_user= $_SESSION['id_user'] = $result[0]['id_user'];
            $result_profile = Login::profileFarmer($id_user);
            if(!empty($result_profile[0]['region'])){
                $_SESSION['farmer_profile'] = true;
            }
            if(empty($result_profile[0]['region'])){
                $_SESSION['farmer_profile'] = false;
            }

            setcookie("name_user", $result[0]['name'], time()+3600*24*7);
            setcookie("last_name_user", $result[0]['last_name'], time()+3600*24*7);
//            setcookie("position", $result[0]['id_user'], time()+3600);
//            setcookie("last_login", $result[0]['id_user'], time()+3600);
           SRC::redirect('/panel');
        }
        SRC::redirect('/login');
        return true;
    }
    //Выход, удаление сессий и куки
    public function actionExit(){
        unset($_SESSION['cabinet']);
        unset($_SESSION['id_user']);
        unset($_SESSION['farmer_profile']);
        SRC::redirect('/login');
    }
    //Страница кабинетов
    public function actionCabinet(){
        if(!isset($_SESSION['id_user'])){
            SRC::redirect('/login');
        }
        if(count($_SESSION['cabinet'])==2){
            SRC::redirect('/'.$_SESSION['cabinet'][1]);
        };
        SRC::template('site', 'cabinet', 'cabinet');
        return true;
    }

}

