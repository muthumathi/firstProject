<?php
	include_once("MySQL.php");
	
	class Employee{

		public $primary_key, $employee_id, $name, $birthday, $department;
		public $qualification, $designation, $languages_known, $hobbies;
		public $sports, $games, $skills, $goal_in_office;
		
		function Employee()
		{
			$this->primary_key = $this->employee_id = $this->name = $this->birthday = "";
			$this->department = $this->qualification = $this->designation = $this->languages_known = "";
			$this->hobbies = $this->sports = $this->games = $this->skills = "";
			$this->goal_in_office = "";
						
		}
		
		function SetEmployeeId($primary_key)
		{
			// Try to fetch the record for the given Employee Id.
			$dt = $this->GetRecordById($primary_key);
			if($dt->num_rows > 0)
			{
				$dr = $dt->fetch_assoc();
				$this->primary_key = $dr["primary_key"];
				$this->employee_id = $dr["employee_id"];
				$this->name = $dr["name"];
				$this->birthday = $dr["birthday"];
				$this->department = $dr["department"];
				$this->qualification = $dr["qualification"];
				$this->designation = $dr["designation"];
				$this->languages_known = $dr["languages_known"];
				$this->hobbies = $dr["hobbies"];
				$this->sports = $dr["sports"];
				$this->games = $dr["games"];
				$this->skills = $dr["skills"];
				$this->goal_in_office = $dr["goal_in_office"];
			}
			unset($dt);
		}
		function GetList($MaxRecords=0)
		{
			$db = new MySQL();
			$sql = "Select * From Employee ";
			if($MaxRecords > 0)
				$sql .= "Limit $MaxRecords";
			$dt = $db->GetDataTable($sql);
			unset($db);
			return $dt;
		}



		function GetRecordById($primary_key)
		{
			$db = new MySQL();
			$sql = "Select * From Employee Where EmployeeId=$primary_key";
			$dt = $db->GetDataTable($sql);
			unset($db);
			return $dt;
		}
		
		function Update()
		{			
			if(isset($this->primary_key) && $this->primary_key > 0){
				$sql = "Update Employee Set employee_id='$this->employee_id', " .
							"name='$this->name', " .
							"birthday='$this->birthday', " .
							"qualification='$this->qualification', " .
							"department='$this->department', " .
							"designation='$this->designation', " .
							"languages_known='$this->languages_known', " .
							"hobbies='$this->hobbies', " .
							"sports='$this->sports', " .
							"games='$this->games' ," .
							"skills='$this->skills', " .
							"goal_in_office='$this->goal_in_office' " .
						"Where primary_key=$this->primary_key";

			
					}
			else{
				$sql = "Insert Into Employee(primary_key,employee_id,name,birthday,qualification,department,designation, " .
						"languages_known, hobbies, sports,games,skills, " .
						"goal_in_office) Values ('$this->primary_key', '$this->employee_id', '$this->name','$this->birthday'," .
						"'$this->qualification', '$this->department', '$this->designation','$this->languages_known', " .
						"'$this->hobbies', '$this->sports','$this->games','$this->skills', '$this->goal_in_office')";

			}
			$db = new MySQL();
			$db->Execute($sql);
			unset($db);
		}
		function Delete($primary_key)
		{
			$db = new MySQL();
			$sql = "Delete From Employee Where primary_key=$primary_key";
			$dt = $db->Execute($sql);
			unset($db);
			return $dt;
		}
	}
?>

