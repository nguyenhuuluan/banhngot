<?php

include('connec.php');	
$error='';
if(isset($_POST['dangki'])){

	$options = [
		'cost' => 11,
		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];
	$_POST['txtuser']
	$UserName = $_POST['txtuser'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
	$email = $_POST['txtemail'];

	if(strlen($UserName)<4||strlen($password)<4)
	{
		$error="UserName va Password it nhat phai co 4 ki tu";
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		$error = "Invalid email format"; 
	}
	else{
		if($_POST['txtid']=="0")
		{
				//add new user
			$sql="insert into account(username,password,email) values('$UserName','$password','$email')";
			if(mysqli_query($conn,$sql))
			{
				header('Refresh:0;quanly.php?tmp=Account');
			}
		}
	}



	// if(password_verify ( "rasmuslerdorf" , $tmp )){
	// 	echo "true";
}
	//end of create
	//edit

?>