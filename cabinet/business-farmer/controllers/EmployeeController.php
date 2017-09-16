<?php
include_once ROOT.'/cabinet/business-farmer/models/Employee.php';

class EmployeeController {
	public function actionEmployee(){
		$id_user = $_SESSION['id_user'];
		$date = Employee::getEmployee($id_user);
		SRC::template('business-farmer','panel','Employee', $date);
		return true;
	}
	public function actionCreateEmployee(){
		$id_user = $_SESSION['id_user'];
		$employee_name = SRC::validator($_POST['employee_name']);
		$employee_surname = SRC::validator($_POST['employee_surname']);
		$employee_phone_number = SRC::validator($_POST['employee_phone_number']);
		$employee_position = SRC::validator($_POST['employee_position']);
		Employee::createEmployee($id_user, $employee_name, $employee_surname, $employee_phone_number, $employee_position);
		SRC::redirect();
		return true;
	}
	public function actionEditEmployee(){
		$employee_id = SRC::validator($_POST['edit_id_employee']);
		$employee_name = SRC::validator($_POST['edit_employee_name']);
		$employee_surname = SRC::validator($_POST['edit_employee_surname']);
		$employee_phone_number = SRC::validator($_POST['edit_employee_phone_number']);
		$employee_position = SRC::validator($_POST['edit_employee_position']);
		Employee::editEmployee($employee_id, $employee_name, $employee_surname, $employee_phone_number, $employee_position);
		SRC::redirect();
		return true;
	}
	public function actionRemoveEmployee($id){	
		$id_user = $_SESSION['id_user'];
		Employee::removeEmployee($id_user, $id);
		SRC::redirect();
		return true;
	}
}