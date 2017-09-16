<?php
include_once ROOT. '/cabinet/farmer/models/Budget.php';
include_once ROOT. '/cabinet/farmer/models/My_budget.php';
class BudgetController{
    //Операційний бюджет по культурах
    public function actionGetBudget(){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();

        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table']);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table']) ;

        foreach ($ex_date['table'] as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=$ex_date['date-1']["total"][$Ex_total['name_php']]+$ex_date['date-2']["total"][$Ex_total['name_php']]+$ex_date['date-3']["total"][$Ex_total['name_php']];
        }
        SRC::template('farmer', 'panel', 'budgetTest', $ex_date);
        return true;
    }
    //Операційний бюджет помісячно
    public function actionGetBudgetMonth(){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table']);
        if($Crops[2][1]!=false) $date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table']);
        if($Crops[3][1]!=false) $date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table']) ;
        foreach ($ex_date['table'] as $Ex_total){
            $date["total"][$Ex_total["name_php"]]=$date['date-1']["total"][$Ex_total['name_php']]+$date['date-2']["total"][$Ex_total['name_php']]+$date['date-3']["total"][$Ex_total['name_php']];
        }
        $CF_Month=Budget::transformToMonth($date["total"]);
        $date["table"]=$ex_date['table'];
        $date['Mont']=$CF_Month;
        for ($x=1; $x<=12; $x++){
            $date['Mont'][$x]['revenue']=$date['date-1']['mont-revenue'][$x]+$date['date-2']['mont-revenue'][$x]+$date['date-3']['mont-revenue'][$x];
        }
        SRC::template('farmer', 'panel', 'budgetMonth', $date);
        return true;
    }
    //Рух грошових коштів помісячно (Cash Flow)
    public function actionGetBudgetCashFlow(){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $setting=Budget::getSettigBalance();//баланс продукції
        Budget::getSettingMaterials();//налаштування залишків
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1] , 0, 1,$ex_date['table'], $setting);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2] , 0, 2,$ex_date['table'], $setting);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 0, $setting);
        foreach ($ex_date['table'] as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=$ex_date['date-1']["total"][$Ex_total['name_php']]+$ex_date['date-2']["total"][$Ex_total['name_php']]+$ex_date['date-3']["total"][$Ex_total['name_php']];
        }
        $CF_Month=Budget::transformToMonth($ex_date["total"]);
        for ($x=1; $x<=12; $x++){
            $CF_Month[$x]['revenue']=$ex_date['date-1']['mont-revenue'][$x]+$ex_date['date-2']['mont-revenue'][$x]+$ex_date['date-3']['mont-revenue'][$x];
        }
        $CashFlow=Budget::transformToCashFlow($CF_Month);
        $CF=$CashFlow;

        $CF['total']=$ex_date['total']+$CashFlow['total'];
        SRC::template('farmer', 'panel', 'budgetCashFlow', $CF);
        return true;
    }
    //разшифровка (remains-1)
    public function actionGetRemainsMaterial($type, $crop, $type2){
        $id="AND crop_id=".$crop;

        $Crops = Budget::getMyCrop($id,$type2);
        $table=Budget::getTable();
        if($type2==1 or $type2==2) {
            $ex_date = Budget::getBuget($Crops[$type2], 1, $type2, $table);
            $Remains_date = false;
            for ($m = 1; $m <= 3; $m++) {
                foreach ($ex_date['remains'][$m] as $Remains) if ($Remains['material'] != false and $Remains['type'] == $type) {
                    $Remains_date['date'][] = $Remains;
                }
            }

        }
        if($type2==3) {
            $ex_date =My_budget::getBudget($Crops[3], $table, 1) ;
            $Remains_date = false;
            foreach ($ex_date['remains'] as $Remains) if ($Remains['material'] != false and $Remains['type'] == $type) {
                $Remains_date['date'][] = $Remains;
            }
        }
        $Remains_date['table_type'] = $type;

        SRC::template('farmer', 'panel', 'budgetRemains', $Remains_date);
        return true;
    }
    //разшифровка (remains-2)
    public function actionGetRemainsFuel($crop, $type){
        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();

        if($type==1 or $type==2) $ex_date = Budget::getBuget($Crops[$type], 2, $type, $table);
        if($type==3) $ex_date = My_budget::getBudget($Crops[3], $table, 2) ;
        SRC::template('farmer', 'panel', 'budgetRemainsFuel', $ex_date);
        return true;
    }
    //разшифровка (remains-3)
    public function actionGetRemainsLabor($crop, $type){
        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        if($type==1 or $type==2)$ex_date = Budget::getBuget($Crops[$type], 3,$type,$table);
        if($type==3) $ex_date = My_budget::getBudget($Crops[3], $table, 3) ;
        SRC::template('farmer', 'panel', 'budgetRemainsLabor', $ex_date);
        return true;
    }
    //разшифровка (remains-4)
    public function actionGetRemainsDirect($crop, $type){
        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        if($type==1 or $type==2)$ex_date = Budget::getBuget($Crops[$type], 4,$type,$table);
        if($type==3) $ex_date = My_budget::getBudget($Crops[3], $table, 4);
        SRC::template('farmer', 'panel', 'budgetRemainsDirect', $ex_date);
        return true;
    }
    //разшифровка (remains-5)
    public function actionGetRemainsServices($crop, $type){
        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();
        if($type==1 or $type==2) $ex_date = Budget::getBuget($Crops[$type], 5,$type,$table);
        if($type==3) $ex_date = My_budget::getBudget($Crops[3], $table, 5) ;
        SRC::template('farmer', 'panel', 'budgetRemainsServices', $ex_date);
        return true;
    }
    //разшифровка (remains-7)
    public function actionGetRemainsRevenue($crop, $type){
        $id="AND crop_id=".$crop;
        $Crops = Budget::getMyCrop($id, $type);
        $table=Budget::getTable();

        if($type==1 or $type==2) $ex_date = Budget::getBuget($Crops[$type], 7,$type,$table);
        if($type==3) $ex_date = My_budget::getBudget($Crops[3], $table, 7) ;
        SRC::template('farmer', 'panel', 'budgetRemainsRevenue', $ex_date);
        return true;
    }
    //настроики материалов(remains-8)
    public function actionGetSettingMaterial(){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 8, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 8, 2, $ex_date['table']);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 8) ;
        $date=$GLOBALS['material_setting'];
        Budget::getSettingMaterials();
        SRC::template('farmer', 'panel', 'budgetSettingMaterial', $date);
        return true;
    }
    //настроики материалов(remains-8)
    public function actionGetRemainsTotalMaterial($type, $seting){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 8, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 8, 2, $ex_date['table']);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 8);
        $date=$GLOBALS['material_setting'];
        $date['type']=$type;
        $date['seting']=$seting;
        //if ($seting=1) {Budget::getSettingMaterials();}
        SRC::template('farmer', 'panel', 'budgetRemainsTotalMaterial', $date);
        return true;
    }
    //сохранение настроики материалов
    public function actionSaveSettingMaterial(){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 8, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 8, 2, $ex_date['table']);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 8);
        $sql_save="";
        $id = $_SESSION['id_user'];
        $t=0;
        for($x=1; $x<=3; $x++){
           foreach ($GLOBALS['material_setting'][$x] as $material){
                $t++;
                $name[$t]=SRC::translit($material['name']);
                $setting[$t]=SRC::validatorPrice($_POST[$name[$t]]);
                if($setting[$t] != false)  $sql_save=$sql_save."($id, '".$name[$t]."', ".$setting[$t]."), ";
            }
        };
        $sql_save=substr($sql_save, 0, -2);
        $result=Budget::saveSettingMaterial($sql_save);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();

        return true;
    }
    //настройка процентов
    public function actionGetSettingMonth(){
        $setting[]=array(
            "name_ua"=>"Насіння",
            "name_en"=>"Seed",
            "name_php"=>"seeds"
        );
        $setting[]=array(
            "name_ua"=>"Мінеральні добрива",
            "name_en"=>"Mineral fertilizers",
            "name_php"=>"fertilizers"
        );
        $setting[]=array(
            "name_ua"=>"Засоби захисту рослин",
            "name_en"=>"Plants protecting tools",
            "name_php"=>"ppa"
        );
        $setting[]=array(
            "name_ua"=>"Паливно-мастильні матеріали",
            "name_en"=>"Fuel and lubricants",
            "name_php"=>"fuel"
        );
        $date["setting"]=$setting;
        $date["proc"]=Budget::getSettingMonth();
        SRC::template('farmer', 'panel', 'budgetSettingMonth', $date);
        return true;
    }
    //сохранение настройки процентов
    public function actionSaveSettingMonth(){
        $setting[]=array(
            "name_php"=>"seeds"
        );
        $setting[]=array(
            "name_php"=>"fertilizers"
        );
        $setting[]=array(
            "name_php"=>"ppa"
        );
        $setting[]=array(
            "name_php"=>"fuel"
        );
        $date["setting"]=$setting;
        $id = $_SESSION['id_user'];

        foreach ($setting as $save){
            $procent[$save["name_php"]]="";
            for($m=1; $m<=12; $m++){
                $post[$save["name_php"]][$m] = SRC::validatorPrice($_POST[$save["name_php"].$m]);
                if($post[$save["name_php"]][$m]==false) $post[$save["name_php"]][$m]=0;
                $procent[$save["name_php"]]=$procent[$save["name_php"]].$post[$save["name_php"]][$m].", ";
            }
            $procent[$save["name_php"]] = substr($procent[$save["name_php"]], 0, -2);
            $sql[$save["name_php"]]= "('".$id."', '".$save["name_php"]."', ".$procent[$save["name_php"]].")";
            $date["sql"]=$date["sql"].$sql[$save["name_php"]].", ";
        }
        $sql_save=substr($date["sql"], 0, -2);
        $result=Budget::saveSettingMonth($sql_save);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    //Налаштування по заборгованості
    public function actionGetSettingCash(){

        $setting=array(
            array(
                "name_ua"=>"Грошові кошти на початок періоду",
                "name_en"=>"Cash at the beginning of the period",
                "name_php"=>"1"
            ),
            array(
                "name_ua"=>"Надходження:",
                "name_en"=>"Revenue:",
                "name_php"=>"false"
            ),
            array(
                "name_ua"=>"Погашення дебіторської заборгованості",
                "name_en"=>"Repayment of accounts receivable",
                "name_php"=>"2",
                "class"=>"level2"
            ),
            array(
                "name_ua"=>"Інші операційні надходження",
                "name_en"=>"Other operating receipts",
                "name_php"=>"3",
                "class"=>"level2"
            ),
            array(
                "name_ua"=>"Вибуття:",
                "name_en"=>"Retirement:",
                "name_php"=>"false"
            ),
            array(
                "name_ua"=>"Погашення кредиторської заборгованості",
                "name_en"=>"Repayment of payables",
                "name_php"=>"4",
                "class"=>"level2"
            ),
            array(
                "name_ua"=>"Відсотки по поточній позиці",
                "name_en"=>"Interest on current loan",
                "name_php"=>"5",
                "class"=>"level2"
            ),
            array(
                "name_ua"=>"Інші операційні витрати",
                "name_en"=>"Other operating expenses",
                "name_php"=>"6",
                "class"=>"level2"
            ),
            array(
                "name_ua"=>"Погашення тіла поточної позики",
                "name_en"=>"Repayment of current loan",
                "name_php"=>"7",
                "class"=>"level2"
            ),
        );
        $date["setting"]=$setting;
        $Setting=Budget::getSettingCashFlow();
        foreach ($Setting as $ex_set){
            for ($x=1;$x<=12;$x++){
                $date['proc'][$ex_set['name_cf']][$x]=$ex_set['cf_'.$x];
            }
        }
        SRC::template('farmer', 'panel', 'budgetSettingCash', $date);
        return true;
    }
    //сохранение Налаштування по заборгованості
    public function actionSaveCashFlow(){
        $id = $_SESSION['id_user'];
        $date["sql"]="";
        for ($save=1; $save<=7;$save++){
            $procent[$save]="";
            for($m=1; $m<=12; $m++){
                $post[$save][$m] = SRC::validatorPrice($_POST[$save.$m]);
                if($post[$save][$m]==false) $post[$save][$m]=0;
                $procent[$save]=$procent[$save].$post[$save][$m].", ";
            }
            $procent[$save] = substr($procent[$save], 0, -2);
            $sql[$save]= "('".$id."', '".$save."', ".$procent[$save].")";
            $date["sql"]=$date["sql"].$sql[$save].", ";
        }
        $sql_save=substr($date["sql"], 0, -2);
        $result=Budget::saveSettingCashFlow($sql_save);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    //Фінансово-економічні показники (remains-6)
    public function actionGetFinancialIndicators($interface=false){
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        $setting=Budget::getSettigBalance();
        Budget::getSettingMaterials();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 6, 1, $ex_date['table'], $setting);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 6, 2, $ex_date['table'], $setting);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 6);
        if($interface==false){
            $ex_date['table2']=Budget::getTableFinancial();
            SRC::template('farmer', 'panel', 'financial', $ex_date);
        }
        return true;
    }
    //Графічний порівняльний аналіз (бенчмаркінг)
    public function actionGetGraphs(){
        $ex_date["my_crop"]=array();
        $Crops = Budget::getMyCrop();
        $ex_date['table']=Budget::getTable();
        if($Crops[1][1]!=false) $ex_date['date-1'] = Budget::getBuget($Crops[1], 6, 1, $ex_date['table']);
        if($Crops[2][1]!=false) $ex_date['date-2'] = Budget::getBuget($Crops[2], 6, 2, $ex_date['table']);
        if($Crops[3][1]!=false) $ex_date['date-3'] = My_budget::getBudget($Crops[3], $ex_date['table'], 6);
        if($Crops[1][1]!=false) $ex_date["my_crop"]+=$ex_date['date-1']['remains'];
        if($Crops[2][1]!=false) $ex_date["my_crop"]+=$ex_date['date-2']['remains'];
        if($Crops[3][1]!=false) $ex_date["my_crop"]+=$ex_date['date-3']['remains'];

        for ($x=1; $x<=$ex_date['date-3']["crop_coll"]; $x++){
            $id_crop[$x] = explode("-", $ex_date['date-3']['remains'][$ex_date['date-3']['crop'][$x]."-3"]['st']);
            $Crops[$id_crop[$x][1]]["MyCrop"][]["crop_id"]= $id_crop[$x][0];
        }

        $ex_date["historical"]=Budget::getHistoricalAnalysis($Crops);
        $ex_date["historical_ukraine"]=Budget::getHistoricalUkraine();
        $ex_date['table2']=Budget::getTableFinancial();
        $ex_date['remains']=Budget::gerRemainsGraphs();
        SRC::template('farmer', 'panel', 'graphs', $ex_date);
        return true;
    }


    //разшифровка (remains-9)
    public function actionGetPlan($crop, $type){


        if($crop==0) {
            $ex_date['open_crop']=false;
        }
        if($crop!=0) {
            $id = "AND crop_id=" . $crop;
            $Crops = Budget::getMyCrop($id, $type);
            $table = Budget::getTable();
            if ($type == 1 or $type == 2) $ex_date = Budget::getBuget($Crops[$type], 9, $type, $table);
            if ($type == 3) $ex_date = My_budget::getBudget($Crops[3], $table, 9);
            $ex_date['open_crop']=$crop;
            $ex_date['open_type']=$type;
        }
        $id=$_SESSION['id_user'];

        $ex_date['crop_name']=Budget::getCropName($id);
        SRC::template('farmer', 'panel', 'budgetRemainsPlan', $ex_date);
        return true;
    }
}

