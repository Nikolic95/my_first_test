<?php
	session_start();
	
	$conn = mysqli_connect('localhost', 'root', '', 'webapp');
	mysqli_select_db($conn, 'webapp');
	
	$name = $_POST['username'];
	$pass = $_POST['password'];
	
	$sel = "SELECT * FROM users WHERE username = '$name' && password = '$pass'";
	
	$result = mysqli_query($conn, $sel);
	$num = mysqli_num_rows($result);
	
	if($num == 1)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id_user'] = $row['id_user'];
		header('location:../index.php');
		die;
	}
	else
	{
		header('location:../login.php');
	}
?>