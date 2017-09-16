<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 23.05.2017
 * Time: 9:18
 */

include_once ROOT. '/cabinet/farmer/models/Constructor.php';

class ConstructorController{
    //Мої технологічні карти
    public function actionGetCrop(){
        $Crop=Constructor::getAgriCrop();
        SRC::template('farmer', 'panel', 'ConstructMyCrop', $Crop);
        return true;
    }
    //Форма добавления культуры
    public function actionAddCrop(){
        $AgriCrop=SRC::validator($_POST['crop']);
        if($AgriCrop!=0){
            $AgriCrop = preg_split("/[,-]+/", $AgriCrop);

            $date=Constructor::getCropHead($AgriCrop);
            foreach ($date['sales'] as $sales){
                for ($x=1;$x<=12;$x++){
                    $date['revenue'][$sales['name'][0]][$x]=$sales['s'.$x];
                }
            }
        }
        SRC::template('farmer', 'panel', 'ConstructAddCrop', $date);

        return true;
    }
    //
    public function actionEditCrop($id_crop){
        $id_crop=SRC::validator($id_crop);
        $date=Constructor::getMyCropHead($id_crop);
        foreach ($date['sales'] as $sales){
            for ($x=1;$x<=12;$x++){
                $date['revenue'][$sales['crop_id'][0]][$x]=$sales['s'.$x];
            }
        }
        $date['id_crop']=$id_crop;
        SRC::template('farmer', 'panel', 'ConstructEditCrop', $date);
        return true;
    }
    //
    public function actionSaveCrop($id_crop){
        $id_user=$_SESSION['id_user'];
        $id_crop=SRC::validator($id_crop);
        $name_crop_ua= SRC::validatorPrice($_POST['name_crop_ua']);
        $cleaning_qty= SRC::validatorPrice($_POST['cleaning_qty']);
        $drying_qty= SRC::validatorPrice($_POST['drying_qty']);
        $cleaning_price= SRC::validatorPrice($_POST['cleaning_price']);
        $drying_price= SRC::validatorPrice($_POST['drying_price']);
        $storing_price= SRC::validatorPrice($_POST['storing_price']);
        $other_operating= SRC::validatorPrice($_POST['other_operating']);
        if($name_crop_ua==false)$name_crop_ua='name';
        if($cleaning_qty==false)$cleaning_qty=0;
        if($drying_qty==false)$drying_qty=0;
        if($cleaning_price==false)$cleaning_price=0;
        if($drying_price==false)$drying_price=0;
        if($storing_price==false)$storing_price=0;
        if($other_operating==false)$other_operating=0;
        Constructor::saveCropHead($id_user,$id_crop,$name_crop_ua,$cleaning_qty,$drying_qty,$cleaning_price,$drying_price,$storing_price,$other_operating);
        for ($x=1;$x<=12;$x++){
            $r[$x]=SRC::validatorPrice($_POST['r'.$x]);
            $p[$x]=SRC::validatorPrice($_POST['p'.$x]);
            if($r[$x]==false) $r[$x]=0;
            if($p[$x]==false) $p[$x]=0;
        }
        Constructor::removeSales($id_user, $id_crop);
        Constructor::createSales($id_user, $id_crop, $r, $p);
        SRC::redirect('/farmer/create/crop-plan/'.$id_crop);
        return true;
    }
    //Создание культуры
    public function actionCreateCrop(){
        $id_user=$_SESSION['id_user'];
        $crop_st= SRC::validatorPrice($_POST['crop_st']);
        $name_crop_ua= SRC::validatorPrice($_POST['name_crop_ua']);
        $cleaning_qty= SRC::validatorPrice($_POST['cleaning_qty']);
        $drying_qty= SRC::validatorPrice($_POST['drying_qty']);
        $cleaning_price= SRC::validatorPrice($_POST['cleaning_price']);
        $drying_price= SRC::validatorPrice($_POST['drying_price']);
        $storing_price= SRC::validatorPrice($_POST['storing_price']);
        $other_operating= SRC::validatorPrice($_POST['other_operating']);
        if($crop_st=='-')$crop_st=0;
        if($name_crop_ua==false)$name_crop_ua='name';
        if($cleaning_qty==false)$cleaning_qty=0;
        if($drying_qty==false)$drying_qty=0;
        if($cleaning_price==false)$cleaning_price=0;
        if($drying_price==false)$drying_price=0;
        if($storing_price==false)$storing_price=0;
        if($other_operating==false)$other_operating=0;
        $crop_id=Constructor::createCropHead($id_user, $crop_st,$name_crop_ua,$cleaning_qty,$drying_qty,$cleaning_price,$drying_price,$storing_price,$other_operating);
        for ($x=1;$x<=12;$x++){
            $r[$x]=SRC::validatorPrice($_POST['r'.$x]);
            $p[$x]=SRC::validatorPrice($_POST['p'.$x]);
            if($r[$x]==false) $r[$x]=0;
            if($p[$x]==false) $p[$x]=0;
        }
        Constructor::createSales($id_user ,$crop_id, $r, $p);
        $area= SRC::validatorPrice($_POST['area']);
        $yaled= SRC::validatorPrice($_POST['yaled']);
        $result =Constructor::addAnalytica($id_user, $crop_id, $area, $yaled);

        SRC::addAlert($result, 1, 'ss');
        SRC::redirect('/farmer/create/crop-plan/'.$crop_id);
        return true;
    }
    //добавление операции
    public function actionCreateAction(){
        $id_user=$_SESSION['id_user'];
        $name_action=SRC::validatorPrice($_POST['name_action']);
        $drivers=SRC::validatorPrice($_POST['drivers']);
        $driver_bonus=SRC::validatorPrice($_POST['driver_bonus']);
        $driver_class=SRC::validatorPrice($_POST['driver_class']);
        $workers=SRC::validatorPrice($_POST['workers']);
        $worker_bonus=SRC::validatorPrice($_POST['worker_bonus']);
        $worker_class=SRC::validatorPrice($_POST['worker_class']);
        $name_power=SRC::validatorPrice($_POST['name_power']);
        $name_working=SRC::validatorPrice($_POST['name_working']);
        $fuel_type=SRC::validatorPrice($_POST['fuel_type']);
        $productivity=SRC::validatorPrice($_POST['productivity']);
        $fuel_cons=SRC::validatorPrice($_POST['fuel_cons']);
        $id=Constructor::createAction($id_user, $name_action, $drivers, $driver_bonus, $driver_class, $workers, $worker_bonus, $worker_class, $name_power, $name_working, $fuel_type, $productivity, $fuel_cons);
        echo $id;
        return true;
    }
    //добавление материала
    public function actionCreateMaterial(){
        $crop_id=SRC::validator($_POST['crop_id']);
        $id_user=$_SESSION['id_user'];
        $name=SRC::validator($_POST['name_material']);
        $qlt=SRC::validatorPrice($_POST['qlt_material']);
        $price=SRC::validatorPrice($_POST['price_material']);
        $type=SRC::validatorPrice($_POST['type_material']);
        $material_subtype=SRC::validatorPrice($_POST['material_subtype']);
        if($type<3) $material_subtype=0;
        $id=Constructor::createMaterial($id_user,$crop_id,$name,$qlt,$price,$type, $material_subtype);
        echo $id;
        return true;
    }
    //Добавление в план
    public function actionCreatePlan(){
        $crop_id=SRC::validator($_POST['crop_id']);
        $id_user=$_SESSION['id_user'];
        $id_action=SRC::validator($_POST['plan_id_action']);
        $id_materials=SRC::validator($_POST['plan_id_material']);

        $id_materials_arr=explode(',',$id_materials);
        $id_materials=false;
        foreach ($id_materials_arr as $value)if($value!=false and $value!=0){
            $id_materials.=$value.',';
        }
        $id_materials=substr($id_materials, 0, -1);

        $start_date=SRC::validator($_POST['start_date']);
        $end_date=SRC::validator($_POST['end_date']);
        Constructor::cratePlan($id_user,$crop_id,$id_action,$id_materials,$start_date,$end_date);
        SRC::redirect();
        return true;
    }
    ///
    public function actionRemovePlan(){
        $id=SRC::validator($_POST['id']);
        $id_user=$_SESSION['id_user'];
        Constructor::removePlan($id,$id_user);
        return true;
    }
    //
    public function actionParentPlan(){
        $id_plan=SRC::validator($_POST['id_plan']);
        $id_parent=SRC::validator($_POST['id_parent']);
        $id_user=$_SESSION['id_user'];
        Constructor::parentPlan($id_plan,$id_parent,$id_user);
        return true;
    }
    //План
    public function actionGetCropPlan($crop_id){
        $id_user=$_SESSION['id_user'];
        $date=Constructor::getCropPlan($id_user, $crop_id);
        if($date==false) SRC::redirect();
        $date['crop_id']=$crop_id;

        foreach ($date['my-action'] as $my_action){
            $date['plan_action'][$my_action['id']]=array('name'=>$my_action['name_action']);
        }
        foreach ($date['agri_material'] as $my_material){
            $date['plan_material'][$my_material['id_material']]=array('name'=>$my_material['name_material']);
        }
        SRC::template('farmer', 'panel', 'ConstructCropPlan', $date);
        return true;
    }
    public function actionRemoveCrop($id_crop){
        $id_user=$_SESSION['id_user'];
        $id_crop=SRC::validator($id_crop);

        return true;
    }
    //
    public function actionEditAction($id_action){
        $id_user=$_SESSION['id_user'];
        $id_action=SRC::validator($id_action);
        $date=Constructor::getAction($id_user,$id_action);

        SRC::template('farmer', 'panel', 'ConstructEditAction',$date);
        return true;
    }
}