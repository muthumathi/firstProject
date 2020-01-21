<?php
			
	include_once("EmployeeBO.php");

	$bo = new Employee();			
	$primary_key = (int) $_GET["eid"];	
	
	$bo->Delete($primary_key);
	
	unset($bo);
	
	header('Location: delete.php');
	exit();
?>