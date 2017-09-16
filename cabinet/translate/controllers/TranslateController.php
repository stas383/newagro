<?php

/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 31.05.2017
 * Time: 11:39
 */
include_once ROOT . '/cabinet/translate/models/Translate.php';



class TranslateController
{
    public function actionTranslate(){
        $result = Translate::getCrop();
        //var_dump($result);
        SRC::template('translate','trans','trans', $result);
        return true;
    }
    public function actionAddTranslate(){
        $id = SRC::validator($_POST['id']);
        $table = SRC::validator($_POST['table']);
        $name_id = SRC::validator($_POST['name']);
        $title = SRC::validator($_POST['title']);
        $value = SRC::validator($_POST['value']);

        $result = Translate::AddTranslate($id, $table, $title,$name_id, $value);
        echo 'Запис відредаговано!';
        return true;
    }
}