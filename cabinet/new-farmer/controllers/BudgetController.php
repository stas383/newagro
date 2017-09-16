<?php
include_once ROOT.'/cabinet/new-farmer/models/Budget.php';
include_once ROOT.'/cabinet/new-farmer/models/DataBase.php';
include_once ROOT.'/cabinet/new-farmer/models/TechnologyCard.php';
include_once ROOT.'/cabinet/new-farmer/models/FieldManagement.php';
class BudgetController{
    public function actionGetBudget($id_budget=false){

        $id_budget=SRC::validatorPrice($id_budget);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        /*if($id_budget==true)$date['save_budget']=Budget::getSaveBudget($db,$id_user,$id_budget);
        $date['save_budget_list']=Budget::getSaveBudgetList($db,$id_user);
        $date['return_budget'] = unserialize($date['save_budget'][0]['budget']);
        $date['id_budget']=$id_budget;*/
        SRC::template('new-farmer','new','budget',$date);
        return true;
    }


    public function actionGetBudgetPerCrop(){
        //$id_budget=SRC::validatorPrice($id_budget);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        $date['other_costs'] = FieldManagement::getCosts($id_user);
        SRC::template('new-farmer','new','budgetPerCrop',$date);
        return true;
    }

    public function actionGetBudgetPerMonth(){

        //$id_budget=SRC::validatorPrice($id_budget);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        SRC::template('new-farmer','new','budgetPerMonth',$date);
        return true;
    }

    public function actionGetBudgetFactPerCrop(){

        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);

