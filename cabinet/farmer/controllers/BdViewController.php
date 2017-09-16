<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 20.07.2017
 * Time: 16:10
 */
include_once ROOT. '/cabinet/farmer/models/Setting.php';
class BdViewController{
    public function actionGetPriceRevenue(){
        $date=Setting::getMyCropList();
        $date['sales']=Setting::getDateSales();
        for ($x=1; $x<=3; $x++){
            foreach ($date['Crop-'.$x] as $crop){
                $date['crop'][$crop["id_crop"]][$x]=array(
                    "id"=>$crop["id_crop"],
                    "name"=>$crop['name_crop_ua'],
                );
            }
        }
       SRC::template('farmer', 'panel', 'priceRevenue',$date );
       return true;
    }
}