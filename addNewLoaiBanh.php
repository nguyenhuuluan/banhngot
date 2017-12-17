<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$tenloaibanh=$_POST['txtloaibanh'];

		if(strlen($tenloaibanh)<4)
		{
			$error="Ten loai banh phai dai hon 4 ki tu";
			echo '<script>alert("'.$error.'");</script>';
		}
		else{
				$query2= "SELECT * FROM loaibanh";
				$kq2 = mysqli_query($conn,$query2);
				while($row = mysqli_fetch_row($kq2)){
					if ($row[1]==$tenloaibanh) 
					{
						$error = "Tên loại bánh này đã tồn tại";					
					}
				}

			if($_POST['txtid']=="0")
			{
				if($error=="")
				{
					$sql="insert into loaibanh(tenloai) values('$tenloaibanh')";
					if(mysqli_query($conn,$sql))
					{
						header('Refresh:0;quanly.php?tmp=LoaiBanh');
					}
				}else echo '<script>alert("'.$error.'");</script>';
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
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	