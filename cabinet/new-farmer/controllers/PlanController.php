<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 10:13
 */
class PlanController{
    public function actionIndex(){
        SRC::template('new-farmer','new','plan');

        
        return true;
    }
}