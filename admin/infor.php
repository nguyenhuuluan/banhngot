<div class="table-responsive">
<?php	
	if(isset($_GET["tmp"]))
						{

						echo	'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>';
?>
										<?php
										include ("connec.php");
										if(isset($_GET["tmp"]))
										{
                							//Banh
											if($_GET["tmp"]=="Banh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='banh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
													echo '<th>Action - <a href=quanly.php?tmp1=Banh&add=Banh style="text-decoration: none; color:gray;">Add New</a></th>';
											
											}                		

                							//Loai banh	
											else if($_GET["tmp"]=="LoaiBanh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='loaibanh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=LoaiBanh&add=LoaiBanh style="text-decoration: none; color:gray;">Add New</a></th>';
											}
                							//Account
											else if($_GET["tmp"]=="Account"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='account'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=Account&add=Account style="text-decoration: none; color:gray;">Add New</a></th>';
											}                							//Account
											else if($_GET["tmp"]=="KhuyenMai"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='khuyenmai'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=KhuyenMai&add=KhuyenMai style="text-decoration: none; color:gray;">Add New</a></th>';
											}
											//logout bo session
											else if($_GET["tmp"]=="logout"){
												$_SESSION['username'] = null;
												$url="quanly.php";
												header("location: $url");
											}
										}
										
								echo	'</tr>
								</thead>
								<tfoot>
									<tr>';
									?>
										<?php
										include ("connec.php");
										if(isset($_GET["tmp"]))
										{
                							//Banh
											if($_GET["tmp"]=="Banh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='banh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												}                		
												echo '<th>Action - <a href=quanly.php?tmp1=Banh&add=Banh style="text-decoration: none; color:gray;">Add New</a></th>';
											}                		

                							//Loai banh	
											else if($_GET["tmp"]=="LoaiBanh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='loaibanh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=LoaiBanh&add=LoaiBanh style="text-decoration: none; color:gray;">Add New</a></th>';
											}
                							//Account
											else if($_GET["tmp"]=="Account"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='account'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=Account&add=Account style="text-decoration: none; color:gray;">Add New</a></th>';
											}	else if($_GET["tmp"]=="KhuyenMai"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='banhngot' AND `TABLE_NAME`='khuyenmai'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '<th>Action - <a href=quanly.php?tmp1=KhuyenMai&add=KhuyenMai style="text-decoration: none; color:gray;">Add New</a></th>';
											}
										}
										
								echo	'</tr>
								</tfoot>
								<tbody>';
								?>
									<?php
									if(isset($_GET["tmp"])){
										if($_GET["tmp"]=="Banh"){
											$query2= "SELECT * FROM banh";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.$row[2].'</td>
												<td>'.$row[3].'</td>
												<td>'.$row[4].'</td>
												<td>'.$row[5].'</td>
												<td><a href=quanly.php?tmp1=Banh&edited=Banh&id='.$row[0].' style="text-decoration: none; color:gray;">Edit</a>
												|| <a href=quanly.php?tmp1=Banh&deleted=Banh&id='.$row[0].' style="text-decoration: none; color:gray;">Delete</a></td></tr>';
														
											}	
										}
										else if($_GET["tmp"]=="LoaiBanh"){
											
													$query2= "SELECT * FROM loaibanh";
													$kq2 = mysqli_query($conn,$query2);
													while($row = mysqli_fetch_row($kq2))
													{
													echo '	<tr>
													<td>'.$row[0].'</td>
													<td>'.$row[1].'</td>
													<td><a href=quanly.php?tmp1=LoaiBanh&edited=LoaiBanh&id='.$row[0].' style="text-decoration: none; color:gray;">Edit</a>
													|| <a href=quanly.php?tmp1=LoaiBanh&deleted=LoaiBanh&id='.$row[0].' style="text-decoration: none; color:gray;">Delete</a></td></tr>';
													}	
											
											
										}
										else if($_GET["tmp"]=="Account"){
											$query2= "SELECT * FROM account";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.$row[2].'</td>
												<td>'.$row[3].'</td>
												<td><a href=quanly.php?tmp1=Account&edited=Account&id='.$row[0].' style="text-decoration: none; color:gray;">Edit</a>
													|| <a href=quanly.php?tmp1=Account&deleted=Account&id='.$row[0].' style="text-decoration: none; color:gray;">Delete</a></td></tr>';
											}	
										
										}
										else if($_GET["tmp"]=="KhuyenMai"){
											$query2= "SELECT * FROM khuyenmai";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.$row[2].'</td>
												<td>'.$row[3].'</td>
												<td>'.$row[4].'</td>
												<td><a href=quanly.php?tmp1=KhuyenMai&edited=KhuyenMai&id='.$row[0].' style="text-decoration: none; color:gray;">Edit</a>
													|| <a href=quanly.php?tmp1=KhuyenMai&deleted=KhuyenMai&id='.$row[0].' style="text-decoration: none; color:gray;">Delete</a></td></tr>';
											}	
										
										}	
									}
									

									
								echo '</tbody>
							</table>';
						 }else	if(isset($_GET["edited"])||isset($_GET["deleted"]))
							{
							 	if($_GET["edited"]=="Account")
								{
									
									include("editUser.php"); 
									 
								}else if($_GET["edited"]=="Banh")
								{
									
									include("editBanh.php");
									 
								}else if($_GET["edited"]=="LoaiBanh")
								{
									include("editLoaiBanh.php"); 
									 
								}else if($_GET["edited"]=="KhuyenMai")
								{
									
									include("editKhuyenMai.php");
									 
								}else if($_GET["deleted"]=="Banh")
								{
									
									include("editBanh.php");
									 
								}else if($_GET["deleted"]=="LoaiBanh")
								{
									include("editLoaiBanh.php"); 
									 
								}else if($_GET["deleted"]=="KhuyenMai")
								{
									
									include("editKhuyenMai.php");
									 
								}else if($_GET["deleted"]=="Account")
								{
									
									include("editUser.php"); 
									 
								}
						 }else if(isset($_GET["add"]))
						 {
							 	if($_GET["add"]=="Account")
								{
									include("addNewUser.php"); 
								}else if($_GET["add"]=="Banh")
								{
									include("addNewBanh.php");
								}else if($_GET["add"]=="LoaiBanh")
								{
										include("addNewLoaiBanh.php"); 
								}else if($_GET["add"]=="KhuyenMai")
								{
										include("addNewKhuyenMai.php"); 

								}
							
						 }else
						 {
							header('Refresh:0;quanly.php?tmp=Account');
						 }	
						 ?>
						</div>