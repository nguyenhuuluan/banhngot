<?php session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['admin'])){
        header("location: index.php");
    }?>
<?php
if(isset($_POST["logout"])) {
	$_SESSION["userid"] = "";
	session_destroy();
}
?>
<html lang="en">
<head>
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/sb-admin.min.css" rel="stylesheet">
	<!-- Bootstrap core CSS-->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Admin Page</title>
</head> 
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="quanly.php?tmp=Account">Welcome to ADMIN PAGE</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="quanly.php?tmp=Account">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Quản lý Account</span>
					</a>
				</li>

				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="quanly.php?tmp=Banh">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Quản lý Bánh</span>
					</a>
				</li>

				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="quanly.php?tmp=LoaiBanh">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Quản lý Loại Bánh</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="quanly.php?tmp=KhuyenMai">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Quản lý Khuyến Mãi</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="quanly.php?tmp=Hoadon">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Quản lý Hóa đơn</span>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">		
				<li class="">
					<a href="#" style="text-decoration: none; color:gray;"> <?php echo $_SESSION['username'];  ?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</li>	
				<li class="nav-item">
					<a href="logout.php?tmp=logout"  style="text-decoration: none; color:gray;">
						<i class= "fa fa-fw fa-sign-out"></i>Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i><?php
					if(isset($_GET["tmp"])){
						echo 'Manage '.$_GET["tmp"].'<hr>';
						echo '<a href="manage'.$_GET["tmp"].'.php?tmp=create" class="btn btn-success">Create new</a>';
					}						
					else {
						echo 'Manage Account<hr>';
						echo '<a href="manageAccount.php?tmp=create" class="btn btn-success">Create new</a>';
					}

					

					?></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<?php
										include ("connec.php");
										if(isset($_GET["tmp"]))
										{
                							//Banh
											if($_GET["tmp"]=="Banh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='banh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'';
												}
												echo '</th><th>Action</th>';                		
											}                		

                							//Loai banh	
											else if($_GET["tmp"]=="LoaiBanh"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='loaibanh'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '</th><th>Action</th>';  
											}
                							//Account
											else if($_GET["tmp"]=="Account"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='account'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '</th><th>Action</th>';  
											}
											//Khuyen mai
											else if($_GET["tmp"]=="KhuyenMai"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='khuyenmai'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '</th><th>Action</th>';  
											}
											else if($_GET["tmp"]=="Hoadon"){
												$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='hoadon'";
												$kq1 = mysqli_query($conn,$query1);
												while($row = mysqli_fetch_row($kq1)){
													echo '<th>'.$row[0].'</th>';
												} 
												echo '</th><th>Action</th>';  
											}
										}else{
											$query1= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='account'";
											$kq1 = mysqli_query($conn,$query1);
											while($row = mysqli_fetch_row($kq1)){
												echo '<th>'.$row[0].'</th>';
											} 
											echo '</th><th>Action</th>';  
										}
										?>
									</tr>
								</thead>							
								<tbody>
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
												<td>
												<a href="manageBanh.php?id='.$row[0].'&&tmp=edit" class="btn btn-warning">Edit</a>
												<a href="manageBanh.php?id='.$row[0].'&&tmp=delete" class="btn btn-danger">Delete</a>
												</td>
												</tr>';
											}	
										}
										else if($_GET["tmp"]=="LoaiBanh"){
											$query2= "SELECT * FROM loaibanh";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>
												<a href="manageLoaiBanh.php?id='.$row[0].'&&tmp=edit" class="btn btn-warning">Edit</a>
												<a href="manageLoaiBanh.php?id='.$row[0].'&&tmp=delete" class="btn btn-danger">Delete</a>
												</td>
												</tr>';
											}	
										}
										else if($_GET["tmp"]=="Account"){
											$query2= "SELECT * FROM account";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.substr($row[2], 0,10).'...</td>
												<td>'.$row[3].'</td>
												<td>'.substr($row[4], 0,10).'...</td>
												<td>'.$row[5].'</td>
												<td>'.substr($row[6], 0,10).'...</td>
												<td>
												<a href="manageAccount.php?id='.$row[0].'&&tmp=edit" class="btn btn-warning">Edit</a>
												<a href="manageAccount.php?id='.$row[0].'&&tmp=delete" class="btn btn-danger">Delete</a>
												</td>
												</tr>';
											}	
										}else if($_GET["tmp"]=="Hoadon"){
											$query2= "SELECT * FROM hoadon";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.$row[2].'</td>
												<td>'.$row[3].'</td>
												<td>
												<a href="detailHoadon.php?id='.$row[0].'&&tmp=detail" class="btn btn-warning">Detail</a>
												</td>
												</tr>';
											}	
										}


											else if($_GET["tmp"]=="KhuyenMai"){
											$query2= "SELECT * FROM khuyenmai";
											$kq2 = mysqli_query($conn,$query2);
											while($row = mysqli_fetch_row($kq2)){
												echo '	<tr>
												<td>'.$row[0].'</td>
												<td>'.$row[1].'</td>
												<td>'.substr($row[2], 0,10).'...</td>
												<td>'.$row[3].'</td>
												<td>'.$row[4].'</td>
												<td>'.$row[5].'</td>
												<td>'.$row[6].'</td>
												<td>
												<a href="manageKhuyenmai.php?id='.$row[0].'&&tmp=edit" class="btn btn-warning">Edit</a>
												<a href="manageKhuyenmai.php?id='.$row[0].'&&tmp=delete" class="btn btn-danger">Delete</a>
												</td>
												</tr>';
											}	
										}										
									}
									else
									{
										$query2= "SELECT * FROM account";
										$kq2 = mysqli_query($conn,$query2);
										while($row = mysqli_fetch_row($kq2)){
											echo '	<tr>
											<td>'.$row[0].'</td>
											<td>'.$row[1].'</td>
											<td>'.$row[2].'</td>
											<td>'.$row[3].'</td>
											<td>'.substr($row[4], 0,10).'...</td>
											<td>'.$row[5].'</td>
											<td>'.substr($row[6], 0,10).'...</td>
											<td>
											<a href="manageAccount.php?id='.$row[0].'&&tmp=edit" class="btn btn-warning">Edit</a>
											<a href="manageAccount.php?id='.$row[0].'&&tmp=delete" class="btn btn-danger">Delete</a>
											</td>
											</tr>';
										}	
									}

									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</body>
		<!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>


		</html>
