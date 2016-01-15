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
			background-image: url('http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_527bf56961712_1.JPG');
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
			top: 10px;
			left: 0;
			position: fixed;
			right: 0;
			z-index: 2;
			padding: 0 10px;
		}
	</style>
</head>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<img src="dumpy-logo.png"class="pull-left" height="35px" width="35px"> </a>
			<a class="navbar-brand" href="#">  Dumpy </a>
		</div>
	</div>
</nav>

<body class="pietro">
<div class="background-image"></div>
<div class="container">
	<div class="text-center">
		<div class="jumbotron vertical-center">
			<h1>Hey, learner!</h1>
			<p>Benefit of lots of resources, join an existing group or create your own.</p>
			<input class="btn btn-primary" type="button" onclick="newClass()" value="Create a new Classroom" />
			<input class="btn btn-default" type="button"  value="Join a classroom" />
		</div>
	</div>
</div>
<script>
	function newClass(){
		window.open("http://www.dumpy.altervista.org/new_classroom.php");
	}
</script>
</body>
</html>
