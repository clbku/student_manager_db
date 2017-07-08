<?php
	include_once('student-func.php');
	$data = array();
	$errors = array();
	$id = (int)$_GET['id'];
	$data = getStudent($id);
	if (!empty($_POST['submit'])){
		$data['sv_name']        = isset($_POST['student-name']) ? $_POST['student-name'] : '';
   		$data['sv_sex']         = isset($_POST['student-sex']) ? $_POST['student-sex'] : '';
   		$data['sv_birthday']    = isset($_POST['student-birthday']) ? $_POST['student-birthday'] : '';
		$data['sv_id']          = isset($_POST['student-id']) ? $_POST['student-id'] : '';
		if (empty($_POST['student-id'])){
			$errors['sv_id'] = 'INVALID!';
		}
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
			editStudent($data['sv_id'], $data['sv_name'], $data['sv_sex'], $data['sv_birthday']);
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
			<td>ID</td>
			<td>
				<input type="text" name="student-id" value=<? echo $data['sv_id'] ;?> >
				<? echo (!empty($errors['sv_id'])) ? $errors['sv_id'] : '' ;?>
			</td>
		</tr>
		<tr>
			<td>NAME</td>
			<td>
				<input type="text" name="student-name" value="<? echo $data['sv_name'];?>" >
				<? echo (!empty($errors['sv_name'])) ? $errors['sv_name'] : '';?>
			</td>
		</tr>
		<tr>
			<td>SEX</td>
			<td>
				<input type="text" name="student-sex" value=<? echo $data['sv_sex'] ;?> >
				<? echo (!empty($errors['sv_sex'])) ? $errors['sv_sex'] : '';?>
			</td>
		</tr>
		<tr>
			<td>BIRTHDAY</td>
			<td>
				<input type="text" name="student-birthday" value= <? echo $data['sv_birthday'] ;?> >
				<? echo (!empty($errors['sv_birthday'])) ? $errors['sv_birthday']:'';?>
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