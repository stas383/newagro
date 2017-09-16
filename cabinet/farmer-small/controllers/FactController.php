<?php
include_once ROOT.'/cabinet/farmer-small/models/Fact.php';
include_once ROOT.'/cabinet/farmer-small/models/Budget.php';

class FactController{
    public function actionGetFact(){
        $id_user=$_SESSION['id_user'];
        $date=Fact::getFact($id_user);
        SRC::template('farmer-small', 'farm', 'getFactCosts', $date);
        return true;
    }

    public function actionGetFactRevenues(){
        $id_user = $_SESSION['id_user'];

        $date = Fact::getFactRevenues($id_user);
        SRC::template('farmer-small','farm','getFactRevenues', $date);
        return true;
    }

    public function actionGetFactOther(){
        $id_user = $_SESSION['id_user'];
        $date = Fact::getFact($id_user);
        SRC::template('farmer-small','farm','getFactOther',$date);
        return true;
    }

    public function actionSaveFactRevenues(){
        $id_user = $_SESSION['id_user'];
        $crop_id = SRC::validatorPrice($_POST['crop_id']);
        $date = SRC::validator($_POST['data_fact_revenues']);
        $sales_channel = SRC::validatorPrice($_POST['sales_channel']);
        $amount = SRC::validatorPrice($_POST['amount']);
        $price_total = SRC::validatorPrice($_POST['price_total']);
        $price_avr = SRC::validatorPrice($_POST['price_avr']);

        Fact::saveFactRevenues($id_user, $crop_id, $date, $sales_channel, $amount, $price_total, $price_avr);
         SRC::redirect();
        return true;
    }

    public function actionSaveFact(){
        $id_user=$_SESSION['id_user'];
        $crop_id=SRC::validatorPrice($_POST['crop_id']);
        $stattie_id=SRC::validatorPrice($_POST['stattie_id']);
        $data_fact=SRC::validator($_POST['data_fact']);
        $name=SRC::validator($_POST['name']);
        $amount=SRC::validatorPrice($_POST['amount']);
        $price_one=SRC::validatorPrice($_POST['price_one']);
        $price_total=SRC::validatorPrice($_POST['price_total']);

        $result= Fact::saveFact($id_user, $crop_id, $stattie_id, $data_fact, $name, $amount, $price_one, $price_total);

        SRC::redirect();
        return true;
    }

    public function actionEditFact(){

        $id_user=$_SESSION['id_user'];
        $id = SRC::validatorPrice($_POST['id']);
        $crop_id=SRC::validatorPrice($_POST['crop_id']);
        $stattie_id=SRC::validatorPrice($_POST['stattie_id']);
        $data_fact=SRC::validator($_POST['date_fact']);
        $name=SRC::validator($_POST['name']);
        $amount=SRC::validatorPrice($_POST['amount']);
        $price_one=SRC::validatorPrice($_POST['price_once']);
        $price_total=SRC::validatorPrice($_POST['price']);

        $result= Fact::editFact($id, $id_user, $crop_id, $stattie_id, $data_fact, $name, $amount, $price_one, $price_total);

        return true;
    }

    public function actionEditFactRevenues(){
        $id = SRC::validatorPrice($_POST['id']);
        $crop_id = SRC::validatorPrice($_POST['crop_id']);
        $date = SRC::validator($_POST['data_fact_revenues']);
        $sales_channel = SRC::validatorPrice($_POST['sales_channel']);
        $amount = SRC::validatorPrice($_POST['amount']);
        $price_total = SRC::validatorPrice($_POST['price_total']);
        $price_avr = SRC::validatorPrice($_POST['price_avr']);

        Fact::editFactRevenues($id, $crop_id, $date, $sales_channel, $amount, $price_total, $price_avr);
        SRC::redirect();
        return true;
    }

    public function actionBudgetFactCrop(){
        $id_user = $_SESSION['id_user'];

        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);

        $date['plan'] = Budget::getPlan($id_user, $table, $crop);
        $date['fact'] = Fact::getFactBudget($id_user);

        SRC::template('farmer-small','farm','budgetFactCrop', $date);
        return true;
    }

    public function actionBudgetFactMonth(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop);
        $date['month'] = Budget::getPlanMonth($date['plan']['result']['total'], $date['plan']['month']['revenue']);
        $date['fact'] = Fact::getFactBudget($id_user);

        SRC::template('farmer-small','farm','budgetFactMonth', $date);
        return true;
    }
    public function actionRemainFact($name,$crop_id){
        $id_user = $_SESSION['id_user'];
        $name =SRC::validator($name);
        $crop_id=SRC::validatorPrice($crop_id);

        $date=Fact::getRemains($id_user, $name, $crop_id);

        SRC::template('farmer-small','farm','remainsFact', $date);
        return true;
    }




}