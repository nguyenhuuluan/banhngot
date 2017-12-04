<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Cửa hàng bánh ngọt</title>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
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
            <img src="HinhAnh/Slide/ss1.jpg" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="HinhAnh/Slide/ss2.jpg" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="HinhAnh/Slide/ss3.jpg" alt="Los Angeles" style="width:100%;">
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

                 <!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<form class="navbar-form navbar-right">
											<div class="form-group" >
												<input type="text"  class="form-control" placeholder="Tìm kiếm sản phẩm" >
											</div>
											<button type="submit" class="btn btn-default">  Tìm Kiếm </button>
										</form>
										<ul class="nav navbar-nav navbar-right menubar">
											<li><a href="index.php"><b>Trang Chủ</b></a></li>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Sản phẩm</b><b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li> 
														<a href="BanhCuoi.html" class = "t"><b> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>Bánh cưới</b></a>
													</li>
													<li>
														<a href="BanhSinhNhat.html" class = "t"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><b>Bánh sinh nhật</b></a>
													</li>
													<li>
														<a href="BanhMi.html" class = "t"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><b>Bánh mì</b></a>
													</li>
													<li>
														<a href="BanhTrungThu.html" class = "t"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><b>Bánh trung thu</b></a>
													</li>
													<li>
														<a href="BanhGaToNgot.html" class = "t"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><b>Bánh gato - bánh ngọt</b></a>
													</li>
													
												</ul>
											</li>
											<li><a href="khuyenmai.php"><b>Khuyến mãi</b></a></li>
											<li><a href="LienHe.html"><b>Liên hệ</b></a></li>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Giỏ Hàng</b><b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
														<a class = "t"> <span class="glyphicon glyphicon-shopping-cart"></span><b>&nbsp;&nbsp;&nbsp;0 Sản Phẩm</b>
														  <div class="cl">&nbsp;</div>
														 <span class="glyphicon glyphicon-usd"><b> 0 VNĐ</b></span></a>
													</li>
													<li>
														<a class = "t"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanh Toán</b></a>
													</li>										
												</ul>
											<!--<li><a><b><class="btn btn-primary">Giỏ Hàng <span class="badge">0</span></button></b></a></li>-->
											
											



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
      <div class =" container fluid">
        <div class="col-lg-12">
         <ol class="breadcrumb">
			<li><a href="index.php"><B>HOME</B></a></li>
			<li class="active"><B>Liên Hệ</B></a></li>
		</ol>
        </div>
        <div class="row"> 
				<div class="col-md-3" >
						<p class="lead k"> &nbsp <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span><B> &nbsp TÀI KHOẢN</B></p>
						<div class="list-group">
							<b>
								  <div align="center"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="dangnhap.php">Đăng Nhập</a></div><br>
								   <div align="center"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="taotaikhoan.php">Tạo Mới Tài Khoản</a></div><br>
							</b>
						</div>
						
						<p class="lead k"> &nbsp <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span><B> &nbsp SẢN PHẨM</B></p>
						<div class="list-group">
							<b>
								<a href="BanhCuoi.html" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>Bánh Cưới</a2> </a>
								<a href="BanhSinhNhat.html" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>Bánh Sinh Nhật</a2></a>
								<a href="BanhMi.html" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>Bánh Mì</a2></a>
								<a href="BanhTrungThu.html" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>Bánh Trung Thu</a2></a>
								<a href="BanhGaToNgot.html" class="list-group-item"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp <a2>Bánh Ngọt - Gato</a2></a>
							</b>
						</div>
					</div>
          <div class="col-md-8 b">
            <form>
            	<?php
				if (isset($_SESSION['username'])){
				    session_destroy(); // xóa session login
				}
				?>
				<div align="center" ><a href="Index.php" > Cảm Ơn Đã Sử Dụng Dịch Vụ</a></div>
          </form> 
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
	<script>
	function myFunction() {
		document.getElementById("contactForm").reset();
	}
	</script>
