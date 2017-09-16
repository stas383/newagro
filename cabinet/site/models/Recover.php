<?php
//Модель восстановления
class Recover {
    public static function sendNewPassword($email, $password) {
        $db = Db::getConnection();
        $query = 'SELECT id_user, name FROM users WHERE email = ?';
        $result = $db->prepare($query);
        $result->execute([$email]);        
        $user = $result->fetch(PDO::FETCH_ASSOC);

        $prep_password = md5($password);
        $activation = md5($user['id_user']).md5($email).md5('erj332_$mioet554&*jsgvkl');

        $subject = "Восстановление аккаунта";

        $message = "
            <html>
                <body>
                    Здравствуйте, " . $user['name'] . "!<br />
                    Ваш логин: " . $email . "<br />
                    Ваш новый пароль (после активации): " . $password . "<br />
                    Чтобы завершить процесс cмены пароля, нажмите на кнопку «Активировать пароль» ниже.<br />
                    <a href='".SRC::getSrcR()."/verifyemail/{$email}/{$activation}/{$prep_password}'>
                    Активировать пароль</a><br />

                    Если вы не запрашивали изменение пароля, пожалуйста, игнорируйте это письмо.<br />
                    С уважением,<br />
                    Администрация " . $_SERVER['SERVER_NAME'] .
                "</body>
            </html>
            ";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "From: info@agrianalytica.com " . "\r\n";
        $headers .= "X-Mailer: PHP/". phpversion();
        
        mail($email, $subject, $message, $headers);
    }

    public static function activation($email, $verify_code, $password) {
        $db = Db::getConnection();
        $query = 'SELECT id_user FROM users WHERE email = ?';
        $result = $db->prepare($query);
        $result->execute([$email]);
        $user_id = $result->fetch(PDO::FETCH_COLUMN, 0);

        if (!($user_id && (md5($user_id).md5($email).md5('erj332_$mioet554&*jsgvkl') == $verify_code))) {
            // ошибка
            return true;
        } 
        else {
            // активируем пользователя
            $query = 'UPDATE users SET password = ? WHERE id_user = ? AND email = ?';
            $result = $db->prepare($query);
            $result->execute([$password, $user_id, $email]);
            return false;
        }    
    }
}