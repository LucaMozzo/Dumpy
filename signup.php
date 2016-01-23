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
    <style>
        .jumbotron {
            padding: 5px;
        }
    </style>
    <script src="lib/jquery-1.12.0.min.js"></script>
    <script>
        jQuery(document).ready(function(){
            $("#login-form").hide();

            $('#change-to-login').click(function(){
                console.log("a");
                $("#login-form").show();
                $("#signup-form").hide();
            });
            $('#change-to-signup').click(function(){
                $("#signup-form").show();
                $("#login-form").hide();
            });
        });
    </script>
</head>

<body>
<div class="container">
    <div class="text-center">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 center col-md-8 col-md-offset-2">
            <div class="alert alert-success" style="margin-top: 30px">
                <strong>Success!</strong> Check your email for confirmation
            </div>
            <div class="jumbotron vertical-center">
                <form method="post" action="signup.php" id="signup-form">

                    <h1>Sign up</h1>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addo-at">@</span>
                            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="password" name = "password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="uni" class="form-control" placeholder="School/University" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name = "submit" value="Sign up"></input>
                    </div>
                    <a id="change-to-login" href="#">Do you already have an account? Log in instead!</a>
                </form>

                <form method="post" action="login.php" id="login-form">

                    <h1>Log in</h1>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username or email" name="username" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name = "password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Log in"></input>
                    </div>
                    <a id="change-to-signup" href="#">New to Dumpy? Sign up!</a>
                </form>
            </div>
        </div>
    </div>
</div>
<? if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_university = $_POST['uni'];
    require_once('mysqli_connection.php');
    if(empty($username) == false && empty($user_email) == false && empty($user_password) == false && empty($user_university) == false) {
        $query = 'INSERT INTO `users` (`id`, `email`, `password`, `university`, `username`) VALUES (NULL ,?,?,?,?)';
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $user_email, $user_password, $user_university, $username);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows == 1) {

            echo "ENTERED";

        } else {
            echo "ERROR";
        }
    }
}
?>
</body>
</html>
