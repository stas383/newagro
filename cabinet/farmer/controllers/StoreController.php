<?php

include_once ROOT. '/cabinet/farmer/models/Store.php';

class StoreController{
    //загрузка стандартных материалов по культуре
    public function actionGetPlanMaterial(){
        $my_crop= SRC::validator($_POST['crop']);
        $date = Store::getMyMaterial($my_crop);

        SRC::template('farmer', 'ajax', 'StorePlan', $date);

        return true;
    }

    //загрузка материалов
    public function actionGetListMaterial(){
        $date['plan'] = SRC::validator($_POST['plan']);
        $date['nomer'] = SRC::validator($_POST['nomer']);
        $date['type'] = SRC::validator($_POST['type']);
        $date['id_crop'] = SRC::validator($_POST['crop']);
        if($date['type']==1) $table="distributor_material_seeds";
        if($date['type']==2) $table="distributor_material_fertilizers";
        if($date['type']==3) $table="distributor_material_ppa";

        $date['distributor_material'] = Store::getListMaterial($table, $date['id_crop']);
        foreach ($date['distributor_material'] as $distributor_fabricator){
            $fabricator[]=$distributor_fabricator["fabricator"];
            $date['fabricator_name'][$distributor_fabricator["fabricator"]]=$distributor_fabricator['name'];

        }
        $date['fabricator_id']=array_unique($fabricator);

        SRC::template('farmer', 'ajax', 'StoreMaterial', $date);

        return true;
    }

    //добавление в корзину
    public function actionAddBasket(){
        $id_user = $_SESSION['id_user'];
        $id_crop = SRC::validator($_POST['crop']);
        $plan = SRC::validator($_POST['plan']);
        $nomer = SRC::validator($_POST['nomer']);
        $table = SRC::validator($_POST['table']);
        $material = SRC::validator($_POST['material']);
        $price = SRC::validator($_POST['price']);

        $result = Store::addBasket($id_user, $id_crop, $plan, $nomer, $table, $material, $price);

        echo "12";

        return $result;
    }
}

