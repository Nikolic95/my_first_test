<?php
	$conn = mysqli_connect('localhost', 'root', '', 'webapp');
	mysqli_select_db($conn, 'webapp');

	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?>