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

				$sql="update khuyenmai set idbanh='$idbanh',tenbanh='$tenbanh',ngaybatdau='$ngaybatdau',ngayketthuc='$ngayketthuc'
				where id='{$_GET['id']}'";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=KhuyenMai');
				}
			}
		}
				
	
	if(isset($_GET['edited']))
	{
		$sql="select * from khuyenmai where id='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_row($query))
		{
			$id = $row[0];
			$idbanh = $row[1];
			$tenbanh=$row[2];
			$ngaybatdau = $row[3];
			$ngayketthuc=$row[4];
		}
		echo'	<form action="" method="post">
		<table>
			<tr>
				<td>Tên Bánh</td>
				<td><select name="txtbanh">';

				$query2= "SELECT * FROM banh";
				$kq2 = mysqli_query($conn,$query2);
					echo '<option value="'.$idbanh.'"> '.$tenbanh.'</option>';
					while($row = mysqli_fetch_row($kq2)){
						echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
					}
				
				
		echo	'	</select><input type="hidden" name="txtid" value="0"/> </td>
			</tr>
			<tr>
				<td>Ngày Bắt dầu</td>
				<td><input type="date" name="txtdatestart" value="'.$ngaybatdau.'" required></td>
			</tr>
			<tr>
				<td>Ngày Kết thúc</td>
				<td><input type="date" name="txtdateend" value="'.$ngayketthuc.'" required></td>
			</tr>
			<tr><td colspan="2"><span style="color:red;">'. $error.' </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>';
	}
	
		if(isset($_GET['deleted']))
	{
		$sql="delete from khuyenmai where id='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			header('Refresh:0;quanly.php?tmp=KhuyenMai');		
		}
		
	}
?>

	