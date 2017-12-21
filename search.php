<?php
session_start();

include('connec.php'); 

if(isset($_POST["add_to_cart"]))  
{  
	if(isset($_SESSION["shopping_cart"]))  
	{  
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
		if(!in_array($_GET["id"], $item_array_id))  
		{  
			$count = count($_SESSION["shopping_cart"]);  
			$item_array = array(  
				'item_id'               =>     $_GET["id"],  
				'item_name'               =>     $_POST["hidden_name"],  
				'item_price'          =>     $_POST["hidden_price"],  
				'item_quantity'          =>     $_POST["quantity"]  
			);  
			$_SESSION["shopping_cart"][$count] = $item_array;  
		}  
		else  
		{  
			echo '<script>alert("Item Already Added")</script>';


			echo '<script>window.location="index.php"</script>';  
		}  
	}  
	else  
	{  
		$item_array = array(  
			'item_id'               =>     $_GET["id"],  
			'item_name'               =>     $_POST["hidden_name"],  
			'item_price'          =>     $_POST["hidden_price"],  
			'item_quantity'          =>     $_POST["quantity"]  
		);  
		$_SESSION["shopping_cart"][0] = $item_array;  
	}  
}  
if(isset($_GET["action"]))  
{  
	if($_GET["action"] == "delete")  
	{  
		foreach($_SESSION["shopping_cart"] as $keys => $values)  
		{  
			if($values["item_id"] == $_GET["id"])  
			{  
				unset($_SESSION["shopping_cart"][$keys]);  
				echo '<script>alert("Item Removed")</script>';  
				echo '<script>window.location="index.php"</script>';  
			}  
		}  
	}  
}  




