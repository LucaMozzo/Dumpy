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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"/></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script>

		$(document).ready(function(){

			$('#added').hide();
			$('#file_show').hide();
			$('#link_show').hide();

			$('body').on("click",".click_like",function() {
				var i_d = $(this).attr("id");
				var data = {id:i_d};
				$.ajax({
					type: "POST",
					data:  data,
					url: "http://www.dumpy.altervista.org/add_Like.php",
					success: function(response) {

						$.post( url, function( data ) {

							$('#txtHint').html(data);

						});

					}
				});
			});
			$('body').on("click",".click_notlike",function() {
				var i_d = $(this).attr("id");
				var data = {id:i_d};
				$.ajax({
					type: "POST",
					data:  data,
					url: "http://www.dumpy.altervista.org/add_Not_Like.php",
					success: function(response) {

						$.post( url, function( data ) {

							$('#txtHint').html(data);

						});

					}
				});
			});

			var url = "http://www.dumpy.altervista.org/show.php";

			$('#showFile').click(function(){
				$('#file_show').toggle();
			});
			$('#showLink').click(function(){
				$('#link_show').toggle();
			});
			$.post( url, function( data ) {

				$('#txtHint').html(data);

			});
			$('#btn').click(function(){
				var query = $('#se').val();
				var query_data = {q:query};
				$.ajax({
					type: 'POST',
					url: "http://dumpy.altervista.org/search.php",
					data: query_data,
					success: function(response) {

						$('#txtHint').html(response);
					}
				});

			});
			$('#submit').click(function(){
				var link = $('#address').val();
				var comment = $('#comment').val();
				var name = $('#title').val();
				var links = {l:link,c:comment,n:name};
				$.ajax({
					type: 'POST',
					url: "http://dumpy.altervista.org/add_Link.php",
					data: links,
					success: function(response) {
						$('#added').show();
						$('#link_show').hide();

						setTimeout(function() {
							$('#added').hide();

						}, 3000);

						$('#added').html(response);

						$.post( url, function( data ) {

							$('#txtHint').html(data);

						});
					}
				});

			});

			$('body').on("click","#submitfile",function() {
				var file_data = $('#doc').prop('files')[0];
				var form_data = new FormData();
				console.log(file_data);
				form_data.append('file', file_data);
				$.ajax({
					url: 'add_File.php', // point to server-side PHP script
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(php_script_response){
						alert(php_script_response); // display response from the PHP script, if any
					}
				});
			});

		});

	</script>

</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<img src="dumpy-logo.png"class="pull-left img-rounded" height="30px" width="30px"> </a>
		</div>

		<!-- Search form -->
		<form class="navbar-form navbar-right">
			<div class="input-group">
				<input type="text"  class="form-control" id = "se" placeholder="Search" autocomplete="off"></input>
				<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="Search" id = "btn"></input>
				</span>
			</div>
		</form>
		<!-- Navbar button to upload and submit files-->
		<div id="postLink">
			<button class='btn navbar-btn' ng-click="showLink = !showLink" id = "showLink">Submit a link</button>
			<button class='btn navbar-btn' ng-click="showImage = !showImage" id = "showFile">Upload a File</button>
		</div>
	</div>
</nav>
<div class = "col-sm-8 center col-md-8 col-md-offset-2">
	<div class="alert alert-success" id="added">

	</div>
</div>
<!--Form to add a new link-->
<div class = "col-sm-8 center col-md-8 col-md-offset-2">
	<div class="panel panel-default" id ="link_show" >
		<div class="panel-heading">Add a new link</div>
		<div class="panel-body">

			<div class="form-group">
				<input type="text"  class="form-control" id = "address" placeholder="Enter a link"></input>
			</div>
			<div class="form-group">
				<input type="text" id = "title" class="form-control" placeholder="Enter a link name"></input>
			</div>
			<div class="form-group">
				<input type="text"  class="form-control" id = "comment" placeholder="Enter a comment"></input>
			</div>
			<input type="submit" class="btn btn-success" id = "submit" value="Upload"></input>

		</div>
	</div>
</div>
</div>

<!--Form to add a new file-->
<div class = "col-sm-8 center col-md-8 col-md-offset-2">
	<div class="panel panel-default" id = "file_show" >
		<div class="panel-heading">Add a new file</div>
		<div class="panel-body">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" id = "doc" </input>
				</div>
				<div class="form-group">
					<input type="text"  class="form-control" id = "title_file" placeholder="Enter a file name"></input>
				</div>

				<div class="form-group">
					<input type="text"  class="form-control" id = "comment_file" placeholder="Enter a comment"></input>
				</div>

				<input type="submit" class="btn btn-success"  id = "submitfile" value="Submit"></input>
			</form>
		</div>
	</div>
</div>


<!-- Main File -->

<div class="col-sm-8 center col-md-8 col-md-offset-2">

	<div id = "txtHint">

	</div>


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
</body>
</html>