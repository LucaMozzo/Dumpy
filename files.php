<?php
	require_once('mysqli_connection.php');
	ini_set('mysql.connect_timeout', 300);
    ini_set('default_socket_timeout', 300);
?>
<html>
<body>
<form method="post" enctype="multipart/form-data" >
    <br/>
    <input type="file" name="doc" />
    <br/><br/>
    <input type="submit" name="submit" value="Upload" />
</form>
<?php
if(isset($_POST["submit"]) && $_FILES["doc"]["error"] == 0 ){

    $doc_name = $_FILES["doc"]["name"];
    $dir = "uploads/";
    $name = explode('.', $doc_name);
    for($i = 0; $i < count($name)-1; $i++){
        $fullname .= $name[$i];
    }
    $completename = $dir.$fullname.date('YmdHis').'.'.end($name);
    if(move_uploaded_file($_FILES["doc"]["tmp_name"], $completename)){
        echo "<h2>File uploaded !!!</h2>";
        
        $extToLower = strtolower(end($name));
        if(($extToLower == 'jpg')||($extToLower == 'jpeg')||($extToLower == 'png')||($extToLower == 'gif')){
        	//echo '<img src="'.$completename.'" />';
            $query = "INSERT INTO pictures(id,picture) VALUES(null, ?)";
        }
        else {
        	//echo "<a href='$completename'>$fullname</a>";
            $query = "INSERT INTO files(id,name) VALUES(null, ?)";
        }
           $stmt = mysqli_prepare($dbc, $query);
            mysqli_stmt_bind_param($stmt, 's', $completename);
            mysqli_stmt_execute($stmt);
    }
    else{
        echo "<h2>Not uploaded</h2>";
    }
 $arr = scandir($dir);

    echo "<pre>";
        print_r($arr);
    echo '</pre>';
}
?>

</body>
</html>