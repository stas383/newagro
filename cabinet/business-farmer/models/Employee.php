<?php
class Employee {
    public static function createEmployee($id_user, $employee_name, $employee_surname, $employee_phone_number, $employee_position){
		$db = Db::getConnection();
		$db->query("INSERT INTO b_employee (id_user, employee_name, employee_surname, employee_phone_number, employee_position ) VALUES ('$id_user','$employee_name','$employee_surname','$employee_phone_number','$employee_position')");
		return true;
	}

	public static function getEmployee($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM b_employee WHERE id_user = '$id_user' and employee_status = 0");
		$result ->setFetchMode(PDO::FETCH_ASSOC);
		$date = $result->fetchAll();
		return $date;
	}

	public static function removeEmployee($id_user, $id){
		$db = Db::getConnection();
		$db->query("UPDATE b_employee SET employee_status = 1 WHERE id_user = $id_user and id_employee = $id");
		return true;
	}

	public static function editEmployee($employee_id, $employee_name, $employee_surname, $employee_phone_number, $employee_position){
		$db = Db::getConnection();
		$db->query("UPDATE b_employee SET employee_name='$employee_name', employee_surname='$employee_surname', employee_phone_number = '$employee_phone_number', employee_position = '$employee_position' WHERE id_employee = $employee_id");
		return true;
	}
}