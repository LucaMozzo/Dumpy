<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<!-- Bootstrap -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Dumpy</title>
	<style>
		.vertical-center{
			margin-top: 9%;
		}

		.navbar-header img{
			margin-top: 7px;
			margin-right: 10px;
			margin-left: 10px;
			margin-bottom: 7px;
		}

		.background-image {
			background-image: url('http://learnimplementshare.com/wp-content/uploads/2015/04/About-Learn-Implement-Share-2.jpg');
			background-size: cover;
			display: block;
			filter: blur(5px);
			-webkit-filter: blur(5px);
			height: 800px;
			left: 0;
			position: fixed;
			right: 0;
			z-index: 1;
		}

		.container {
			top: 35px;
			left: 0;
			position: fixed;
			right: 0;
			z-index: 2;
			padding: 0 10px;
		}

		.navbar {
			left: 0;
			position: fixed;
			right: 0;
			z-index: 2;
			padding: 0 10px;
		}

		.jumbotron {
			background: rgb(255, 254, 238); /* This is for ie8 and below */
			background: rgba(255, 254, 238, 0.7);
		}
	</style>
</head>
<div class="background-image"></div> <!-- TODO:copy remote image in local server -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<img src="dumpy-logo.png"class="pull-left" height="35px" width="35px"> </a>
			<a class="navbar-brand" href="#">  Dumpy </a>
		</div>
	</div>
</nav>

<body>

<div class="container">
	<div class="text-center">
		<div class="jumbotron vertical-center">
			<h1>Hey, learner!</h1>
			<p>Benefit of lots of resources, join an existing group or create your own.</p>
			<form class="form-group">
				<input class="btn btn-primary" type="button" onclick="openNewClass()" value="Create a new Classroom" />
			</form>
			<form class="form-group">
				<input class="btn btn-default" type="button"  onclick="openJoinClass()" value="Join a classroom" />
			</form>
		</div>
	</div>
</div>
<script>
	function openNewClass(){
		window.open("http://www.dumpy.altervista.org/new_classroom.php", "_self");// _self opens the page in the same tab
	}

	function openJoinClass(){
		window.open("/join_classroom.php", "_self");
	}
</script>
</body>
</html>
