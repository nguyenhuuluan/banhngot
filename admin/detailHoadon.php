<?php session_start(); if (!isset($_SESSION['username'])) {header('Location: index.php');}?>
<?php
if(isset($_POST["logout"])) {
	$_SESSION["user_id"] = "";
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
						<h1>Khách hàng: <?php 
						include('connec.php');
						$id = $_GET['id'];
						$query2= "SELECT * FROM hoadon where id = '$id' ";
						$kq2 = mysqli_query($conn,$query2);
						$row2 = mysqli_fetch_array($kq2);

						$query3= "SELECT * FROM account where userID = '$row2[3]' ";
						$kq3 = mysqli_query($conn,$query3);
						$row3 = mysqli_fetch_array($kq3);

						echo '<span style="color:green">'.$row3[1].'</span></h1>';
						echo '<h2>Số điện thoại: <span style="color:blue">'.$row3[6].'</span>';
						?></h1>
						<h2>Chi tiết hóa đơn:</h2>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<?php $query4= "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='demo' AND `TABLE_NAME`='chitiethoadon'";
												$kq4 = mysqli_query($conn,$query4);
												while($row4= mysqli_fetch_row($kq4)){
													echo '<th>'.$row4[0].'';
												}
												?>
									</tr>
								</thead>							
								<tbody>
									<?php
											$query5= "SELECT * FROM chitiethoadon where mahd = '$id'";
											$kq5 = mysqli_query($conn,$query5);
											while($row5 = mysqli_fetch_row($kq5)){
												$query6= "SELECT * FROM banh where id = '$row5[2]'";
												$kq6 = mysqli_query($conn,$query6);
												$row6 = mysqli_fetch_array($kq6);
												echo '	<tr>
												<td>'.$row5[0].'</td>
												<td>'.$row5[1].'</td>
												<td>'.$row6[1].'</td>
												<td>'.$row5[3].'</td>
												<td>'.number_format($row5[4]).' VNĐ</td>
												</tr>';
									}

									?>
								</tbody>
							</table>
							<h2><?php
								echo 'Tổng tiền: <span style="color:red">'.number_format($row2[1]);
								echo " VNĐ</span>";
							?></h2>
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
