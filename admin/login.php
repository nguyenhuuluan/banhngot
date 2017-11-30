<?php
	include("connec.php");
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$result ="select * from account where username = '$username' and password = '$password'";
	$kq = mysqli_query($conn,$result);
	$row = mysqli_fetch_array($kq);
	if($row['username']==$username&&$row['password']== $password)
	{	
		if($row['username']=='admin')
		{
			$url="quanly.php";
			header("location: $url");
		}else
			{
		$url="index1.html";
		header("location: $url");
			}
	}
	else 
	{	
		$url="index.html";
		header("location: $url");		
	}

?>