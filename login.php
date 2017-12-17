<?php session_start(); 
if ((isset($_SESSION['username'])||isset($_SESSION['password']))) {header('Location: quanly.php?tmp=Account');}
elseif(isset($_SESSION['a'])){ echo '<script>alert("User or Pass is wrong");</script>'; $_SESSION['a']=null;}

?>
<html>   
<head>
   <!-- <script src="https://use.typekit.net/ayg4pcz.js"></script> -->
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link href="../css/dangnhap.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>dangnhap</title>
</head>
<body>
    <div class="container">
    <img src="../img/logo.png" class="welcome"/>
        <div class="card card-container">
        <h2 class='login_title text-center'>Login</h2>
        <hr>
            <form action="login1.php" method="POST" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">ID</p>
                <input type="text" name="user" id="inputID" class="login_box" placeholder="UserName" required autofocus>
                <p class="input_title">Password</p>
                <input type="password" name="pass" id="inputPassword" class="login_box" placeholder="******" required>
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
				<?php for($i=0;$i<10;$i++){echo "&nbsp;"; }?><a href="addNewUser.php">Đăng kí</a><?php for($i=0;$i<30;$i++){echo "&nbsp;"; }?><a href="quenmatkhau.php">Quên mật khẩu</a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
