<?php

include_once ROOT.'/cabinet/new-farmer/models/Employee.php';


class EmployeeController {

	public function actionEmployee(){
		$id_user = $_SESSION['id_user'];
		$date = Employee::getEmployee($id_user);

		SRC::template('new-farmer','new','Employee', $date);
		return true;
	}

	public function actionCreateEmployee(){
		$id_user = $_SESSION['id_user'];
		$employee_name = SRC::validator($_POST['employee_name']);
		$employee_surname = SRC::validator($_POST['employee_surname']);
		$employee_father_name = SRC::validator($_POST['employee_father_name']);
		$employee_phone_number = SRC::validator($_POST['employee_phone_number']);
		$employee_position = SRC::validator($_POST['employee_position']);
		$employee_salary = SRC::validatorPrice($_POST['employee_salary']);
		$employee_date_start = SRC::validator($_POST['date_start']);
		$employee_date_end = SRC::validator($_POST['date_end']);
		$employee_description = SRC::validator($_POST['description']);

		Employee::createEmployee($id_user, $employee_name, $employee_surname,$employee_father_name, $employee_phone_number, $employee_position,$employee_description,$employee_date_end,$employee_date_start,$employee_salary);
		SRC::redirect('/new-farmer/employee');
		return true;
	}
	public function actionEditEmployee(){
		$employee_id = SRC::validator($_POST['edit_id_employee']);
		$employee_name = SRC::validator($_POST['edit_employee_name']);
		$employee_surname = SRC::validator($_POST['edit_employee_surname']);
		$employee_father_name = SRC::validator($_POST['edit_employee_father_name']);
		$employee_phone_number = SRC::validator($_POST['edit_employee_phone_number']);
		$employee_position = SRC::validator($_POST['edit_employee_position']);
		$employee_salary = SRC::validatorPrice($_POST['edit_employee_salary']);
		$employee_date_start = SRC::validator($_POST['edit_date_start']);
		$employee_date_end = SRC::validator($_POST['edit_date_end']);
		$employee_description = SRC::validator($_POST['edit_description']);
		Employee::editEmployee($employee_id, $employee_name, $employee_surname, $employee_father_name,$employee_phone_number,$employee_position,$employee_description,$employee_date_end, $employee_date_start, $employee_salary);
		SRC::redirect('/new-farmer/employee');
		return true;
	}


	public function actionRemoveEmployee($id){	
		$id_user = $_SESSION['id_user'];
		Employee::removeEmployee($id_user, $id);
		SRC::redirect('/new-farmer/employee');
		return true;
	}

}