<?php
$conn = mysqli_connect("localhost", "root","", "banhngot");
mysqli_set_charset($conn,"utf8");
// Check connection
if($conn === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
?>