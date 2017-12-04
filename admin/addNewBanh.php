<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$tenbanh=$_POST['txttenbanh'];
		$gia=$_POST['txtgia'];
		$gia=number_format($gia);
		$mota=$_POST['txtmota'];
		$hinhanh=$_POST['txthinhanh'];
		$maloaibanh=$_POST['txtloaibanh'];
		if(strlen($tenbanh)<4)
		{
			$error="Tên bánh it nhat phai co 4 ki tu";
		}else if($gia<0)
		{
			$error="Tiền phải lớn hơn 0";
		}else{
			if($_POST['txtid']=="0")
			{
				$sql="insert into banh(tenbanh,giaban,mota,hinhanh,maloaibanh) values('$tenbanh','$gia','$mota','$hinhanh','$maloaibanh')";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=Banh');
				}else echo"ádasdaddasđá";
			}
		}
				
	}
	
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Tên Bánh</td>
				<td><input type="text" name="txttenbanh" required autofocus><input type="hidden" name="txtid" value="0"/> </td>
			</tr>
			<tr>
				<td>Mã Loại Bánh</td>
				<td><select name="txtloaibanh">
				<?php 
				$query2= "SELECT * FROM loaibanh";
				$kq2 = mysqli_query($conn,$query2);
					while($row = mysqli_fetch_row($kq2)){
						echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
					}
				?>
				</select></td>
			</tr>
			<tr>
				<td>Giá bán</td>
				<td><input type="number" name="txtgia" required> VND</td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea name="txtmota" required></textarea></td>
			</tr>
			<tr>
				<td>Hình ảnh</td>
				<td><input name="txthinhanh" type="file" required></td>
			</tr>

			<tr><td colspan="2"><span style="color:red;"><?php echo $error;?> </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	