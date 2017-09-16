<?php
include_once ROOT. '/cabinet/bank/models/Setting.php';

class SettingController{

    //Баланс продукції, т
    public function actionGetBalanceProducts(){
        $ex_date['sidebar_menu']='on';
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
        SRC::template('bank', 'panel', 'budgetSettingBalance', $ex_date);
        return true;
    }

    //Налаштування реалізації продукції
    public function actionGetSettingSales(){
        $date['sidebar_menu']='on';
        $date=Setting::getMyCropList();
        $date['sales']=Setting::getDateSales();
        for ($x=1; $x<=2; $x++){
            foreach ($date['Crop-'.$x] as $crop){
                $date['crop'][$crop["id_crop"]][$x]=array(
                    "id"=>$crop["id_crop"],
                    "name"=>$crop['name_crop_ua'],
                );
            }
        }
        SRC::template('bank', 'panel', 'budgetSettingSales', $date);
        return true;
    }

}

