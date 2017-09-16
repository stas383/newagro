<?php


class Employee {

	public static function createEmployee($id_user, $employee_name, $employee_surname,$employee_father_name, $employee_phone_number, $employee_position,$employee_description,$employee_date_end,$employee_date_start,$employee_salary){

		$db = Db::getConnection();
		$db->query("INSERT INTO new_employee(id_user,employee_name,employee_surname,employee_father_name,employee_phone_number,employee_position,employee_description ,employee_date_end,employee_date_start, employee_salary) 
              VALUES ('$id_user','$employee_name','$employee_surname','$employee_father_name','$employee_phone_number','$employee_position','$employee_description','$employee_date_end','$employee_date_start','$employee_salary')");

		return true;
	}

	public static function getEmployee($id_user){
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM new_employee WHERE id_user = '$id_user' and employee_status = 0 ORDER BY employee_surname DESC ");
		$result ->setFetchMode(PDO::FETCH_ASSOC);
		$date = $result->fetchAll();
		return $date;
	}

	public static function removeEmployee($id_user, $id){
		$db = Db::getConnection();
		$db->query("UPDATE new_employee SET employee_status = 1 WHERE id_user = $id_user and id_employee = $id");
		return true;
	}

	public static function editEmployee($employee_id, $employee_name, $employee_surname, $employee_father_name,$employee_phone_number,$employee_position,$employee_description,$employee_date_end, $employee_date_start, $employee_salary){
		$db = Db::getConnection();
		$db->query("UPDATE new_employee SET employee_name='$employee_name', employee_surname='$employee_surname',employee_father_name = '$employee_father_name', employee_phone_number = '$employee_phone_number', 
      employee_position = '$employee_position', employee_description = '$employee_description', employee_date_end = '$employee_date_end', employee_date_start = '$employee_date_start', employee_salary = '$employee_salary' WHERE id_employee = $employee_id");
		return true;
	}
}