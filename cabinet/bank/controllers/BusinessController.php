<?php

include_once ROOT. '/cabinet/bank/models/Business.php';

class BusinessController{
    //Бизнесс план, загрузка культур
    public function actionAddPlan(){
        $date = Business::getUserList();
        SRC::template('bank', 'panel', 'businessPlan', $date);
        return true;
    }
    //
    public function actionGetUser($user_id){
        $user_id=SRC::validator($user_id);
        $user=Business::getUser($user_id);

        $_SESSION['bank_user_name']=$user[0]['company_name'];
        $_SESSION['bank_user_id']=$user_id;
        SRC::redirect('/bank/budget');
        return true;
    }
}

