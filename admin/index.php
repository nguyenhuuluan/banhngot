<?php session_start(); 
if(isset($_SESSION['username']) && isset($_SESSION['admin'])){
    header("location: quanly.php");
}

include("connec.php");
if(isset($_POST['login'])){
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $result ="select * from account where username = '$username' and password = '$password'";
    $kq = mysqli_query($conn,$result);
    $row = mysqli_fetch_array($kq);
    if(count($row)>0)
    {  
        if($row['username']=='admin')
        {  
            $url="quanly.php";
            header("location: $url");
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = 'admin';
        }else
        {
            $_SESSION['username'] = null;
        }
    } 
    else 
    {       
        $_SESSION['username'] = null;
        $message = "Sai tên tài khoản hoặc mật khẩu";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}






?>
<html>   
<head>
   <!-- <script src="https://use.typekit.net/ayg4pcz.js"></script> -->
   <script>try{Typekit.load({ async: true });}catch(e){}</script>
   <link href="../css/dangnhap.css" rel="stylesheet">
   <meta charset="utf-8">
   <title>Đăng Nhập</title>
</head>
<body>
    <div class="container">
        <img src="img/logo.png" class="welcome"/>
        <div class="card card-container">
            <h2 class='login_title text-center'>Login</h2>
            <hr>
            <form action="" method="POST" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">ID</p>
                <input type="text" name="user" id="inputID" class="login_box" placeholder="UserName" required autofocus>
                <p class="input_title">Password</p>
                <input type="password" name="pass" id="inputPassword" class="login_box" placeholder="******" required>
                <button class="btn btn-lg btn-primary" name="login" type="submit">Login</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