        SRC::template('new-farmer','new','budgetFactPerCrop',$date);
        return true;
    }

    public function actionGetBudgetFactPerField(){

        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);

        SRC::template('new-farmer','new','budgetFactPerField',$date);
        return true;
    }

    public function actionGetBudgetFactPerMonth(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        SRC::template('new-farmer','new','budgetFactPerMonth',$date);
        return true;
    }
    public function actionBudgetCashFlowFact(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['table_cash']=Budget::getTableCashFlow();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],false,true);
        SRC::template('new-farmer','new','cashFlowFact',$date);
        return true;
    }



    public function actionBudgetCashFlow(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['table_cash']=Budget::getTableCashFlow();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],false,true);
        SRC::template('new-farmer','new','cashFlow',$date);
        return true;
    }

    public function actionGetGraphsPlan(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table']);
        $date['field_management'] = TechnologyCard::getFieldManagement($id_user);
        $date['crop_name'] = DataBase::getCropName($id_user);

        foreach ($date['field_management'] as $field_management){
            $date['field'][$field_management['field_id_crop']] += $field_management['field_size'];
        }

        foreach ($date['field_management'] as $value) {
           $date['graphs_1'][$value['field_id_crop']] = array(
                $value['name_crop_ua'],
                $date['field'][$value['field_id_crop']],
            );
        }

        foreach ($date['budget']['crop_plane_revenues'] as $key=>$value){
            $a = rand(0,9);
            $b = rand(0,9);
            $c = rand(0,9);
            $d = rand(0,9);
            $e = rand(0,9);
            $f = rand(0,9);
            $hex = "'#$a$b$c$d$e$f'";
            $date['graphs_7_plane_revenues'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value,
                $hex,
            );
        }

        foreach ($date['budget']['crop_budget_equipment'] as $key => $value) {
            $date['graphs_2_budget_equipment'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value
                );       
        }
        foreach ($date['budget']['crop_budget_seeds'] as $key => $value) {
            $date['graphs_3_budget_seeds'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value
                );       
        }
        foreach ($date['budget']['crop_budget_fertilizers'] as $key => $value) {
            $date['graphs_4_budget_fertilizers'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value
                );       
        }
        foreach ($date['budget']['crop_budget_ppa'] as $key => $value) {
            $date['graphs_5_budget_ppa'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value
                );       
        }

        foreach ($date['budget']['crop_budget_pay'] as $key => $value){
            $date['graphs_6_budget_pay'][] = array(
                $date['crop_name'][$key]['name_crop_ua'],
                $value
            );
        }

    	SRC::template('new-farmer', 'new','graphsPlan',$date);
        return true;
    }

    public function actionSaveBudget(){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getBudget($db,$id_user,$field,$date['table']);
        $save=array(
                'plane_revenues'=>$date['budget']['plane_revenues'],
                'budget_seeds'=>$date['budget']['budget_seeds'],
                'budget_fertilizers'=>$date['budget']['budget_fertilizers'],
                'budget_ppa'=>$date['budget']['budget_ppa'],
                'budget_equipment'=>$date['budget']['budget_equipment'],
                'budget_pay'=>$date['budget']['budget_pay'],
        );
        $array = serialize($save);
        $current_date = date("Y.m.d");
        $current_time = date("H:i:s");
        Budget::saveBudget($db, $id_user,$current_date,$current_time, $array);
        SRC::redirect('/new-farmer/budget');
        return true;
    }

    public function actionRemainsMaterial($type,$id_field){
        $id_field=SRC::validatorPrice($id_field);

        $type=SRC::validatorPrice($type);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user,false,$id_field);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],1);
        $date['type'] = $type;
        $name_ua=array(
            '1'=>'Витрати на насіння',
            '2'=>'Витрати на мін. добрива',
            '3'=>'Витрати на засоби захисту рослин'
        );
        $name_en = array(
            '1'=>'Seed costs',
            '2'=>'Costs of mineral fertilizers',
            '3'=>'Costs for plant protection products'
        );
        $table_head_ua=array(
            '1'=>array('Операція', 'Назва матеріалу', 	'Площа, га',	'Норма, кг (шт)/га',	'Ціна, грн/кг (шт)',	'Витрати на насіння, грн'),
            '2'=>array('Операція', 'Назва матеріалу', 	'Площа, га',	'Норма, кг/га',     	'Ціна, грн/кг',	        'Витрати на мін. добрива, грн'),
            '3'=>array('Операція', 'Назва матеріалу', 	'Площа, га',	'Норма, кг(л)/га(т)',	'Ціна, грн/кг(л)',	    'Витрати на ЗЗР, грн')
        );

        $table_head_en=array(
            '1'=>array('Operation','Name', 'Area, ha','Norm,kilogram (pieces)  per hectare ', 'Price, UAH per kilogram, (pieces)',  ' Seed costs, UAH'),
            '2'=>array('Operation','Name', 'Area, ha', 'Norm,kilogram per hectare', 'Price, UAH per kilogram',  'Costs of mineral fertilizers, UAH'),
            '3'=>array('Operation','Name', 'Area, ha', 'Norm,kilogram, liters per hectare,tons', 'Price, UAH per kilogram, (liters)', 'Costs for plant protection products, UAH')
        );

        $date['table_name_ua']=$name_ua[$type];
        $date['table_head_ua']=$table_head_ua[$type];
        $date['table_name_en']=$name_en[$type];
        $date['table_head_en']=$table_head_en[$type];
        //var_dump($date['budget']['remains'][$type]);
        SRC::template('new-farmer','new','remainsMaterials',$date);
        return true;
    }
    public function actionRemainsSalary($id_field){
        $id_field=SRC::validatorPrice($id_field);

        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user,false,$id_field);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],2);
        $date['employee'] = DataBase::getEmployee($id_user);
        //var_dump($date['budget']['remains']);
        SRC::template('new-farmer','new','employeeSalary',$date);
        return true;
    }
    public function actionRemainsFuel($id_field){
        $id_field=SRC::validatorPrice($id_field);
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user,false,$id_field);
        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],3);
        $date['type_equipment']=DataBase::getTypeEquipment();
        $date['kind_equipment']=DataBase::getEquipmentKind();
        $date['fuel_type'] = DataBase::getTypeFuel();
        SRC::template('new-farmer','new','remainsFuel',$date);
        return true;
    }
    public function actionFinancial(){


        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $field=Budget::getMyCulture($db,$id_user);

        $date['table']=Budget::getTableBudget();
        $date['budget']=Budget::getNewBudget($db,$id_user,$field,$date['table'],5);
        $date['fin_table_ua']=array(
            'crop_name'=>'#',
            'area'=>'Посівна площа, га',
            //'yaled'=>'Урожайність, ц/га',
            'mass'=>'Обсяг реалізації, кг',
            'price'=>'Середня ціна реалізації, грн/кг',
            'revenue'=>'Доходи від реалізації всього, грн',
            'revenue_area'=>'Доходи від реалізації, грн/га',
            'revenue_mass'=>'Доходи від реалізації, грн/кг',
            'production_costs'=>'Виробничі витрати всього, грн',
            'production_area'=>'Виробничі витрати, грн/га',
            'production_mass'=>'Виробничі витрати, грн/кг',
            'gross_profit'=>'Валовий прибуток (збиток) всього, грн',
            'gross_profit_area'=>'Валовий прибуток (збиток), грн/га',
            'gross_profit_mass'=>'Валовий прибуток (збиток), грн/кг',
            'profitability'=>'Рентабельність виробництва, %',
            'marginal_profit'=>'Маржинальний прибуток, грн/га',
            'total_cost'=>'Повна собівартість',
            'total_cost_area'=>'Повна собівартість, грн/га',
            'total_cost_mass'=>'Повна собівартість, грн/кг',
        );
        $date['fin_table_en']=array(
            'crop_name'=>'#',
            'area'=>'Sown area, hectare',
            //'yaled'=>'Yield, centners per hectare',
            'mass'=>'Volume of sale, kilogram',
            'price'=>'Average sale price of 1 kilogram, UAH',
            'revenue'=>'Revenue from sales total, UAH',
            'revenue_area'=>'Revenue from sales, UAH per hectare',
            'revenue_mass'=>'Revenue from sales, UAH per kilogram',
            'production_costs'=>'Productive expenses total, UAH',
            'production_area'=>'Productive expenses, UAH per hectare',
            'production_mass'=>'Productive expenses, UAH per kilogram',
            'gross_profit'=>'Gross profit (loss) total, UAH',
            'gross_profit_area'=>'Gross profit (loss), UAH per hectare',
            'gross_profit_mass'=>'Gross profit (loss), UAH per kilogram',
            'profitability'=>'Profitability of production, %',
            'marginal_profit'=>'Marginal profit, UAH per hectare',
            'total_cost'=>'Complete cost',
            'total_cost_area'=>'Complete cost, UAH per hectare',
            'total_cost_mass'=>'Complete cost, UAH per kilogram',
        );
        SRC::template('new-farmer','new','financial',$date);
        return true;
    }
}