<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.08.2017
 * Time: 14:53
 */
include_once ROOT. '/cabinet/business-farmer/models/Login.php';
include_once ROOT. '/cabinet/business-farmer/models/User.php';
include_once ROOT. '/cabinet/business-farmer/models/DataBase.php';

class LoginController{
    public function actionLogin(){
        $id_user=$_SESSION['id_user'];
        $date['user']=Login::getUsers($id_user);
        if( $date['user'] == false) {
            SRC::redirect('/business-farmer/create_user');
            exit();
        }
        SRC::template('business-farmer','login','login',$date);
        return true;
    }
    public function actionLoginOn(){
        $id_user=$_SESSION['id_user'];
        $id_user_b = SRC::validator($_POST['id_user_b']);
        $password = SRC::validator($_POST['password']);
        $result = Login::signIn($id_user,$id_user_b, $password);
        if($result){
            $_SESSION['access_b'] = explode(',',','.$result[0]['access']);
            $_SESSION['id_user_b'] = $result[0]['id_user_b'];
            setcookie("name_user", $result[0]['name'], time()+3600*24*7);
            setcookie("last_name_user", $result[0]['last_name'], time()+3600*24*7);
        }
        //var_dump($id_user_b);
        SRC::redirect('/business-farmer');
        return true;
    }
    public function actionLoginOff(){
        $_SESSION['access_b']=false;
        $_SESSION['id_user_b']=false;
        SRC::redirect('/business-farmer');
        return true;
    }
    public function actionCreateUser(){
        $id_user=$_SESSION['id_user'];
        $date['user']=Login::getUsers($id_user);
        if( $date['user'] == true) {
            SRC::redirect('/business-farmer');
            exit();
        }
        SRC::template('business-farmer','login','createUser');
        return true;
    }
    public function actionSaveUser(){
        $password=SRC::validator($_POST['password']);
        $password2=SRC::validator($_POST['password2']);
        if($password!=$password2){
            SRC::redirect();
            exit();
        }
        $id_user=$_SESSION['id_user'];
        $name=$_COOKIE['name_user'];
        $last_name=$_COOKIE['last_name_user'];
        $id_user_b = User::createUser($id_user, $password, $name, $last_name, '1','admin');
        $_SESSION['access_b'] = 'admim';
        $_SESSION['id_user_b'] =$id_user_b;
        SRC::redirect('/business-farmer');
        return true;
    }
}