<?php


class Material {
    // Загрузка списка видов СЗР
    public static function getListMaterialSubType(){
        $db = Db::getConnection();
        $result = $db->query("SELECT id_subtype, name_subtype_ua FROM material_subtype_veg");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterialSubtype = $result->fetchAll();

        return $listMaterialSubtype;
    }

    //Добавление нового вида СЗР в базу
    public static function createMaterialSubtype($name){
        $db = Db::getConnection();

        $db->query("INSERT INTO material_subtype_veg(name_subtype_ua) VALUE ('$name')");

        return true;
    }

    //Редактирование видов СЗР
    public static function editSaveMaterialSubtype($id, $type, $value){
        $db = Db::getConnection();

        $db->query("UPDATE material_subtype_veg SET $type = '$value' WHERE id_subtype = '$id'");

        return true;
    }

    //Добавление нового СРЗ в базу
    public static function createMaterialPpa($name_material_ua, $subtype_id, $unit, $yield_level, $material_qty, $material_price){
        $db = Db::getConnection();

        $db->query("INSERT INTO material_ppa_veg(name_material_ua, subtype_id, yield_level, material_qty, material_price, unit) VALUE ('$name_material_ua', '$subtype_id', '$yield_level', '$material_qty', '$material_price', '$unit')");

        return true;
    }

