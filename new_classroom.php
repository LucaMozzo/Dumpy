<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<title>Dumpy - New classroom</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<style>
		.vertical-center {
			margin-top: 9%;
		}
	</style>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<body>
<div class="container vertical-center text-center">
	<h1>Let's create a new Classroom!</h1>
	<form method="post" action="index.php">
		<div class="form-group">
			<input type="text"  class="form-control" name = "class_name" placeholder="Give a name to the classroom"/>
		</div>
		<div class="input-group">
			<span class="input-group-addon">https://dumpy.altervista.org/classroom/</span>
			<input type="text" name = "class_code" class="form-control" placeholder="Create a unique code for your class"/>
				<span class="input-group-btn">
		  			<input type="submit" class="btn btn-default" value="Edit" id ="edit-id-btn"/>
			    </span>
		</div>
		<div class="form-group text-center">
			<input type="submit" class="btn btn-success" name = "submit" value="Create classroom"/>
		</div>
	</form>
</div>
</body>
</html>
