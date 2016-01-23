<?php
header('Access-Control-Allow-Origin: *');

require_once('mysqli_connection.php');

$title = $_POST['l'];
$comment = $_POST['c'];
echo ($title);
echo ($comment);
$query = "INSERT INTO `files`(`id`,`name`,`comment`,`title`,`file_type`) VALUES(NULL ,?,?,?,?)";

$stmt = mysqli_prepare($dbc,$query);

mysqli_stmt_bind_param($stmt, 'ssss', $name,$comment,$title,$file_type_links);

if(@mysqli_stmt_execute($stmt)){

    echo("Link added");

} else {

    echo("Failed");

}
?>