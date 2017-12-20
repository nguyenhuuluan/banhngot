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
  <?php

  include('connec.php');  
  $error='';
  if(isset($_POST['dangki'])){

    $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    $UserName = $_POST['txtuser'];
    $password = $_POST['password'];
    $email = $_POST['txtemail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    $result ="select * from account where username = '$UserName'";
    $kq = mysqli_query($conn,$result);
    $row = mysqli_fetch_array($kq);
    $result2 ="select * from account where email= '$email'";
    $kq2 = mysqli_query($conn,$result2);
    $row2 = mysqli_fetch_array($kq2);
    if(count($row)>0)
    { 
      $error="Tên đăng nhập đã tồn tại trong hệ thống!";
    }elseif(count($row2)>0){
      $error="Email đã tồn tại trong hệ thống!";
    }
    else{
      if(strlen($UserName)<4||strlen($password)<4)
      {
        $error="UserName hoặc password it nhat phai co 4 ki tu";
      }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        $error = "Invalid email format"; 
      }
      else{
        //add new user
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        $sql="insert into account(username,password,email,diachi,phone) values('$UserName','$password','$email', '$address','$phone')";
        if(mysqli_query($conn,$sql))
        {
          header('Refresh:0;thankyou2.php');
        }
      }
    }





  // if(password_verify ( "rasmuslerdorf" , $tmp )){
  //  echo "true";
  }
  //end of create
  //edit

  ?>
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
                          <a class = "t"> <span class="glyphicon glyphicon-shopping-cart"></span><b>&nbsp;&nbsp;&nbsp;0 Sản Phẩm</b>
                            <div class="cl">&nbsp;</div>
                            <span class="glyphicon glyphicon-usd"><b> 0 VNĐ</b></span></a>
                          </li>
                          <li>
                            <a class = "t"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanh Toán</b></a>
                          </li>                   
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
                <li><a href="index.php"><B>HOME</B></a>
                </li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3" >
              <p class="lead k"> &nbsp <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span><B> &nbsp TÀI KHOẢN</B></p>
              <div class="list-group">
                <b>
                  <div align="center"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="login.php">Đăng Nhập</a></div><br>
                  <div align="center"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="taotaikhoan.php">Tạo Mới Tài Khoản</a></div><br>
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
            <div class="col-md-8 b"> 
              <h3 align="center">Tạo Mới Tài Khoản</h3> 
              <form name="createAccount" id="createForm" method="POST" action=""> 
                <div class="control-group form-group"> <div class="controls"> 
                  <label>Tên Đăng Nhập:</label> 
                  <input type="text" class="form-control" name="txtuser" required pattern="[A-Za-z0-9]{1,15}"> 
                  <p class="help-block">
                  </p> 
                </div> 
              </div> 
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <label>Mật Khẩu:</label> 
                  <input type="password" class="form-control" id="password" name="password" required> 
                </div> 
              </div>
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <label>Ghi Lại Mật Khẩu:</label> 
                  <input type="password" class="form-control" id="confirm_password" required> 
                </div> 
              </div>
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <label>Địa chỉ Email:</label> 
                  <input type="email" class="form-control" name="txtemail" required data-validation-required-message="Please enter your email address."> 
                </div> 
              </div>
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <label>Số điện thoại:</label> 
                  <input type="tel" class="form-control" name="phone" required pattern="[0-9]{1,15}" data-validation-required-message="Please enter your phone number."> 
                </div> 
              </div>
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <label>Địa chỉ:</label> 
                  <input type="tel" class="form-control" name="address" required data-validation-required-message="Please enter your phone number."> 
                </div> 
              </div>
              <div class="control-group form-group"> 
                <div class="controls"> 
                  <?php echo '<span style="color:red;"> '.$error.' </span>'?>
                </div> 
              </div> 


              <div align="center">
                <button type="submit" name="dangki" class="btn btn-primary">Đăng Kí Mới
                </button> 
              </div>
            </form> 
            
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
      <script type="text/javascript">
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

      </script>

      
      </html>