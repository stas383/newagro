<?php

include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Fuel.php';

class FuelController {
    //Загрузка страницы добавления топлива
	public function actionAddFuelView()
	{
		
        SRC::template('add-crop', 'panel', 'addFuel');

		return true;
	}

	//Загрузка списка топлива
    public function actionListFuel()
    {

        $listFuil= Fuel::getListFuel();
        SRC::template('add-crop', 'panel', 'listFuel', $listFuil);

        return true;
    }

    //Добавление топлива, цены
    public function actionCreateFuel(){
        $name = trim(htmlspecialchars(stripslashes($_POST['name'])));
        $price = trim(htmlspecialchars(stripslashes(str_replace(',', '.', $_POST['price']))));
	    $result = Fuel::addOneFuel($name, $price);

	    SRC::addAlert($result, 1, 'Нове пальне успішно додане!');

        SRC::redirect();

	    return true;
    }

    //Редактирование топлива
    public function actionEditSaveFuel(){
        $id = SRC::validator($_POST['id']);
        $type = SRC::validator($_POST['type']);
        $value = SRC::validatorPrice($_POST['value']);

        $result = Fuel::editSaveFuel($id, $type, $value);

        echo 'Запис відредаговано!';

        return true;
    }

}

