<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		Update.!
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


	<?php
	include_once("MySQL.php");
	include("header.php");
	include_once("EmployeeBO.php");

	$bo = new Employee();
	$primary_key = (int) $_GET["eid"];
	//$bo->SetEmployeeId($primary_key);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["btncancel"])) {
			header('Location: edit.php');
			exit();
		}

		$bo->primary_key = $primary_key;
		$bo->employee_id = $_POST["employee_id"];
		$bo->name = $_POST["name"];
		$bo->birthday =  $_POST["birthday"];
		$bo->qualification =  $_POST["qualification"];
		$bo->department = $_POST["department"];
		$bo->designation = $_POST["designation"];
		$bo->languages_known = $_POST["languages_known"];
		$bo->hobbies = $_POST["hobbies"];
		$bo->sports = $_POST["sports"];
		$bo->games = $_POST["games"];
		$bo->skills = $_POST["skills"];
		$bo->goal_in_office = $_POST["goal_in_office"];

		// Do all the validations here.
		$IsValid = true;

		if ($IsValid) {
			$bo->Update();

			// Redirect to list page after successful update.
			header('Location: edit.php');
			exit();
		}
	} else {
		// Initialize variables.
		$bo->SetEmployeeId($primary_key);
	}
	?>


	<div class="jumbotron text-center">
		<h1><b>U</b>pdate.!</h1>
		<!-- <h1><b>U</b>pdate.!</h1> -->
		<h2>Muthu is the Best FullStack Developer you have ever Know!</h2>
	</div>
	<div class="container">
		<h1 style="margin-bottom: 20px;"><?= $primary_key == 0 ? "Add New Employee" : "Edit Employee" ?></h1>
		<form class="form" action="edit0_U.php?eid=<?= $primary_key	?>" method="POST">

			<div class="row">
				<div class="form-group col-sm-4">
					<label for="employee_id">Employee ID:</label>
					<input type="text" name="employee_id" class="form-control" id="employee_id" required value="<?= $bo->employee_id ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="name">Employee Name:</label>
					<input type="text" name="name" class="form-control" id="name" required value="<?= $bo->name ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="birthday">Birth Day:</label>
					<input type="date" name="birthday" class="form-control" id="birthday" value="<?= $bo->birthday ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="qualification">Qualification:</label>
					<input type="text" name="qualification" class="form-control" id="qualification" value="<?= $bo->qualification ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="department">Department:</label>
					<input type="text" name="department" class="form-control" id="department" value="<?= $bo->department ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="designation">Designation:</label>
					<input type="text" name="designation" class="form-control" id="designation" required value="<?= $bo->designation ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="languages_known">Languages Known:</label>
					<input type="text" name="languages_known" class="form-control" id="languages_known" required value="<?= $bo->languages_known ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="hobbies">Hobbies:</label>
					<input type="text" name="hobbies" class="form-control" id="hobbies" required value="<?= $bo->hobbies ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="sports">Sports:</label>
					<input type="text" name="sports" class="form-control" id="sports" required value="<?= $bo->sports ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="games">Games:</label>
					<input type="text" name="games" class="form-control" id="games" required value="<?= $bo->games ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="skills">Skills:</label>
					<input type="text" name="skills" class="form-control" id="skills" required value="<?= $bo->skills ?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="goal_in_office">Goal In Office:</label>
					<input type="text" name="goal_in_office" class="form-control" id="goal_in_office" required value="<?= $bo->goal_in_office ?>">
				</div>
			</div>
			<button type="submit" name="btnsubmit" class="btn btn-primary">Save</button>
			<a href="edit.php">
				<button type="cancel" name="btncancel" class="btn btn-default" formnovalidate>Cancel</button> </a>
		</form>
	</div>

</body>