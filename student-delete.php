<?php
	include_once('student-func.php');
	$id = $_POST['id'];
	deleteStudent($id);
	header("Location: student-list.php");
?>