if(isset($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cửa hàng bánh ngọt</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="
	sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link href="css/mystyle.css" rel="stylesheet">
</head>
<body>
	
	<div class="container">  
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/Slide/ss1.jpg" alt="Los Angeles" style="width:100%;">
				</div>

				<div class="item">
					<img src="img/Slide/ss2.jpg" alt="Los Angeles" style="width:100%;">
				</div>

				<div class="item">
					<img src="img/Slide/ss3.jpg" alt="Los Angeles" style="width:100%;">
				</div>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<header id="home" class="header">
		<div class="main_menu_bg navbar-fixed-top wow slideInDown" data-wow-duration="1s">
			<div class="container">
				<div class="row">
					<div class="nave_menu">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a href="index.php"><img alt="logo" src="logo.png" height ="50" width ="50"> </a>
								</div>

								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<form action="search.php" method="get" class="navbar-form navbar-right">
										<div class="form-group">
											<input type="text" name="textsearch" class="form-control" placeholder="Tìm kiếm sản phẩm" >
										</div>
										<button type="submit" class="btn btn-default">  Tìm Kiếm </button>
									</form>
									<ul class="nav navbar-nav navbar-right menubar">
										<li><a href="index.php"><b>Trang Chủ</b></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Sản phẩm</b><b class="caret"></b></a>
											<ul class="dropdown-menu">
												<?php
												include("connec.php");
												$query ="select * from loaibanh";
												$kq = mysqli_query($conn,$query);
												while($row = mysqli_fetch_row($kq)){

													echo '
													<li> 
													<a href="loaisp.php?id='.$row[0].'" class = "t"><b> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'.$row[1].'</b></a>
													</li>';
												}
												?>																									
											</ul>
										</li>
										<li><a href="khuyenmai.php"><b>Khuyến mãi</b></a></li>
										<li><a href="lienhe.php"><b>Liên hệ</b></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Giỏ Hàng</b><b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li>
													<a class = "t"> <span class="glyphicon glyphicon-shopping-cart"></span><b> <?php 
													 if(isset($_SESSION["shopping_cart"]))  
														{  $sl =count($_SESSION["shopping_cart"]);
															echo $sl;
														}
														else{ echo "0";}?>  Sản Phẩm</b>
													
												</li>
												<li>
													<a href="cart.php" class = "t"><b>Thanh Toán</b></a>
												</li>										
											</ul>
										</ul>
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>	
				</div><!--End of row -->

			</div><!--End of container -->

		</div>
	</header> <!--End of header -->

	<div class="container">
		<hr>
		<div class ="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><a href="index.html"><B>HOME</B></a>
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" >
					<p class="lead k"> &nbsp <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span><B> &nbsp TÀI KHOẢN</B></p>
					<div class="list-group">
						<b>
							<div ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<?php 
								if (!isset($_SESSION['username'])) 
									{echo "<a href='login.php'>Đăng nhập</a>";
								echo "<br><div><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><a href='taotaikhoan.php'>Tạo Mới Tài Khoản</a>
								</div><br>";
							}else{
								echo 'Tên tài khoản:'.$_SESSION['username'].'<br/><hr>';
								echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: red"></span><a href="logout.php">Log out</a>';
							}

							?>
						</div><br>
					</b>
				</div>
				<p class="lead k"> &nbsp <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span><B> &nbsp SẢN PHẨM</B></p>
				<div class="list-group">
					<b>
						<?php

						$query ="select * from loaibanh";
						$kq = mysqli_query($conn,$query);
						while($row = mysqli_fetch_row($kq)){

							echo '
							<a href="loaisp.php?id='.$row[0].'" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>'.$row[1].'</a2>
							</a>';
						}
						?>
					</b>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="row">
					<h1>Kết quả tìm kiếm:</h1>

					<?php
					$search = trim($_GET['textsearch']);
					// $query1 = "select * from banh where tenbanh like '%$search%' or mota like '%$search%' or giaban like '%$search%'";

					$query1 = "select * from banh ba join loaibanh lb on ba.maloaibanh=lb.id where ba.tenbanh like '%$search%' or ba.giaban like '%$search%' or lb.tenloai like '%$search%'";


					$kq1 = mysqli_query($conn,$query1);
					$tongsp = mysqli_num_rows($kq1);
					$sosp= 6;
					$sotrang = ceil($tongsp / $sosp);
					if(!isset($_GET["p"]))
						$p = 1;
					else
						$p = $_GET["p"];
					$x = ($p - 1)*$sosp;

					$query2 = "select * from banh ba join loaibanh lb on ba.maloaibanh=lb.id where ba.tenbanh like '%$search%' or ba.giaban like '%$search%' or lb.tenloai like '%$search%' limit ".$x.",".$sosp;
					$kq2 = mysqli_query($conn,$query2);

					

					while ($row = mysqli_fetch_row($kq2)){
						echo'
						<div class="col-sm-6 col-md-4">
						<form method="post" action="index.php?action=add&id='.$row[0].'"> 
						<div class="thumbnail">
						<a href="#"><img src="img/'.$row[4].'" alt="..." width="200" class="a "></a>
						<div class="caption">
						<h4> <div align="center"><a2>'.$row[1].'</a2></div></h4>	
						<p><div align="center"><b2>Giá: '.number_format($row[2]).' VND</b2></div></p>	
						<p><input type="text" name="quantity" class="form-control" value="1" /> </p>
						<input type="hidden" name="hidden_name" value="'.$row[1].'">
						<input type="hidden" name="hidden_price" value="'.$row[2].'">
						<p><div align="center"><input type="submit" name="add_to_cart" class="btn btn-primary" value="Đặt Mua" />  &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Chi Tiết</button></div></p>	
						</div>
						</div>
						</div>	
						</form>
						';
					}
					?>	

				</div>
				<div class="row" align="center">
					
					<ul class="pagination">
						
						<?php
						for ($i=1;$i<=$sotrang;$i++)
						{
							if($i==$p)
								echo '<li  class="active"><a href="#">'.$i.'</a></li>';
							else{

								echo '<li><a href="index.php?p='.$i.'">'.$i.'</a></li>';
							}
						}								
						?>

					</ul>
				</div>
			</div>								
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="container"> 
</div>
</body>
<footer class="footer-s">

	<div class="panel">
		<div class="panel-footer">
			<div class= "container">
				<div class="col-lg-3" >
					<h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Cơ Sở 1: TP.Hồ Chí Minh</h4> 
					<h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +0123456789</h4>
					<h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> VluTeam@gmail.com</h4>
					<p>Copyright &copy; </p>
				</div>
				<div class="col-lg-3" >
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.633394897157!2d106.69113991435026!3d10.76271139233082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f16ad86371b%3A0x949d258c9508b1f2!2zxJDhuqFpIGjhu41jIFbEg24gTGFuZyBjxqEgc-G7nyAx!5e0!3m2!1svi!2s!4v1509810666541" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="col-lg-3" >
					<h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Cơ Sở 2: TP.Hồ Chí Minh</h4> 
					<h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +0123456789</h4>
					<h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> VluTeam@gmail.com</h4>
					<p>Copyright &copy; </p>
				</div>
				<div class="col-lg-3" >
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.633394897157!2d106.69113991435026!3d10.76271139233082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f16ad86371b%3A0x949d258c9508b1f2!2zxJDhuqFpIGjhu41jIFbEg24gTGFuZyBjxqEgc-G7nyAx!5e0!3m2!1svi!2s!4v1509810666541" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

</footer>
</html>