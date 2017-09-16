<?php
class Budget{
    //таблица
    public static function getTable(){
        $valuta=array(
            'ua'=>[
                'UAH'=>'грн',
                'USD'=>'$',
                'EUR'=>'евро',
            ],
            'gb'=>[
                'UAH'=>'uah',
                'USD'=>'$',
                'EUR'=>'eur',
            ]
        );
        $Ex_name=array(
            array(
                "name_php"=>"revenue",
                "name_ua"=>"Виручка від реалізації продукції",
                "name_en"=>'Revenue from sale',
                "class"=>"",
                "proc"=>"revenue",
                "href"=>"/farmer/budget/remains-revenue"
            ),
            array(
                "name_php"=>"production_cost",
                "name_ua"=>"Виробнича собівартість:",
                "name_en"=>"Operating cost:",
                "class"=>"",
                "proc"=>"total_cost",
                "href"=>""
            ),
            array(
                "name_php"=>"direct_cost",
                "name_ua"=>"Прямі матеріальні витрати:",
                "name_en"=>"Direct cost:",
                "class"=>"",
                "proc"=>"production_cost",
                "href"=>"/farmer/budget/remains-direct"
            ),
            array(
                "name_php"=>"seeds",
                "name_ua"=>"Насіння",
                "name_en"=>'Seeds',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>"/farmer/budget/remains-material/1"
            ),
            array("name_php"=>"fertilizers",
                "name_ua"=>"Мінеральні добрива",
                "name_en"=>'Mineral fertilizers',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>"/farmer/budget/remains-material/2"
            ),
            array("name_php"=>"ppa",
                "name_ua"=>"Засоби захисту рослин",
                "name_en"=>'Plant protection agents',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>"/farmer/budget/remains-material/3"
            ),
            array("name_php"=>"fuel",
                "name_ua"=>"Паливо-мастильні матеріали",
                "name_en"=>'Fuel and lubricants',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>"/farmer/budget/remains-fuel"
            ),
            array("name_php"=>"services",
                "name_ua"=>"Оплата послуг і робіт сторонніх організацій",
                "name_en"=>'Payment for services and works of outside organizations',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>"/farmer/budget/remains-services"
            ),
            array("name_php"=>"remainder",
                "name_ua"=>"Решта матеріальних витрат",
                "name_en"=>'Other material costs',
                "class"=>"level2",
                "proc"=>"direct_cost",
                "href"=>""
            ),
            array("name_php"=>"direct_labor",
                "name_ua"=>"Прямі витрати на оплату праці",
                "name_en"=>'Direct labor costs',
                "class"=>"level1",
                "proc"=>"production_cost",
                "href"=>"/farmer/budget/remains-labor"
            ),
            array("name_php"=>"other_direct",
                "name_ua"=>"Інші прямі та загальновиробничі витрати:",
                "name_en"=>"Other direct and overhead costs:",
                "class"=>"level1",
                "proc"=>"production_cost",
                "href"=>""
            ),
            array("name_php"=>"lease",
                "name_ua"=>"в тому числі орендна плата",
                "name_en"=>'including land lease',
                "class"=>"level2",
                "proc"=>"other_direct",
                "href"=>""),
            array("name_php"=>"repair",
                "name_ua"=>"ремонт і обслуговування",
                "name_en"=>'repair and maintenance',
                "class"=>"level3",
                "proc"=>"other_direct",
                "href"=>""
            ),
            array("name_php"=>"amortization",
                "name_ua"=>"амортизація",
                "name_en"=>'amortization and depresiation',
                "class"=>"level3",
                "proc"=>"other_direct",
                "href"=>""
            ),
            array("name_php"=>"other_operating",
                "name_ua"=>"Інші операційні витрати",
                "name_en"=>'Other operating costs',
                "class"=>"",
                "proc"=>"total_cost",
                "href"=>""
            ),
            array("name_php"=>"total_cost",
                "name_ua"=>"Повна собівартість",
                "name_en"=>'Total cost',
                "class"=>"",
                "proc"=>"total_cost",
                "href"=>""
            ),
        );
        return $Ex_name;
    }
    //сумма таблиц
    public static function getTotal($Ex_name){
        foreach ($Ex_name as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=0;
            $ex_date["total"][$Ex_total["name_php"]]=$ex_date["total"][$Ex_total["name_php"]]+$ex_date[$Ex_total["name_php"]][$ex_date["crop_coll"]];
        }
        $ex_date['total']['total']=0;
    }
    //БЮДЖЕТ
    public  static  function getBuget($load, $open_remains=0, $type, $table, $setting=false){
        $db = Db::getConnection();
        $Ex_name=$table;
        $id_user = $_SESSION['id_user'];
        if($type==1) $type_name="";
        if($type==2) $type_name="_veg";
        $Crops=$load['1'];
        $Crops2=$load['2'];
        $MyCrop=$load["MyCrop"];

        $notMaterialEx=array(
            "material_price"=>false,
            "false"=>false,
            "material_qty_z1"=>false,
            "material_qty_z2"=>false,
            "material_qty_z3"=>false,
            "material_qty"=>false,
            "name_material_ua"=>false,
        );
        $notActionEx=array(
            "id_action"=>false,
            "name_action_ua"=>"!",
            "drivers"=>false,
            "driver_class"=>1,
            "driver_bonus"=>false,
            "workers"=>false,
            "worker_class"=>1,
            "worker_bonus"=>false,

        );
        $notEquipmentEx= array(
            "productivity_9"=>9999999,
            "name_working_ua"=>"!",
            "name_power_ua"=>"!",
            "name_fuel_ua"=>"!",
            "fuel_cons_9"=>false,
            "price_fuel"=>false,
        );
        $ex_date["crop_coll"]=0;
        foreach ($Ex_name as $Ex_total){
            $ex_date["total"][$Ex_total["name_php"]]=0;
        }
        $ex_date['total']['total']=0;
        $min_labor=3200;
        $labor_tax=0.22;
        $Rate_oil[1]=0.039999999;//diesel oil
        $Rate_oil[2]=0.01;//transmission oil
        $Rate_oil[3]=0.0015;//consistent oil
        $price_oil[1]=22.0000;//diesel oil
        $price_oil[2]=24.0000;//transmission oil
        $price_oil[3]=35.8400;//consistent oil

        $result = $db->query("SELECT * FROM  labor_class_rates");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['labor_class_rates'] = $result->fetchAll();
        foreach ($date['labor_class_rates'] as $labor_class_rates){
            $labor_class_driver[$labor_class_rates['class']]=$labor_class_rates['driver'];
            $labor_class_worker[$labor_class_rates['class']]=$labor_class_rates['worker'];
        }

        $result = $db->query("SELECT * FROM analytica_date WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['analytica_date'] = $result->fetchAll();

        $zona=$date['analytica_date'][0]['zona'];
        if($zona==false) $zona=1;
        $price_lease=$date['analytica_date'][0]['lease'];

        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head$type_name WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_head'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_plan$type_name WHERE $Crops ORDER BY number_order ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop_plan'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_action_$lang as name_action_ua FROM action$type_name WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM equipment$type_name AS eq, action$type_name As ac, fuel_type$type_name AS fuel, working_eqt$type_name AS wor, power_eqt$type_name AS pow WHERE eq.action_id=ac.id_action AND eq.fuel_type_id=fuel.id_fuel AND eq.working_eqt_id=wor.id_working AND eq.power_eqt_id=pow.id_power AND NOT eq.status_delete = 1 ORDER BY id_equipment");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['equipment'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM  material_plan$type_name");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_plan'] = $result->fetchAll();

        $result = $db->query("SELECT *,name_material_$lang as name_material_ua FROM material_ppa$type_name WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT *,name_material_$lang as name_material_ua FROM material_seeds$type_name WHERE $Crops AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT *,name_material_$lang as name_material_ua FROM material_fertilizers$type_name WHERE $Crops AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_action_type_$lang as name_action_type_ua FROM  action_type$type_name");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action_type'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM store_basket WHERE $Crops AND user_id=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['store_basket'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_fertilizers WHERE $Crops2");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_ppa WHERE $Crops2");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM distributor_material_seeds WHERE $Crops2");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['distributor_material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM setting_sales WHERE id_user=0 or id_user=$id_user ORDER BY id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sales'] = $result->fetchAll();
        foreach ($date['sales'] as $sales){
            for ($x=1; $x<=12;$x++){
                $ex_sales[$sales['name']][$x]=$sales['s'.$x];
            }
        }
        foreach ($MyCrop as $Crop){
            $ex_date["crop_coll"]++;
            $ex_date["crop"][$ex_date["crop_coll"]]=$Crop['crop_id'];
            $ex_date["seeds"][$ex_date["crop_coll"]] = 0;
            $ex_date["fertilizers"][$ex_date["crop_coll"]] = 0;
            $ex_date["ppa"][$ex_date["crop_coll"]] = 0;
            $ex_mass[$Crop['crop_id']]=0;
            $revenue[$ex_date["crop_coll"]]=0;
            $total_fuel_cost_ex[$Crop['crop_id']]=0;
            $labor_total_cost_ex[$Crop['crop_id']]=0;
            foreach ($date['crop_head'] as $crop_head)if($Crop['crop_id']==$crop_head['id_crop']){
                $crop_name[$Crop['crop_id']]=$crop_head['name_crop_ua'];
                $gross_weight[$Crop['crop_id']] = ($Crop['yaled']*$Crop['area'])/10;
                $cleaning_qty[$Crop['crop_id']]=$gross_weight[$Crop['crop_id']]-$gross_weight[$Crop['crop_id']]*($crop_head['cleaning_qty']/100);
                $drying_qty[$Crop['crop_id']]=$cleaning_qty[$Crop['crop_id']]-$cleaning_qty[$Crop['crop_id']]*($crop_head['drying_qty']/100);
                $cleaning_price[$Crop['crop_id']]=$cleaning_qty[$Crop['crop_id']]*$crop_head['cleaning_price'];
                $drying_price[$Crop['crop_id']]=$drying_qty[$Crop['crop_id']]*$crop_head['drying_price'];
                $storing_price[$Crop['crop_id']]=$drying_qty[$Crop['crop_id']]*$crop_head['storing_price'];
                $total_handling[$Crop['crop_id']]=$cleaning_price[$Crop['crop_id']]+$drying_price[$Crop['crop_id']]+$storing_price[$Crop['crop_id']];
                $selling_price[$Crop['crop_id']]=$crop_head["selling_price"];
                if ($Crop['yaled'] < $crop_head['yield_min']) $yaled[$Crop['crop_id']] = 1;
                if ($crop_head['yield_min'] <= $Crop['yaled'] and $Crop['yaled'] < $crop_head['yield_max']) $yaled[$Crop['crop_id']] = 2;
                if ($crop_head['yield_max'] <= $Crop['yaled']) $yaled[$Crop['crop_id']] = 3;
                $lease[$ex_date["crop_coll"]]=$Crop['area']*$price_lease;
                if (!isset($crop_head['other_operating_'.$zona])) $crop_head['other_operating_'.$zona]=false;
                $other_operating[$Crop['crop_id']] = $crop_head['other_operating_'.$zona];
                if($setting!=false){
                    $drying_qty[$Crop['crop_id']]=($setting["date-set"][$Crop['crop_id'].$type][1]+$drying_qty[$Crop['crop_id']])-($setting["date-set"][$Crop['crop_id'].$type][2]+$setting["date-set"][$Crop['crop_id'].$type][3]+$setting["date-set"][$Crop['crop_id'].$type][4]+$setting["date-set"][$Crop['crop_id'].$type][5]);
                }
                for ($x=1; $x<=12;$x++){
                    $mass[$Crop['crop_id']][$x]=($drying_qty[$Crop['crop_id']])*($ex_sales['r'.$Crop['crop_id'].'-'.$type][$x]/100);
                    $ex_mass[$Crop['crop_id']]=$ex_mass[$Crop['crop_id']]+$mass[$Crop['crop_id']][$x];
                    $price[$Crop['crop_id']][$x]=$mass[$Crop['crop_id']][$x]*$ex_sales['p'.$Crop['crop_id'].'-'.$type][$x];
                    $revenue[$ex_date["crop_coll"]]=$revenue[$ex_date["crop_coll"]]+$price[$Crop['crop_id']][$x];
                    $ex_date['revenue_crop'][$ex_date["crop_coll"]][$x]=$price[$Crop['crop_id']][$x];
                    $ex_date['mont-revenue'][$x]=$ex_date['mont-revenue'][$x]+$price[$Crop['crop_id']][$x];
                    $ex_date['mont-revenue-price'][$x]=$ex_sales['p'.$Crop['crop_id'].'-'.$type][$x];
                    $ex_date['mont-revenue-mass'][$x]= $mass[$Crop['crop_id']][$x];
                }
            }
            if($open_remains==7)
                $ex_date['remains'][]=array(
                    "area"=>$Crop['area'],
                    "yaled"=>$Crop['yaled'],
                    "gross_weight"=>$gross_weight[$Crop['crop_id']],
                    "weight_cleaning"=>$cleaning_qty[$Crop['crop_id']],
                    "weight_drying"=>$drying_qty[$Crop['crop_id']],
                    "mass"=>$ex_mass[$Crop['crop_id']],
                    "price"=>$revenue[$ex_date["crop_coll"]]/$ex_mass[$Crop['crop_id']],
                    "revenue"=>$revenue[$ex_date["crop_coll"]]
                );
            if($open_remains==5)
                $ex_date['remains'][]=array(
                    "gross_weight"=>$gross_weight[$Crop['crop_id']],
                    "weight_cleaning"=>$cleaning_qty[$Crop['crop_id']],
                    "weight_drying"=>$drying_qty[$Crop['crop_id']],
                    "cleaning_cost"=>$cleaning_price[$Crop['crop_id']],
                    "drying_cost"=>$drying_price[$Crop['crop_id']],
                    "storing_cost"=>$storing_price[$Crop['crop_id']],
                    "total_handling"=>$total_handling[$Crop['crop_id']]
                );
            //материалы
            foreach ($date['crop_plan'] as $crop_plan)if(($crop_plan['tillage'] == 0 or $crop_plan['tillage'] == $Crop['tillage']) and $crop_plan['crop_id']==$Crop['crop_id']){
                $materialQltMass[$crop_plan['id']]=false;
                $materials["seeds"][$crop_plan['id']]=false;
                $materials["fertilizers"][$crop_plan['id']]=false;
                $materials["ppa"][$crop_plan['id']]=false;
                for ($p = 1; $p <= 3; $p++) {
                    $materialQlt[$crop_plan['id']][$p]=false;
                    //если нет материала пустые поля
                    $zona_table[$crop_plan['id']][$p]="false";
                    $materialEx[$crop_plan['id']][$p]=$notMaterialEx;
                    //выбор материала
                    $type_mat[$crop_plan['id']][$p]=0;
                    foreach ($date['material_plan'] as $material_plan[$p]) if( $material_plan[$p]['id_material_plan'] == $crop_plan['material_id_'.$p]) {
                        if ($material_plan[$p]['table_id'] == 1) {$material_table = "material_seeds"; $zona_table[$crop_plan['id']][$p]="material_qty_z".$zona;}
                        if ($material_plan[$p]['table_id'] == 2) {$material_table = "material_fertilizers"; $zona_table[$crop_plan['id']][$p]="material_qty_z".$zona;}
                        if ($material_plan[$p]['table_id'] == 3) {$material_table = "material_ppa"; $zona_table[$crop_plan['id']][$p]="material_qty";}
                        foreach ($date[$material_table] as $material[$p]) if ($material_plan[$p]['material_id_y'.$yaled[$Crop['crop_id']]] == $material[$p]['id_material']) {
                            $materialEx[$crop_plan['id']][$p]= $material[$p];
                            $type_mat[$crop_plan['id']][$p]=$material_plan[$p]['table_id'];
                        }
                    }
                    foreach ($date['store_basket'] as $basket)if($basket['plan_id']== $crop_plan['id'] and $basket['nomer_id']==$p){
                        if($basket['table_type']==1) $table="distributor_material_seeds";
                        if($basket['table_type']==2) $table="distributor_material_fertilizers";
                        if($basket['table_type']==3) $table="distributor_material_ppa";
                        foreach ($date[$table] as $disrtibutor_material[$p])if($disrtibutor_material[$p]['id_material']==$basket['material_id']){
                            $materialEx[$crop_plan['id']][$p]=array(
                                "material_price"=>$disrtibutor_material[$p]['material_price'],
                                "material_qty_z1"=>$disrtibutor_material[$p]['material_qty'],
                                "material_qty_z2"=>$disrtibutor_material[$p]['material_qty'],
                                "material_qty_z3"=>$disrtibutor_material[$p]['material_qty'],
                                "material_qty"=>$disrtibutor_material[$p]['material_qty'],
                                "name_material_ua"=>$disrtibutor_material[$p]['material_name'],
                            );
                            $type_mat[$crop_plan['id']][$p]=$basket['table_type'];
                        }
                    }
                    //Оющая масса материала
                    $material_name_en[$crop_plan['id']][$p]=SRC::translit($materialEx[$crop_plan['id']][$p]['name_material_ua']);
                    $material_Qlt[$crop_plan['id']][$p]=$materialEx[$crop_plan['id']][$p][$zona_table[$crop_plan['id']][$p]];
                        $materialQlt[$crop_plan['id']][$p]= ($materialEx[$crop_plan['id']][$p][$zona_table[$crop_plan['id']][$p]]*$Crop['area'])-$GLOBALS['my_materials'][$material_name_en[$crop_plan['id']][$p]];
                        $GLOBALS['my_materials'][$material_name_en[$crop_plan['id']][$p]]=$GLOBALS['my_materials'][$material_name_en[$crop_plan['id']][$p]]-($materialEx[$crop_plan['id']][$p][$zona_table[$crop_plan['id']][$p]]*$Crop['area']);
                        if($materialQlt[$crop_plan['id']][$p]<0) $materialQlt[$crop_plan['id']][$p]=0;
                        if($GLOBALS['my_materials'][$material_name_en[$crop_plan['id']][$p]]<0) $GLOBALS['my_materials'][$material_name_en[$crop_plan['id']][$p]]=0;
                    $materialQltMass[$crop_plan['id']]= $materialQltMass[$crop_plan['id']]+$materialQlt[$crop_plan['id']][$p];

                    if($open_remains==8){
                        $GLOBALS[$materialEx[$crop_plan['id']][$p]['name_material_ua']]=$GLOBALS[$materialEx[$crop_plan['id']][$p]['name_material_ua']]+$materialQlt[$crop_plan['id']][$p];
                        $GLOBALS['material_setting'][$type_mat[$crop_plan['id']][$p]][$materialEx[$crop_plan['id']][$p]['name_material_ua']]=array(
                            "name"=>$materialEx[$crop_plan['id']][$p]['name_material_ua'],
                            "mass"=>$GLOBALS[$materialEx[$crop_plan['id']][$p]['name_material_ua']],
                            "price"=>$materialEx[$crop_plan['id']][$p]['material_price'],
                        );
                    }
                    //Полная цена за материал
                    $materialPrice[$crop_plan['id']][$p] = $materialQlt[$crop_plan['id']][$p] * $materialEx[$crop_plan['id']][$p]['material_price'];
                    if($type_mat[$crop_plan['id']][$p] == 1) {
                        $ex_date["seeds"][$ex_date["crop_coll"]]=$ex_date["seeds"][$ex_date["crop_coll"]] + $materialPrice[$crop_plan['id']][$p];
                        $materials["seeds"][$crop_plan['id']]=$materials["seeds"][$crop_plan['id']]+$materialPrice[$crop_plan['id']][$p];
                    }
                    if($type_mat[$crop_plan['id']][$p] == 2) {
                        $ex_date["fertilizers"][$ex_date["crop_coll"]]=$ex_date["fertilizers"][$ex_date["crop_coll"]] + $materialPrice[$crop_plan['id']][$p];
                        $materials["fertilizers"][$crop_plan['id']]= $materials["fertilizers"][$crop_plan['id']]+$materialPrice[$crop_plan['id']][$p];
                    }
                    if($type_mat[$crop_plan['id']][$p] == 3) {
                        $ex_date["ppa"][$ex_date["crop_coll"]]=$ex_date["ppa"][$ex_date["crop_coll"]] + $materialPrice[$crop_plan['id']][$p];
                        $materials["ppa"][$crop_plan['id']]=$materials["ppa"][$crop_plan['id']]+$materialPrice[$crop_plan['id']][$p];
                    }
                }
            }
            //План
            foreach ($date['crop_plan'] as $crop_plan)if(($crop_plan['tillage'] == 0 or $crop_plan['tillage'] == $Crop['tillage']) and $crop_plan['crop_id']==$Crop['crop_id']){
                //выбор операции
                $actionEx[$crop_plan['id']]=$notActionEx;
                foreach ($date['action'] as $action)if($action['id_action']==$crop_plan['action_id']) {
                    $actionEx[$crop_plan['id']]=$action;
                }
                //выбор техники
                //если техники нет
                $equipmentEx[$crop_plan['id']]= $notEquipmentEx;
                //если техника существует
                foreach ($date['equipment'] as $equipment)if($equipment['action_id']==$actionEx[$crop_plan['id']]['id_action']){
                    $equipmentEx[$crop_plan['id']]=$equipment;
                }
                //объем работы
                if($crop_plan['parent_id']==0) {$total_work[$crop_plan['id']][$Crop['crop_id']]=$Crop['area']; $unit[$crop_plan['id']]='га';};
                if($crop_plan['parent_id']!=0){
                    if(!empty($materialQltMass[$crop_plan['parent_id']])){
                        $total_work[$crop_plan['id']][$Crop['crop_id']]=$materialQltMass[$crop_plan['parent_id']]/1000;
                    }else{
                        $total_work[$crop_plan['id']][$Crop['crop_id']]=false;
                    }
                    $unit[$crop_plan['id']]='т';
                }
                //Смены
                $shiftsEx[$crop_plan['id']]=($total_work[$crop_plan['id']][$Crop['crop_id']])/($equipmentEx[$crop_plan['id']]['productivity_9']);
                //Оплата труда водителям и рабочим
                $drivers_pay[$crop_plan['id']]=($actionEx[$crop_plan['id']]['drivers'])*($min_labor)*($labor_class_driver[$actionEx[$crop_plan['id']]['driver_class']])*(1+$actionEx[$crop_plan['id']]['driver_bonus']/100)*$shiftsEx[$crop_plan['id']];
                $workers_pay[$crop_plan['id']]=($actionEx[$crop_plan['id']]['workers'])*($min_labor)*($labor_class_worker[$actionEx[$crop_plan['id']]['worker_class']])*(1+$actionEx[$crop_plan['id']]['worker_bonus']/100)*$shiftsEx[$crop_plan['id']];

                $drivers_pay_bonus[$crop_plan['id']]=($actionEx[$crop_plan['id']]['drivers'])*($min_labor)*($labor_class_driver[$actionEx[$crop_plan['id']]['driver_class']])*(1+$actionEx[$crop_plan['id']]['driver_bonus']/100);
                $workers_pay_bonus[$crop_plan['id']]=($actionEx[$crop_plan['id']]['workers'])*($min_labor)*($labor_class_worker[$actionEx[$crop_plan['id']]['worker_class']])*(1+$actionEx[$crop_plan['id']]['worker_bonus']/100);
                //Сумма оплаты труда водителям и рабочим
                $labor_total_cost[$crop_plan['id']]=$drivers_pay[$crop_plan['id']]+$workers_pay[$crop_plan['id']];
                //Налоги
                $drivers_tax[$crop_plan['id']]=$drivers_pay[$crop_plan['id']]*$labor_tax;
                $workers_tax[$crop_plan['id']]=$workers_pay[$crop_plan['id']]*$labor_tax;
                $labor_total_tax[$crop_plan['id']]=$drivers_tax[$crop_plan['id']]+$workers_tax[$crop_plan['id']];
                //Общие затраты на оплату труда
                $labor_drivers_cost_tax[$crop_plan['id']]= $drivers_pay[$crop_plan['id']]+$drivers_tax[$crop_plan['id']];
                $labor_workers_cost_tax[$crop_plan['id']]= $workers_pay[$crop_plan['id']]+$workers_tax[$crop_plan['id']];
                $labor_total_cost_tax[$crop_plan['id']]= $labor_total_cost[$crop_plan['id']]+$labor_total_tax[$crop_plan['id']];
                //расходы на топливо
                $total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]=$total_work[$crop_plan['id']][$Crop['crop_id']]*$equipmentEx[$crop_plan['id']]['fuel_cons_9'];
                $total_fuel_cost[$crop_plan['id']][$Crop['crop_id']]=$total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]*$equipmentEx[$crop_plan['id']]['price_fuel'];
                $total_oil_amnt[$crop_plan['id']][$Crop['crop_id']]=$total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]*($Rate_oil[1]+$Rate_oil[2]+$Rate_oil[3]);
                $total_oil_cost[$crop_plan['id']][$Crop['crop_id']]=($Rate_oil[1]*$total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]*$price_oil[1])+($Rate_oil[2]*$total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]*$price_oil[2])+($Rate_oil[3]*$total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']]*$price_oil[3]);
                $fuel_lubes_cost[$crop_plan['id']][$Crop['crop_id']]=$total_fuel_cost[$crop_plan['id']][$Crop['crop_id']]+ $total_oil_cost[$crop_plan['id']][$Crop['crop_id']];
                //сумма
                $labor_total_cost_ex[$Crop['crop_id']]=$labor_total_cost_ex[$Crop['crop_id']]+$labor_total_cost_tax[$crop_plan['id']];
                $total_fuel_cost_ex[$Crop['crop_id']]=$total_fuel_cost_ex[$Crop['crop_id']]+$fuel_lubes_cost[$crop_plan['id']][$Crop['crop_id']];
                if($open_remains==4){
                    $time1[$crop_plan['id']]=new DateTime($crop_plan['strat_data']);
                    $time2[$crop_plan['id']]=new DateTime($crop_plan['end_data']);
                    $interval[$crop_plan['id']]=$time2[$crop_plan['id']]->diff($time1[$crop_plan['id']]);
                    $time[$crop_plan['id']] =$interval[$crop_plan['id']]->days;
                    $total[$crop_plan['id']]=$materials["seeds"][$crop_plan['id']]+$materials["fertilizers"][$crop_plan['id']]+$materials["ppa"][$crop_plan['id']]+$fuel_lubes_cost[$crop_plan['id']][$Crop['crop_id']];
                    $ex_date['total']['total']=$ex_date['total']['total']+$total[$crop_plan['id']];
                    $ex_date['remains'][]=array(
                        "name_action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                        "strat_data" => $crop_plan['strat_data'],
                        "time"=>$time[$crop_plan['id']],
                        "seeds"=>$materials["seeds"][$crop_plan['id']],
                        "fertilizers"=>$materials["fertilizers"][$crop_plan['id']],
                        "ppa"=>$materials["ppa"][$crop_plan['id']],
                        "fuel_lubes_cost"=> $fuel_lubes_cost[$crop_plan['id']][$Crop['crop_id']],
                        "total"=>$total[$crop_plan['id']]
                    );
                }
                if($open_remains==3)
                    $ex_date['remains'][]=array(
                        "name_action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                        "shifts" => $shiftsEx[$crop_plan['id']],
                        "drivers" =>$actionEx[$crop_plan['id']]['drivers'],
                        "workers" =>$actionEx[$crop_plan['id']]['workers'],
                        "driver_class"=>$actionEx[$crop_plan['id']]['driver_class'],
                        "worker_class"=>$actionEx[$crop_plan['id']]['worker_class'],
                        "driver_bonus"=>$actionEx[$crop_plan['id']]['driver_bonus'],
                        "worker_bonus"=>$actionEx[$crop_plan['id']]['worker_bonus'],
                        "drivers_pay_shifts"=>$drivers_pay[$crop_plan['id']]/$shiftsEx[$crop_plan['id']],
                        "workers_pay_shifts"=>$workers_pay[$crop_plan['id']]/$shiftsEx[$crop_plan['id']],
                        "drivers_pay"=>$drivers_pay[$crop_plan['id']],
                        "workers_pay"=>$workers_pay[$crop_plan['id']],
                        "drivers_tax"=>$drivers_tax[$crop_plan['id']],
                        "workers_tax"=>$workers_tax[$crop_plan['id']],
                        "labor_drivers_cost_tax"=>$labor_drivers_cost_tax[$crop_plan['id']],
                        "labor_workers_cost_tax"=>$labor_workers_cost_tax[$crop_plan['id']],
                        "pay_shifts"=>$drivers_pay[$crop_plan['id']]/$shiftsEx[$crop_plan['id']]+$workers_pay[$crop_plan['id']]/$shiftsEx[$crop_plan['id']],
                        "labor_total_cost"=>$labor_total_cost[$crop_plan['id']],
                        "labor_total_tax"=>$labor_total_tax[$crop_plan['id']],
                        "labor_total_cost_tax"=> $labor_total_cost_tax[$crop_plan['id']],
                    );
                if($open_remains==1)
                    for ($m=1; $m<=3; $m++)
                        $ex_date['remains'][$m][]=array(
                            "name_action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                            "material"=>$materialEx[$crop_plan['id']][$m]['name_material_ua'],
                            "material_qty"=>$material_Qlt[$crop_plan['id']][$m],
                            "material_mass"=>$materialQlt[$crop_plan['id']][$m],
                            "material_price"=>$materialEx[$crop_plan['id']][$m]['material_price'],
                            "material_total_price"=>$materialPrice[$crop_plan['id']][$m],
                            "type"=>$type_mat[$crop_plan['id']][$m],
                            "area"=>$Crop['area'],
                        );
                if($open_remains==2)
                    $ex_date['remains'][]=array(
                        "name_action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                        "name_working_ua" => $equipmentEx[$crop_plan['id']]['name_working_ua'],
                        "name_power_ua" => $equipmentEx[$crop_plan['id']]['name_power_ua'],
                        "name_fuel"=> $equipmentEx[$crop_plan['id']]['name_fuel_ua'],
                        "productivity" => $equipmentEx[$crop_plan['id']]['productivity_9'],
                        "total_work" => $total_work[$crop_plan['id']][$Crop['crop_id']],
                        "shifts" => $shiftsEx[$crop_plan['id']],
                        "fuel" => $equipmentEx[$crop_plan['id']]['fuel_cons_9'],
                        "total_fuel_amnt" => $total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']],
                        "price_fuel"=> $equipmentEx[$crop_plan['id']]['price_fuel'],
                        "total_fuel_cost"=> $total_fuel_cost[$crop_plan['id']][$Crop['crop_id']],
                        "total_oil_amnt"=> $total_oil_amnt[$crop_plan['id']][$Crop['crop_id']],
                        "total_oil_cost"=> $total_oil_cost[$crop_plan['id']][$Crop['crop_id']],
                        "fuel_lubes_cost"=> $fuel_lubes_cost[$crop_plan['id']][$Crop['crop_id']],
                    );
                if ($open_remains==9){
                    for ($m=1; $m<=3; $m++)
                        if($materialEx[$crop_plan['id']][$m]['name_material_ua']!=false)
                        $ex_date['remains_material'][$type_mat[$crop_plan['id']][$m]][]=array(
                            "material"=>$materialEx[$crop_plan['id']][$m]['name_material_ua'],
                            "material_qty"=>$material_Qlt[$crop_plan['id']][$m],
                            "material_price"=>$materialEx[$crop_plan['id']][$m]['material_price'],
                            "material_price_area"=>$material_Qlt[$crop_plan['id']][$m]*$materialEx[$crop_plan['id']][$m]['material_price'],
                            "material_price_mass"=>$material_Qlt[$crop_plan['id']][$m]*$materialEx[$crop_plan['id']][$m]['material_price']/$drying_qty[$Crop['crop_id']]

                        );
                    $ex_date['remains'][]=array(
                        "id_plan"=>$crop_plan['id'],
                        "name_action"=>$actionEx[$crop_plan['id']]['name_action_ua'],
                        "unit"=>$unit[$crop_plan['id']],
                        "total_work"=>$total_work[$crop_plan['id']][$Crop['crop_id']],
                        "name_working_ua" => $equipmentEx[$crop_plan['id']]['name_working_ua'],
                        "name_power_ua" => $equipmentEx[$crop_plan['id']]['name_power_ua'],
                        "drivers" =>$actionEx[$crop_plan['id']]['drivers'],
                        "driver_class"=>$actionEx[$crop_plan['id']]['driver_class'],
                        "productivity" => $equipmentEx[$crop_plan['id']]['productivity_9'],
                        "shifts" => $shiftsEx[$crop_plan['id']],
                        "drivers_pay_shifts"=>$drivers_pay_bonus[$crop_plan['id']],
                        "drivers_pay"=>$drivers_pay[$crop_plan['id']],
                        "drivers_tax"=>$drivers_tax[$crop_plan['id']],
                        "workers" =>$actionEx[$crop_plan['id']]['workers'],
                        "worker_class"=>$actionEx[$crop_plan['id']]['worker_class'],
                        "workers_pay_shifts"=>$workers_pay_bonus[$crop_plan['id']],
                        "workers_pay"=>$workers_pay[$crop_plan['id']],
                        "workers_tax"=>$workers_tax[$crop_plan['id']],
                        "labor_total_cost_tax"=> $labor_total_cost_tax[$crop_plan['id']],
                        "fuel" => $equipmentEx[$crop_plan['id']]['fuel_cons_9'],
                        "total_fuel_amnt" => $total_fuel_amnt[$crop_plan['id']][$Crop['crop_id']],
                        "total_fuel_cost"=> $total_fuel_cost[$crop_plan['id']][$Crop['crop_id']],
                    );
                }
            }
            if ($open_remains==9){
                $ex_date['remains']['stat']=array(
                    'name'=>$crop_name[$Crop['crop_id']],
                    'area'=>$Crop['area'],
                    'mass'=>$ex_mass[$Crop['crop_id']],
                    'yaled'=>$Crop['yaled']
                );
            }
            $ex_date["revenue"][$ex_date["crop_coll"]]=$revenue[$ex_date["crop_coll"]];
            $ex_date["name"][$ex_date["crop_coll"]] = $crop_name[$Crop['crop_id']];
            $ex_date["fuel"][$ex_date["crop_coll"]] = $total_fuel_cost_ex[$Crop['crop_id']];
            $ex_date["direct_labor"][$ex_date["crop_coll"]] =  $labor_total_cost_ex[$Crop['crop_id']];
            $ex_date["services"][$ex_date["crop_coll"]] = $total_handling[$Crop['crop_id']];
            $calculator["1"][$ex_date["crop_coll"]]=($ex_date["fuel"][$ex_date["crop_coll"]]+$ex_date["services"][$ex_date["crop_coll"]]+$ex_date["seeds"][$ex_date["crop_coll"]]+$ex_date["fertilizers"][$ex_date["crop_coll"]]+$ex_date["ppa"][$ex_date["crop_coll"]]);
            $ex_date["remainder"][$ex_date["crop_coll"]]=($calculator["1"][$ex_date["crop_coll"]]/0.99)*0.01;
            $ex_date["direct_cost"][$ex_date["crop_coll"]]=($calculator["1"][$ex_date["crop_coll"]]/0.99);
            $ex_date["repair"][$ex_date["crop_coll"]]=($ex_date["fuel"][$ex_date["crop_coll"]])*0.07;
            $ex_date["lease"][$ex_date["crop_coll"]]=$lease[$ex_date["crop_coll"]];
            $calculator["2"][$ex_date["crop_coll"]]=$ex_date["repair"][$ex_date["crop_coll"]]+$ex_date["lease"][$ex_date["crop_coll"]];
            $ex_date["other_direct"][$ex_date["crop_coll"]]= ($ex_date["repair"][$ex_date["crop_coll"]]+$ex_date["lease"][$ex_date["crop_coll"]])/0.73;
            $ex_date["amortization"][$ex_date["crop_coll"]]= $ex_date["other_direct"][$ex_date["crop_coll"]]*0.20;
            $ex_date["production_cost"][$ex_date["crop_coll"]]=$ex_date["direct_cost"][$ex_date["crop_coll"]]+$ex_date["direct_labor"][$ex_date["crop_coll"]]+$ex_date["other_direct"][$ex_date["crop_coll"]];
            $ex_date["other_operating"][$ex_date["crop_coll"]] = $ex_date["production_cost"][$ex_date["crop_coll"]]*($other_operating[$Crop['crop_id']]/100);
            $ex_date["total_cost"][$ex_date["crop_coll"]] = $ex_date["other_operating"][$ex_date["crop_coll"]]+$ex_date["production_cost"][$ex_date["crop_coll"]];
            foreach ($Ex_name as $Ex_total){
                $ex_date["total"][$Ex_total["name_php"]]=$ex_date["total"][$Ex_total["name_php"]]+$ex_date[$Ex_total["name_php"]][$ex_date["crop_coll"]];
            }
            if ($open_remains==9){
                $ex_date['remains_table']=array(
                    array(
                        '9','10','11','12','13'
                    ),
                    array(
                        '1','','', $ex_date["direct_labor"][$ex_date["crop_coll"]]/$Crop['area'], $ex_date["direct_labor"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '2','','', $ex_date["seeds"][$ex_date["crop_coll"]]/$Crop['area'], $ex_date["seeds"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '3','','', $ex_date["fertilizers"][$ex_date["crop_coll"]]/$Crop['area'], $ex_date["fertilizers"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '4','','',$ex_date["ppa"][$ex_date["crop_coll"]]/$Crop['area'],$ex_date["ppa"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '5','','',$ex_date["production_cost"][$ex_date["crop_coll"]]/$Crop['area'],$ex_date["production_cost"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '6','','',$ex_date["amortization"][$ex_date["crop_coll"]]/$Crop['area'],$ex_date["amortization"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '7','','',$ex_date["other_direct"][$ex_date["crop_coll"]]/$Crop['area'],$ex_date["other_direct"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                    array(
                        '8','','',$ex_date["production_cost"][$ex_date["crop_coll"]]/$Crop['area'],$ex_date["production_cost"][$ex_date["crop_coll"]]/$drying_qty[$Crop['crop_id']]
                    ),
                );
            }
            if($open_remains==6){
                $calculator["4"][$ex_date["crop_coll"]]=($revenue[$ex_date["crop_coll"]]-$ex_date["total_cost"][$ex_date["crop_coll"]])/$Crop['area'];
                $calculator["8"][$ex_date["crop_coll"]]=$ex_date["total_cost"][$ex_date["crop_coll"]]/$Crop['area'];
                $calculator["EBIT"][$ex_date["crop_coll"]]=($revenue[$ex_date["crop_coll"]]-$ex_date["production_cost"][$ex_date["crop_coll"]]);
                $ex_date['remains'][$Crop["crop_id"]."-".$type]=array(
                    "1"=>$Crop['yaled'],
                    "2"=>($selling_price[$Crop['crop_id']])/$_COOKIE['currency_val'],
                    "3"=>($revenue[$ex_date["crop_coll"]]/$Crop['area'])/$_COOKIE['currency_val'],
                    "4"=>($calculator["4"][$ex_date["crop_coll"]])/$_COOKIE['currency_val'],
                    "5"=>($ex_date["production_cost"][$ex_date["crop_coll"]]/($drying_qty[$Crop['crop_id']]))/$_COOKIE['currency_val'],
                    "6"=>($ex_date["production_cost"][$ex_date["crop_coll"]]/$Crop['area'])/$_COOKIE['currency_val'],
                    "7"=>($ex_date["total_cost"][$ex_date["crop_coll"]]/($drying_qty[$Crop['crop_id']]))/$_COOKIE['currency_val'],
                    "8"=>($calculator["8"][$ex_date["crop_coll"]])/$_COOKIE['currency_val'],
                    "9"=>($calculator["8"][$ex_date["crop_coll"]]/$selling_price[$Crop['crop_id']])*10,
                    "10"=>(($calculator["8"][$ex_date["crop_coll"]]/$selling_price[$Crop['crop_id']])*1.5)*10,
                    "11"=>(($revenue[$ex_date["crop_coll"]]-$ex_date["production_cost"][$ex_date["crop_coll"]])/($drying_qty[$Crop['crop_id']]))/$_COOKIE['currency_val'],
                    "12"=>(($revenue[$ex_date["crop_coll"]]-$ex_date["production_cost"][$ex_date["crop_coll"]])/$Crop['area'])/$_COOKIE['currency_val'],
                    "13"=>(($calculator["EBIT"][$ex_date["crop_coll"]]+$ex_date["amortization"][$ex_date["crop_coll"]])/$Crop['area'])/$_COOKIE['currency_val'],
                    "14"=>(($revenue[$ex_date["crop_coll"]]-($ex_date["direct_cost"][$ex_date["crop_coll"]] + $ex_date["direct_labor"][$ex_date["crop_coll"]]+$ex_date["lease"][$ex_date["crop_coll"]]+$ex_date["repair"][$ex_date["crop_coll"]]))/$Crop['area'])/$_COOKIE['currency_val'],
                    "15"=>(($revenue[$ex_date["crop_coll"]]-($ex_date["direct_cost"][$ex_date["crop_coll"]] + $ex_date["direct_labor"][$ex_date["crop_coll"]]+$ex_date["lease"][$ex_date["crop_coll"]]+$ex_date["repair"][$ex_date["crop_coll"]]))/$revenue[$ex_date["crop_coll"]])*100,
                    "16"=>(($revenue[$ex_date["crop_coll"]]-$ex_date["total_cost"][$ex_date["crop_coll"]])/$ex_date["total_cost"][$ex_date["crop_coll"]])*100,
                    "17"=>($calculator["EBIT"][$ex_date["crop_coll"]]/$revenue[$ex_date["crop_coll"]])*100,
                );
            }
        }
        return $ex_date;
    }
    //загрузка моих культур
    public static function getMyCrop($crop = false, $typer = false){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $l=3;
        if($typer!=false) $l=1;
        for($x=1; $x<=$l; $x++) {
            if($l=1) $type=$typer;
            if($l=3) $type=$x;
            $result = $db->query("SELECT * FROM crop_analytica WHERE id_user = $id_user $crop AND type=$type");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $MyCrop[$x] = $result->fetchAll();
            $Crops[$x] = "";
            $Crops2[$x] = "";
            foreach ($MyCrop[$x] as $MyCropKey[$x]) {
                $Crops[$x] = $Crops[$x] . "crop_id='" . $MyCropKey[$x]['crop_id'] . "' or ";
                $Crops2[$x] = $Crops2[$x] . "id_crop='" . $MyCropKey[$x]['crop_id'] . "' or ";
            }
            $Crops[$x] = substr($Crops[$x], 0, -4);
            $Crops2[$x] = substr($Crops2[$x], 0, -4);
            $load[$x]["MyCrop"] = $MyCrop[$x];
            $load[$x]["1"] = $Crops[$x];
            $load[$x]["2"] = $Crops2[$x];
        }
        return $load;
    }
    //Операційний бюджет помісячно
    public static function transformToMonth($total){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM month WHERE id_user=0 or id_user=$id_user ORDER BY id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $cash_flow = $result->fetchAll();

        foreach ($cash_flow as $CF){
            for ($x=1; $x<=12; $x++){
                $CF_Month[$x][$CF['name_cf']]=$total[$CF['name_cf']]*($CF['cf_'.$x]/100);
            }
        }
        for ($x=1; $x<=12; $x++){
            $CF_Month[$x]['direct_cost']=$CF_Month[$x]['seeds']+$CF_Month[$x]['fertilizers']+$CF_Month[$x]['ppa']+$CF_Month[$x]['fuel']+$CF_Month[$x]['services']+$CF_Month[$x]['remainder'];
            $CF_Month[$x]['other_direct']=($CF_Month[$x]['lease']+$CF_Month[$x]['repair']+$CF_Month[$x]['amortization'])/0.99;
            $CF_Month[$x]['production_cost']=$CF_Month[$x]['direct_cost']+$CF_Month[$x]['other_direct']+$CF_Month[$x]['direct_labor'];
            $CF_Month[$x]['total_cost']=$CF_Month[$x]['other_operating']+$CF_Month[$x]['production_cost'];
        }
        $CF_Month['total']=$total;
        return $CF_Month;
    }
    //Рух грошових коштів помісячно (Cash Flow)
    public static function transformToCashFlow($CF_Month){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM cash_flow WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $CF_setting = $result->fetchAll();
        foreach ($CF_setting as $CF_name){
            for ($c=1; $c<=12; $c++){
                $setting[$CF_name['name_cf']][$c]=$CF_name['cf_'.$c];
            }
        }
        $valuta=array(
            'ua'=>[
                'UAH'=>'грн',
                'USD'=>'$',
                'EUR'=>'евро',
            ],
            'gb'=>[
                'UAH'=>'uah',
                'USD'=>'$',
                'EUR'=>'eur',
            ]
        );
        $CF_table=array(
            array(
                "name_php"=>"false",
                "name_ua"=>"1. Рух коштів в результаті операційної діяльності",
                "name_en"=>"1. Cash flows from operating activities",
                "class"=>"",
                "class_tr"=>"OpenCF",
                "id"=>"1"
            ),
            array(
                "name_php"=>"activities_income",
                "name_ua"=>"Операційна діяльність - надходження",
                "name_en"=>"Operating activities - income",
                "class"=>"level1",
                "class_tr"=>"CloseCF c1 OpenCF",
                "id"=>"3"
            ),
            array(
                "name_php"=>"revenue",
                "name_ua"=>"Виручка від реалізації готової продукції",
                "name_en"=>"Revenue from sales of finished products",
                "class"=>"level2",
                "class_tr"=>"CloseCF c3",
                "id"=>""
            ),
            array(
                "name_php"=>"other_income_cf",
                "name_ua"=>"Інші операційні надходження",
                "name_en"=>"Other operating income",
                "class"=>"level2",
                "class_tr"=>"CloseCF c3",
                "id"=>""
            ),
            array(
                "name_php"=>"activities_costs",
                "name_ua"=>"Операційна діяльність - витрати",
                "name_en"=>"Operating activities - costs",
                "class"=>"level1",
                "class_tr"=>"CloseCF c1 OpenCF",
                "id"=>"2"
            ),
            array(
                "name_php"=>"seeds",
                "name_ua"=>"Насіння",
                "name_en"=>"Seeds ",
                "class"=>"level2",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array(
                "name_php"=>"fertilizers",
                "name_ua"=>"Мінеральні добрива",
                "name_en"=>"Mineral Fertilizers",
                "class"=>"level2",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array("name_php"=>"ppa",
                "name_ua"=>"Засоби захисту рослин",
                "name_en"=>"Plant protection agent ",
                "class"=>"level2",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array(
                "name_php"=>"fuel",
                "name_ua"=>"Паливо-мастильні матеріали",
                "name_en"=>"Fuel and lubricants",
                "class"=>"level2",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array(
                "name_php"=>"other_operating_cf",
                "name_ua"=>"Інші операційні витрати",
                "name_en"=>"Other operating costs",
                "class"=>"level2",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array(
                "name_php"=>"including_new_interest",
                "name_ua"=>"в тому числі відсотки по новій позиці",
                "name_en"=>"including  interest on the new loan",
                "class"=>"level3",
                "class_tr"=>"CloseCF c2",
                "id"=>""
            ),
            array(
                "name_php"=>"net_cash_flow",
                "name_ua"=>"Чистий рух коштів від операційної діяльності",
                "name_en"=>"Net cash flow from operating activities",
                "class"=>"level1",
                "class_tr"=>"CloseCF c1",
                "id"=>""
            ),
            ///////////
            array(
                "name_php"=>"false",
                "name_ua"=>"2. Рух коштів у результаті інвестиційної діяльності",
                "name_en"=>"2. Cash flows from investing activities",
                "class"=>"",
                "class_tr"=>"OpenCF",
                "id"=>"6"
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"Надходження від реалізації:",
                "name_en"=>"Receipts from realization of:",
                "class"=>"level1",
                "class_tr"=>"CloseCF c6 OpenCF",
                "id"=>"4"
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"фінансових інвестицій",
                "name_en"=>"financial investments",
                "class"=>"level2",
                "class_tr"=>"CloseCF c4",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"необоротних активів",
                "name_en"=>"noncurrent assets",
                "class"=>"level2",
                "class_tr"=>"CloseCF c4",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"інші надходження",
                "name_en"=>"other receipts",
                "class"=>"level2",
                "class_tr"=>"CloseCF c4",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"Витрати на придбання:",
                "name_en"=>"Costs of purchase of:",
                "class"=>"level1",
                "class_tr"=>"CloseCF c6 OpenCF",
                "id"=>"5"
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"фінансових інвестицій",
                "name_en"=>"financial investments",
                "class"=>"level2",
                "class_tr"=>"CloseCF c5",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"необоротних активів",
                "name_en"=>"noncurrent assets",
                "class"=>"level2",
                "class_tr"=>"CloseCF c5",
                "id"=>""

            ),
            array(
                "name_php"=>"",
                "name_ua"=>"інші платежі",
                "name_en"=>"other payments",
                "class"=>"level2",
                "class_tr"=>"CloseCF c5",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"Чистий рух коштів від інвестиційної діяльності",
                "name_en"=>"Net cash flow from investing activities",
                "class"=>"level1",
                "class_tr"=>"CloseCF c6",
                "id"=>""
            ),
            /////////////
            array(
                "name_php"=>"false",
                "name_ua"=>"3. Рух коштів у результаті фінансової діяльності",
                "name_en"=>"3. Cash flows from financing activities",
                "class"=>"",
                "class_tr"=>"OpenCF",
                "id"=>"7"
            ),
            array(
                "name_php"=>"3_receipts",
                "name_ua"=>"Надходження від: ",
                "name_en"=>"Receipts from:",
                "class"=>"level1",
                "class_tr"=>"CloseCF c7 OpenCF",
                "id"=>"8"
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"власного капіталу",
                "name_en"=>"own equity",
                "class"=>"level2",
                "class_tr"=>"CloseCF c8",
                "id"=>""
            ),
            array(
                "name_php"=>"obtaining_loans",
                "name_ua"=>"отримання нової позики",
                "name_en"=>"obtaining new loans",
                "class"=>"level2",
                "class_tr"=>"CloseCF c8",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"інші надходження",
                "name_en"=>"other receipts",
                "class"=>"level2",
                "class_tr"=>"CloseCF c8",
                "id"=>""
            ),
            array(
                "name_php"=>"3_costs",
                "name_ua"=>"Витрати на:",
                "name_en"=>"Costs of:",
                "class"=>"level1",
                "class_tr"=>"CloseCF c7 OpenCF",
                "id"=>"9"
            ),
            array(
                "name_php"=>"loan_repayment",
                "name_ua"=>"погашення поточних позик",
                "name_en"=>"loan repayment",
                "class"=>"level2",
                "class_tr"=>"CloseCF c9",
                "id"=>""
            ),
            array(
                "name_php"=>"repayment_loans",
                "name_ua"=>"погашення нової позики",
                "name_en"=>"repayment of new loans",
                "class"=>"level2",
                "class_tr"=>"CloseCF c9",
                "id"=>""
            ),
            array(
                "name_php"=>"",
                "name_ua"=>"погашення зобов'язань по інших надходженнях",
                "name_en"=>"repayment of other receipts",
                "class"=>"level2",
                "class_tr"=>"CloseCF c9",
                "id"=>""
            ),
            array(
                "name_php"=>"Net_financing_activities",
                "name_ua"=>"Чистий рух коштів від фінансової діяльності",
                "name_en"=>"Net cash flow from financing activities",
                "class"=>"level1",
                "class_tr"=>"CloseCF c7",
                "id"=>""
            ),
            array(
                "name_php"=>"false",
                "name_ua"=>"<br>",
                "name_en"=>"<br>",
                "class"=>"",
                "id"=>""
            ),

            array(
                "name_php"=>"Total_receipts",
                "name_ua"=>"Всього надходження ",
                "name_en"=>"Total receipts",
                "class"=>"",
                "id"=>""
            ),
            array(
                "name_php"=>"Total_costs",
                "name_ua"=>"Всього витрати",
                "name_en"=>"Total costs",
                "class"=>"",
                "id"=>""
            ),
            array(
                "name_php"=>"Net_reporting_period",
                "name_ua"=>"Чистий рух грошових коштів за звітний період",
                "name_en"=>"Net cash flow for the reporting period",
                "class"=>"",
                "id"=>""
            ),
            array(
                "name_php"=>"remaining_start",
                "name_ua"=>"Залишок коштів на початок періоду",
                "name_en"=>"Balance of funds at the beginning of period",
                "class"=>"",
                "id"=>""
            ),
            array("name_php"=>"remaining_end",
                "name_ua"=>"Залишок коштів на кінець періоду",
                "name_en"=>"Balance of funds at the end of period",
                "class"=>"",
                "id"=>""
            ),
        );
        $CF['table']=$CF_table;
        $CF['date']=$CF_Month;
        $CF['date'][0]['remaining_end']=+$setting[1][1];

        for ($x=1; $x<=12; $x++){

            $CF['date'][$x]['false']=false;
            //1
            $CF['date'][$x]['other_operating_cf']=$CF['date'][$x]['services']+$CF['date'][$x]['remainder']+$CF['date'][$x]['direct_labor']+($CF['date'][$x]['other_direct']-$CF['date'][$x]['amortization'])+($setting[4][$x]+$setting[5][$x]+$setting[6][$x]+$setting[9][$x]);
            $CF['date'][$x]['including_new_interest']=$setting[9][$x];
            $CF['date'][$x]['other_income_cf']=$setting[2][$x]+$setting[3][$x];



            $CF['date'][$x]['activities_income']=$CF['date'][$x]['revenue']+$CF['date'][$x]['other_income_cf'];
            $CF['date'][$x]['activities_costs']=$CF['date'][$x]['seeds']+$CF['date'][$x]['fertilizers']+$CF['date'][$x]['ppa']+$CF['date'][$x]['fuel']+$CF['date'][$x]['other_operating_cf'];

            $CF['date'][$x]['net_cash_flow']=$CF['date'][$x]['activities_income']- $CF['date'][$x]['activities_costs'];


            //3
            $CF['date'][$x]['loan_repayment']=$setting[7][$x];
            $CF['date'][$x]['obtaining_loans']=$setting[8][$x];
            $CF['date'][$x]['repayment_loans']=$setting[10][$x];


            $CF['date'][$x]['3_receipts']=$CF['date'][$x]['obtaining_loans'];
            $CF['date'][$x]['3_costs']=$CF['date'][$x]['loan_repayment']+$CF['date'][$x]['repayment_loans'];

            $CF['date'][$x]['Net_financing_activities']=$CF['date'][$x]['3_receipts']-$CF['date'][$x]['3_costs'];

            //4
            $CF['date'][$x]['Total_receipts']=$CF['date'][$x]['activities_income']+$CF['date'][$x]['3_receipts'];
            $CF['date'][$x]['Total_costs']=$CF['date'][$x]['activities_costs']+$CF['date'][$x]['3_costs'];
            $CF['date'][$x]['Net_reporting_period']=$CF['date'][$x]['Total_receipts']-$CF['date'][$x]['Total_costs'];


            $CF['date'][$x]['remaining_start']=$CF['date'][$x-1]['remaining_end'];
            $CF['date'][$x]['remaining_end']=$CF['date'][$x]['Net_reporting_period']+$CF['date'][$x]['remaining_start'];


            foreach ($CF_table as $total){
                $CF['total'][$total['name_php']]=$CF['total'][$total['name_php']]+$CF['date'][$x][$total['name_php']];
            }
        }
        $CF['total']['remaining_start']=$CF['date'][0]['remaining_end'];
        $CF['total']['remaining_end']=$CF['date'][12]['remaining_end'];
        return $CF;
    }
    //Загрузка настроек реализации
    public static function getSettigBalance(){
        $db = Db::getConnection();
        $id_user=  $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM setting_balance_products WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['date'] = $result->fetchAll();
        foreach ($date['date'] as $value){
            for($t=0; $t<=5; $t++){
                $ex_date["date-set"][$value['crop']][$t]=$value['s'.$t];
            }
        }
        return $ex_date;
    }
    //сохранение настроек
    public static function saveSettingMonth($sql_save){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $db->query("DELETE FROM month WHERE id_user=$id_user");
        $db->query("INSERT INTO month (id_user, name_cf, cf_1, cf_2, cf_3, cf_4, cf_5, cf_6, cf_7, cf_8, cf_9, cf_10, cf_11, cf_12) VALUE $sql_save");

        return true;
    }
    //настройка процентов
    public static function getSettingMonth(){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM month WHERE id_user=0  or id_user=$id_user ORDER BY id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //Налаштування по заборгованості
    public static function getSettingCashFlow(){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM cash_flow WHERE id_user='$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        return $date;
    }
    //сохранение Налаштування по заборгованості
    public static function saveSettingCashFlow($sql_save){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $db->query("DELETE FROM cash_flow WHERE id_user=$id_user AND (name_cf=1 or name_cf=2 or name_cf=3 or name_cf=4 or name_cf=5 or name_cf=6 or name_cf=7)");
        $db->query("INSERT INTO cash_flow (id_user, name_cf, cf_1, cf_2, cf_3, cf_4, cf_5, cf_6, cf_7, cf_8, cf_9, cf_10, cf_11, cf_12) VALUE $sql_save");
        return true;
    }
    //сохранение Фінансово-економічні показники
    public static function saveFinancial($save){
//        $db = Db::getConnection();
//        $id = $_SESSION['id_user'];
//        $db->query("DELETE FROM financial WHERE id_user=$id");
//        $db->query("INSERT INTO financial (user_id, data_fin) VALUE ('$id', '$save')");
        return true;
    }
    //таблица Фінансово-економічні показники
    public static function getTableFinancial(){
        $Ex_name[]=array("name_php"=>1, "name_ua"=>"Урожайність культур, ц/га","name_en"=>"Yields of crops",);
        $Ex_name[]=array("name_php"=>2, "name_ua"=>"Ціна реалізації, грн/т","name_en"=>"Selling price, UAH/t",);
        $Ex_name[]=array("name_php"=>3, "name_ua"=>"Виручка від реалізації продукції, грн/га","name_en"=>"Revenue from sale, UAH/ha",);
        $Ex_name[]=array("name_php"=>4, "name_ua"=>"Чистий прибуток, грн/га","name_en"=>"Net profit, UAH/ha",);
        $Ex_name[]=array("name_php"=>5, "name_ua"=>"Виробнича собівартість, грн/т","name_en"=>"Operating cost, UAH/t",);
        $Ex_name[]=array("name_php"=>6, "name_ua"=>"Виробнича собівартість, грн/га","name_en"=>"Operating cost, UAH/ha",);
        $Ex_name[]=array("name_php"=>7, "name_ua"=>"Повна собівартість, грн/т","name_en"=>"Total cost, UAH/t",);
        $Ex_name[]=array("name_php"=>8, "name_ua"=>"Повна собівартість, грн/га","name_en"=>"Total cost, UAH/ha",);
        $Ex_name[]=array("name_php"=>9, "name_ua"=>"Поріг беззбиткової урожайності, ц/га","name_en"=>"Point of break-even yield, c/ha",);
        //$Ex_name[]=array("name_php"=>10,"name_ua"=>"Поріг прибуткової урожайності, ц/га");
        $Ex_name[]=array("name_php"=>11,"name_ua"=>"Операційний прибуток (EBIT), грн/т","name_en"=>"EBIT, UAH/t",);
        $Ex_name[]=array("name_php"=>12,"name_ua"=>"Операційний прибуток (EBIT), грн/га","name_en"=>"EBIT, UAH/t",);
        $Ex_name[]=array("name_php"=>13,"name_ua"=>"EBITDA, грн/га","name_en"=>"EBITDA, UAH/ha",);
        $Ex_name[]=array("name_php"=>14,"name_ua"=>"Маржинальний прибуток, грн/га","name_en"=>"Marginal revenue, UAH/ha",);
        $Ex_name[]=array("name_php"=>15,"name_ua"=>"Маржинальний прибуток, %","name_en"=>"Marginal revenue, %",);
        $Ex_name[]=array("name_php"=>16,"name_ua"=>"Рентабельність виробництва, %","name_en"=>"Return on production, %",);
        $Ex_name[]=array("name_php"=>17,"name_ua"=>"Рентабельність продажів, %","name_en"=>"Return on sales, %",);
        return $Ex_name;
    }
    //исторический анализ
    public static function getHistoricalAnalysis($MyCrop){

        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM form50_date WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();

        foreach ($date as $historical){
            for($x=1; $x<=7; $x++){
                $form50[$historical["crop"]][$historical["year"]]["f".$x]=$historical["f".$x];
                if($historical["f".$x]==0) $form50[$historical["crop"]][$historical["year"]]["f".$x]=0;
            }
        }

        $course[2014]['UAH']=1;
        $course[2015]['UAH']=1;
        $course[2016]['UAH']=1;

        $course[2014]['USD']=12.00;
        $course[2015]['USD']=20.72;
        $course[2016]['USD']=25.12;

        $course[2014]['EUR']=16.14;
        $course[2015]['EUR']=23.42;
        $course[2016]['EUR']=28.73;

        for($r=1;$r<=3;$r++){
        foreach ($MyCrop[$r]["MyCrop"] as $Crop){
            for($x=2014; $x<=2016; $x++){
                for($y=1; $y<=7; $y++){
                    if($form50[$Crop["crop_id"]."-".$r][$x]["f".$y]==false) $form50[$Crop["crop_id"]."-".$r][$x]["f".$y]=0;
                }
                $ex_form[1]=0;
                $ex_form[6]=0;
                $ex_form[8]=0;
                $ex_form[12]=0;
                $ex_form[4]=0;
                $ex_form[16]=0;
                $ex_form[5]=0;
                $ex_form[7]=0;
                $ex_form[11]=0;
                $ex_form[2]=0;
                $ex_form[3]=0;
                $ex_form[17]=0;
                $EBIT[$x][$Crop["crop_id"]."-".$r]=($form50[$Crop["crop_id"]."-".$r][$x]["f7"]  - $form50[$Crop["crop_id"]."-".$r][$x]["f3"]);
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[1]=$form50[$Crop["crop_id"]."-".$r][$x]["f2"]/$form50[$Crop["crop_id"]."-".$r][$x]["f1"];
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[6]=($form50[$Crop["crop_id"]."-".$r][$x]["f3"]/$form50[$Crop["crop_id"]."-".$r][$x]["f1"])*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[8]=($form50[$Crop["crop_id"]."-".$r][$x]["f6"]/$form50[$Crop["crop_id"]."-".$r][$x]["f1"])*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[12]=(($form50[$Crop["crop_id"]."-".$r][$x]["f7"]-$form50[$Crop["crop_id"]."-".$r][$x]["f3"])/$form50[$Crop["crop_id"]."-".$r][$x]["f1"])*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[4]=(($form50[$Crop["crop_id"]."-".$r][$x]["f7"]-$form50[$Crop["crop_id"]."-".$r][$x]["f6"])/$form50[$Crop["crop_id"]."-".$r][$x]["f1"])*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f6"]!=false) $ex_form[16]=(($form50[$Crop["crop_id"]."-".$r][$x]["f7"]- $form50[$Crop["crop_id"]."-".$r][$x]["f6"])/$form50[$Crop["crop_id"]."-".$r][$x]["f6"])*100;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f2"]!=false) $ex_form[5]=($form50[$Crop["crop_id"]."-".$r][$x]["f3"]/ ($form50[$Crop["crop_id"]."-".$r][$x]["f2"] /10))*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f2"]!=false) $ex_form[7]=($form50[$Crop["crop_id"]."-".$r][$x]["f6"]/($form50[$Crop["crop_id"]."-".$r][$x]["f2"] /10))*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f2"]!=false) $ex_form[11]=(($form50[$Crop["crop_id"]."-".$r][$x]["f7"]-$form50[$Crop["crop_id"]."-".$r][$x]["f3"])/($form50[$Crop["crop_id"]."-".$r][$x]["f2"]/10))*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f4"]!=false) $ex_form[2]=($form50[$Crop["crop_id"]."-".$r][$x]["f7"]/($form50[$Crop["crop_id"]."-".$r][$x]["f4"]/10))*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f1"]!=false) $ex_form[3]=($form50[$Crop["crop_id"]."-".$r][$x]["f7"]/$form50[$Crop["crop_id"]."-".$r][$x]["f1"])*1000;
                if ($form50[$Crop["crop_id"]."-".$r][$x]["f7"]!=false) $ex_form[17]=($EBIT[$x][$Crop["crop_id"]."-".$r]/$form50[$Crop["crop_id"]."-".$r][$x]["f7"])*100;

                $ex_date[$x][$Crop["crop_id"]."-".$r]=array(
                    "1"=>$ex_form[1],
                    "6"=>$ex_form[6]/$course[$x][$_COOKIE['currency']],
                    "8"=>$ex_form[8]/$course[$x][$_COOKIE['currency']],
                    "12"=>$ex_form[12]/$course[$x][$_COOKIE['currency']],
                    "4"=>$ex_form[4]/$course[$x][$_COOKIE['currency']],
                    "16"=>$ex_form[16],
                    "5"=>$ex_form[5]/$course[$x][$_COOKIE['currency']],
                    "7"=>$ex_form[7]/$course[$x][$_COOKIE['currency']],
                    "11"=>$ex_form[11]/$course[$x][$_COOKIE['currency']],
                    "2"=>$ex_form[2]/$course[$x][$_COOKIE['currency']],
                    "3"=>$ex_form[3]/$course[$x][$_COOKIE['currency']],
                    "17"=>$ex_form[17],
                );
            }
        }
        }
        return $ex_date;
    }
    //исторический анализ украины
    public static function getHistoricalUkraine(){
        $db = Db::getConnection();
        $course[2014]['UAH']=1;
        $course[2015]['UAH']=1;
        $course[2016]['UAH']=1;

        $course[2014]['USD']=12.00;
        $course[2015]['USD']=20.72;
        $course[2016]['USD']=25.12;

        $course[2014]['EUR']=16.14;
        $course[2015]['EUR']=23.42;
        $course[2016]['EUR']=28.73;
        $result = $db->query("SELECT * FROM historical_ukraine");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date  = $result->fetchAll();
        $gr=array(
            1=>1,
            2=>6,
            3=>8,
            4=>12,
            5=>4,
            6=>16,
            7=>5,
            8=>7,
            9=>11,
            10=>2,
            11=>3,
            12=>17
        );
        foreach ($date as $analiz){
            $ex_date[2014][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2014'];
            $ex_date[2015][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2015'];
            $ex_date[2016][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2016'];


            $g=$gr[$analiz['type']];
            if($g==6 or $g==8 or $g==12 or $g==4 or $g==5 or $g==7 or $g==11 or $g==2 or $g==3){
                $ex_date[2014][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2014']/$course[2014][$_COOKIE['currency']];
                $ex_date[2015][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2015']/$course[2015][$_COOKIE['currency']];
                $ex_date[2016][$analiz['crop']."-".$analiz['crop_type']][$gr[$analiz['type']]][$analiz['region']]=$analiz['y2016']/$course[2016][$_COOKIE['currency']];
            }
        }

        return $ex_date;
    }
    //настроики по материалам
    public static function getSettingMaterials(){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $result = $db->query("SELECT * FROM setting_material WHERE id_user=$id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $setting){
            $GLOBALS['my_materials'][$setting['name_material']]=$setting['value_setting'];
        }
        return true;
    }
    //сохранение настроек по материалам
    public static function saveSettingMaterial($sql_save){
        $db = Db::getConnection();
        $id_user = $_SESSION['id_user'];
        $db->query("DELETE FROM setting_material WHERE id_user=$id_user");
        $db->query("INSERT INTO setting_material (id_user, name_material, value_setting) VALUE $sql_save");
        return true;
    }
    //
    public static function gerRemainsGraphs(){
        $date=array(
            "1"=>"показує валовий вихід продукції з 1 га земельних угідь",
            "6"=>"виражені у грошовій формі поточні витрати підприємства на виробництво одиниці продукції",
            "8"=>"сума виробничої собівартості і позавиробничих витрат підприємства (адміністративні, на збут та інші) на одиницю площі",
            "12"=>"прибуток від основної діяльності підприємства, до вирахування відсотків і податків отриманий з одиниці зібраної продукції",
            "4"=>"прибуток підприємства, що залишається в його розпорядженні після сплати податків, зборів, відрахувань і інших обов`язкових платежів до бюджету отриманий з одиниці площі",
            "16"=>"показує, яку суму чистого прибутку одержує підприємство з кожної гривні виробленої продукції",
            "5"=>"виражені у грошовій формі поточні витрати підприємства на виробництво продукції на одиницю площі",
            "7"=>"сума виробничої собівартості і позавиробничих витрат підприємства (адміністративні, на збут та інші) на одиницю зібраної продукції",
            "11"=>"прибуток від основної діяльності підприємства, до вирахування відсотків і податків отриманий з одиниці площі",
            "2"=>"кількість грошей, за яку продавець пропонує продати, а покупець готовий купити одиницю товару",
            "3"=>"сума грошей, що надійшла на рахунок підприємства, чи в касу за реалізовану продукцію",
            "17"=>"показує, яку суму операційного прибутку одержує підприємство з кожної гривні проданої продукції",
        );
        return $date;
    }
    public static function getCropName($id){
        $db = Db::getConnection();
        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT a.crop_id, h.name_crop_$lang AS name_crop_ua  FROM crop_analytica AS a, crop_head AS h WHERE a.id_user=$id AND a.type=1 AND a.crop_id=h.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date[1] = $result->fetchAll();

        $result = $db->query("SELECT a.crop_id, h.name_crop_$lang AS name_crop_ua FROM crop_analytica AS a, crop_head_veg AS h WHERE a.id_user=$id AND a.type=2 AND a.crop_id=h.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date[2] = $result->fetchAll();


        $result = $db->query("SELECT a.crop_id, h.name_crop_ua AS name_crop_ua FROM crop_analytica AS a, agri_crop_head AS h WHERE a.id_user=$id AND a.type=3 AND a.crop_id=h.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date[3] = $result->fetchAll();
        return $date;
    }
}