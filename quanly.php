<?php session_start(); if (!isset($_SESSION['username'])&&!isset($_SESSION['password']))
	{header('Location: login.php');
	}else if (isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
		if($_SESSION['username'] != "admin")
		{
			header('Location: index.php');
		}
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
	<title>admin</title>
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
						<span class="nav-link-text">Quản lý bánh</span>
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
						<a href="quanly.php?tmp=logout"  style="text-decoration: none; color:gray;>
						<i class="fa fa-fw fa-sign-out"></i>Logout</a>
					
					</li>
				</ul>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i><?php
					if(isset($_GET["tmp"]))
					{
						echo 'Quản lý '.$_GET["tmp"];
					}else if(isset($_GET["tmp1"]))
					{
						echo 'Quản lý '.$_GET["tmp1"];
					}
					else echo 'Quản lý Account';
					?>
				</div>
					<div class="card-body">
					<?php include("infor.php"); ?>
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
