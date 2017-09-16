<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 13.09.2017
 * Time: 15:25
 */
include_once ROOT.'/cabinet/new-farmer/models/OtherCosts.php';
class OtherCostsController{
    public function actionGetOtherCost(){
        $id_user=$_SESSION['id_user'];
        $date['other_costs'] = OtherCosts::getCosts($id_user);
        SRC::template('new-farmer','new','otherCosts',$date);
        return true;
    }
    public function actionSavePlanOther(){
        $id_user=$_SESSION['id_user'];
        $costs_plan=SRC::validatorPrice($_POST['costs_plan']);
        $costs_type=SRC::validator($_POST['costs_type']);
        $costs_comments=SRC::validator($_POST['costs_comments']);
        OtherCosts::savePlanOther($id_user,$costs_plan,$costs_type,$costs_comments);
        SRC::redirect();
        return true;
    }
    public function actionCreateOtherFact(){
        $id_user=$_SESSION['id_user'];
        $cost_fact_type=SRC::validator($_POST['cost_fact_type']);
        $cost_fact=SRC::validatorPrice($_POST['cost_fact']);
        $cost_fact_note=SRC::validator($_POST['cost_fact_note']);
        $cost_fact_date=SRC::validator($_POST['cost_fact_date']);
        OtherCosts::createOtherFact($id_user,$cost_fact_type,$cost_fact,$cost_fact_note,$cost_fact_date);
        SRC::redirect();
        return true;
    }
}