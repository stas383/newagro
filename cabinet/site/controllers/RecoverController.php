<?php

include_once ROOT.'/cabinet/site/models/Recover.php';
include_once ROOT.'/cabinet/site/models/Register.php';

//Контроллер регистрации
class RecoverController {
    public function actionRecover() {
        if(isset($_SESSION['id_user'])) {
            SRC::redirect('/panel');
        }

        if (isset($_POST['submit'])) {                       
            $email = SRC::validator($_POST['email']);
            $password = SRC::validator($_POST['password']);
            $retype_password = SRC::validator($_POST['retype_password']);

            if ($password !== $retype_password) {
                SRC::addAlert(true, '1', 'Данные пароли не совпадают');
            }
            else {
                $idList = Register::getId($email);
                
                if(!isset($idList[0])) {
                  SRC::addAlert(true, '1', 'Email не существует');                  
                }
                else {
                    Recover::sendNewPassword($email, $password);
                    SRC::addAlert(true, 1, 'Теперь вы должны активировать свой новый пароль! Нажмите на ссылку, которую мы только что отправили на ваш ' . $email . '!');
                    SRC::redirect('/login');
                }
            }
        }
        SRC::template('site', 'recover', 'recover');
        return true;
    }

    public function actionVerifyemail($email, $verify_code, $password) {
        $e = Recover::activation($email, $verify_code, $password);
        if ($e) {
            SRC::addAlert(true, 1, 'Ссылка для восстановления пароля неактуальна!');
        }
        else {
            SRC::addAlert(true, 1, 'Вы успешно восстановили пароль, войдите в свой аккаунт!');
        };

        SRC::redirect('/login');
    }
}