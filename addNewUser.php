<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$hoten=$_POST['txtHoten'];
		$diachi=$_POST['txtdiachi'];
		$phonenumber=$_POST['txtphonenumber'];
		$UserName=$_POST['txtuser'];
		$password=$_POST['txtpass'];
		$email=$_POST['txtemail'];
		if(strlen($UserName)<4||strlen($password)<4)
		{
			$error="UserName va Password it nhat phai co 4 ki tu";
			echo '<script>alert("'.$error.'");</script>';
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$error = "Kiểu email không đúng"; 
				echo '<script>alert("'.$error.'");</script>';
			}
		else{
				$query2= "SELECT * FROM account";
				$kq2 = mysqli_query($conn,$query2);
				while($row = mysqli_fetch_row($kq2)){
				if ($row[1]==$UserName) 
				{
					$error = "username đã tồn tại"; 
				}else if ($row[3]==$email) 
					{
						$error = "Email đã tồn tại"; 
					}
				else if ($row[6]==$phonenumber) 
					{
						$error = "Số điện thoại đã tồn tại"; 
					}
				}
			if($error=="")
			{
				//add new user
				$sql="insert into account(username,password,email,diachi,hoten,phonenumber) values('$UserName','$password','$email','$diachi','$hoten','$phonenumber')";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=Account');
				}
			}else echo '<script>alert("'.$error.'");</script>';
		}
				
	}
	
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Họ và Tên</td>
				<td><input type="text" name="txtHoten" required></td>
			</tr>
			<tr>
				<td>UserName</td>
				<td><input type="text" name="txtuser" required><input type="hidden" name="txtid" value="0"/> </td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtpass" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="txtemail" required></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="txtdiachi" required></td>
			</tr>
			<tr>
				<td>PhoneNumber</td>
				<td><input type="text" name="txtphonenumber" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	