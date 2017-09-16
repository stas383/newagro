<?php
/**
 * Created by PhpStorm.
 * User: Agri
 * Date: 15.06.2017
 * Time: 15:59
 */
class Budget{
    //таблица 1-2
    public static function getTable(){
        return array(
            array(
                'name_ua'=>'Стаття',
                'name_en'=>'Item',
                'php'=>'crop_name',
                'class'=>''
            ),
            array(
                'name_ua'=>'Доходи від реалізації',
                'name_en'=>'Revenue from sales',
                'php'=>'revenue',
                'class'=>'',
                'href'=>'/farmer-small/budget/revenue/'
            ),
            array(
                'name_ua'=>'Виробничі витрати',
                'name_en'=>'Productive expenses',
                'php'=>'production_costs',
                'class'=>''
            ),
            array(
                'name_ua'=>'Насіння',
                'name_en'=>'Seeds',
                'php'=>'seeds',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/materials/17/'

            ),
            array(
                'name_ua'=>'Мінеральні добрива',
                'name_en'=>'Mineral fertilizers',
                'php'=>'mineral',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/materials/18/'
            ),
            array(
                'name_ua'=>'Засоби захисту рослин',
                'name_en'=>'Means of plant protection',
                'php'=>'zzr',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/materials/19/'
            ),
            array(
                'name_ua'=>'ПММ',
                'name_en'=>'Oil products',
                'php'=>'pmm',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/materials/20/'
            ),
            array(
                'name_ua'=>'Послуги',
                'name_en'=>'Servants',
                'php'=>'servants',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/services/'
            ),
            array(
                'name_ua'=>'Оплата праці',
                'name_en'=>'Labour payment',
                'php'=>'wedding',
                'class'=>'level2',
                'href'=>'/farmer-small/budget/wedding/'
            ),
            array(
                'name_ua'=>'Орендна плата',
                'name_en'=>'Rent pay',
                'php'=>'rent_pay',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Амортизація',
                'name_en'=>'Depreciation',
                'php'=>'depreciation',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Інші витрати',
                'name_en'=>'Other costs',
                'php'=>'other',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Валовий прибуток',
                'name_en'=>'Gross profit',
                'php'=>'gross_profit',
                'class'=>''
            ),
            array(
                'name_ua'=>'Рентабельність,%',
                'name_en'=>'Profitability,%',
                'php'=>'profitability',
                'class'=>''
            ),
        );
    }
    //таблица 3
    public static function getTableCashFlow(){
        return array(
            array(
                'name_ua'=>'Стаття',
                'name_en'=>'Item',
                'php'=>'action',
                'class'=>''
            ),
            array(
                'name_ua'=>'1. Рух коштів в результаті операційної діяльності',
                'name_en'=>'1. Cash flow as a result of operating activities',
                'php'=>'cf_operating_activities',
                'class'=>''
            ),
            array(
                'name_ua'=>'Операційна діяльність - надходження',
                'name_en'=>'Operating activities - supply',
                'php'=>'revenue',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Операційна діяльність - витрати',
                'name_en'=>'Operating activities - expenses',
                'php'=>'activities_costs',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Чистий рух коштів від операційної діяльності',
                'name_en'=>'Net cash flow from operating activities',
                'php'=>'net_cash_flow',
                'class'=>''
            ),
            array(
                'name_ua'=>'2. Рух коштів у результаті інвестиційної діяльності',
                'name_en'=>'2. Cash flow as a result of investment activity',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Інвестиційна діяльність - надходження',
                'name_en'=>'Cash flow as a result of investment activity',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Інвестиційна діяльність - витрати',
                'name_en'=>'Investment activity - expenses',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Чистий рух коштів від інвестиційної діяльності',
                'name_en'=>'Net cash flow from investing activities',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'3. Рух коштів у результаті фінансової діяльності',
                'name_en'=>'3. Cash flow as a result of financial activity',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Фінансова діяльність - надходження',
                'name_en'=>'Financial activities - supply',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Фінансова діяльність - витрати',
                'name_en'=>'Financial activity - expenses',
                'php'=>'',
                'class'=>'level2'
            ),
            array(
                'name_ua'=>'Чистий рух коштів від фінансової діяльності',
                'name_en'=>'Net cash flow from financial activities',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Всього надходження',
                'name_en'=>'Total supply',
                'php'=>'revenue',
                'class'=>''
            ),
            array(
                'name_ua'=>'Всього витрати',
                'name_en'=>'Total costs',
                'php'=>'activities_costs',
                'class'=>''
            ),
            array(
                'name_ua'=>'Чистий рух грошових коштів за звітний період',
                'name_en'=>'Net cash flows for reporting period',
                'php'=>'net_cash_flow',
                'class'=>''
            ),
            array(
                'name_ua'=>'Залишок коштів на початок періоду',
                'name_en'=>'Balance at the beginning of the period',
                'php'=>'',
                'class'=>''
            ),
            array(
                'name_ua'=>'Залишок коштів на кінець періоду',
                'name_en'=>'Balance at the end of the period',
                'php'=>'',
                'class'=>''
            ),
        );
    }



