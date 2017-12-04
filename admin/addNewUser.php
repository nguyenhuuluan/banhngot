<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$UserName=$_POST['txtuser'];
		$password=$_POST['txtpass'];
		$email=$_POST['txtemail'];

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
					header('Refresh:0;quanly.php?tmp=account');
				}
			}
		}
				
	}
	
?>
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
			<tr><td colspan="2"><span style="color:red;"><?php echo $error;?> </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	