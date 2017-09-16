<?php

/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 31.05.2017
 * Time: 11:39
 */
include_once ROOT . '/cabinet/shop/models/Shop.php';



class ShopController
{
    public function actionTask(){

        $date = Shop::getTask();
        SRC::template('shop', 'shop','task',$date);
    }

    public function actionAddTask(){

        $id_user = $_SESSION['id_user'];
        $id_worker = $_POST['worker'];
        $date_start = $_POST['data_start'];
        $date_end = $_POST['data_end'];
        $priority = $_POST['priority'];
        $time_to_do = $_POST['time_to_do'];
        $description = $_POST['description'];
        Shop::AddTasks($id_user, $priority, $id_worker, $date_start, $date_end, $time_to_do, $description);
        $result = Shop::getEmail($id_worker);
        
        $email = $result[0]['email'];

        $message = "<!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
            Дата початку: $date_start; <br>
            Дата закінчення: $date_end; <br>
            Описання задачі: $description;
        </body>
        </html>";
        mail($email,"TASK",$message,"Content-Type: text/html; charset=utf-8","From: info@agrianalytica.com");

        SRC::redirect('/shop/showTask');
        return true;
    }

    public function actionShowTask(){

        $date = Shop::getTask();
        SRC::template('shop','shop','showTask',$date);
        return true;
    }

    public function actionEndTask(){
        $id = $_POST['id'];
        $date_close = $_POST['date_close'];
        $time_close = $_POST['time_close'];
        Shop::CloseTask($id, $date_close, $time_close);
        SRC::redirect('shop/showTask');
        echo "Закрито";
        return true;
    }

    public function actionShowCloseTask(){

        $date = Shop::getTask();
        SRC::template('shop','shop','showCloseTask',$date);
        return true;
    }
}