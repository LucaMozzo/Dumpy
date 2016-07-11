<?php
header('Access-Control-Allow-Origin: *');
require_once('mysqli_connection.php');

$name = $_POST['l'];
$title = $_POST['n'];
$comment = $_POST['c'];
$file_type_links = "l";

//add the http:// before a link otherwise it doesn't work
if(strrpos($name, "http://") == null)
	$name = "http://".$name;

$query = "INSERT INTO `files`(`id`,`name`,`comment`,`title`,`file_type`) VALUES(NULL ,?,?,?,?)";

$stmt = mysqli_prepare($dbc,$query);

mysqli_stmt_bind_param($stmt, 'ssss', $name,$comment,$title,$file_type_links);

if(@mysqli_stmt_execute($stmt)){

	echo("Link added");

}
?>