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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"/></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script>
	
	$(document).ready(function(){

		var url = "http://www.dumpy.altervista.org/show.php";
	
	$.post( url, function( data ) {

			$('#txtHint').html(data);
		
  			});
		});
	
	</script>

	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">  Dumpy <img src="dumpy-logo.png"class="pull-left img-rounded" height="30px" width="30px"> </a>
			</div>
			
			
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
  
  
  <!-- Main File -->
  
	<div class="col-sm-8 center col-md-8 col-md-offset-2">

		<div id = "txtHint">
	
	</div>
	

	</div>	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

  </body>
</html>
