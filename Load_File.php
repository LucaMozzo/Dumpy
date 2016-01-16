<?php
		
		require_once('mysqli_connection.php');
		
				 
			$query = "INSERT INTO `classrooms`(`id`,`class_code`,`class_name`) VALUES (NULL,?,?)";
				 
			$stmt = mysqli_prepare($dbc,$query);
				 
			mysqli_stmt_bind_param($stmt,"ss",$class_name,$class_code);
				 
			mysqli_stmt_execute($stmt);
				 


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
		
		
		
			
/* UPLOAD PART
@author Luca Mozzo
@date 14/11/2015
@version 1.0 */

		$comment_file = $_POST['comment_file'];
		$title_file = $_POST['title_file'];
		$file_type = "f";
		if(isset($_POST["submitfile"]) && $_FILES["doc"]["error"] == 0 ){

    $doc_name = $_FILES["doc"]["name"];
    $dir = "uploads/";
    $name = explode('.', $doc_name);
    for($i = 0; $i < count($name)-1; $i++){
        $fullname .= $name[$i];
    }
    $completename = $dir.$fullname.date('YmdHis').'.'.end($name);
    if(move_uploaded_file($_FILES["doc"]["tmp_name"], $completename)){
        echo "<h2>File uploaded !!!</h2>";


            $query = "INSERT INTO `files`(`id`,`name`,`comment`,`title`,`file_type`) VALUES(NULL ,?,?,?,?)";
            
           $stmt = mysqli_prepare($dbc, $query);
            mysqli_stmt_bind_param($stmt, 'ssss', $completename,$comment_file,$title_file,$file_type);
            mysqli_stmt_execute($stmt);


		}
        
    }
    
    $address = $_POST['address'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $file_type_links = "l";
    if(isset($_POST['submit'])){
    
      $query = "INSERT INTO `files`(`id`,`name`,`comment`,`title`,`file_type`) VALUES(NULL ,?,?,?,?)";
				 
		$stmt = mysqli_prepare($dbc,$query);
				 
		mysqli_stmt_bind_param($stmt, 'ssss', $address,$comment,$title,$file_type_links);				 
		mysqli_stmt_execute($stmt);
				 

    }
    
    	
			?>