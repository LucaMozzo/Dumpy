<?php
header('Access-Control-Allow-Origin: *');

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
			echo '<h8 class="text-danger"><small>'.'['.strtoupper($ext[1]).'] '.'</small></h8>';
		}
		$name_no_upload = substr($row['name'],8);

		echo '<a href="'. $row['name'] . '">'.$row['title'].'</a>';

		echo '</h4>';

		echo '<p class="text-muted">'.$row['comment'].'</p>';

		echo '<p class="list-group-item-text">';
		echo '<a class = "click_like" href="#" id = "'.$row['id'].'">Like <i class="fa fa-thumbs-o-up"></i></a> ';
		echo '<a class = "click_notlike" href="#" id = "'.$row['id'].'">Dislike <i class="fa fa-thumbs-o-down"></i></a> ';

		echo '</p>';

		echo '</li>';

	}
	echo '</ul>';

} else {

	echo 'Could not issue database query';
	echo mysqli_error($dbc);
}
?>
			