    //переделать
    //
    //
    ///
    //готово
    public static function getCrops($id_user,$crops=false){
        $db = Db::getConnection();
        $result = $db->query("SELECT *, a.id as id_analityca, c.id as id_culture FROM sm_crop_analityca as a, sm_crop_culture as c WHERE a.id_user = $id_user AND a.id_user = $id_user AND a.id_crop=c.id $crops");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $var1 = $result->fetchAll();
        foreach ($var1 as $item){
            $plan['crop'][$item['id_analityca']]= array(
                'id'=>$item['id_analityca'],
                'id_culture'=>$item['id_culture'],
                'id_crop'=>$item['id_crop'],
                'area'=>$item['area'],
                'crop_capacity'=>$item['area'],
                'market'=>$item['market'],
                'intermediaries_resellers'=>$item['intermediaries_resellers'],
                'avr_price'=>$item['avr_price'],
                'other_channels'=>$item['other_channels'],
                'field_name'=>$item['field_name'],
            );
        }
        return $plan;
    }

    //расчет
    public static function getPlan($id_user, $table, $plan, $remains=false){
        $db = Db::getConnection();
        //таблица
        $date['table']=$table;
        foreach ($date['table'] as $table){
            $date['result'][$table['php']]=array();
        }

        $sum_material=array();
        $sum_wedding = array();
        $sum_rent_pay = array();
        $sum_servants = array();
        $sum_other=array();
        $sum_area=0;
        $depreciation=0;

        $result = $db->query("SELECT area FROM sm_crop_analityca WHERE id_user = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['sum_area'] = $result->fetchAll();
        foreach ($list['sum_area'] as $sm_crop_analityca){
            $sum_area += $sm_crop_analityca['area'];
        }


        foreach ($plan['crop'] as $key){
            $plan['action'][$key['id']]=array();
        }

        $result = $db->query("SELECT * FROM sm_depreciation WHERE id_user = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['sm_depreciation'] = $result->fetchAll();
        foreach ($list['sm_depreciation'] as $sm_depreciation){
            $depreciation+=$sm_depreciation['amount_of_amortization'];
        }

        $result = $db->query("SELECT * FROM sm_sales_prod WHERE id_user = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['revenue'] = $result->fetchAll();
        foreach ($list['revenue'] as $revenue){
            $plan['revenue'][$revenue['id_crop']][$revenue['type_employe']]=$revenue;
        }

        $result = $db->query("SELECT * FROM sm_action WHERE id_user = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['action'] = $result->fetchAll();
        foreach ($list['action'] as $action){
            $plan['action'][$action['crop_id']][] = $action;
        }

        $result = $db->query("SELECT * FROM sm_action_lib WHERE user_id = $id_user or user_id=0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['action_lib'] = $result->fetchAll();
        foreach ($list['action_lib'] as $action_lib){
            $plan['action_lib'][$action_lib['id_action']][] = $action_lib;
        }

        $result = $db->query("SELECT * FROM sm_material_plan WHERE user_id = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $list['material'] = $result->fetchAll();
        foreach ($list['material'] as $material){
            $plan['material'][$material['id_material_plan']][] = $material;
        }

        $result = $db->query("SELECT * FROM sm_crop_head");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $var = $result->fetchAll();
        foreach ($var as $key){
            $plan['head'][$key['id_crop']] = $key;
            $date['crop_head'][$key['id_crop']] = $key['name_crop_ua'];

        }

        $res = $db->query("SELECT price_rent FROM sm_rent_price WHERE id_user = $id_user");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $price_rent = $res->fetchAll();

        foreach ($plan['crop'] as $key){
            //Доходи від реалізації
            $mas_revenue[$key['id']]['mass']=$key['area']*$key['crop_capacity']*100;
            $mas_revenue[$key['id']]['market']=$mas_revenue[$key['id']]['mass']*($key['market']/100);
            $mas_revenue[$key['id']]['intermediaries_resellers']=$mas_revenue[$key['id']]['mass']*($key['intermediaries_resellers']/100);
            $mas_revenue[$key['id']]['other_channels']=$mas_revenue[$key['id']]['mass']*($key['other_channels']/100);
            for ($x=1;$x<=12;$x++){
                $revenue[$key['id']]['market_mas'][$x]=$mas_revenue[$key['id']]['market']*($plan['revenue'][$key['id']]['market_procent']['sp_'.$x]/100);
                $revenue[$key['id']]['sum_market_mas']+=$revenue[$key['id']]['market_mas'][$x];
                $revenue[$key['id']]['market_price'][$x]=$revenue[$key['id']]['market_mas'][$x]*$plan['revenue'][$key['id']]['market_price']['sp_'.$x];
                $revenue[$key['id']]['market_sum_price']+=$revenue[$key['id']]['market_price'][$x];
                if($revenue[$key['id']]['sum_market_mas']!=0) $revenue[$key['id']]['market_price_avr'] = $revenue[$key['id']]['market_sum_price']/$revenue[$key['id']]['sum_market_mas'];

                $revenue[$key['id']]['intermediaries_mas'][$x]=$mas_revenue[$key['id']]['intermediaries_resellers']*($plan['revenue'][$key['id']]['insider_procent']['sp_'.$x]/100);
                $revenue[$key['id']]['sum_intermediaries_mas']+=$revenue[$key['id']]['intermediaries_mas'][$x];
                $revenue[$key['id']]['intermediaries_price'][$x]=$revenue[$key['id']]['intermediaries_mas'][$x]*$plan['revenue'][$key['id']]['insider_price']['sp_'.$x];
                $revenue[$key['id']]['intermediaries_sum_price']+=$revenue[$key['id']]['intermediaries_price'][$x];
                if($revenue[$key['id']]['sum_intermediaries_mas']!=0) $revenue[$key['id']]['intermediaries_price_avr'] = $revenue[$key['id']]['intermediaries_sum_price']/$revenue[$key['id']]['sum_intermediaries_mas'];

                $revenue[$key['id']]['other_mas'][$x]=$mas_revenue[$key['id']]['other_channels']*($plan['revenue'][$key['id']]['chanel_procent']['sp_'.$x]/100);
                $revenue[$key['id']]['sum_other_mas']+=$revenue[$key['id']]['other_mas'][$x];
                $revenue[$key['id']]['other_price'][$x]=$revenue[$key['id']]['other_mas'][$x]*$plan['revenue'][$key['id']]['chanel_price']['sp_'.$x];
                $revenue[$key['id']]['other_sum_price']+=$revenue[$key['id']]['other_price'][$x];
                if($revenue[$key['id']]['sum_other_mas']!=0) $revenue[$key['id']]['other_price_avr'] = $revenue[$key['id']]['other_sum_price']/$revenue[$key['id']]['sum_other_mas'];

                $date['month']['revenue'][$x]+=$revenue[$key['id']]['market_price'][$x]+$revenue[$key['id']]['intermediaries_price'][$x]+$revenue[$key['id']]['other_price'][$x];
            }
            if ($remains==1){
                $date['remains']=array(
                    'market'=>array(
                        'mas'=>$revenue[$key['id']]['sum_market_mas'],
                        'price'=>$revenue[$key['id']]['market_price_avr'],
                        'revenue'=>$revenue[$key['id']]['market_sum_price'],
                    ),
                    'intermediaries_resellers'=>array(
                        'mas'=>$revenue[$key['id']]['sum_intermediaries_mas'],
                        'price'=>$revenue[$key['id']]['intermediaries_price_avr'],
                        'revenue'=>$revenue[$key['id']]['intermediaries_sum_price'],
                    ),
                    'other_channels'=>array(
                        'mas'=>$revenue[$key['id']]['sum_other_mas'],
                        'price'=>$revenue[$key['id']]['other_price_avr'],
                        'revenue'=>$revenue[$key['id']]['other_sum_price'],
                    ),
                );
            }
            $revenue[$key['id']]['revenue']=$revenue[$key['id']]['market_sum_price']+$revenue[$key['id']]['intermediaries_sum_price']+$revenue[$key['id']]['other_sum_price'];
            $revenue[$key['id']]['total_mas']=$revenue[$key['id']]['sum_market_mas']+$revenue[$key['id']]['sum_intermediaries_mas']+$revenue[$key['id']]['sum_other_mas'];
            //Виробничі витрати
            $area_proc[$key['id']]=$key['area']/$sum_area*100;
            //план по операциям
            if($plan['action'][$key['id_culture']]!=false)foreach ($plan['action'][$key['id_culture']] as $plan_action){
                $plan_material[$plan_action['id']] = explode(',', $plan_action['id_materials']);
                foreach ($plan_material[$plan_action['id']] as $materials){
                    $sum_material[$plan['material'][$materials][0]['material_id']][$key['id']] += $plan['material'][$materials][0]['material_norm']*$plan['material'][$materials][0]['material_price'] *$key['area'];
                    if ($remains==2){
                        $date['remains'][$plan['material'][$materials][0]['material_id']][]=array(
                            'name'=>$plan['material'][$materials][0]['material_name'],
                            'norm'=>$plan['material'][$materials][0]['material_norm'],
                            'price'=>$plan['material'][$materials][0]['material_price'],
                            'area'=>$key['area'],
                            'total'=>$plan['material'][$materials][0]['material_norm']*$plan['material'][$materials][0]['material_price'] *$key['area']
                        );
                    }
                }
                $sum_servants[$key['id']] += $plan_action['payment_for_all_area']*$key['area'];
                $sum_wedding[$key['id']] += ($plan_action['payment_for_all_area_own']+ $plan_action['payment_for_all_area_rent'])*$key['area'];
                $sum_rent_pay[$key['id']] += $plan_action['payment_for_all_area']*$key['area'];
                $sum_other[$key['id']]+=$plan_action['payment_for_all_other'];
                if($remains==3){
                    $date['remains'][]=array(
                        'name_ua'=>$plan['action_lib'][$plan_action['id_action_type']][0]['name_ua'],
                        'name_en'=>$plan['action_lib'][$plan_action['id_action_type']][0]['name_en'],
                        'price'=>$plan_action['payment_for_all_area']*$key['area'],
                    );
                }
                if($remains==4){
                    $date['remains'][]=array(
                        'name_ua'=>$plan['action_lib'][$plan_action['id_action_type']][0]['name_ua'],
                        'name_en'=>$plan['action_lib'][$plan_action['id_action_type']][0]['name_en'],
                        'price_1'=>$plan_action['payment_for_all_area_own']*$key['area'],
                        'price_2'=>$plan_action['payment_for_all_area_rent']*$key['area'],
                    );
                }
            }
            //Операційний бюджет по культурах
            $date['result']['id_crop'][$key['id']]=$key['id_crop'];
            $date['result']['field_name'][$key['id']]=$key['field_name'];
            $date['result']['id'][$key['id']]=$key['id'];
            $date['result']['area'][$key['id']]=$key['area'];

            $date['result']['crop_name'][$key['id']]=$plan['head'][$key['id_crop']]['name_crop_ua'].'_'.$key['field_name'];
            $date['result']['revenue'][$key['id']]=$revenue[$key['id']]['revenue'];
            $date['result']['seeds'][$key['id']]=$sum_material[17][$key['id']];
            $date['result']['mineral'][$key['id']]=$sum_material[18][$key['id']];
            $date['result']['zzr'][$key['id']]=$sum_material[19][$key['id']];
            $date['result']['pmm'][$key['id']]=$sum_material[20][$key['id']];
            $date['result']['servants'][$key['id']]=$sum_servants[$key['id']];
            $date['result']['wedding'][$key['id']]=$sum_wedding[$key['id']];

            $date['result']['rent_pay'][$key['id']]=$key['area']*$price_rent[0]['price_rent'];
            $date['result']['depreciation'][$key['id']]=$depreciation*($area_proc[$key['id']]/100);
            $date['result']['other'][$key['id']]=$sum_other[$key['id']];

            $date['result']['production_costs'][$key['id']]=$date['result']['seeds'][$key['id']] + $date['result']['mineral'][$key['id']]+$date['result']['zzr'][$key['id']]+$date['result']['pmm'][$key['id']]+$date['result']['servants'][$key['id']]+
            $date['result']['wedding'][$key['id']]+$date['result']['rent_pay'][$key['id']]+$date['result']['depreciation'][$key['id']]+$date['result']['other'][$key['id']];
            $date['result']['gross_profit'][$key['id']]=$date['result']['revenue'][$key['id']]-$date['result']['production_costs'][$key['id']];
            if ($date['result']['production_costs'][$key['id']]!=false)$date['result']['profitability'][$key['id']]=(($date['result']['revenue'][$key['id']]-$date['result']['production_costs'][$key['id']])/$date['result']['production_costs'][$key['id']])*100;

            if($remains==5){
                if($revenue[$key['id']]['revenue']!=false)$financial['price']=$revenue[$key['id']]['total_mas']/$revenue[$key['id']]['revenue'];
                if($key['area']!=false)$financial['revenue_area']=$revenue[$key['id']]['revenue']/$key['area'];
                if($revenue[$key['id']]['total_mas']!=false)$financial['revenue_area']=$revenue[$key['id']]['revenue']/$revenue[$key['id']]['total_mas'];
                if($key['area']!=false)$financial['revenue_mass']=$date['result']['production_costs'][$key['id']]/$key['area'];
                if($key['area']!=false)$financial['production_area']=$revenue[$key['id']]['revenue']/$key['area'];
                if($revenue[$key['id']]['total_mas']!=false)$financial['production_mass']=$date['result']['production_costs'][$key['id']]/$revenue[$key['id']]['total_mas'];
                if($revenue[$key['id']]['total_mas']!=false)$financial['gross_profit_mass']=$date['result']['gross_profit'][$key['id']]/$revenue[$key['id']]['total_mas'];
                if($key['area']!=false)$financial['gross_profit_area']=$date['result']['gross_profit'][$key['id']]/$key['area'];
                if($date['result']['production_costs'][$key['id']]!=false)$financial['profitability']=(($revenue[$key['id']]['revenue']-$date['result']['production_costs'][$key['id']])/$date['result']['production_costs'][$key['id']])*100;
                if($key['area']!=false)$financial['marginal_profit']=($revenue[$key['id']]['revenue']-($date['result']['production_costs'][$key['id']]-$date['result']['depreciation'][$key['id']]))/$key['area'];
                $date['remains'][$key['id']]=array(
                    'crop_name'=>$plan['head'][$key['id_crop']]['name_crop_ua'],
                    'area'=>$key['area'],
                    'yaled'=>$key['crop_capacity'],
                    'mass'=>$revenue[$key['id']]['total_mas'],
                    'price'=> $financial['price'],
                    'revenue'=>$revenue[$key['id']]['revenue'],
                    'revenue_area'=>$financial['revenue_area'],
                    'revenue_mass'=>$financial['revenue_mass'],
                    'production_costs'=>$date['result']['production_costs'][$key['id']],
                    'production_area'=>$financial['production_area'],
                    'production_mass'=>$financial['production_mass'],
                    'gross_profit'=>$date['result']['gross_profit'][$key['id']],
                    'gross_profit_area'=>$financial['gross_profit_area'],
                    'gross_profit_mass'=>$financial['gross_profit_mass'],
                    'profitability'=>$financial['profitability'],
                    'marginal_profit'=>$financial['marginal_profit'],
                );
            }
            foreach ($date['table'] as $table){
                $date['result']['total'][$table['php']]+=$date['result'][$table['php']][$key['id']];
            }
        }
        return $date;
    }
    //распределение по месяцам
    public static function getPlanMonth($total,$revenue){
        $setting_sales[1]=array(
            '2'=>60,
            '3'=>30,
            '12'=>10,
        );
        $setting_sales[2]=array(
            '1'=>20,
            '2'=>30,
            '3'=>30,
            '12'=>20
        );
        $setting_sales[3]=array(
            '3'=>10,
            '4'=>30,
            '5'=>30,
            '6'=>30
        );
        $setting_sales[4]=array(
            '1'=>20,
            '2'=>30,
            '3'=>20,
            '4'=>10,
            '12'=>20,
        );
        $setting_sales[5]=array(
            '1'=>10,
            '2'=>14,
            '4'=>13,
            '5'=>13,
            '7'=>20,
            '8'=>20,
            '12'=>10
        );
        $setting_sales[6]=array(
            '1'=>10,
            '2'=>10,
            '3'=>10,
            '4'=>10,
            '5'=>15,
            '6'=>15,
            '7'=>15,
            '8'=>15
        );
        $setting_sales[9]=array(
            '1'=>10,
            '2'=>10,
            '3'=>15,
            '4'=>15,
            '5'=>10,
            '6'=>10,
            '7'=>5,
            '8'=>5,
            '9'=>5,
            '10'=>5,
            '11'=>5,
            '12'=>5
        );
        for($x=1;$x<=12;$x++){
            $date['revenue'][$x]=$revenue[$x];
            $date['seeds'][$x]=$total['seeds']*($setting_sales[1][$x]/100);
            $date['mineral'][$x]=$total['mineral']*($setting_sales[2][$x]/100);
            $date['zzr'][$x]=$total['zzr']*($setting_sales[3][$x]/100);
            $date['pmm'][$x]=$total['pmm']*($setting_sales[4][$x]/100);
            $date['servants'][$x]=$total['servants']*($setting_sales[5][$x]/100);
            $date['wedding'][$x]=$total['wedding']*($setting_sales[6][$x]/100);
            $date['rent_pay'][$x]=$total['rent_pay']/12;
            $date['depreciation'][$x]=$total['depreciation']/12;
            $date['other'][$x]=$total['other']*($setting_sales[9][$x]/100);
            $date['production_costs'][$x]=$date['seeds'][$x]+$date['mineral'][$x]+ $date['zzr'][$x]+$date['pmm'][$x]+$date['servants'][$x]+$date['wedding'][$x]+$date['rent_pay'][$x]+$date['depreciation'][$x]+$date['other'][$x];
        }
        return $date;
    }
    public static function getPlanCashFlow($month){
        for($x=1;$x<=12;$x++){
            $date['revenue'][$x]=$month['revenue'][$x];
            $date['revenue']['total'] += $date['revenue'][$x];

            $date['activities_costs'][$x]=$month['production_costs'][$x];
            $date['activities_costs']['total'] += $date['activities_costs'][$x];

            $date['net_cash_flow'][$x]=$date['revenue'][$x]-$date['activities_costs'][$x];
            $date['net_cash_flow']['total'] += $date['net_cash_flow'][$x];
        }
        return $date;
    }
}