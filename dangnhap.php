<?php
session_start();
include("connec.php");
$username=$_POST['txtUsername'];
$password=$_POST['txtPassword'];
$username = stripcslashes($username);
$password = stripcslashes($password);
$result ="select * from account where username = '$username' and password = '$password'";
$kq = mysqli_query($conn,$result);
$row = mysqli_fetch_array($kq);
if($row['username']==$username&&$row['password']== $password)
{ 
    $url="index.php";
    header("location: $url");
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $row['userID'];
    
} 
else 
{ 
  $url="index.php";
  header("location: $url");   
  $_SESSION['username'] = null;
  $_SESSION['a']="1";
}

?>