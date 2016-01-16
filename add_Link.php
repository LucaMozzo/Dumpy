<?php
	
	require_once('mysqli_connection.php');

	$name = $_POST['n'];
    $title = $_POST['l'];
    $comment = $_POST['c'];
    $file_type_links = "l";

    
      $query = "INSERT INTO `files`(`id`,`name`,`comment`,`title`,`file_type`) VALUES(NULL ,?,?,?,?)";
				 
		$stmt = mysqli_prepare($dbc,$query);
				 
		mysqli_stmt_bind_param($stmt, 'ssss', $address,$comment,$title,$file_type_links);	
					 
		if(@mysqli_stmt_execute($stmt)){
			
			echo("Link added");
			
		}
?>