	<?php
 	
DEFINE ('DB_USER','dumpy');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','my_dumpy');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR die ('Could not connect to MysQL ' .
		mysqli_connect_error());


?>
	
