<?php
include_once ROOT. '/cabinet/bank/models/Budget.php';
class BudgetController{
    //Операційний бюджет по культурах
    public function actionGetBudget(){
        $ex_date['sidebar_menu']='on';
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();

        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table']);

        foreach ($ex_date['table'] as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=$ex_date['date-1']["total"][$Ex_total['name_php']]+$ex_date['date-2']["total"][$Ex_total['name_php']];
        }
        SRC::template('bank', 'panel', 'budgetTest', $ex_date);
        return true;
    }
    //Операційний бюджет помісячно
    public function actionGetBudgetMonth(){
        $date['sidebar_menu']='on';
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $setting=Budget::getSettigBalance();
        Budget::getSettingMaterials();
        if($Crops[1][1]!=false) $date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table'], $setting);
        if($Crops[2][1]!=false) $date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table'], $setting);
        foreach ($ex_date['table'] as $Ex_total){
            $date["total"][$Ex_total["name_php"]]=$date['date-1']["total"][$Ex_total['name_php']]+$date['date-2']["total"][$Ex_total['name_php']];
        }
        $CF_Month=Budget::transformToMonth($date["total"]);
        $date["table"]=$ex_date['table'];
        $date['Mont']=$CF_Month;
        for ($x=1; $x<=12; $x++){
            $date['Mont'][$x]['revenue']=$date['date-1']['mont-revenue'][$x]+$date['date-2']['mont-revenue'][$x];
        }
        SRC::template('bank', 'panel', 'budgetMonth', $date);
        return true;
    }
    //Рух грошових коштів помісячно (Cash Flow)
    public function actionGetBudgetCashFlow(){

        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $setting=Budget::getSettigBalance();
        Budget::getSettingMaterials();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table'], $setting);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table'], $setting);

        foreach ($ex_date['table'] as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=$ex_date['date-1']["total"][$Ex_total['name_php']]+$ex_date['date-2']["total"][$Ex_total['name_php']];
        }
        $CF_Month=Budget::transformToMonth($ex_date["total"]);
        for ($x=1; $x<=12; $x++){
            $CF_Month[$x]['revenue']=$ex_date['date-1']['mont-revenue'][$x]+$ex_date['date-2']['mont-revenue'][$x];
        }
        $CashFlow=Budget::transformToCashFlow($CF_Month);
        $CF=$CashFlow;
        $CF['sidebar_menu']='on';
        $CF['total']=$ex_date['total']+$CashFlow['total'];
        SRC::template('bank', 'panel', 'budgetCashFlow', $CF);
        return true;
    }
    //разшифровка (remains-1)
    public function actionGetRemainsMaterial($type, $crop, $type2){

        $id="AND crop_id=".$crop;

        $Crops = Budget::getMyCrop($id,$type2);
        $table=Budget::getTable();
        $ex_date = Budget::getBuget($Crops[$type2], 1, $type2, $table);
        $Remains_date=false;
        for ($m=1; $m<=3; $m++) {
            foreach ($ex_date['remains'][$m] as $Remains)if($Remains['material']!=false and $Remains['type']==$type) {
                $Remains_date['date'][] = $Remains;
            }
        }
        $Remains_date['sidebar_menu']='on';
        $Remains_date['table_type']=$type;

        SRC::template('bank', 'panel', 'budgetRemains', $Remains_date);
        return true;
    }
    //разшифровка (remains-2)
    public function actionGetRemainsFuel($crop, $type){

        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();

        $ex_date = Budget::getBuget($Crops[$type], 2, $type, $table);
        $ex_date['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'budgetRemainsFuel', $ex_date);
        return true;
    }
    //разшифровка (remains-3)
    public function actionGetRemainsLabor($crop, $type){

        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        $ex_date = Budget::getBuget($Crops[$type], 3,$type,$table);
        $ex_date['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'budgetRemainsLabor', $ex_date);
        return true;
    }
    //разшифровка (remains-4)
    public function actionGetRemainsDirect($crop, $type){

        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        $ex_date = Budget::getBuget($Crops[$type], 4,$type,$table);
        $ex_date['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'budgetRemainsDirect', $ex_date);
        return true;
    }
    //разшифровка (remains-5)
    public function actionGetRemainsServices($crop, $type){

        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        $ex_date = Budget::getBuget($Crops[$type], 5,$type,$table);
        $ex_date['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'budgetRemainsServices', $ex_date);
        return true;
    }
    //разшифровка (remains-7)
    public function actionGetRemainsRevenue($crop, $type){

        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        $ex_date = Budget::getBuget($Crops[$type], 7,$type,$table);
        $ex_date['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'budgetRemainsRevenue', $ex_date);
        return true;
    }
    //настроики материалов(remains-8)
    public function actionGetSettingMaterial(){

        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 8, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 8, 2, $ex_date['table']);
        $date=$GLOBALS['material_setting'];
        $date['sidebar_menu']='on';
        Budget::getSettingMaterials();
        SRC::template('bank', 'panel', 'budgetSettingMaterial', $date);
        return true;
    }
    //настройка процентов
    public function actionGetSettingMonth(){

        $setting[]=array(
            "name"=>"Насіння",
            "name_php"=>"seeds"
        );
        $setting[]=array(
            "name"=>"Мінеральні добрива",
            "name_php"=>"fertilizers"
        );
        $setting[]=array(
            "name"=>"Засоби захисту рослин",
            "name_php"=>"ppa"
        );
        $setting[]=array(
            "name"=>"Паливо-мастильні матеріали",
            "name_php"=>"fuel"
        );
        $date["setting"]=$setting;
        $date['sidebar_menu']='on';
        $date["proc"]=Budget::getSettingMonth();
        SRC::template('bank', 'panel', 'budgetSettingMonth', $date);
        return true;
    }
    //Налаштування по заборгованості
    public function actionGetSettingCash(){

        $setting[]=array(
            "name"=>"Грошові кошти на початок періоду",
            "name_php"=>"1"
        );
        $setting[]=array(
            "name"=>"Погашення дебіторської заборгованості",
            "name_php"=>"2"
        );
        $setting[]=array(
            "name"=>"Інші операційні надходження",
            "name_php"=>"3"
        );
        $setting[]=array(
            "name"=>"Погашення кредиторської заборгованості",
            "name_php"=>"4"
        );
        $setting[]=array(
            "name"=>"Відсотки по кредиту",
            "name_php"=>"5"
        );
        $setting[]=array(
            "name"=>"Інші операційні витрати",
            "name_php"=>"6"
        );
        $date["setting"]=$setting;
        $date['sidebar_menu']='on';
        $date["proc"]=Budget::getSettingCashFlow();
        SRC::template('bank', 'panel', 'budgetSettingCash', $date);
        return true;
    }
    //Фінансово-економічні показники (remains-6)
    public function actionGetFinancialIndicators($interface=false){

        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $ex_date['sidebar_menu']='on';
        $setting=Budget::getSettigBalance();
        Budget::getSettingMaterials();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 6, 1, $ex_date['table'], $setting);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 6, 2, $ex_date['table'], $setting);
        if($interface==false){
            $ex_date['table2']=Budget::getTableFinancial();
            SRC::template('bank', 'panel', 'financial', $ex_date);
        }
        return true;
    }
    //Графічний порівняльний аналіз (бенчмаркінг)
    public function actionGetGraphs(){

        $Crops[1][1]=false;
        $Crops[2][1]=false;
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $ex_date['sidebar_menu']='on';
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 6, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 6, 2, $ex_date['table']);
        if($Crops[1][1]!=false and $Crops[2][1]==false) $ex_date["my_crop"]=$ex_date['date-1']['remains'];
        if($Crops[1][1]==false and $Crops[2][1]!=false) $ex_date["my_crop"]=$ex_date['date-2']['remains'];
        if($Crops[1][1]!=false and $Crops[2][1]!=false) $ex_date["my_crop"]=$ex_date['date-1']['remains']+$ex_date['date-2']['remains'];
        $ex_date["historical"]=Budget::getHistoricalAnalysis($Crops[1], $Crops[2]);
        $ex_date["historical_ukraine"]=Budget::getHistoricalUkraine();
        $ex_date['table2']=Budget::getTableFinancial();
        $ex_date['remains']=Budget::gerRemainsGraphs();
        SRC::template('bank', 'panel', 'graphs', $ex_date);
        return true;
    }
}
