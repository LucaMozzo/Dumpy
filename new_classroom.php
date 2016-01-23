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
	<script>
		var editMode = false;
		$(document).ready(function(){
			//edit button action
			$('#edit-id-btn').click(function(){
				if(editMode == false) {
					$("#classcode").prop("readonly", false);
					$("#edit-id-btn").prop("value", "Done");
					$("#edit-id-btn").prop("class", "btn btn-primary");
					document.getElementById("classcode").focus();
					editMode = true;
				}
				else {
					$("#classcode").prop("readonly", true);
					$("#edit-id-btn").prop("value", "Edit");
					$("#edit-id-btn").prop("class", "btn btn-default");
					editMode=false;
				}
			});
		});
	</script>
</head>
<body>
<div class="container vertical-center text-center">

<h1>Let's create a new Classroom!</h1>
<div class="col-sm-8 center col-md-8 col-md-offset-2">
	<div class="alert alert-danger" id="error">
	</div>
	<div class="form-group">
		<input type="text" id="classname" autocomplete="off" class="form-control" name ="class_name" placeholder="Give a name to the classroom" onchange="generateClassCode()"/>
	</div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">https://dumpy.altervista.org/classroom/</span>
			<input id="classcode" type="text" name="class_code" autocomplete="off" class="form-control" placeholder="Create unique code for your class" readonly/>
			<span class="input-group-btn">
				<input type="button" class="btn btn-default" value="Edit" id ="edit-id-btn" name="editbtn"/>
			</span>
		</div>
	</div>
	<div class="form-group">
		<div class="text-center">
			<input type="submit" class="btn btn-success" id="submit" value="Create classroom"/>
		</div>
	</div>
</div>
</div>

<script>

	$(document).ready(function(){
		$('#error').hide();

		$('#submit').click(function(){
			var classname = $('classname').val();
			var classcode = $('classcode').val();
			console.log(classcode);
			console.log(classname);
			var data = {name:classname,code:classcode};
			$.ajax({
				type: "POST",
				data:  data,
				url: "http://www.dumpy.altervista.org/add_classroom.php",
				success: function(response) {
					if (response === "true"){
						window.open("signup.php");
					} else {

						console.log("Classe fail");
					}
				}
			});

		});

	});
</script>
</body>
</html>
