<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$tenloaibanh=$_POST['txtloaibanh'];

		if(strlen($tenloaibanh)<4)
		{
			$error="Ten loai banh phai dai hon 4 ki tu";
		}
		else{
			if($_POST['txtid']=="0")
			{
				//add new user
				$sql="insert into loaibanh(tenloai) values('$tenloaibanh')";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=LoaiBanh');
				}
			}
		}
				
	}
	
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Ten Loai Banh</td>
				<td><input type="text" name="txtloaibanh"><input type="hidden" name="txtid" value="0"/> </td>
			</tr>

			<tr><td colspan="2"><span style="color:red;"><?php echo $error;?> </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	