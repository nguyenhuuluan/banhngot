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
			        //update User
				$sql="update account set username='$UserName',password='$password',email='$email' where userID='{$_POST['txtid']}'";	
				$query= mysqli_query($conn,$sql);
				if($query)
				{
					header('Refresh:0;quanly.php?tmp=Account');		
				}
			}
		}
				
	
	if(isset($_GET['edited']))
	{
		$sql="select * from account where userID='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_row($query))
		{
			$userID = $row[0];
			$UserName = $row[1];
			$password = $row[2];
			$email = $row[3];
		}
		echo'	<form action="" method="post">
		<table>
			<tr>
				<td>UserName</td>
				<td><input type="text" name="txtuser" value="'.$UserName.'" required><input type="hidden" name="txtid" value="'.$userID.'>"/> </td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtpass" value="'.$password.'" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="txtemail" value="'.$email.'" required></td>
			</tr>
			<tr><td colspan="2"><span style="color:red;">'.$error.'</span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>';
	}
?>

	