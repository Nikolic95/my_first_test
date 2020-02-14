<?php 
	session_start();
	header('location:../login.php');
	
	$conn = mysqli_connect('localhost', 'root', '', 'webapp');
	mysqli_select_db($conn, 'webapp');
	
	$name = $_POST['username'];
	$pass = $_POST['password'];
	
	$sel = "select * from users where username = '$name'";
	
	$result = mysqli_query($conn, $sel);
	
	$num = mysqli_num_rows($result);
	
	if($num == 1)
	{
		echo "The name is busy!";
	}
	else
	{
		$reg = " INSERT INTO users (username , password) VALUES ('$name' , '$pass')";
		mysqli_query($conn, $reg);
		echo "Successful";
	}
?>