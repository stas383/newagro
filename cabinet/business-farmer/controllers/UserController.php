<?php
include_once ROOT. '/cabinet/business-farmer/models/User.php';
include_once ROOT. '/cabinet/business-farmer/models/DataBase.php';


class UserController{
    public function actionListUser(){
        $id_user=$_SESSION['id_user'];
        $data['user']=User::getListUser($id_user);
        $data['position']=DataBase::getPosition();
        $data['access']=DataBase::getAccess();
        SRC::template('business-farmer','panel','listUser',$data);
        return true;
    }
    public function actionCreateUser(){
        $id_user=$_SESSION['id_user'];
        $save_access='';
        $access = $_POST['access'];
        if(isset($access)) {
            $N = count($access);
            for($i=0; $i < $N; $i++) {
                $save_access.=SRC::validator($access[$i]).",";
            }
        }
        $save_access=substr($save_access, 0, -1);
        $password=SRC::validator($_POST['password']);
        $name=SRC::validator($_POST['name']);
        $last_name=SRC::validator($_POST['last_name']);
        $position=SRC::validator($_POST['position']);
        User::createUser($id_user, $password, $name, $last_name, $position,$save_access);
        SRC::redirect();
        return true;
    }
    public function actionEditUser(){
        $id_user=$_SESSION['id_user'];
        $b_id_user=SRC::validator($_POST['b_id_user']);
        $save_access='';
        $access = $_POST['access'];
        if(isset($access)) {
            $N = count($access);
            for($i=0; $i < $N; $i++) {
                $save_access.=SRC::validator($access[$i]).",";
            }
        }
        $save_access=substr($save_access, 0, -1);
        $name=SRC::validator($_POST['name']);
        $last_name=SRC::validator($_POST['last_name']);
        $position=SRC::validator($_POST['position']);
        User::editUser($b_id_user, $id_user, $name, $last_name, $position,$save_access);
        SRC::redirect();
        return true;
    }
}

