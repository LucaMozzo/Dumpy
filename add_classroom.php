<?php

	header('Access-Control-Allow-Origin: *');
	require_once('mysqli_connection.php');
	$classname = $_POST['name'];
    $classcode = $_POST['lcode'];

      $query = "SELECT * FROM `classrooms` WHERE `classcode` LIKE" .$classcode;

?>