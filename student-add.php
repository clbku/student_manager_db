<?php
	include_once("student-func.php");
	$data = array();
	$errors = array();
	if (!empty($_POST['submit'])) {
		$data['sv_name']        = isset($_POST['student-name']) ? $_POST['student-name'] : '';
   		$data['sv_sex']         = isset($_POST['student-sex']) ? $_POST['student-sex'] : '';
   		$data['sv_birthday']    = isset($_POST['student-birthday']) ? $_POST['student-birthday'] : '';
		if (empty($_POST['student-name'])){
			$errors['sv_name'] = 'INVALID!';
		}
		if (empty($_POST['student-sex'])){
			$errors['sv_sex'] = 'INVALID!';
		}
		if (empty($_POST['student-birthday'])){
			$errors['sv_birthday'] = 'INVALID!';
		}
		if (!$errors){
			addStudent($data['sv_name'], $data['sv_sex'], $data['sv_birthday']);
			header('Location: student-list.php');
		}
		disconnect_db();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><? echo (!$is_update_acction) ? 'ADD STUDENT' : 'UPDATE STUDENT' ?></title>
</head>
<body>
	<h1>STUDENT INFOMATION</h1>
	<form method = 'POST'>
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="student-name" >
				<? echo (!empty($errors['sv_name'])) ? $errors['sv_name'] : '' ;?>
			</td>
		</tr>
		<tr>
			<td>Sex</td>
			<td>
				<input type="text" name="student-sex"  >
				<? echo (!empty($errors['sv_sex'])) ? $errors['sv_sex'] : '';?>
			</td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td>
				<input type="text" name="student-birthday" >
				<? echo (!empty($errors['sv_birthday'])) ? $errors['sv_birthday'] : '';?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value = "SAVE">
			</td>
		</tr>
	</table>
	</form>
</body>
</html>