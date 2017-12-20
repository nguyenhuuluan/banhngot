<?php
session_start();
include("connec.php");
$username=$_POST['txtUsername'];
$password=$_POST['txtPassword'];
$username = stripcslashes($username);
$password = stripcslashes($password);
//$result ="select * from account where username = '$username' and password = '$password'";
$result ="select * from account where username = '$username'";
$kq = mysqli_query($conn,$result);
$row = mysqli_fetch_array($kq);
if(count($row)>0)
{ 	
	if(password_verify ( $password , $row['password'] )){
		$url="index.php";
	    header("location: $url");
	    $_SESSION['username'] = $username;
	    $_SESSION['user_id'] = $row['userID'];
	    $_SESSION['a']=null;
	}
	else{
		$url="login.php";
		  header("location: $url");   
		  $_SESSION['username'] = null;
		  $_SESSION['a']="2";
	}    
} 
else 
{ 
  $url="login.php";
  header("location: $url");   
  $_SESSION['username'] = null;
  $_SESSION['a']="1";
}

?>