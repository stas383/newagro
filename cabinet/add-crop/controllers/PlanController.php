<?php

include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Plan.php';

class PlanController {

    //Загрузка списка плана и добавление
    public function actionListPlan($id){
        $date= Plan::getListPlan($id);
        $date['id']= $id;
        SRC::template('add-crop', 'panel', 'listPlan', $date);
        return true;
    }
    //Сохранение нового плана в БД
    public function actionCreatePlan(){

        $crop_id = SRC::validator($_POST['crop_id']);
        $tillage = SRC::validator($_POST['tillage']);
        $action_id = SRC::validator($_POST['action_id']);
        $strat_data = SRC::validator($_POST['strat_data']);
        $end_data = SRC::validator($_POST['end_data']);

        $x=0;
        while ($x < 3){
            $x++;
            $material_table[$x] = SRC::validator($_POST['material_table_'.$x]);
            $material_id[$x]=0;
            if($material_table[$x]<>0){
                $material_id_y1[$x] = SRC::validator($_POST['material_id_y1_'.$x]);
                $material_id_y2[$x] = SRC::validator($_POST['material_id_y2_'.$x]);
                $material_id_y3[$x] = SRC::validator($_POST['material_id_y3_'.$x]);
                $material_id[$x] = Plan::addMaterialPlan($material_table[$x], $material_id_y1[$x], $material_id_y2[$x], $material_id_y3[$x]);
            }
        }

        $result = Plan::addPlan($crop_id, $tillage, $action_id, $material_id, $strat_data, $end_data);

        SRC::addAlert($result, 1, 'Успішно додане!');

        SRC::redirect();

        return true;
    }

    //Редактирование плана
    public function actionEditPlan($id_crop, $id_plan)
    {
        $date = Plan::getListPlan($id_crop);
        $date['id_crop'] = $id_crop;
        $date['id_plan'] = $id_plan;
        SRC::template('add-crop', 'panel', 'editPlan', $date);
        return true;
    }
    //Сохранение изменений плана
    public function actionSaveEditPlan(){
        $id=SRC::validator($_POST['id']);;
        $plan = Plan::getOnePlan($id);
        $tillage = SRC::validator($_POST['tillage']);
        $action_id = SRC::validator($_POST['action_id']);
        $strat_data = SRC::validator($_POST['strat_data']);
        $end_data = SRC::validator($_POST['end_data']);
        $x=0;
        while ($x < 3){
            $x++;
            Plan::removeMaterialPlan($plan[0]['material_id_'.$x]);
            $material_table[$x] = SRC::validator($_POST['material_table_'.$x]);
            $material_id[$x]=0;
            if($material_table[$x]<>0){
                $material_id_y1[$x] = SRC::validator($_POST['material_id_y1_'.$x]);
                $material_id_y2[$x] = SRC::validator($_POST['material_id_y2_'.$x]);
                $material_id_y3[$x] = SRC::validator($_POST['material_id_y3_'.$x]);
                $material_id[$x] = Plan::addMaterialPlan($material_table[$x], $material_id_y1[$x], $material_id_y2[$x], $material_id_y3[$x]);
            }
        }
        $result = Plan::saveEditPlan($id, $tillage, $action_id, $material_id, $strat_data, $end_data);
        SRC::addAlert($result, 1, 'Збережено!');

        SRC::redirect('/add-crop/list-plan/'.$plan[0]['crop_id']);

        return true;
    }
    //Сохранение парной оперрации
    public function actionEditSaveParentOper(){
        $id = SRC::validator($_POST['id']);
        $parent = SRC::validator($_POST['parent']);
        Plan::editSaveParentOper($id, $parent);
        echo '<b>Збережено!</b>';
        return true;
    }
    //Сохранение номера
    public function actionEditSaveNumberOrder(){
        $id = SRC::validator($_POST['id']);
        $value = SRC::validator($_POST['value']);
        Plan::editSaveNumberOrder($id, $value);
        echo '<b>Збережено!</b>';
        return true;
    }
    //Удаление из плана
    public function actionRemoveOnePlan($id){
        $plan = Plan::getOnePlan($id);


        $result = Plan::removePlan($plan[0]['id'],$plan[0]['material_id_1'],$plan[0]['material_id_2'],$plan[0]['material_id_3']);

        SRC::addAlert($result, 1, 'Видалено!');

        SRC::redirect();
    }

}
