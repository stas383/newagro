<?php
include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Equipment.php';
class EquipmentController {
    //Загрузка страницы добавления техники
	public function actionAddEquipmentView(){

        $listAction= Equipment::getListActionWorkingPowerFuel();
        SRC::template('add-crop', 'panel', 'addEquipment', $listAction);
		return true;
	}

	//Загрузка списка техники
    public function actionListEquipment()
    {
        $listEquipment= Equipment::getListEquipment();
        SRC::template('add-crop', 'panel', 'listEquipment', $listEquipment);
        return true;
    }

    //Добавление техники
    public function actionCreateEquipment(){
        $working_eqt_id = trim(htmlspecialchars(stripslashes($_POST['working_eqt_id'])));
        $power_eqt_id = trim(htmlspecialchars(stripslashes($_POST['power_eqt_id'])));
        $action_id = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['action_id']))));
        $fuel_type_id = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['fuel_type_id']))));
        $x=0;
        while ($x < 9) {
            $x++;
            $fuel_cons[$x]= trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['fuel_cons_'.$x]))));
            $productivity[$x] = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['productivity_'.$x]))));
        }
        $working_name = trim(htmlspecialchars(stripslashes($_POST['working_name'])));
        $power_name = trim(htmlspecialchars(stripslashes($_POST['power_name'])));
        if($working_name==false) $working_eqt_id=1;
        if($power_name==false) $power_eqt_id=1;
        if($working_eqt_id == "add"){
            $working_eqt_id = Equipment::createWorking($working_name);
        }
        if($power_eqt_id == "add"){
            $power_eqt_id = Equipment::createPower($power_name);
        }
	    $result = Equipment::createEquipment($working_eqt_id, $power_eqt_id, $action_id, $fuel_type_id, $fuel_cons, $productivity);
	    SRC::addAlert($result, 1, 'успішно додане!');
        SRC::redirect();
	    return true;
    }

    //Страница редактирования
    public function actionEditEquipment($id){
        $date['one'] = Equipment::getOneEquipment($id);
        $date['list'] = Equipment::getListActionWorkingPowerFuel();
        SRC::template('add-crop', 'panel', 'editEquipment', $date);
        return true;
    }

    //Сохранение изменений
    public function actionEditSaveEquipment(){
        $id_equipment = trim(htmlspecialchars(stripslashes($_POST['id_equipment'])));
        $working_eqt_id = trim(htmlspecialchars(stripslashes($_POST['working_eqt_id'])));
        $power_eqt_id = trim(htmlspecialchars(stripslashes($_POST['power_eqt_id'])));
        $action_id = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['action_id']))));
        $fuel_type_id = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['fuel_type_id']))));
        $x=0;
        while ($x < 9) {
            $x++;
            $fuel_cons[$x]= trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['fuel_cons_'.$x]))));
            $productivity[$x] = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['productivity_'.$x]))));
        }
        $working_name = trim(htmlspecialchars(stripslashes($_POST['working_name'])));
        $power_name = trim(htmlspecialchars(stripslashes($_POST['power_name'])));

        if($working_name==false) $working_eqt_id=1;
        if($power_name==false) $power_eqt_id=1;
        if($working_eqt_id == "add"){
            $working_eqt_id = Equipment::createWorking($working_name);
        }
        if($power_eqt_id == "add"){
            $power_eqt_id = Equipment::createPower($power_name);
        }
        $result = Equipment::editSaveEquipment($id_equipment, $working_eqt_id, $power_eqt_id, $action_id, $fuel_type_id, $fuel_cons, $productivity);
        SRC::addAlert($result, 1, 'Пара техніки успішно відредагована!');
        SRC::redirect('/add-crop/list-equipment');
        return true;
    }

    //Удаление пары техники
    public function actionRemoveEquipment($id_equipment){
        $result = Equipment::removeEquipment($id_equipment);
        SRC::addAlert($result, 1, 'Пара техніки успішно видалена!');
        SRC::redirect();
        return true;
    }

    //Список тракторов
    public function actionListWorking(){
        $data= Equipment::getListWorking();
        SRC::template('add-crop', 'panel', 'listWorking', $data);
        return true;
    }

    //Список с/г машин
    public function actionListPower(){
        $data= Equipment::getListPower();
        SRC::template('add-crop', 'panel', 'listPower', $data);
        return true;
    }

    //Сохранение изменений названий тракторов
    public function actionSaveEditEquipmentName(){
        $id = SRC::validator($_POST['id']);
        $type = SRC::validator($_POST['type']);
        $value = SRC::validatorPrice($_POST['value']);

        $result = Equipment::editSaveEquipmentName($id, $type, $value);

        echo 'Відредаговано!';

        return true;
    }
}

