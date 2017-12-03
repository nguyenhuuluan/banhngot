<?php
	include('connec.php');
	$error="";
	if(isset($_POST['btnSave']))
	{
		$loaibanh=$_POST['txtloaibanh'];


		if(strlen($loaibanh)<4)
		{
			$error="Loại bánh ít nhất có 4 kí tự";
		}
		else{
			        //update User
				$sql="update loaibanh set tenloai='$loaibanh' where id='{$_POST['txtid']}'";	
				$query= mysqli_query($conn,$sql);
				if($query)
				{
					header('Refresh:0;quanly.php?tmp=LoaiBanh');		
				}
			}
		}
				
	
	if(isset($_GET['edited']))
	{
		$sql="select * from loaibanh where id='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_row($query))
		{
			$id = $row[0];
			$tenloai = $row[1];
		}
		echo'	<form action="" method="post">
		<table>
			<tr>
				<td>Tên Loại</td>
				<td><input type="text" name="txtloaibanh" value="'.$tenloai.'" required><input type="hidden" name="txtid" value="'.$id.'>"/> </td>
			</tr>
			<tr><td colspan="2"><span style="color:red;">'.$error.'</span></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSave" value="Save" ></td>
			</tr>
		</table>
	</form>';
	}
	
		if(isset($_GET['deleted']))
	{
		$sql1="delete from banh where maloaibanh='{$_GET['id']}'";
		$query=mysqli_query($conn,$sql1);
		$sql="delete from loaibanh where id='{$_GET['id']}'";
		$query1=mysqli_query($conn,$sql);
		if($query1)
		{
			header('Refresh:0;quanly.php?tmp=LoaiBanh');		
		}
		
	}
?>

	