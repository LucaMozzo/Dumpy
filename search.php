<!doctype html>
<html>
<head>
	<title>Sign up</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<style>
		.navbar-header img{
		
		
		margin-top: 7px;
		margin-right: 10px;
		margin-left: 10px;
		margin-bottom: 7px;
	}
	
		</style>
</head>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
                <img src="dumpy-logo.png"class="pull-left" height="35px" width="35px"> </a>

      <a class="navbar-brand" href="#">  Dumpy </a>
</nav>

<?php
	
    $wifi_query = $_POST['search'];
   if(!empty($wifi_query)) {
	   
	require_once('mysqli_connection.php');
	
	$query = "SELECT title,address,comment,likes FROM links WHERE title LIKE '%" . $wifi_query .  "%' OR address LIKE '%" . $wifi_query ."%' OR comment LIKE '%" . $wifi_query ."%' ORDER BY likes DESC"; 

$query1 = "SELECT name,comment,likes FROM files WHERE name LIKE '%" . $wifi_query . "%' OR comment LIKE '%" . $wifi_query ."%' ORDER BY likes DESC"; 
	
	$response1 = @mysqli_query($dbc, $query1);
	$response = @mysqli_query($dbc, $query);
	if($response1){

		echo('<div class = "container">');

				while($row1 = mysqli_fetch_array($response1)){
		
		
				echo '<li class = "list-group-item">';
//Display files
									
					echo '<span class="badge">';
					echo $row1['likes'];					
					echo '</span>';

				
//retrieve files

				echo '<h4 class="list-group-item-heading">';


					$ext = explode('.', $row1['name']);

					echo '<h8 class="text-danger"><small>'.'['.strtoupper($ext[1]).'] '.'</small></mark></h8>';

					$name_no_upload = substr($row1['name'],8);
					echo '<a href="http://www.dumpy.altervista.org/'. $row1['name'] . '">';
				
				echo $name_no_upload;
					  
				     echo '</a>';

					echo '</h4>';
				
				echo '<p class="text-muted">'.$row1['comment'].'</p>';
				
				//echo '<p class="list-group-item-text">';
			  //  echo '<a href="?like1=true&id1=' . $row1['id'] . '">Like</a> ';
				//	echo '<a href="?like1=false&id1=' . $row1['id'] . '">Not like</a> ';
			    
			    //echo '</p>';
				     
													
			    
			    echo '</li>';
			   	

			                   
                }
                	echo '</ul>';
                		echo('</div>');
                				
                	} else {
	 
	echo 'Could not issue database query';
	echo mysqli_error($dbc);
	}

	echo('<p></p>');
	
	if($response){
		//html table
	
	echo('<div class = "container">');
	 echo '<ul class = "list-group">';		
while($row = mysqli_fetch_array($response)){
		
					
//Display links
				echo '<li class = "list-group-item">';
				
									
					echo '<span class="badge">';
					echo $row['likes'];					
					echo '</span>';

				

				echo '<h4 class="list-group-item-heading">';
					echo '<a href="'. $row['address'] . '">';
				
				
					    echo  $row['title'];
				     echo '</a>';
				echo '</h4>';
				echo '<p class="text-muted">'.$row['comment'].'</p>';
				//echo '<p class="list-group-item-text">';

			    //echo '<a href="?like=true&id=' . $row['id'] . '">Like</a> ';
					//echo '<a href="?like=false&id=' . $row['id'] . '">Not like</a> ';
			   // echo '</p>';
				     

									
			    
			    echo '</li>';
			    
			   	

			                   
                }
                				echo '</ul>';
                				echo('</div>');
	}
	else {
	 
	echo 'Could not issue database query';
	echo mysqli_error($dbc);
	}
	mysqli_close($dbc);
    } else {
	    
	    echo("VOID RESEARCH");
	    
	    
    }
    		



?>