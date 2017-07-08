<?php
	global $conn;
	// ham ket noi database
	function connect_db(){
		global $conn;
		if (!$conn){
			$conn = mysqli_connect('localhost', 'root', '', 'qlsv_db') or die('Can\'t connect to database');
			mysqli_set_charset($conn,'UTF8');
		}
	}
	// ham ngat ket noi database
	function disconnect_db(){
		global $conn; 
		if ($conn){
			mysqli_close($conn);
		}
	}
	// ham lay toan bo sinh vien
	function getAllStudent(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM tb_sinhvien';
		$query = mysqli_query($conn, $sql);
		$result = array();
		if ($query){
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	// ham lay sinh vien theo id
	function getStudent($id){
		global $conn;
		connect_db();
		$sql = "SELECT * FROM tb_sinhvien WHERE sv_id = {$id}";
		$query = mysqli_query($conn, $sql);

		$result = array();
		if (!$query||mysqli_num_rows($query)>0){
			$row = mysqli_fetch_assoc($query);
			$result = $row;
		}	
		return $result;
	}
	// ham them sinh vien
	function addStudent($name, $sex, $birthday){
		global $conn;
		connect_db();
		// chong hu database
		$name = addslashes($name);
    		$student_sex = addslashes($sex);
    		$birthday = addslashes($birthday);
    		$sql = "INSERT INTO tb_sinhvien(sv_name, sv_sex, sv_birthday) VALUES ('$name', '$sex','$birthday')";
    		$query = mysqli_query($conn, $sql);
    		return $query;
	}
	// ham sua
	function editStudent($student_id, $student_name, $student_sex, $student_birthday){
	    	// Gọi tới biến toàn cục $conn
	    	global $conn;
	     
	    	// Hàm kết nối
	    	connect_db();
	     
	    	// Chống SQL Injection
	    	$student_name       = addslashes($student_name);
	    	$student_sex        = addslashes($student_sex);
	    	$student_birthday   = addslashes($student_birthday);
	     
	    	// Câu truy sửa
	    	$sql = "
	            	UPDATE tb_sinhvien SET
	            	sv_name = '$student_name',
	            	sv_sex = '$student_sex',
	            	sv_birthday = '$student_birthday'
	            	WHERE sv_id = $student_id
	    	";
	     
	    	// Thực hiện câu truy vấn
	    	$query = mysqli_query($conn, $sql);
	     
	    	return $query;

	}
	// Hàm xóa sinh viên
	function deleteStudent($student_id)
	{
		// Gọi tới biến toàn cục $conn
		global $conn;
		   
		// Hàm kết nối
		connect_db();
		     
		// Câu truy sửa
		$sql = "
			DELETE FROM tb_sinhvien
		           WHERE sv_id = $student_id
		";
		     
		// Thực hiện câu truy vấn
		$query = mysqli_query($conn, $sql);
		     
		return $query;
	}

?>


























