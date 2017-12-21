<?php

include('connec.php');	
$error='';
if(isset($_GET['tmp'])){

	$tmp = $_GET['tmp'];
	//create
	if($tmp=='create')
	{
		$sql ="select * from loaibanh";
		$kq2 = mysqli_query($conn,$sql);
		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>Tên bánh:</td>
		<td><input type="text" name="txtten" required><input type="hidden" name="txtid" value="0"/> </td>
		</tr>
		<tr>
		<td>Giá bán</td>
		<td><input type="text" name="txtgia" required></td>
		</tr>
		<td>Mô tả:</td>
		<td><input type="text" name="txtmota" required></td>
		</tr>	
		</tr>
		<td>Hình ảnh:</td>
		<td><input type="text" name="txthinhanh" required></td>
		</tr>	
		</tr>
		<td>Loại bánh:</td>

		<td><select name="loaibanh">';

		while($row2 = mysqli_fetch_row($kq2)){
			echo "<option value=$row2[0]>$row2[1]</option>";}
			
		echo '
		</select>
		</td>
		</tr>	
		<td></td>
		<td><input type="submit" name="btnSave" value="Save" ></td>
		</tr>
		</table>
		</form>';

		if(isset($_POST['btnSave'])){
			if(is_numeric($_POST['txtgia'])){

			$ten = $_POST['txtten'];
			$gia = $_POST['txtgia'];
			$mota = $_POST['txtmota'];
			$hinhanh = $_POST['txthinhanh'];
			$maloaibanh=$_POST['loaibanh'];
 			if($gia<0)
			{
				$error = "Tiền phải lớn hơn 0"; 
			}
			else{
				if($_POST['txtid']=="0")
				{
				//add new user
					$sql="insert into banh(tenbanh,giaban,mota,hinhanh,maloaibanh) values('$ten','$gia','$mota','$hinhanh','$maloaibanh')";
					if(mysqli_query($conn,$sql))
					{
						header('Refresh:0;quanly.php?tmp=Banh');
					}
				}	
			}
		}else{
			$error='Tiền phải là số';
		}

			echo '<span style="color:red;"> '.$error.' </span>';
		}
	}
	//end of create
	//edit
	elseif ($tmp=='edit') {
		# code...
		$id = $_GET['id'];
		$sql ="select * from banh where id='$id'";
		$kq = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($kq);

		$sql2 ="select * from loaibanh";
		$kq2 = mysqli_query($conn,$sql2);


		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>Tên bánh:</td>
		<td><input type="text" name="txtten" value="'.$row[1].'" required><input type="hidden" name="txtid" value="0"/> </td>
		</tr>
		<tr>
		<td>Giá bán</td>
		<td><input type="text" name="txtgia" value="'.$row[2].'" required></td>
		</tr>
		<td>Mô tả:</td>
		<td><input type="text" name="txtmota" value="'.$row[3].'" required></td>
		</tr>	
		</tr>
		<td>Hình ảnh:</td>
		<td><input type="text" name="txthinhanh" value="'.$row[4].'" required></td>
		</tr>	
		</tr>
		<td>Loại bánh:</td>

		<td><select name="loaibanh">';

		while($row2 = mysqli_fetch_row($kq2)){
			if($row2[0] == $row[5]){
					echo "<option value=$row2[0] selected>$row2[1]</option>";
				}
				else {echo "<option value=$row2[0]>$row2[1]</option>";}
			}
			
		echo '
		</select>
		</td>
		</tr>	
		<td></td>
		<td><input type="submit" name="btnUpdate" value="Save" ></td>
		</tr>
		</table>
		</form>';


		if(isset($_POST["btnUpdate"])){



			$ten = mysqli_real_escape_string($conn, $_POST['txtten']);
			$gia = mysqli_real_escape_string($conn, $_POST['txtgia']);
			$mota = mysqli_real_escape_string($conn, $_POST['txtmota']);
			$hinhanh = mysqli_real_escape_string($conn, $_POST['txthinhanh']);
			$maloaibanh = mysqli_real_escape_string($conn, $_POST['loaibanh']);


			$sql3 = "UPDATE banh set tenbanh ='$ten', giaban='$gia', mota='$mota', hinhanh ='$hinhanh', maloaibanh='$maloaibanh' where id='$id' ";


			if (mysqli_query($conn, $sql3)) {
				header('Refresh:0;quanly.php?tmp=Banh');
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}

		}
	//end of edit


	}
	elseif ($tmp=='delete') {
		# code...
		$id = $_GET['id'];
		$sql="delete from banh where id='$id'";
		if(mysqli_query($conn,$sql))
		{
			header('Refresh:0;quanly.php?tmp=Banh');		
		}else{

			$message = "Tồn tại khuyến mãi thuộc bánh này! \\n Không thể xóa bánh này!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('Refresh:0;quanly.php?tmp=Banh');
		}
	}
	
}
else{
	header("Location: quanly.php"); /* Redirect browser */
	exit();
}	



?>