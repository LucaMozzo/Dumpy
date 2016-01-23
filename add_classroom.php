<?php

header('Access-Control-Allow-Origin: *');
require_once('mysqli_connection.php');
$classname = $_POST['name'];
$classcode = $_POST['code'];
$query = 'SELECT * FROM `classrooms` WHERE `class_code` LIKE "'.$classcode.'"';

$response = @mysqli_query($dbc, $query);

if(mysqli_num_rows($response) == 0){

    $query = "INSERT INTO `classrooms`(`id`,`class_code`,`class_name`) VALUES(NULL ,?,?)";

    $stmt = mysqli_prepare($dbc, $query);

    mysqli_stmt_bind_param($stmt, 'ss', $classcode, $classname);

    if(@mysqli_stmt_execute($stmt)){

        echo 1;

    } else {

        echo ("Not Added yet");

    }

} else {

    echo 0;
}



?>