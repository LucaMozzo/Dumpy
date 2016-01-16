	<?php 
		require_once('mysqli_connection.php');
		
	//Query to display files from the database
	//Database table files / fields: id,name,likes,comment

		$query = "SELECT * FROM files ORDER BY likes DESC";
	
		$response = @mysqli_query($dbc, $query);
		if($response){
		
			    echo '<ul class = "list-group">';

				while($row = mysqli_fetch_array($response)){
				
				echo '<li class = "list-group-item">';
//Display files
					echo '<span class="badge">';
					echo $row['likes'];
					echo '</span>';
//retrieve files

				echo '<h4 class="list-group-item-heading">';

					$ext = explode('.', $row['name']);
					if(strcmp($row['file_type'],"l")){
					echo '<h8 class="text-danger"><small>'.'['.strtoupper($ext[1]).'] '.'</small></	mark></h8>';
					}
					$name_no_upload = substr($row['name'],8);
					if(strcmp($row['file_type'],"l")){
					echo '<a href="http://www.dumpy.altervista.org/'. $row['name'] . '">'.$row['title'].'</a>';
					} else {
						
					echo '<a href="'. $row['name'] . '">'.$row['title'].'</a>';	
						
					}
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

/*
	//GET request for likes, identifies links with a system of id passed in the URL

	if (isset($_GET['like'])) {

		if($_GET['like'] == 'true' ){

				$query = "UPDATE files 
				SET likes = likes + 1 
				WHERE id = " . $_GET['id'];
	
				}
				else 
				{
					
				$query = "UPDATE files 
				SET likes = likes - 1 
				WHERE id = " . $_GET['id'];
	
					
				}
				
				
			     @mysqli_query($dbc, $query);
				
		}
*/
		
		?>
		
			
