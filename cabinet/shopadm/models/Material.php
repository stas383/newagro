<?php


class Material{

    //Получение списка семян пользователя
    public static function getDateSeedsId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT m.id_material ,m.id_crop, m.fabricator, m.material_name, m.material_qty, m.material_price, m.price_two, ch.name_crop_ua FROM distributor_material_seeds as m, crop_head as ch WHERE m.id_crop = ch.id_crop AND m.id_user = '$id' AND m.status_delete = 0");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $dateSeeds = $result->fetchAll();

        return $dateSeeds;
    }

    // Загрузка списка культур
    public static function getListMaterialCrop(){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_crop, name_crop_ua FROM crop_head WHERE status_delete=0 ORDER BY name_crop_ua");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }


    //Добавление нового производителя и получание последней айдишки
    public static function createNewFabricator($fabricator){
        $db = Db::getConnection();

        $db->query("INSERT INTO store_fabricator(name) 
                    VALUE ('$fabricator')");
        $id_fabricator = $db->lastInsertId();

        return $id_fabricator;
    }

    //Проверка если ли такой производитель
    public static function validateFabricator($name){
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM store_fabricator WHERE name='$name'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;

    }

    //Загрузка списка производителей
    public static function getListFabricator(){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM store_fabricator");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listFabricator = $result->fetchAll();

        return $listFabricator;
    }

    public static function createSeeds($id_user, $id_crop, $fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive, $save_price_pdv, $save_m_1000, $save_1po_seeds, $save_rec_qty){
        $db = Db::getConnection();

        $db->query("INSERT INTO distributor_material_seeds(id_crop, fabricator, id_user, material_name, material_qty, material_price, price_two, time_term, discount, description, new, material_exclusive, save_price_pdv, save_m_1000, save_1po_seeds, save_rec_qty) 
                    VALUE ('$id_crop', '$fabricator', '$id_user', '$material_name', '$material_qty', '$material_price', '$price_two', '$time_term', '$discount', '$description', '$new', '$material_exclusive', '$save_price_pdv', '$save_m_1000', '$save_1po_seeds', '$save_rec_qty')");

        return true;
    }

    //Загрузка данных об семенах
    public static function getMaterialSeedsId($id, $id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM distributor_material_seeds as ds, store_fabricator as sf WHERE ds.fabricator=sf.id AND ds.id_material = '$id' AND ds.id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Сохранение
    public static function saveSeeds($id_material, $id_user, $id_crop, $fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive, $save_price_pdv, $save_m_1000, $save_1po_seeds, $save_rec_qty){

        $db = Db::getConnection();
        $db->query("UPDATE distributor_material_seeds SET id_crop='$id_crop', fabricator='$fabricator', material_name='$material_name', material_qty='$material_qty', material_price='$material_price', price_two='$price_two', time_term='$time_term', discount='$discount', description='$description', new='$new', material_exclusive ='$material_exclusive', save_price_pdv='$save_price_pdv', save_m_1000='$save_m_1000', save_1po_seeds='$save_1po_seeds', save_rec_qty='$save_rec_qty' WHERE id_user='$id_user' AND id_material='$id_material'");

        return true;
    }

    //Загрузка списка СЗР пользователя
    public static function getListMaterialSubtypePpa($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT m.id_material ,m.id_crop, m.fabricator, m.material_name, m.material_qty, m.material_price, m.price_two, ch.name_crop_ua, ms.name_subtype_ua FROM distributor_material_ppa as m, crop_head as ch, material_subtype as ms WHERE m.id_crop = ch.id_crop AND m.id_user = '$id' AND m.material_subtype = ms.id_subtype AND m.status_delete = 0 AND ch.status_delete = 0");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listSubtype = $result->fetchAll();
        return $listSubtype;
    }

    //Получение списка семян пользователя
    public static function getMaterialFerId($id_material, $id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM distributor_material_fertilizers as df, store_fabricator as sf WHERE df.fabricator=sf.id AND id_material='$id_material' AND id_user='$id_user'");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $dateFer = $result->fetchAll();

        return $dateFer;
    }

    //Сохранение
    public static function saveFer($id_material, $id_user, $id_crop, $fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive){

        $db = Db::getConnection();
        $db->query("UPDATE distributor_material_fertilizers SET id_crop='$id_crop', fabricator='$fabricator', material_name='$material_name', material_qty='$material_qty', material_price='$material_price', price_two='$price_two', time_term='$time_term', discount='$discount', description='$description', new='$new', material_exclusive ='$material_exclusive' WHERE id_user='$id_user' AND id_material='$id_material'");

        return true;
    }


    //Загрузка списка удобрений пользователя
    public static function getListMaterialFer($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT m.id_material ,m.id_crop, m.fabricator, m.material_name, m.material_qty, m.material_price,  m.price_two, ch.name_crop_ua FROM distributor_material_fertilizers as m, crop_head as ch WHERE m.id_crop = ch.id_crop AND m.id_user = '$id' AND m.status_delete = 0");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listSubtype = $result->fetchAll();
        return $listSubtype;
    }

    //Сохранение удобрений
    public static function createFer($id_user, $id_crop, $fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive){
        $db = Db::getConnection();

        $db->query("INSERT INTO distributor_material_fertilizers(id_crop, fabricator, id_user, material_name, material_qty, material_price, new, material_exclusive, discount, time_term, description, price_two) 
                    VALUE ('$id_crop', '$fabricator', '$id_user', '$material_name', '$material_qty', '$material_price', '$new', '$material_exclusive', '$discount', '$time_term', '$description',  '$price_two')");

        return true;
    }



    //Загруска списка СЗР
    public static function getListMaterialSubType(){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_subtype, name_subtype_ua  FROM material_subtype");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Сохранение СЗР
    public static function createPpa($id_user, $id_crop, $material_subtype , $fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive){
        $db = Db::getConnection();

        $db->query("INSERT INTO distributor_material_ppa(id_crop, fabricator, id_user, material_subtype, material_name, material_qty, material_price, new, material_exclusive, discount, time_term, description, price_two) 
                    VALUE ('$id_crop', '$fabricator', '$id_user', '$material_subtype',  '$material_name', '$material_qty', '$material_price', '$new', '$material_exclusive', '$discount', '$time_term', '$description',  '$price_two')");

        return true;
    }

    //Загрузка данных об семенах
    public static function getMaterialPpaId($id, $id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM distributor_material_ppa as dp, store_fabricator as sf WHERE dp.fabricator=sf.id AND id_material = '$id' AND id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $listMaterial = $result->fetchAll();

        return $listMaterial;
    }

    //Сохранение
    public static function savePpa($id_material, $id_user, $id_crop, $material_subtype ,$fabricator, $material_name, $material_qty, $material_price, $price_two, $time_term, $discount, $description, $new, $material_exclusive){

        $db = Db::getConnection();
        $db->query("UPDATE distributor_material_ppa SET id_crop='$id_crop',material_subtype = '$material_subtype' ,fabricator='$fabricator', material_name='$material_name', material_qty='$material_qty', material_price='$material_price', price_two='$price_two', time_term='$time_term', discount='$discount', description='$description', new='$new', material_exclusive ='$material_exclusive' WHERE id_user='$id_user' AND id_material='$id_material'");

        return true;
    }

    //Удаление материалов
    public static function removeMaterial($table, $id){

        $db = Db::getConnection();
        $db->query("UPDATE $table SET status_delete = '1' WHERE id_material = $id");

        return true;
    }

}