<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$idbanh=$_POST['txtbanh'];
		$query2= "SELECT tenbanh FROM banh where id =".$idbanh;
		$kq2 = mysqli_query($conn,$query2);
		while($row = mysqli_fetch_row($kq2))
		{
			$tenbanh=$row[0];
		}
		$ngaybatdau = $_POST['txtdatestart']; 
		$ngayketthuc =$_POST['txtdateend']; 
		if (strtotime($ngaybatdau) > strtotime($ngayketthuc)) 
		{
			$error="Ngày kết thúc lớn hơn ngày bắt đầu.";
		}
		else{

				
				$sql="insert into khuyenmai(idbanh,tenbanh,ngaybatdau,ngayketthuc) values('$idbanh','$tenbanh','$ngaybatdau','$ngayketthuc')";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=KhuyenMai');
				}
			}
				
	}
	
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Tên Bánh</td>
				<td><select name="txtbanh">
				<?php 
				$query2= "SELECT * FROM banh";
				$kq2 = mysqli_query($conn,$query2);
					while($row = mysqli_fetch_row($kq2)){
						echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
					}
				?>
				</select><input type="hidden" name="txtid" value="0"/> </td>
			</tr>
			<tr>
				<td>Ngày Bắt dầu</td>
				<td><input type="date" name="txtdatestart" required></td>
			</tr>
			<tr>
				<td>Ngày Kết thúc</td>
				<td><input type="date" name="txtdateend" required></td>
			</tr>
			<tr><td colspan="2"><span style="color:red;"><?php echo $error;?> </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>
	