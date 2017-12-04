<?php

include('connec.php');	
$error='';
if(isset($_GET['tmp'])){

	$tmp = $_GET['tmp'];
	//create
	if($tmp=='create')
	{
		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>UserName</td>
		<td><input type="text" name="txtuser"><input type="hidden" name="txtid" value="0"/> </td>
		</tr>
		<tr>
		<td>Password</td>
		<td><input type="password" name="txtpass"></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><input type="text" name="txtemail"></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="btnSave" value="Save" ></td>
		</tr>
		</table>
		</form>';

		if(isset($_POST['btnSave'])){

			$UserName = $_POST['txtuser'];
			$password = $_POST['txtpass'];
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
			echo '<span style="color:red;"> '.$error.' </span>';
		}
	}
	//end of create
	//edit
	elseif ($tmp=='edit') {
		# code...
		$id = $_GET['id'];
		$sql ="select * from account where userID='$id'";
		$kq = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($kq);


		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>UserName</td>
		<td><input type="text" name="txtuser" value="'.$row[1].'"><input type="hidden" name="txtid" value="1"/> </td>
		</tr>
		<tr>
		<td>Password</td>
		<td><input type="password" name="txtpass" value="'.$row[2].'"></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><input type="text" name="txtemail" value="'.$row[3].'"></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="btnUpdate" value="Update" ></td>
		</tr>
		</table>
		</form>';


		if(isset($_POST["btnUpdate"])){

			// $username =$_POST['txtuser'];
			// $password =$_POST['txtpass'];
			// $email =$_POST['txtemail'];

			$username = mysqli_real_escape_string($conn, $_POST['txtuser']);
			$password = mysqli_real_escape_string($conn, $_POST['txtpass']);
			$email = mysqli_real_escape_string($conn, $_POST['txtemail']);


			$sql2 = "UPDATE account set username ='$username', password='$password', email='$email' where userID='$id' ";

			if (mysqli_query($conn, $sql2)) {
				header("Location: quanly.php");
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}

		}
	//end of edit


	}
	elseif ($tmp=='delete') {
		# code...
		$id = $_GET['id'];
		$sql="delete from account where userID='$id'";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			header('Refresh:0;quanly.php?tmp=Account');		
		}
	}
	
}
else{
	header("Location: quanly.php"); /* Redirect browser */
	exit();
}	



?>