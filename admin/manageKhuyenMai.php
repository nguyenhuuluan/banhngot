<?php

include('connec.php');	
$error='';
if(isset($_GET['tmp'])){

	$tmp = $_GET['tmp'];
	//create
	if($tmp=='create')
	{
		$sql ="select * from banh";
		$kq2 = mysqli_query($conn,$sql);
		echo '
		<form action="" method="post">
		<table>
		<tr>
		<td>Tên bánh:</td>
		<td><select name="txtbanh">';
		while($row2 = mysqli_fetch_row($kq2)){
			echo "<option value=$row2[0]>$row2[1]</option>";}
			
			echo '</select>
			</td>

			</tr>
			<tr>
			<td>Giá khuyến mãi:</td>
			<td><input type="text" name="txtgiakm" required></td>
			</tr>
			<td>Mô tả:</td>
			<td><input type="text" name="txtmota" required></td>
			</tr>
			<td>Ngày bắt đầu:</td>
			<td><input type="date" name="txtngaybd" required></td>
			</tr>
			<td>Ngày kết thúc:</td>
			<td><input type="date" name="txtngaykt" required></td>
			</tr>	
			<tr>		
			<td></td>
			<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
			</table>
			</form>';

			if(isset($_POST['btnSave'])){
				if(is_numeric($_POST['txtgiakm'])){

					$gia = $_POST['txtgiakm'];
					$mota = $_POST['txtmota'];
					$ngaybd = $_POST['txtngaybd'];
					$ngaykt = $_POST['txtngaykt'];
					$mabanh=$_POST['txtbanh'];



					$query2= "SELECT tenbanh FROM banh where id =".$mabanh;
					$kq2 = mysqli_query($conn,$query2);
					$row2 = mysqli_fetch_array($kq2);
					$tenbanh=$row2[0];

					if (strtotime($ngaybd) > strtotime($ngaykt)) 
					{
						$error="Ngày kết thúc lớn hơn ngày bắt đầu.";
					}
					else{
						$sql="insert into khuyenmai(idbanh,tenbanh, giakhuyenmai, mota, ngaybatdau ,ngayketthuc) values('$mabanh','$tenbanh', '$gia', '$mota' ,'$ngaybd','$ngaykt')";
						if(mysqli_query($conn,$sql))
						{
							header('Refresh:0;quanly.php?tmp=KhuyenMai');
						}
					}	
				}
				else{
					$error='Tiền phải là số';
				}
			}

			echo '<span style="color:red;"> '.$error.' </span>';
		}
	//end of create
	//edit
		elseif ($tmp=='edit') {
		# code...
			$id = $_GET['id'];
			$sql ="select * from khuyenmai where id='$id'";
			$kq = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($kq);

			$sql2 ="select * from banh";
			$kq2 = mysqli_query($conn,$sql2);


			echo '
			<form action="" method="post">
			<table>
			<tr>
			<td>Tên bánh:</td>
			<td><select name="txtbanh">';
			while($row2 = mysqli_fetch_row($kq2)){
				if($row2[0] == $row[1]){
					echo "<option value=$row2[0] selected>$row2[1]</option>";
				}
				else {echo "<option value=$row2[0]>$row2[1]</option>";}}

				echo '</select>
				</td>

				</tr>
				<tr>
				<td>Giá khuyến mãi:</td>
				<td><input type="text" name="txtgiakm" value="'.$row[3].'" required></td>
				</tr>
				<td>Mô tả:</td>
				<td><input type="text" name="txtmota" value="'.$row[4].'" required></td>
				</tr>
				<td>Ngày bắt đầu:</td>
				<td><input type="date" name="txtngaybd" value="'.$row[5].'" required></td>
				</tr>
				<td>Ngày kết thúc:</td>
				<td><input type="date" name="txtngaykt" value="'.$row[6].'" required></td>
				</tr>	
				<tr>		
				<td></td>
				<td><input type="submit" name="btnUpdate" value="Save" ></td>
				</tr>
				</table>
				</form>';


				if(isset($_POST["btnUpdate"])){

					if(is_numeric($_POST['txtgiakm'])){

						$mabanh = mysqli_real_escape_string($conn, $_POST['txtbanh']);
						$gia = mysqli_real_escape_string($conn, $_POST['txtgiakm']);
						$mota = mysqli_real_escape_string($conn, $_POST['txtmota']);
						$ngaybd = mysqli_real_escape_string($conn, $_POST['txtngaybd']);
						$ngaykt = mysqli_real_escape_string($conn, $_POST['txtngaykt']);

						$query2= "SELECT tenbanh FROM banh where id =".$mabanh;
						$kq2 = mysqli_query($conn,$query2);
						$row2 = mysqli_fetch_array($kq2);
						$tenbanh=$row2[0];

						if (strtotime($ngaybd) > strtotime($ngaykt)) 
						{
							$error="Ngày kết thúc lớn hơn ngày bắt đầu.";
						}
						else{
							$sql3="UPDATE khuyenmai set idbanh ='$mabanh', tenbanh='$tenbanh',giakhuyenmai='$gia', mota='$mota', ngaybatdau ='$ngaybd', ngayketthuc='$ngaykt' where id='$id' ";
							if(mysqli_query($conn,$sql3))
							{
								header('Refresh:0;quanly.php?tmp=KhuyenMai');
							}else {
								echo "Error updating record: " . mysqli_error($conn);
							}
						}


					}
					else{
						$error="Tiền phải là số";
					}	
				}
	//end of edit


			}
			elseif ($tmp=='delete') {
		# code...
				$id = $_GET['id'];
				$sql="delete from khuyenmai where id='$id'";
				$query=mysqli_query($conn,$sql);
				if($query)
				{
					header('Refresh:0;quanly.php?tmp=KhuyenMai');		
				}
			}

		}
		else{
			header("Location: quanly.php"); /* Redirect browser */
			exit();
		}	



		?>