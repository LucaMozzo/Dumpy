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
						<input type="submit" class="btn btn-default" value="Edit" id ="edit-id-btn"/>
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

<script>

	$(document).ready(function(){
		$('#error').hide();

		$('#submit').click(function(){
			var classname = $('#classname').val();
			var classcode = $('#classcode').val();
			var data = {name:classname,code:classcode};
			$.ajax({
				type: "POST",
				data:  data,
				url: "http://www.dumpy.altervista.org/add_classroom.php",
				success: function(response) {
					console.log(response);
					if(response == 0 ){

						$('#error').show();
						$('#error').html("The name already exists, please change it!");

					} else {

						window.open("signup.php");

					}
				}
			});

		});

	});
</script>
</body>
</html>
