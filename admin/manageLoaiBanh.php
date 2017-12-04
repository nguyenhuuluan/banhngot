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
		<td>Tên loại:</td>
		<td><input type="text" name="txtten" required><input type="hidden" name="txtid" value="0"/> </td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="btnSave" value="Save" ></td>
		</tr>
		</table>
		</form>';

		if(isset($_POST['btnSave'])){

			$ten = $_POST['txtten'];

			$sql="insert into loaibanh(tenloai) values('$ten')";
			if(mysqli_query($conn,$sql))
			{
				header('Refresh:0;quanly.php?tmp=LoaiBanh');
			}
		}
	}
	//end of create
	//edit
	elseif ($tmp=='edit') {
		# code...
		$id = $_GET['id'];
		
		$sql ="select * from loaibanh where id='$id'";
		$kq = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($kq);

		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>Tên loại:</td>
		<td><input type="text" name="txtten" value="'.$row[1].'"><input type="hidden" name="txtid" value="1"/> </td>
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

			$ten = mysqli_real_escape_string($conn, $_POST['txtten']);



			$sql2 = "UPDATE loaibanh set tenloai ='$ten' where id='$id' ";

			if (mysqli_query($conn, $sql2)) {
				header('Refresh:0;quanly.php?tmp=LoaiBanh');		
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
	//end of edit


	}
	elseif ($tmp=='delete') {
		# code...
		$id = $_GET['id'];
		$sql="delete from loaibanh where id='$id'";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			header('Refresh:0;quanly.php?tmp=LoaiBanh');		
		}
	}
	
}
else{
	header("Location: quanly.php"); /* Redirect browser */
	exit();
}	



?>