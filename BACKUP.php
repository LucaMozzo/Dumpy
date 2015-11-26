<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dumpy</title>

    <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
          <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
  </head>
  <body>
 



	<?php
	require_once 'mysqli_connection.php';
	//Query to display links from the database
	//Database table links / fields: id,title,address,comment
		$class_code = $_GET['q'];
$query = "SELECT * FROM `links` WHERE `comment` LIKE '%" . $class_code ."%' OR `address` LIKE '%" . $class_code ."%' OR `title` LIKE '%" . $class_code ."%' ORDER BY likes";
	
	$response = @mysqli_query($dbc, $query);
	if($response){
		

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
				echo '<p class="list-group-item-text">';

			    echo '<a href="?like=true&id=' . $row['id'] . '">Like</a> ';
					echo '<a href="?like=false&id=' . $row['id'] . '">Not like</a> ';
			    echo '</p>';
				     

									
			    
			    echo '</li>';
			   	

			                   
                }
                				echo '</ul>';
	
	} else {
	 
	echo 'Could not issue database query';
	echo mysqli_error($dbc);
	}

	//GET request for likes, identifies links with a system of id passed in the URL
		
	if (isset($_GET['like'])) {

		if($_GET['like'] == 'true' ){

				$query = "UPDATE links 
				SET likes = likes + 1 
				WHERE id = " . $_GET['id'];
	
				}
				else 
				{
					
				$query = "UPDATE links 
				SET likes = likes - 1 
				WHERE id = " . $_GET['id'];
	
					
				}
				
				
			     @mysqli_query($dbc, $query);
				
}			
	
	
		
	?>
	
	</div>
</div>
</div>
	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


  </body>
</html>