    // Загрузка списка материалов СЗР
    public static function getListMaterialPpa(){
        $db = Db::getConnection();

        $result = $db->query("SELECT ms.name_subtype_ua, mp.id_material, mp.subtype_id, mp.yield_level, mp.name_material_ua, mp.material_qty, mp.material_price, mp.unit, o.value  FROM material_subtype_veg as ms,material_ppa_veg as mp, crop_option as o WHERE ms.id_subtype=mp.subtype_id AND mp.yield_level=o.id AND NOT mp.status_delete = 1 ORDER BY mp.name_material_ua");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial['date_all'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_option");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial['unit'] = $result->fetchAll();


        return $listMaterial;
    }

    //Редактирование материала СЗР
    public static function getMaterialPpaId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_material, name_material_ua, yield_level, crop_id, subtype_id, material_qty, material_price, unit FROM material_ppa_veg WHERE id_material = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['material_ppa'] = $result->fetchAll();

        $result = $db->query("SELECT id_subtype, name_subtype_ua FROM material_subtype_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['material_subtype'] = $result->fetchAll();

        return $idMaterial;
    }

    //Сохранение материала СЗР
    public static function editSaveMaterialPpa($id,$name_material_ua, $subtype_id, $unit, $yield_level, $material_qty, $material_price){
        $db = Db::getConnection();
        $db->query("UPDATE material_ppa_veg SET name_material_ua = '$name_material_ua', subtype_id = '$subtype_id', unit = '$unit', yield_level = '$yield_level', material_qty = '$material_qty', material_price = '$material_price'  WHERE id_material = $id");

        return true;
    }

    // Загрузка списка культур
    public static function getListMaterialCrop(){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_crop, name_crop_ua FROM crop_head_veg");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Добавление новых семян
    public static function createMaterialSeeds($name_material_ua, $selection, $crop_id, $unit, $material_price, $material_qty_z1, $material_qty_z2, $material_qty_z3){
        $db = Db::getConnection();

        $db->query("INSERT INTO material_seeds_veg (name_material_ua, selection,  crop_id, unit, material_price, material_qty_z1, material_qty_z2, material_qty_z3) VALUE ('$name_material_ua', '$selection','$crop_id', '$unit', '$material_price', '$material_qty_z1', $material_qty_z2, $material_qty_z3)");

        return true;
    }

    // Загрузка списка семян
    public static function getListMaterialSeeds(){
        $db = Db::getConnection();

        $result = $db->query("SELECT cp.name_crop_ua, ms.id_material,ms.selection, ms.crop_id, ms.name_material_ua, ms.material_price, ms.material_qty_z1, ms.material_qty_z2, ms.material_qty_z3, ms.unit, o.value FROM material_seeds_veg as ms, crop_head_veg as cp, crop_option as o WHERE ms.crop_id=cp.id_crop AND ms.unit=o.id AND NOT ms.status_delete = 1 ORDER BY name_crop_ua");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Загрузка материала из семян
    public static function getMaterialSeedsId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_material, crop_id, selection, name_material_ua, material_qty_z1, material_qty_z2, material_qty_z3, material_price, unit FROM material_seeds_veg WHERE id_material = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['material_seeds'] = $result->fetchAll();

        $result = $db->query("SELECT id_crop, name_crop_ua FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['crop_head'] = $result->fetchAll();

        return $idMaterial;
    }

    //Сохранение в семян
    public static function editSaveMaterialSeeds($id, $name_material_ua, $selection, $crop_id, $unit, $material_price, $material_qty_z1, $material_qty_z2, $material_qty_z3){
        $db = Db::getConnection();
        $db->query("UPDATE material_seeds_veg SET selection ='$selection', name_material_ua = '$name_material_ua', crop_id = '$crop_id', unit = '$unit', material_price = '$material_price', material_qty_z1 = '$material_qty_z1', material_qty_z2 = '$material_qty_z2', material_qty_z3 = '$material_qty_z3'  WHERE id_material = $id");

        return true;
    }

    //Добавление новых удобрений
    public static function createMaterrialFertilizers($name_material_ua, $crop_id, $yield_level, $material_price, $material_qty_z1, $material_qty_z2, $material_qty_z3) {

        $db = Db::getConnection();

        $db->query("INSERT INTO material_fertilizers_veg (name_material_ua, crop_id, yield_level, material_price, material_qty_z1, material_qty_z2, material_qty_z3) VALUE ('$name_material_ua', '$crop_id', '$yield_level', '$material_price', '$material_qty_z1', $material_qty_z2, $material_qty_z3)");

        return true;
    }

    //Загрузка списка удобрений
    public  static function getListMaterialFertilizers(){
        $db = Db::getConnection();

        $result = $db->query("SELECT cp.name_crop_ua, mf.id_material, mf.yield_level ,mf.crop_id, mf.name_material_ua, mf.material_price, mf.material_qty_z1, mf.material_qty_z2, mf.material_qty_z3 FROM material_fertilizers_veg as mf, crop_head_veg as cp WHERE mf.crop_id=cp.id_crop AND NOT mf.status_delete = 1 ORDER BY name_crop_ua, name_material_ua, yield_level");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Загрузка данных об одном удобрении
    public static function getMaterialFertilizersId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_material, crop_id, yield_level, name_material_ua, material_qty_z1, material_qty_z2, material_qty_z3, material_price FROM material_fertilizers_veg WHERE id_material = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['material_fertilizers'] = $result->fetchAll();

        $result = $db->query("SELECT id_crop, name_crop_ua FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $idMaterial['crop_head'] = $result->fetchAll();

        return $idMaterial;
    }

    //Сохранение материала удобрение

    public static function editSaveMaterialFertilizers($id, $material_qty_z1, $material_qty_z2, $material_qty_z3){
        $db = Db::getConnection();
        $db->query("UPDATE material_fertilizers_veg SET material_qty_z1 = '$material_qty_z1', material_qty_z2 = '$material_qty_z2', material_qty_z3 = '$material_qty_z3'  WHERE  id_material = '$id'");

        return true;
    }

    //Изменение других записей этого же удобрения
    public static function editSaveMaterialFertilizersOther($last_crop, $last_name_material_ua,$name_material_ua, $crop_id, $material_price){
        $db = Db::getConnection();

        $db->query("UPDATE material_fertilizers_veg SET name_material_ua = '$name_material_ua', crop_id = '$crop_id', material_price = '$material_price'  WHERE  name_material_ua = '$last_name_material_ua' AND crop_id = $last_crop");

        return true;
    }

    //удаление материалов
    public static function removeMaterial($table, $id){
        $db = Db::getConnection();

        $table=$table."_veg";
        $db->query("UPDATE $table SET status_delete = '1' WHERE id_material = $id");

        return true;
    }


}