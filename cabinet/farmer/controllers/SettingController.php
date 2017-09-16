<?php
include_once ROOT. '/cabinet/farmer/models/Setting.php';

class SettingController{
    //Баланс продукції, т
    public function actionGetBalanceProducts(){
        $date=Setting::getMyCropList();
        $date["date"]=Setting::getDateBalanceProducts();
        $x=0;
        foreach ($date['date'] as $value){
            for($t=0; $t<=5; $t++){
                 $ex_date["date"][$value['crop']][$t]=$value['s'.$t];
            }
        }
        foreach ($date["My-crop"] as $Crop){
            foreach ($date["Crop-".$Crop["type"]] as $crop_head)if($crop_head['id_crop']==$Crop['crop_id']){
                $x++;
                $gross_weight[$Crop['crop_id']] = $Crop['yaled']*$Crop['area'];
                $cleaning_qty[$Crop['crop_id']]=$gross_weight[$Crop['crop_id']]-$gross_weight[$Crop['crop_id']]*($crop_head['cleaning_qty']/100);
                $drying_qty[$Crop['crop_id']]=$cleaning_qty[$Crop['crop_id']]-$cleaning_qty[$Crop['crop_id']]*($crop_head['drying_qty']/100);
                $ex_date["table"][]=array(
                    "id"=>$Crop['crop_id'],
                    "type"=>$Crop["type"],
                    "name"=>$crop_head['name_crop_ua'],
                    "mass"=>$drying_qty[$Crop['crop_id']]/10
                );
            }
        }
        SRC::template('farmer', 'panel', 'budgetSettingBalance', $ex_date);
        return true;
    }
    //Сохранение баланс продукції, т
    public function actionSaveBalanceProducts(){
        $date=Setting::getMyCropList();
        $sql="";
        $id_user = $_SESSION['id_user'];
        foreach ($date["My-crop"] as $Crop){
            foreach ($date["Crop-".$Crop["type"]] as $crop_head)if($crop_head['id_crop']==$Crop['crop_id']){
                for($t=0; $t<=5; $t++){
                    $in[$t] = SRC::validatorPrice($_POST[$t.$Crop['crop_id'].$Crop['type']]);
                    if ($in[$t] == false) $in[$t] = 0;
                }
                $sql=$sql."($id_user, ".$Crop['crop_id'].$Crop['type'].", $in[1], $in[2], $in[3], $in[4], $in[5]), ";
            }
        }
        $sql=substr($sql, 0, -2);
        $result= Setting::saveBalanceProducts($id_user, $sql);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    //Налаштування реалізації продукції
    public function actionGetSettingSales(){
        $date=Setting::getMyCropList();
        $date['sales']=Setting::getDateSales();
        for ($x=1; $x<=3; $x++){
            foreach ($date['Crop-'.$x] as $crop){
                $date['crop'][$crop["id_crop"]][$x]=array(
                    "id"=>$crop["id_crop"],
                    "name_ua"=>$crop['name_crop_ua'],
                    "name_en"=>$crop['name_crop_en'],
                );
            }
        }
        SRC::template('farmer', 'panel', 'budgetSettingSales', $date);
        return true;
    }
    //Сохранение Налаштування реалізації продукції
    public function actionSaveSettingSales(){
        $date=Setting::getMyCropList();
        $id_user = $_SESSION['id_user'];
        $sql="";
        $sql2="";
        $remove2="";
        foreach ($date["My-crop"] as $crop){
            $sql_r="";
            $sql_p="";
            for ($x=1; $x<=12;$x++){
                $r[$x] = SRC::validatorPrice($_POST['r'.$crop['crop_id'].'-'.$crop['type'].'-'.$x]);
                $p[$x] = SRC::validatorPrice($_POST['p'.$crop['crop_id'].'-'.$crop['type'].'-'.$x]);
                if($r[$x]==false) $r[$x]=0;
                if($p[$x]==false) $p[$x]=0;
                $sql_r=$sql_r."$r[$x], ";
                $sql_p=$sql_p."$p[$x], ";
            }
            $sql_r=substr($sql_r, 0, -2);
            $sql_p=substr($sql_p, 0, -2);
            if($crop['type']==1 or $crop['type']==2) $sql=$sql."($id_user, 'r".$crop['crop_id'].'-'.$crop['type']."', $sql_r), ($id_user, 'p".$crop['crop_id'].'-'.$crop['type']."', $sql_p), ";
            if($crop['type']==3) {$sql2=$sql2."($id_user, 'r".$crop['crop_id']."', $sql_r), ($id_user, 'p".$crop['crop_id']."', $sql_p), ";
            $remove2.="crop_id='r".$crop['crop_id']."' or crop_id='r".$crop['crop_id']."' or ";}
        }
        $sql=substr($sql, 0, -2);
        $sql2=substr($sql2, 0, -2);
        $remove2=substr($remove2, 0, -4);

        $result=Setting::saveSettingSales($id_user, $sql, $sql2, $remove2);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    //Моделювання фінансової позики від банку
    public function actionGetSettingFinancialBank(){
        $setting=Setting::getSettingFinancialBank();
        foreach ($setting['proc'] as $ex_set){
            for ($x=1;$x<=12;$x++){
                $date['proc'][$ex_set['name_cf']][$x]=$ex_set['cf_'.$x];
            }
        }
        $date['bank']=$setting['bank'];
        SRC::template('farmer', 'panel', 'budgetSettingFinancialBank', $date);
        return true;
    }
    //Сохранение моделювання фінансової позики від банку
    public function actionSaveSettingFinancialBank(){
        $procent="";
        $sql_save="";
        $id = $_SESSION['id_user'];
        for ($x=1;$x<=6;$x++){
            $bank[$x] = SRC::validatorPrice($_POST['bank'.$x]);
        };
        for($y=8;$y<=10;$y++){
            for ($m=1;$m<=12;$m++){
                $CF[$y][$m] = SRC::validatorPrice($_POST['pr'.$y."-".$m]);
                if ($CF[$y][$m]==false)$CF[$y][$m]=0;
                $procent[$y]=$procent[$y].$CF[$y][$m].", ";
            }
            $procent[$y] = substr($procent[$y], 0, -2);
            $sql[$y]= "('".$id."', '".$y."', ".$procent[$y].")";
            $sql_save=$sql_save.$sql[$y].", ";
        }
        $sql_save_cf=substr($sql_save, 0, -2);
        $result=Setting::saveSettingFinancialBank($sql_save_cf, $bank);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }

}

