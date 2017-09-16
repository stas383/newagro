<?php

include_once ROOT. '/cabinet/farmer/models/Form.php';

class FormController{
    //Загрузка страницы формы 1
    public function actionGetForm1($table){
        $date['sidebar_menu']='on';
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = SRC::validator($_SESSION['bank_user_id']);
        $date["title"] = Form::getForm1Title($table);
        $date["date"] = Form::getForm1Date($id_user, $table);
        $date["table"]= $table;
        SRC::template('bank', 'panel', 'form'.$table, $date);
        return true;

    }
    public function actionGetForm1m($table){
        $result['sidebar_menu']='on';
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = SRC::validator($_SESSION['bank_user_id']);
        $result['title'] = Form::getForm1mTitle($table);
        $result["date"] = Form::getForm1Date($id_user, $table);
        $result["table"] = $table;
        SRC::template('bank', 'panel', 'form_m'.$table, $result);
        return true;
    }
    //Загрузка страницы формы 50
    public function actionGetForm50($year){
        $date['sidebar_menu']='on';
        if($year!=2014 and $year!=2015 and $year!=2016)  exit(SRC::redirect());

        $id = $_SESSION['bank_user_id'];
        $date["crop"] = Form::getMyCrop($id);
        $date["form"] = Form::getForm50($id, $year);
        $date["year"]=$year;
        SRC::template('bank', 'panel', 'form50', $date);

        return true;
    }

}

