<?php

include_once ROOT. '/cabinet/add-crop/models'.$_SESSION['crop'].'/Action.php';

class ActionController {
    //Загрузка страницы добавления типа операции
	public function  actionAddActionTypeView(){
        SRC::template('add-crop', 'panel', 'addActionType');
		return true;
	}
    //Добавление типа операции и единиц имерения
    public function actionCreateActionType(){
        $name = trim(htmlspecialchars(stripslashes($_POST['name'])));
        $unit = trim(htmlspecialchars(stripslashes($_POST['unit'])));
        $result = Action::addСreateActionType($name, $unit);

        SRC::addAlert($result, 1, 'Новий тип операції успішно доданий!');

        SRC::redirect();

        return true;
    }
    //Вывод списка типов операций
    public function actionListActionType(){
        $listActionType= Action::getListActionType();
        SRC::template('add-crop', 'panel', 'listActionType', $listActionType);

        return true;
    }

    //Редактирование типов операций
    public function actionEditSaveActionType(){
        $id = SRC::validator($_POST['id']);
        $type = SRC::validator($_POST['type']);
        $value = SRC::validator($_POST['value']);

        $result = Action::editSaveActionType($id, $type, $value);
        echo 'Запис відредаговано!';


        return true;
    }

    //Загрузка страницы добавления операции
    public function  actionAddActionView()
    {
        $listActionType= Action::getListActionType();
        SRC::template('add-crop', 'panel', 'addAction', $listActionType);

        return true;
    }
    //Добавление операции
    public function actionCreateAction(){
        $name_action_ua = SRC::validator($_POST['name_action_ua']);
        $action_type = SRC::validator($_POST['action_type']);
        $drivers = SRC::validator( $_POST['drivers']);
        if($drivers == false) $drivers = 0;
        $driver_class = SRC::validator($_POST['driver_class']);
        $driver_bonus = SRC::validatorPrice($_POST['driver_bonus']);
        if($driver_bonus == false) $driver_bonus = 0;
        $workers = SRC::validator($_POST['workers']);
        if($workers == false) $workers = 0;
        $worker_class = SRC::validator($_POST['worker_class']);
        $worker_bonus = SRC::validatorPrice($_POST['worker_bonus']);
        if($worker_bonus == false) $worker_bonus = 0;
        $result = Action::addСreateAction($name_action_ua, $action_type, $drivers, $driver_class, $driver_bonus, $workers, $worker_class, $worker_bonus);
        SRC::addAlert($result, 1, 'Нова операція успішно додана!');
        SRC::redirect();
        return true;
    }
    //Вывод списка операций
    public function actionListAction(){
        $listAction= Action::getListAction();
        SRC::template('add-crop', 'panel', 'listAction', $listAction);

        return true;
    }

    //Удаление операции
    public function actionRemoveAction($id){
        $result = Action::removeAction($id);
        SRC::addAlert($result, 1, 'Операція успішно видалена!');
        SRC::redirect();
        return true;
    }

    //Загрузка страницы редактирования
    public function actionEditAction($id){
        $idAction= Action::getActionId($id);
        SRC::template('add-crop', 'panel', 'editAction', $idAction);
        return true;
    }

    //Сохранение редактирования
    public function actionEditSaveAction(){
        $id = SRC::validator($_POST['id_action']);
        $name_action_ua = SRC::validator($_POST['name_action_ua']);
        $action_type = SRC::validatorPrice($_POST['action_type']);
        $drivers = SRC::validatorPrice( $_POST['drivers']);
        if($drivers == false) $drivers = 0;
        $driver_class = SRC::validatorPrice($_POST['driver_class']);
        $driver_bonus = SRC::validatorPrice($_POST['driver_bonus']);
        if($driver_bonus == false) $driver_bonus = 0;
        $workers = SRC::validatorPrice($_POST['workers']);
        if($workers == false) $workers = 0;
        $worker_class = SRC::validatorPrice($_POST['worker_class']);
        $worker_bonus = SRC::validatorPrice($_POST['worker_bonus']);
        if($worker_bonus == false) $worker_bonus = 0;
        $result = Action::editSaveAction($id, $name_action_ua, $action_type, $drivers, $driver_class, $driver_bonus, $workers, $worker_class, $worker_bonus);
        SRC::addAlert($result, 1, 'Операція успішно відредагована!');
        SRC::redirect();
        return true;
    }

}

