<!DOCTYPE html>
<html lang="en" ng-app>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"/>
    <script>
        function showSearch() {
            var query = document.getElementById("se").value;

            if (query == "") {
                alert("Insert a valid research query");
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET","BACKUP.php?q="+query,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">  Dumpy <img src="dumpy-logo.png"class="pull-left img-rounded" height="30px" width="30px"> </a>
        </div>

        <!--testttttttttttttttttttttttttttttttttttttttt-->
        <form class="navbar-form navbar-left">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Upload
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">File</a></li>
                    <li><a href="#">Image</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </form>
        <!--testttttttttttttttttttttttttttttttttttttttt-->


        <form class="navbar-form navbar-right">
            <div class="input-group">
                <input type="text"  class="form-control" id = "se" onchange="showSearch()" placeholder="Search"></input>
				   <span class="input-group-btn">
					   <input type="submit" class="btn btn-primary" value="Search" id = "btn"></input>
				   </span>
            </div>
        </form>


    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="uploadBox" >
                <div id="postLink">
                    <button class='btn' ng-click="showLink = !showLink">Submit a link</button>
                    <button class='btn' ng-click="showImage = !showImage">Upload a File</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Form to add a new link-->
<div class="panel panel-default" ng-if="showLink">
    <div class="panel-heading">Add a new link</div>
    <div class="panel-body">
        <form method="post" action="index.php" >
            <div class="form-group">
                <input type="text"  class="form-control" name = "title" placeholder="Enter a link name"></input>
            </div>
            <div class="form-group">
                <input type="text" name = "address" class="form-control" placeholder="Enter a link"></input>
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" name = "comment" placeholder="Enter a comment"></input>
            </div>
            <input type="submit" class="btn btn-success" name = "submit" value="Upload"></input>
        </form>
    </div>
</div>
</div>

<div class="panel panel-default" ng-if="showImage">
    <div class="panel-heading">Add a new file</div>
    <div class="panel-body">
        <form method="post" action="index.php"enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name = "doc" </input>
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" name = "title_file" placeholder="Enter a file name"></input>
            </div>

            <div class="form-group">
                <input type="text"  class="form-control" name = "comment_file" placeholder="Enter a comment"></input>
            </div>

            <input type="submit" class="btn btn-success" name = "submitfile" value="Submit"></input>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
<div id = "txtHint"></div>

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



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

</body>
</html>
