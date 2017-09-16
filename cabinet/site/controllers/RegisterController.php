<?php

include_once ROOT.'/cabinet/site/models/Register.php';

//Контроллер регистрации
class RegisterController{

    public function actionRegister(){
        if(isset($_SESSION['id_user'])) {
            SRC::redirect('/panel');
        }
        SRC::template('site', 'register', 'register');
        return true;
    }
    //Получение данных для регистрации
    public function actionRegistered(){
        $name = false;
        $last_name = false;
        $phone = false;
        $email = false;
        $ip = false;
        $password = false;
        $retype_password = false;
        $errors = false;
        if (isset($_POST['submit'])) {
            $name = SRC::validator($_POST['name']);
            $last_name = SRC::validator($_POST['last_name']);
            $phone = SRC::validator($_POST['phone']);
            $email = SRC::validator($_POST['email']);
            $password = md5(SRC::validator($_POST['password']));
            $retype_password = md5(SRC::validator($_POST['retype_password']));
            if ($password !== $retype_password) {
                echo "Данные пароли не совпадают";
            } else {
               $idList = Register::getId($email);
                 if($idList[0] != '')
                {
                  SRC::addAlert($idList, '1', 'Данний користувач уже зареєстрований');
                  SRC::redirect('/register');
                }
                else
                {
                    $email_cnx=explode("@",$email);
                    $verify_code = base64_encode(substr($name,0,3).$email_cnx[0].
                        md5($_SERVER['REMOTE_ADDR']));
                    $result = Register::saveValidate($name, $last_name, $phone, $password, $verify_code, $email);
                    $message = "
                    <html>
                        <body>
                            Для подтверждения регистрации перейдите по ссылке <a href='".SRC::getSrcR()."/acceptEmail/$verify_code/$email'>Ссылка для подтверждения</a>
                        </body>
                    </html>
                    ";
                    mail($email,"Активация аккаунта",$message,"Content-Type: text/html; charset=utf-8","From: info@agrianalytica.com");
                    SRC::addAlert($result, 1, 'На вашу почту было отправлено письмо с подтверждением регистрации!');
                }
                SRC::redirect('/login');
            }
        }
        return true;
    }
    public function actionVerifyemail($verify_code, $email){
        $verify_list = Register::getVerify($verify_code, $email);
            if ($verify_code == $verify_list['verify_code']) {
                $name = $verify_list['name'];
                $last_name = $verify_list['last_name'];
                $phone = $verify_list['phone'];
                $password = $verify_list['password'];
                $date = date('d.m.Y');
                $result = Register::registered($name, $last_name, $phone, $email, $password, $date);
                SRC::addAlert($result, 1, 'Вы были успешо зарегестрированы, войдите в свой аккаунт!');
                SRC::redirect('/login');
            } else {
                SRC::addAlert(true, 1, 'Помилка коду підтвердження!');
                SRC::redirect('/login');
            }
        return true;
    }
}
