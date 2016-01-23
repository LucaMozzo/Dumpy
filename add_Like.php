<?php
	header('Access-Control-Allow-Origin: *');

	require_once('mysqli_connection.php');
		
		$id = $_POST['id'];
		
		$query = "UPDATE files SET likes = likes + 1 WHERE id = " . $id;
	
		mysqli_query($dbc, $query);
	
?>