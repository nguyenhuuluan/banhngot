<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?php
$conn = mysqli_connect("localhost", "root","", "demo");
	mysqli_set_charset($conn,"utf8");
// Check connection
 if($conn === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
?>