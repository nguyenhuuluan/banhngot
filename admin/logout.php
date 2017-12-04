<?php
if($_GET["tmp"]=="logout"){
	session_start();
	$_SESSION['username'] = null;
	$url="quanly.php";
	header("location: $url");
}

?>