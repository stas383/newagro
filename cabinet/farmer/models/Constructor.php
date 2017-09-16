<?php
class Constructor{
    //Список культур
    public static function getAgriCrop(){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_crop, name_crop_ua FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT id_crop, name_crop_ua  FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-2'] = $result->fetchAll();

        $id_user=$_SESSION['id_user'];

        $result = $db->query("SELECT * FROM agri_crop_head WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_head'] = $result->fetchAll();

        return $date;
    }
    //Данные о культуре
    public static function getCropHead($Crop){
        $db = Db::getConnection();
        $id=$Crop[1];
        $id2=$Crop[0];
        if($Crop[0]==1) $type='';
        if($Crop[0]==2) $type='_veg';
        $result = $db->query("SELECT * FROM crop_head$type WHERE id_crop=$id ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM setting_sales WHERE id_user=0  AND name='p$id-$id2' or name='r$id-$id2'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sales'] = $result->fetchAll();

        $date['crop_type']=$id2;

        return $date;
    }
    //
    public static function getMyCropHead($crop_id){
        $id_user=$_SESSION['id_user'];

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM agri_crop_head WHERE id_crop=$crop_id AND id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM agri_sales WHERE id_user=$id_user  AND crop_id='p$crop_id' or crop_id='r$crop_id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sales'] = $result->fetchAll();

        return $date;
    }
    //Добавление культкры
    public static function createCropHead($id_user ,$crop_st,$name_crop_ua,$cleaning_qty,$drying_qty,$cleaning_price,$drying_price,$storing_price,$other_operating){
        $db = Db::getConnection();
        $db->query("INSERT INTO agri_crop_head (id_user, crop_st, name_crop_ua, cleaning_qty, drying_qty, cleaning_price, drying_price, storing_price, other_operating) VALUE ($id_user,'$crop_st','$name_crop_ua',$cleaning_qty,$drying_qty,$cleaning_price,$drying_price,$storing_price,$other_operating)");
        $crop_id = $db->lastInsertId();
        return $crop_id;
    }
    //Добавление настроек реализации
    public static function createSales($id_user ,$crop_id, $r, $p){
        $db = Db::getConnection();
        $result = $db->query("INSERT INTO agri_sales (id_user, crop_id, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12)
                     VALUE ($id_user, 'p$crop_id', $p[1], $p[2], $p[3], $p[4], $p[5], $p[6], $p[7], $p[8], $p[9], $p[10], $p[11], $p[12]),
                          ($id_user, 'r$crop_id', $r[1], $r[2], $r[3], $r[4], $r[5], $r[6], $r[7], $r[8], $r[9], $r[10], $r[11], $r[12])");
        return $result;
    }
    //
    public static function addAnalytica($id_user, $crop_id, $area, $yaled){
        $db = Db::getConnection();
        $db->query("INSERT INTO crop_analytica (id_user, crop_id,area,yaled, type)
                    VALUE ('$id_user','$crop_id','$area','$yaled','3')");
        return true;
    }
    //
    public static function saveCropHead($id_user ,$id_crop ,$name_crop_ua,$cleaning_qty,$drying_qty,$cleaning_price,$drying_price,$storing_price,$other_operating){
        $db = Db::getConnection();
        $db->query("UPDATE agri_crop_head SET name_crop_ua = '$name_crop_ua',
                                              cleaning_qty='$cleaning_qty',
                                              drying_qty='$drying_qty',
                                              cleaning_price='$cleaning_price',
                                              drying_price='$drying_price',
                                              storing_price='$storing_price',
                                              other_operating='$other_operating'
          WHERE id_user = '$id_user' AND id_crop=$id_crop");


        return true;
    }
    //
    public static function removeSales($id_user,$id_crop){
        $db = Db::getConnection();
        $db->query("DELETE FROM agri_sales WHERE id_user=$id_user AND (crop_id='p$id_crop' or crop_id='r$id_crop')");
        return true;
    }
    //План
    public static function getCropPlan($id_user, $crop_id){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM agri_crop_head WHERE id_user=$id_user AND id_crop=$crop_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_head'] = $result->fetchAll();

        if($date['agri_crop_head']==false) return false;

        $result = $db->query("SELECT * FROM agri_crop_plan WHERE id_user=$id_user AND id_crop=$crop_id ORDER BY start_date ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_plan'] = $result->fetchAll();


        $result = $db->query("SELECT * FROM action as a, equipment as e, power_eqt as p,working_eqt as w  
              WHERE a.id_action = e.action_id AND 
              p.id_power=e.power_eqt_id AND 
              w.id_working=e.working_eqt_id
              AND NOT a.status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM analytica_date WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['analytica_date'] = $result->fetchAll();

        $zona=$date['analytica_date'][0]['zona'];
        if($zona==false) $zona=1;

        $result = $db->query("SELECT * FROM agri_action WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['my-action'] = $result->fetchAll();

        $result = $db->query("SELECT *, material_qty_z$zona as material_qty FROM material_seeds WHERE crop_id={$date['agri_crop_head'][0]['crop_st']} AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT *, material_qty_z$zona as material_qty FROM material_fertilizers WHERE crop_id={$date['agri_crop_head'][0]['crop_st']} AND yield_level=2 AND NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM material_ppa WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM agri_material WHERE id_user=$id_user AND id_crop=$crop_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_material'] = $result->fetchAll();

        return $date;
    }
    //добавление операции
    public static function createAction($id_user, $name_action, $drivers, $driver_bonus, $driver_class, $workers, $worker_bonus, $worker_class, $name_power, $name_working, $fuel_type, $productivity, $fuel_cons){
        $db = Db::getConnection();
        $db->query("INSERT INTO agri_action (id_user, name_action, drivers, driver_bonus, driver_class, workers, worker_class, worker_bonus, name_power, name_working, fuel_type, productivity, fuel_cons)
                     VALUE ($id_user, '$name_action', '$drivers', '$driver_bonus', '$driver_class', '$workers', '$worker_class', '$worker_bonus', '$name_power', '$name_working', '$fuel_type', '$productivity', '$fuel_cons')");
        $id = $db->lastInsertId();
        return $id;
    }
    //Добавление материала
    public static function createMaterial($id_user,$crop_id,$name,$qlt,$price,$type, $material_subtype){
        $db = Db::getConnection();
        $db->query("INSERT INTO agri_material (id_user, id_crop, type_material, subtype_material, name_material, qlt_material, price_material)
                    VALUE ('$id_user','$crop_id','$type','$material_subtype','$name','$qlt','$price')");
        $id = $db->lastInsertId();
        return $id;
    }
    //
    public  static function cratePlan($id_user,$crop_id,$id_action,$id_materials,$start_date,$end_date){
        $db = Db::getConnection();
        $db->query("INSERT INTO agri_crop_plan (id_user, id_crop, id_action, id_materials, start_date, end_date)
                    VALUE ('$id_user','$crop_id','$id_action','$id_materials','$start_date','$end_date')");
        return true;
    }
    //
    public static function removePlan($id,$id_user){
        $db = Db::getConnection();
        $db->query("DELETE FROM agri_crop_plan WHERE id_plan=$id AND id_user=$id_user");
        return true;
    }
    //
    public static function parentPlan($id_plan,$id_parent,$id_user){
        $db = Db::getConnection();
        $db->query("UPDATE agri_crop_plan SET id_parent = '$id_parent' WHERE id_user = '$id_user' AND id_plan=$id_plan");

        return true;
    }
    //
    public static function getAction($id_user,$id_action){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM agri_action WHERE id_user=$id_user AND id=$id_action");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['action'] = $result->fetchAll();

        return $date;
    }

}