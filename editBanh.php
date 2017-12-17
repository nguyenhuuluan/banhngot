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
		}else if($gia<200)
		{
			$error="Tiền phải lớn hơn 200";
		}else{
				$query2= "SELECT * FROM banh";
				$kq2 = mysqli_query($conn,$query2);
				while($row = mysqli_fetch_row($kq2)){
					if ($row[1]==$tenbanh) 
					{
						$error = "Tên bánh này đã tồn tại";					
					}
					}
			if($error=="")
			{
				$sql="update banh set tenbanh='$tenbanh',giaban='$gia',mota='$mota',hinhanh='$hinhanh'
				,maloaibanh='$maloaibanh' where id='{$_GET['id']}'";
				if(mysqli_query($conn,$sql))
				{
					header('Refresh:0;quanly.php?tmp=Banh');
				}
			}else echo '<script>alert("'.$error.'");</script>';	
			}				
		}
				
	
				
	
	if(isset($_GET['edited']))
	{
		$sql="select * from banh where id='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_row($query))
		{
			$id = $row[0];
			$tenbanh = $row[1];
			$giaban = $row[2];
			$mota = $row[3];
			$hinhanh = $row[4];
			$maloaibanh=$row[5];
		}
		$sql1="select tenloai from loaibanh where id=".$maloaibanh;
		$kq = mysqli_query($conn,$sql1);
		while($row = mysqli_fetch_row($kq)){
			$tenloai=$row[0];
		}
		echo'	<form action="" method="post">
		<table>
			<tr>
				<td>Tên Bánh</td>
				<td><input type="text" name="txttenbanh" value="'.$tenbanh.'" required autofocus><input type="hidden" name="txtid" value="'.$id.'"/> </td>
			</tr>
			<tr>
				<td>Mã Loại Bánh</td>
				<td><select name="txtloaibanh">';

				$query2= "SELECT * FROM loaibanh";
				$kq2 = mysqli_query($conn,$query2);
				echo '<option value="'.$maloaibanh.'"> '.$tenloai.'</option>';
					while($row = mysqli_fetch_row($kq2)){
						echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
					}
				
				echo '</select></td>
			</tr>
			<tr>
				<td>Giá bán</td>
				<td><input type="number" name="txtgia" value="'.$giaban.'" required> VND</td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea name="txtmota" required>'.$mota.'</textarea></td>
			</tr>
			<tr>
				<td>Hình ảnh</td>
				<td><input name="txthinhanh" type="text" value="'.$hinhanh.'"  required></td>
			</tr>

			<tr><td colspan="2"><span style="color:red;">'.$error.' </span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>';
	}
	
		if(isset($_GET['deleted']))
	{
		
		$query=mysqli_query($conn,$sql1);
		$sql="delete from banh where id='{$_GET['id']}'";
		$query1=mysqli_query($conn,$sql);
		if($query1)
		{
			header('Refresh:0;quanly.php?tmp=Banh');	
			echo '<script>alert("Xóa Thành Công");</script>';			
		}
		
	}
?>

	