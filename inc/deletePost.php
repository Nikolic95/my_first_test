<?php 
	if(isset($_GET['id_post']))
	{
		var_dump('hi');
		$id = $_GET['id_post'];
		require 'db.php';
		$query = "DELETE FROM posts WHERE id_post = {$id}";
		mysqli_query($conn, $query);
		header("Location: delete.php");
	}
?>
