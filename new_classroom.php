<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<title>Dumpy - New classroom</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<style>
		.vertical-center {
			margin-top: 9%;
		}
	</style>
	<script src="lib/jquery-1.12.0.min.js"></script>
	<script src="script/new_classroom.js"> </script>
</head>
<body>
<div class="container vertical-center text-center">
	<h1>Let's create a new Classroom!</h1>
	<form method="post" action="new_classroom.php">
		<div class="col-sm-8 center col-md-8 col-md-offset-2">
			<div class="form-group">
				<input type="text" id="classname"  class="form-control" name ="class_name" placeholder="Give a name to the classroom" onchange="generateClassCode()"/>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">https://dumpy.altervista.org/classroom/</span>
					<input id="classcode" type="text" name="class_code" class="form-control" placeholder="Create unique code for your class" readonly/>
					<span class="input-group-btn">
						<input type="submit" class="btn btn-default" value="Edit" id ="edit-id-btn" name="editbtn" onclick="editBtn()"/>
					</span>
				</div>
			</div>
			<div class="form-group">
				<div class="text-center">
					<input type="submit" class="btn btn-success" name="submit" value="Create classroom"/>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
require_once('mysqli_connection.php');
if(isset($_POST['submit'])) {
	$classname = $_POST['class_name'];
	$classcode = $_POST['class_code'];
	if (empty($classname) == false && empty($classcode) == false) {
		$query = 'INSERT INTO `classrooms` (`id`, `class_code`, `class_name`) VALUES (NULL, ?, ?)';
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, 'ss', $classcode, $classname);
		@mysqli_stmt_execute($stmt);
	}
}
?>
</body>
</html>
