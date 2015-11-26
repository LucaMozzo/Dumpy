<!doctype html>
<html>
<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="text-center">
        <div class="jumbotron vertical-center">
            <form method="post" action="signup.php">
                <h1>Sign up</h1>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addo-at">@</span>
                    <input type="text" class="form-control" placeholder="Username" />
                </div>
                    <input type="text" name="email" class="form-control" placeholder="Email" />
                    <input type="password" name = "password" class="form-control" placeholder="Password" />
                <br/>
                <input class="btn btn-success" type="submit" name = "submit" value="Sign up"></input>
            </form>
        </div>
    </div>
</div>
    <? if(isset($_POST['submit'])) { 
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];
		require_once('mysqli_connection.php');
		$query = 'INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL ,?,?)';
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, 'ss', $user_email,$user_password);
		mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){

            echo "ENTERED";

        } else
        {
            echo "ERROR";
        }
		
	}
	
	
	
	?>
</body>
</html>
