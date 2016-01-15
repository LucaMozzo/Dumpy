<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
	
	
</style>
    <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  </head>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
	  <div class="navbar-header">
		  <img src="dumpy-logo.png"class="pull-left" height="35px" width="35px"> </a>
		  <a class="navbar-brand" href="#">  Dumpy </a>
	  </div>
  </nav>

  <body class="pietro">
	  <div class="container">
	 <div class="text-center">
	<div class="jumbotron vertical-center">
  <h1>Hey, learner!</h1>
  <p>Benefit of lots of resources, join an existing group or create your own.</p>
  <input class="btn btn-primary" type="button" onclick="newClass()" value="Create a new Classroom"></input>
 
    <input class="btn btn-default" type="button"  value="Join a classroom"></input>
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
