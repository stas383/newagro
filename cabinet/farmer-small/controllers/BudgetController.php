<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 15.06.2017
 * Time: 15:58
 */

include_once ROOT.'/cabinet/farmer-small/models/Budget.php';
include_once ROOT.'/cabinet/farmer-small/models/Fact.php';

class BudgetController{
    //Операційний бюджет по культурах
    public function actionBudgetCrop(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crops="AND c.id_crop='54'";
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop);
        ///////сумма по культурам////////
        foreach ($date['plan']['result']['id_crop'] as $item => $value){
            $id_crop[$item]=$value;
        }
        foreach ($date['plan']['table'] as $table) {
            foreach ($date['plan']['result'][$table['php']] as $item => $value) {
                $date['plan']['result2'][$table['php']][$id_crop[$item]] += $value;
                if ($table['php'] == 'crop_name') $date['plan']['result2'][$table['php']][$id_crop[$item]] = $date['plan']['crop_head'][$id_crop[$item]];
            }
        }
        /////////////////////////////////
        SRC::template('farmer-small','farm','budgetCrop', $date);
        return true;
    }
    public function actionBudgetCropCrop($id_crops){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crops="AND c.id_crop=".$id_crops;
        $crop=Budget::getCrops($id_user,$crops);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop);


        SRC::template('farmer-small','farm','budgetCropCrop', $date);
        return true;
    }
    //Операційний бюджет помісячно
    public function actionBudgetMonth(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop);
        $date['month'] = Budget::getPlanMonth($date['plan']['result']['total'], $date['plan']['month']['revenue']);
        SRC::template('farmer-small','farm','budgetMonth', $date);
        return true;
    }
    //Прогнозний рух грошових коштів (Cash Flow)
    public function actionBudgetCashFlow(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop);
        $date['month'] = Budget::getPlanMonth($date['plan']['result']['total'], $date['plan']['month']['revenue']);
        $date['casf_flow'] = Budget::getPlanCashFlow($date['month']);
        $date['table_CF']=Budget::getTableCashFlow();
        SRC::template('farmer-small','farm','budgetCashFlow', $date);
        return true;
    }
    public function actionRemainsRevenue($crops){
        $id_user = $_SESSION['id_user'];
        $crops=SRC::validator($crops);
        $crops='AND a.id='.$crops;
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user,$crops);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 1);
        SRC::template('farmer-small','farm','remainsRevenue', $date);
        return true;
    }
    public function actionRemainsMaterial($type_material, $crops){
        $id_user = $_SESSION['id_user'];
        $crops=SRC::validator($crops);
        $type_material=SRC::validator($type_material);
        $crops='AND a.id='.$crops;
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user,$crops);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 2);
        $date['type_material']=$type_material;
        $name_ua=array(
            '17'=>'Витрати на насіння',
            '18'=>'Витрати на мін. добрива',
            '19'=>'Витрати на засоби захисту рослин',
            '20'=>'Витрати на паливо-мастильні матеріали',

        );
        $name_en = array(
            '17'=>'Seed costs',
            '18'=>'Costs of mineral fertilizers',
            '19'=>'Costs for plant protection products',
            '20'=>'Fuel and lubricant costs',
            );
        $table_head_ua=array(
            '17'=>array( 'Назва', 	'Площа, га',	'Норма, кг (шт)/га',	'Ціна, грн/кг (шт)',	'Витрати на насіння, грн'),
            '18'=>array( 'Назва', 	'Площа, га',	'Норма, кг/га',     	'Ціна, грн/кг',	        'Витрати на мін. добрива, грн'),
            '19'=>array( 'Назва', 	'Площа, га',	'Норма, кг(л)/га(т)',	'Ціна, грн/кг(л)',	    'Витрати на ЗЗР, грн'),
            '20'=>array( 'Назва', 	'Площа, га',	'Норма, л/га',	        'Ціна, грн/кг(л)',	    'Витрати на ПММ, грн')
        );

        $table_head_en=array(
            '17'=>array('Name', 'Area, ha','Norm,kilogram (pieces)  per hectare ', 'Price, UAH per kilogram, (pieces)',  ' Seed costs, UAH'),     
            '18'=>array('Name', 'Area, ha', 'Norm,kilogram per hectare', 'Price, UAH per kilogram',  'Costs of mineral fertilizers, UAH'), 
            '19'=>array('Name', 'Area, ha', 'Norm,kilogram, liters per hectare,tons', 'Price, UAH per kilogram, (liters)', 'Costs for plant protection products, UAH'),          
            '20'=>array('Name', 'Area, ha', 'Norm,liters per hectare ', 'Price, UAH per kilogram, (liters)', 'Fuel and lubricant costs, UAH')
            );

        $date['table_name_ua']=$name_ua[$type_material];
        $date['table_head_ua']=$table_head_ua[$type_material];
        $date['table_name_en']=$name_en[$type_material];
        $date['table_head_en']=$table_head_en[$type_material];
        SRC::template('farmer-small','farm','remainsMaterial', $date);
        return true;
    }
    public function actionRemainsServices($crops){
        $id_user = $_SESSION['id_user'];
        $crops=SRC::validator($crops);
        $crops='AND a.id='.$crops;
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user, $crops);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 3);
        SRC::template('farmer-small','farm','remainsServices', $date);
        return true;
    }
    public function actionRemainsWedding($crops){
        $id_user = $_SESSION['id_user'];
        $crops=SRC::validator($crops);
        $crops='AND a.id='.$crops;
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user, $crops);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 4);
        SRC::template('farmer-small','farm','remainsWedding', $date);
        return true;
    }
    public function actionFinancial(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 5);
        $date['table']=array(
            'crop_name'=>'#',
            'area'=>'Посівна площа, га',
            'yaled'=>'Урожайність, ц/га',
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
        );
        $date['table_en']=array(
            'crop_name'=>'#',
            'area'=>'Sown area, hectare',
            'yaled'=>'Yield, centners per hectare',
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
            );

        SRC::template('farmer-small','farm','remainsFinancial', $date);
        return true;

    }
    public function actionGraphs(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 5);
        $date['fact'] = Fact::getFactBudget($id_user);

        foreach ($date['plan']['result']['id'] as $gr){

            $date['graphs_1'][]=array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['area'][$gr]);
            $date['graphs_2'][]=array(
                $date['plan']['result']['pmm'][$gr],
                $date['plan']['result']['seeds'][$gr],
                $date['plan']['result']['zzr'][$gr],
                $date['plan']['result']['wedding'][$gr],
                $date['plan']['result']['mineral'][$gr],
                $date['plan']['result']['servants'][$gr],
            );
            $date['graphs_3'][] = array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['revenue'][$gr]/$date['plan']['result']['area'][$gr],
                );
            $date['graphs_4'][] = array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['production_costs'][$gr]/$date['plan']['result']['area'][$gr],
                );            
            $date['graphs_5'][] = array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['gross_profit'][$gr]/$date['plan']['result']['area'][$gr],
                );
            $date['graphs_6'][] = array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['profitability'][$gr],
                );
            $date['graphs_7'][] = array(
                $date['plan']['remains'][$gr]['crop_name'],
                $date['plan']['remains'][$gr]['marginal_profit'],
                );
            $date['graphs_8'][] = array(
                $date['plan']['result']['crop_name'][$gr],
                $date['plan']['result']['production_costs'][$gr]/$date['plan']['result']['area'][$gr],
                $date['fact']['production_costs'][$gr]/$date['plan']['result']['area'][$gr]
                );
             
        }
        //foreach ($date['graphs_8'] as $value) {
            //echo "['$value[0]', ".$value[1].", ".$value[2]."],";
          //  }
        
         /*echo "<pre>";
        var_dump( $date['graphs_4']);*/
       // die;
        
        SRC::template('farmer-small','farm','graphsPlan', $date);
        return true;
    }


    public function actionGraphsFact(){
        $id_user = $_SESSION['id_user'];
        $table=Budget::getTable();
        $crop=Budget::getCrops($id_user);
        $date['plan'] = Budget::getPlan($id_user, $table, $crop, 5);
        $date['fact'] = Fact::getFactBudget($id_user);
         foreach ($date['plan']['result']['id'] as $gr){

            $date['graphs_1'][]=array(
                $date['plan']['result']['crop_name'][$gr],
                $date['fact']['production_costs'][$gr]/$date['plan']['result']['area'][$gr]
                );
            $date['graphs_2'][] = array(
                     $date['plan']['result']['crop_name'][$gr],
                     $date['fact']['revenue'][$gr]
                );
            $date['graphs_3'][] = array(
                     $date['plan']['result']['crop_name'][$gr],
                     $date['fact']['gross_profit'][$gr]
                );
        }
         //var_dump($date['graphs_2']);die;
        SRC::template('farmer-small', 'farm', 'graphsFact', $date);
        return true;
    }


}