<?php
class My_budget{
    public static function getBudget($crops, $table_name, $open_remains=false, $setting=false){
        $db = Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $date["crop_coll"]=0;
        $result = $db->query("SELECT * FROM analytica_date WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['analytica_date'] = $result->fetchAll();
        $price_lease=$date['analytica_date'][0]['lease'];
        $result = $db->query("SELECT * FROM agri_crop_head WHERE {$crops[2]}");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['agri_crop_head'] = $result->fetchAll();
        foreach ($bd['agri_crop_head'] as $item){
            $agri_crop_head[$item['id_crop']]=$item;
        }
        $result = $db->query("SELECT * FROM agri_sales WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['agri_sales'] = $result->fetchAll();
        foreach ($bd['agri_sales'] as $item){
            $agri_sales[$item['crop_id']]=$item;
        }
        $result = $db->query("SELECT * FROM  agri_crop_plan WHERE id_user=$id_user ORDER BY  start_date ASC ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['agri_crop_plan'] = $result->fetchAll();
        $result = $db->query("SELECT * FROM agri_material WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['agri_material'] = $result->fetchAll();
        foreach ($bd['agri_material'] as $item){
            $agri_material[$item['id_material']]=$item;
        }
        $result = $db->query("SELECT * FROM agri_action WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['agri_action'] = $result->fetchAll();
        foreach ($bd['agri_action'] as $item){
            $agri_action[$item['id']]=$item;
        }
        $result = $db->query("SELECT * FROM fuel_type");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $bd['fuel_type'] = $result->fetchAll();
        foreach ($bd['fuel_type'] as $item){
            $fuel_type[$item['id_fuel']]=$item;
        }
        $result = $db->query("SELECT * FROM  labor_class_rates");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['labor_class_rates'] = $result->fetchAll();
        foreach ($date['labor_class_rates'] as $labor_class_rates){
            $labor_class_driver[$labor_class_rates['class']]=$labor_class_rates['driver'];
            $labor_class_worker[$labor_class_rates['class']]=$labor_class_rates['worker'];
        }
        $price_material=array();
        $sum_price_material=array();
        $sum_qlt_material=array();
        $total_fuel_cost_ex=array();
        $revenue=array();
        $labor_total_cost_ex=array();
        $ex_mass=array();
        $materials=array();
        $materialQltMass=array();
        $seeds_mass=array();
        $price_fuel[1]=22;
        $price_fuel[2]=20;
        $price_fuel[3]=22;
        $price_fuel[4]=20;
        $min_labor=3200;
        $labor_tax=0.22;
        $Rate_oil[1]=0.039999999;//diesel oil
        $Rate_oil[2]=0.01;//transmission oil
        $Rate_oil[3]=0.0015;//consistent oil
        $price_oil[1]=22.0000;//diesel oil
        $price_oil[2]=24.0000;//transmission oil
        $price_oil[3]=35.8400;//consistent oil
        foreach ($crops["MyCrop"] as $crop){
            $date["crop_coll"]++;
            $date["crop"][$date["crop_coll"]]=$crop['crop_id'];
            $gross_weight[$date["crop_coll"]] = ($crop['yaled']*$crop['area'])/10;
            $cleaning_qty[$date["crop_coll"]]=$gross_weight[$date["crop_coll"]]-$gross_weight[$date["crop_coll"]]*($agri_crop_head[$crop['crop_id']]['cleaning_qty']/100);
            $drying_qty[$date["crop_coll"]]=$cleaning_qty[$date["crop_coll"]]-$cleaning_qty[$date["crop_coll"]]*($agri_crop_head[$crop['crop_id']]['drying_qty']/100);
            $cleaning_price[$date["crop_coll"]]=$cleaning_qty[$date["crop_coll"]]*$agri_crop_head[$crop['crop_id']]['cleaning_price'];
            $drying_price[$date["crop_coll"]]=$drying_qty[$date["crop_coll"]]*$agri_crop_head[$crop['crop_id']]['drying_price'];
            $storing_price[$date["crop_coll"]]=$drying_qty[$date["crop_coll"]]*$agri_crop_head[$crop['crop_id']]['storing_price'];
            $total_handling[$date["crop_coll"]]=$cleaning_price[$date["crop_coll"]]+$drying_price[$date["crop_coll"]]+$storing_price[$date["crop_coll"]];
            if($setting!=false){
                $drying_qty[$date["crop_coll"]]=($setting["date-set"][$crop['crop_id'].'3'][1]+$drying_qty[$date["crop_coll"]])-($setting["date-set"][$crop['crop_id'].'3'][2]+$setting["date-set"][$crop['crop_id'].'3'][3]+$setting["date-set"][$crop['crop_id'].'3'][4]+$setting["date-set"][$crop['crop_id'].'3'][5]);
            }
            for ($x=1; $x<=12;$x++){
                $mass[$date["crop_coll"]][$x]=($drying_qty[$date["crop_coll"]])*($agri_sales['r'.$crop['crop_id']]['s'.$x]/100);
                $ex_mass[$date["crop_coll"]]=$ex_mass[$date["crop_coll"]]+$mass[$date["crop_coll"]][$x];
                $price[$date["crop_coll"]][$x]=$mass[$date["crop_coll"]][$x]*$agri_sales['p'.$crop['crop_id']]['s'.$x];
                $revenue[$date["crop_coll"]]=$revenue[$date["crop_coll"]]+$price[$date["crop_coll"]][$x];
                $date['revenue_crop'][$date["crop_coll"]][$x]=$price[$date["crop_coll"]][$x];
                $date['mont-revenue'][$x]=$price[$date["crop_coll"]][$x];
                $date['mont-revenue-price'][$x]= $agri_sales['p'.$crop['crop_id']]['s'.$x];
                $date['mont-revenue-mass'][$x]= $mass[$date["crop_coll"]][$x];
            }
            if($open_remains==7)
                $date['remains'][]=array(
                    "area"=>$crop['area'],
                    "yaled"=>$crop['yaled'],
                    "gross_weight"=>$gross_weight[$date["crop_coll"]],
                    "weight_cleaning"=>$cleaning_qty[$date["crop_coll"]],
                    "weight_drying"=>$drying_qty[$date["crop_coll"]],
                    "mass"=>$ex_mass[$date["crop_coll"]],
                    "price"=>$revenue[$date["crop_coll"]]/$ex_mass[$date["crop_coll"]],
                    "revenue"=>$revenue[$date["crop_coll"]]
            );
            if($open_remains==5)
                $date['remains'][]=array(
                    "gross_weight"=>$gross_weight[$date["crop_coll"]],
                    "weight_cleaning"=>$cleaning_qty[$date["crop_coll"]],
                    "weight_drying"=>$drying_qty[$date["crop_coll"]],
                    "cleaning_cost"=>$cleaning_price[$date["crop_coll"]],
                    "drying_cost"=>$drying_price[$date["crop_coll"]],
                    "storing_cost"=>$storing_price[$date["crop_coll"]],
                    "total_handling"=>$total_handling[$date["crop_coll"]]
            );
            //
            foreach ($bd['agri_crop_plan'] as $plan)if($plan['id_crop']==$crop['crop_id'] and $plan['id_materials']!=false){
                $materials_arr[$plan['id_plan']]=explode(',',$plan['id_materials']);
                foreach ($materials_arr[$plan['id_plan']] as $material)if($material!=false){
                    if($agri_material[$material]['type_material']==1) {
                        $seeds_mass[$date["crop_coll"]] += $agri_material[$material]['qlt_material'] * $crop['area'];
                    }
                }
            }
            //материалы
            $id_mat=0;
            foreach ($bd['agri_crop_plan'] as $plan)if($plan['id_crop']==$crop['crop_id'] and $plan['id_materials']!=false){
                $materials_arr[$plan['id_plan']]=explode(',',$plan['id_materials']);
                foreach ($materials_arr[$plan['id_plan']] as $material)if($material!=false){
                    $id_mat++;
                    $mass_qlt=$crop['area'];

                    if($agri_material[$material]['subtype_material']==5) $mass_qlt=$seeds_mass[$date["crop_coll"]]/1000;

                    $material_name_en[$material]=SRC::translit($agri_material[$material]['name_material']);
                    $materialQlt[$plan['id_plan']][$material][$id_mat]=($agri_material[$material]['qlt_material']*$mass_qlt)-$GLOBALS['my_materials'][$material_name_en[$material]];;
                    if($materialQlt[$plan['id_plan']][$material][$id_mat]<0) $materialQlt[$plan['id_plan']][$material][$id_mat]=0;

                    $GLOBALS['my_materials'][$material_name_en[$material]]-=($agri_material[$material]['qlt_material'][$id_mat]*$mass_qlt);

                    $price_material[$plan['id_plan']][$material]=$agri_material[$material]['price_material']*$materialQlt[$plan['id_plan']][$material][$id_mat];
                    $sum_price_material[$date["crop_coll"]][$agri_material[$material]['type_material']]+=$price_material[$plan['id_plan']][$agri_material[$material]['id_material']];
                    $sum_qlt_material[$plan['id_plan']]=$sum_qlt_material[$plan['id_plan']]+($agri_material[$material]['qlt_material']*$mass_qlt);
                    $materials[$agri_material[$material]['type_material']][$plan['id_plan']]+=$price_material[$plan['id_plan']][$agri_material[$material]['id_material']];

                    if($open_remains==8){
                        $GLOBALS[$agri_material[$material]['name_material']]=$GLOBALS[$agri_material[$material]['name_material']]+($agri_material[$material]['qlt_material']*$mass_qlt);
                        $GLOBALS['material_setting'][$agri_material[$material]['type_material']][$material_name_en[$material]]=array(
                            "name"=>$agri_material[$material]['name_material'],
                            "mass"=>$GLOBALS[$agri_material[$material]['name_material']],
                            "price"=>$agri_material[$material]['price_material'],
                        );
                    }
                    $ex_material[$plan['id_plan']][]=array(
                        "name"=>$agri_material[$material]['name_material'],
                        "material_qty"=>$agri_material[$material]['qlt_material'],
                        "material_mass"=>$agri_material[$material]['qlt_material']*$mass_qlt,
                        "material_price"=>$agri_material[$material]['price_material'],
                        "material_total_price"=>$price_material[$plan['id_plan']][$agri_material[$material]['id_material']],
                        "type"=>$agri_material[$material]['type_material'],
                        "area"=>$mass_qlt
                    );
                    $materialQltMass[$plan['id_plan']]+=$agri_material[$material]['qlt_material']*$mass_qlt;
                }
            }
            //план
            foreach ($bd['agri_crop_plan'] as $plan)if($plan['id_crop']==$crop['crop_id']){
                if($plan['id_parent']==0) {$total_work[$plan['id_plan']]=$crop['area']; $unit[$plan['id_plan']]='га';};
                if($plan['id_parent']!=0){
                    if(!empty($materialQltMass[$plan['id_parent']])){
                        $total_work[$plan['id_plan']]=$materialQltMass[$plan['id_parent']]/1000;
                    }else{
                        $total_work[$plan['id_plan']]=false;
                    }
                    $unit[$plan['id_plan']]='т';
                }
                //Паливо-мастильні матеріали
                $total_fuel_amnt[$plan['id_plan']]=$total_work[$plan['id_plan']]*$agri_action[$plan['id_action']]['fuel_cons'];
                $total_fuel_cost[$plan['id_plan']]=$total_fuel_amnt[$plan['id_plan']]*$fuel_type[$agri_action[$plan['id_action']]['fuel_type']]['price_fuel'];
                $total_oil_amnt[$plan['id_plan']]=$total_fuel_amnt[$plan['id_plan']]*($Rate_oil[1]+$Rate_oil[2]+$Rate_oil[3]);
                $total_oil_cost[$plan['id_plan']]=($Rate_oil[1]*$total_fuel_amnt[$plan['id_plan']]*$price_oil[1])+($Rate_oil[2]*$total_fuel_amnt[$plan['id_plan']]*$price_oil[2])+($Rate_oil[3]*$total_fuel_amnt[$plan['id_plan']]*$price_oil[3]);
                $fuel_lubes_cost[$plan['id_plan']]=$total_fuel_cost[$plan['id_plan']]+ $total_oil_cost[$plan['id_plan']];
                $total_fuel_cost_ex[$date["crop_coll"]]=$total_fuel_cost_ex[$date["crop_coll"]]+$fuel_lubes_cost[$plan['id_plan']];
                //Прямі витрати на оплату праці
                //Смены
                $shiftsEx[$plan['id_plan']]=($total_work[$plan['id_plan']])/($agri_action[$plan['id_action']]['productivity']);
                //Оплата труда водителям и рабочим
                $drivers_pay[$plan['id_plan']]=($agri_action[$plan['id_action']]['drivers'])*($min_labor)*($labor_class_driver[$agri_action[$plan['id_action']]['driver_class']])*(1+$agri_action[$plan['id_action']]['driver_bonus']/100)*$shiftsEx[$plan['id_plan']];
                $workers_pay[$plan['id_plan']]=($agri_action[$plan['id_action']]['workers'])*($min_labor)*($labor_class_worker[$agri_action[$plan['id_action']]['worker_class']])*(1+$agri_action[$plan['id_action']]['worker_bonus']/100)*$shiftsEx[$plan['id_plan']];

                $drivers_pay_bonus[$plan['id_plan']]=($agri_action[$plan['id_action']]['drivers'])*($min_labor)*($labor_class_driver[$agri_action[$plan['id_action']]['driver_class']])*(1+$agri_action[$plan['id_action']]['driver_bonus']/100);
                $workers_pay_bonus[$plan['id_plan']]=($agri_action[$plan['id_action']]['workers'])*($min_labor)*($labor_class_worker[$agri_action[$plan['id_action']]['worker_class']])*(1+$agri_action[$plan['id_action']]['worker_bonus']/100);
                //Сумма оплаты труда водителям и рабочим
                $labor_total_cost[$plan['id_plan']]=$drivers_pay[$plan['id_plan']]+$workers_pay[$plan['id_plan']];
                //Налоги
                $drivers_tax[$plan['id_plan']]=$drivers_pay[$plan['id_plan']]*$labor_tax;
                $workers_tax[$plan['id_plan']]=$workers_pay[$plan['id_plan']]*$labor_tax;
                $labor_total_tax[$plan['id_plan']]=$drivers_tax[$plan['id_plan']]+$workers_tax[$plan['id_plan']];
                //Общие затраты на оплату труда
                $labor_drivers_cost_tax[$plan['id_plan']]= $drivers_pay[$plan['id_plan']]+$drivers_tax[$plan['id_plan']];
                $labor_workers_cost_tax[$plan['id_plan']]= $workers_pay[$plan['id_plan']]+$workers_tax[$plan['id_plan']];
                $labor_total_cost_tax[$plan['id_plan']]= $labor_total_cost[$plan['id_plan']]+$labor_total_tax[$plan['id_plan']];
                $labor_total_cost_ex[$date["crop_coll"]]=$labor_total_cost_ex[$date["crop_coll"]]+$labor_total_cost_tax[$plan['id_plan']];
                if($open_remains==1 and $plan['id_materials']!=false)
                    foreach ($ex_material[$plan['id_plan']] as $item){
                        $date['remains'][]=array(
                            "name_action"=>$agri_action[$plan['id_action']]['name_action'],
                            "material"=>$item['name'],
                            "material_qty"=>$item['material_qty'],
                            "material_mass"=>$item['material_mass'],
                            "material_price"=>$item['material_price'],
                            "material_total_price"=>$item['material_total_price'],
                            "type"=>$item['type'],
                            "area"=>$crop['area'],
                        );
                    };
                if($open_remains==2)
                    $date['remains'][]=array(
                        "name_action"=>$agri_action[$plan['id_action']]['name_action'],
                        "name_working_ua" => $agri_action[$plan['id_action']]['name_working'],
                        "name_power_ua" => $agri_action[$plan['id_action']]['name_power'],
                        "name_fuel"=> $fuel_type[$agri_action[$plan['id_action']]['fuel_type']]['name_fuel_ua'],
                        "productivity" => $agri_action[$plan['id_action']]['productivity'],
                        "total_work" => $total_work[$plan['id_plan']],
                        "shifts" => $shiftsEx[$plan['id_plan']],
                        "fuel" =>  $agri_action[$plan['id_action']]['fuel_cons'],
                        "total_fuel_amnt" => $total_fuel_amnt[$plan['id_plan']],
                        "price_fuel"=> $fuel_type[$agri_action[$plan['id_action']]['fuel_type']]['price_fuel'],
                        "total_fuel_cost"=> $total_fuel_cost[$plan['id_plan']],
                        "total_oil_amnt"=> $total_oil_amnt[$plan['id_plan']],
                        "total_oil_cost"=> $total_oil_cost[$plan['id_plan']],
                        "fuel_lubes_cost"=> $fuel_lubes_cost[$plan['id_plan']],
                    );
                if($open_remains==3)
                    $date['remains'][]=array(
                        "name_action"=>$agri_action[$plan['id_action']]['name_action'],
                        "shifts" => $shiftsEx[$plan['id_plan']],
                        "drivers" =>$agri_action[$plan['id_action']]['drivers'],
                        "workers" =>$agri_action[$plan['id_action']]['workers'],
                        "driver_class"=>$agri_action[$plan['id_action']]['driver_class'],
                        "worker_class"=>$agri_action[$plan['id_action']]['worker_class'],
                        "driver_bonus"=>$agri_action[$plan['id_action']]['driver_bonus'],
                        "worker_bonus"=>$agri_action[$plan['id_action']]['worker_bonus'],
                        "drivers_pay_shifts"=>$drivers_pay[$plan['id_plan']]/$shiftsEx[$plan['id_plan']],
                        "workers_pay_shifts"=>$workers_pay[$plan['id_plan']]/$shiftsEx[$plan['id_plan']],
                        "drivers_pay"=>$drivers_pay[$plan['id_plan']],
                        "workers_pay"=>$workers_pay[$plan['id_plan']],
                        "drivers_tax"=>$drivers_tax[$plan['id_plan']],
                        "workers_tax"=>$workers_tax[$plan['id_plan']],
                        "labor_drivers_cost_tax"=>$labor_drivers_cost_tax[$plan['id_plan']],
                        "labor_workers_cost_tax"=>$labor_workers_cost_tax[$plan['id_plan']],
                        "pay_shifts"=>$drivers_pay[$plan['id_plan']]/$shiftsEx[$plan['id_plan']]+$workers_pay[$plan['id_plan']]/$shiftsEx[$plan['id_plan']],
                        "labor_total_cost"=>$labor_total_cost[$plan['id_plan']],
                        "labor_total_tax"=>$labor_total_tax[$plan['id_plan']],
                        "labor_total_cost_tax"=> $labor_total_cost_tax[$plan['id_plan']],
                    );
                if($open_remains==4){
                    $time1[$plan['id_plan']]=new DateTime($plan['start_date']);
                    $time2[$plan['id_plan']]=new DateTime($plan['end_date']);
                    $interval[$plan['id_plan']]=$time2[$plan['id_plan']]->diff($time1[$plan['id_plan']]);
                    $time[$plan['id_plan']] =$interval[$plan['id_plan']]->days;
                    $total[$plan['id_plan']]=$materials[1][$plan['id_plan']]+$materials[2][$plan['id_plan']]+$materials[3][$plan['id_plan']]+$fuel_lubes_cost[$plan['id_plan']];
                    $date['total']['total']=$date['total']['total']+$total[$plan['id_plan']];
                    $date['remains'][]=array(
                        "name_action"=>$agri_action[$plan['id_action']]['name_action'],
                        "strat_data" => $plan['start_date'],
                        "time"=>$time[$plan['id_plan']],
                        "seeds"=>$materials[1][$plan['id_plan']],
                        "fertilizers"=>$materials[2][$plan['id_plan']],
                        "ppa"=>$materials[3][$plan['id_plan']],
                        "fuel_lubes_cost"=> $fuel_lubes_cost[$plan['id_plan']],
                        "total"=>$total[$plan['id_plan']]
                    );
                }
                if ($open_remains==9){
                    if($plan['id_materials']!=false) {
                        foreach ($ex_material[$plan['id_plan']] as $item) {
                            $date['remains_material'][$item['type']][] = array(
                                "material" => $item['name'],
                                "material_qty" => $item['material_qty'],
                                "material_price" => $item['material_price'],
                                "material_price_area" => $item['material_qty'] * $item['material_price'],
                                "material_price_mass" => ($item['material_qty'] * $item['material_price']) / $drying_qty[$date["crop_coll"]]
                            );
                        };
                    };
                    $date['remains'][]=array(
                        "id_plan"=>$plan['id_plan'],
                        "name_action"=>$agri_action[$plan['id_action']]['name_action'],
                        "unit"=>$unit[$plan['id_plan']],
                        "total_work" => $total_work[$plan['id_plan']],
                        "name_working_ua" => $agri_action[$plan['id_action']]['name_working'],
                        "name_power_ua" => $agri_action[$plan['id_action']]['name_power'],
                        "drivers" =>$agri_action[$plan['id_action']]['drivers'],
                        "driver_class"=>$agri_action[$plan['id_action']]['driver_class'],
                        "productivity" => $agri_action[$plan['id_action']]['productivity'],
                        "shifts" => $shiftsEx[$plan['id_plan']],
                        "drivers_pay_shifts"=>$drivers_pay_bonus[$plan['id_plan']],
                        "drivers_pay"=>$drivers_pay[$plan['id_plan']],
                        "drivers_tax"=>$drivers_tax[$plan['id_plan']],
                        "workers" =>$agri_action[$plan['id_action']]['workers'],
                        "worker_class"=>$agri_action[$plan['id_action']]['worker_class'],
                        "workers_pay_shifts"=>$workers_pay_bonus[$plan['id_plan']]/$shiftsEx[$plan['id_plan']],
                        "workers_pay"=>$workers_pay[$plan['id_plan']],
                        "workers_tax"=>$workers_tax[$plan['id_plan']],
                        "labor_total_cost_tax"=> $labor_total_cost_tax[$plan['id_plan']],
                        "fuel" =>  $agri_action[$plan['id_action']]['fuel_cons'],
                        "total_fuel_amnt" => $total_fuel_amnt[$plan['id_plan']],
                         "total_fuel_cost"=> $total_fuel_cost[$plan['id_plan']],
                    );
                }
            }
            if ($open_remains==9){
                $date['remains']['stat']=array(
                    'name'=>$agri_crop_head[$crop['crop_id']]['name_crop_ua'],
                    'area'=>$crop['area'],
                    'mass'=>$drying_qty[$date["crop_coll"]],
                    'yaled'=>$crop['yaled']
                );
            }
            $date['name'][$date["crop_coll"]]=$agri_crop_head[$crop['crop_id']]['name_crop_ua'];
            $date['revenue'][$date["crop_coll"]]=$revenue[$date["crop_coll"]];
            $date["lease"][$date["crop_coll"]]=$crop['area']*$price_lease;
            $date["seeds"][$date["crop_coll"]]=$sum_price_material[$date["crop_coll"]][1];
            $date["fertilizers"][$date["crop_coll"]]=$sum_price_material[$date["crop_coll"]][2];
            $date["ppa"][$date["crop_coll"]]=$sum_price_material[$date["crop_coll"]][3];
            $date["fuel"][$date["crop_coll"]] = $total_fuel_cost_ex[$date["crop_coll"]];
            $date["services"][$date["crop_coll"]] = $total_handling[$date["crop_coll"]];
            $calculator[1][$date["crop_coll"]]=($date["fuel"][$date["crop_coll"]]+$date["services"][$date["crop_coll"]]+$date["seeds"][$date["crop_coll"]]+$date["fertilizers"][$date["crop_coll"]]+$date["ppa"][$date["crop_coll"]]);
            $date["remainder"][$date["crop_coll"]]=($calculator["1"][$date["crop_coll"]]/0.99)*0.01;
            $date["direct_cost"][$date["crop_coll"]]=($calculator["1"][$date["crop_coll"]]/0.99);
            $date["direct_labor"][$date["crop_coll"]] = $labor_total_cost_ex[$date["crop_coll"]];
            $date["repair"][$date["crop_coll"]]=($date["fuel"][$date["crop_coll"]])*0.07;
            $date["other_direct"][$date["crop_coll"]]= ($date["repair"][$date["crop_coll"]]+$date["lease"][$date["crop_coll"]])/0.73;
            $date["amortization"][$date["crop_coll"]]= $date["other_direct"][$date["crop_coll"]]*0.20;
            $date["production_cost"][$date["crop_coll"]]=$date["direct_cost"][$date["crop_coll"]]+$date["direct_labor"][$date["crop_coll"]]+$date["other_direct"][$date["crop_coll"]];
            $date["other_operating"][$date["crop_coll"]] = $date["production_cost"][$date["crop_coll"]]*($agri_crop_head[$crop['crop_id']]['other_operating']/100);
            $date["total_cost"][$date["crop_coll"]] = $date["other_operating"][$date["crop_coll"]]+$date["production_cost"][$date["crop_coll"]];
            foreach ($table_name as $total){
                $date["total"][$total["name_php"]]=$date["total"][$total["name_php"]]+$date[$total["name_php"]][$date["crop_coll"]];
            }
            if ($open_remains==9){
                $date['remains_table']=array(
                    array(
                        '9','10','11','12','13'
                    ),
                    array(
                        '1','','', $date["direct_labor"][$date["crop_coll"]]/$crop['area'], $date["direct_labor"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '2','','', $date["seeds"][$date["crop_coll"]]/$crop['area'], $date["seeds"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '3','','', $date["fertilizers"][$date["crop_coll"]]/$crop['area'], $date["fertilizers"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '4','','',$date["ppa"][$date["crop_coll"]]/$crop['area'],$date["ppa"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '5','','',$date["production_cost"][$date["crop_coll"]]/$crop['area'],$date["production_cost"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '6','','',$date["amortization"][$date["crop_coll"]]/$crop['area'],$date["amortization"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '7','','',$date["other_direct"][$date["crop_coll"]]/$crop['area'],$date["other_direct"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                    array(
                        '8','','',$date["production_cost"][$date["crop_coll"]]/$crop['area'],$date["production_cost"][$date["crop_coll"]]/$drying_qty[$date["crop_coll"]]
                    ),
                );
            }

            if($open_remains==6){
                $calculator["4"][$date["crop_coll"]]=($revenue[$date["crop_coll"]]-$date["total_cost"][$date["crop_coll"]])/$crop['area'];
                $calculator["8"][$date["crop_coll"]]=$date["total_cost"][$date["crop_coll"]]/$crop['area'];
                $calculator["EBIT"][$date["crop_coll"]]=($revenue[$date["crop_coll"]]-$date["production_cost"][$date["crop_coll"]]);
                $selling_price[$date["crop_coll"]]=$revenue[$date["crop_coll"]]/$ex_mass[$date["crop_coll"]];
                $date['remains'][$crop["crop_id"]."-3"]=array(
                    "st"=>$agri_crop_head[$crop['crop_id']]['crop_st'],
                    "1"=>$crop['yaled'],
                    "2"=>($selling_price[$date["crop_coll"]])/$_COOKIE['currency_val'],
                    "3"=>($revenue[$date["crop_coll"]]/$crop['area'])/$_COOKIE['currency_val'],
                    "4"=>($calculator["4"][$date["crop_coll"]])/$_COOKIE['currency_val'],
                    "5"=>($date["production_cost"][$date["crop_coll"]]/($drying_qty[$date["crop_coll"]]))/$_COOKIE['currency_val'],
                    "6"=>($date["production_cost"][$date["crop_coll"]]/$crop['area'])/$_COOKIE['currency_val'],
                    "7"=>($date["total_cost"][$date["crop_coll"]]/($drying_qty[$date["crop_coll"]]))/$_COOKIE['currency_val'],
                    "8"=>($calculator["8"][$date["crop_coll"]])/$_COOKIE['currency_val'],
                    "9"=>($calculator["8"][$date["crop_coll"]]/$selling_price[$date["crop_coll"]])*10,
                    "10"=>(($calculator["8"][$date["crop_coll"]]/$selling_price[$date["crop_coll"]])*1.5)*10,
                    "11"=>(($revenue[$date["crop_coll"]]-$date["production_cost"][$date["crop_coll"]])/($drying_qty[$date["crop_coll"]]))/$_COOKIE['currency_val'],
                    "12"=>(($revenue[$date["crop_coll"]]-$date["production_cost"][$date["crop_coll"]])/$crop['area'])/$_COOKIE['currency_val'],
                    "13"=>(($calculator["EBIT"][$date["crop_coll"]]+$date["amortization"][$date["crop_coll"]])/$crop['area'])/$_COOKIE['currency_val'],
                    "14"=>(($revenue[$date["crop_coll"]]-($date["direct_cost"][$date["crop_coll"]] + $date["direct_labor"][$date["crop_coll"]]+$date["lease"][$date["crop_coll"]]+$date["repair"][$date["crop_coll"]]))/$crop['area'])/$_COOKIE['currency_val'],
                    "15"=>(($revenue[$date["crop_coll"]]-($date["direct_cost"][$date["crop_coll"]] + $date["direct_labor"][$date["crop_coll"]]+$date["lease"][$date["crop_coll"]]+$date["repair"][$date["crop_coll"]]))/$revenue[$date["crop_coll"]])*100,
                    "16"=>(($revenue[$date["crop_coll"]]-$date["total_cost"][$date["crop_coll"]])/$date["total_cost"][$date["crop_coll"]])*100,
                    "17"=>($calculator["EBIT"][$date["crop_coll"]]/$revenue[$date["crop_coll"]])*100,
                );
            }
        }
        return $date;
    }

}