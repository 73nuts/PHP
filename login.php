<?php
session_start();
header('Content-Type:text/html; charset= utf-8');
include 'inc/conn.php';

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    $u = $_POST['username'];
    $p = $_POST['password'];
    
    $sql = "select * from admin where username= '$u' and password='$p'";
    $res = mysqli_query($link, $sql);
    $res = mysqli_fetch_array($res);
    if (isset($_REQUEST['authcode'])) {
        

        if (strtolower($_REQUEST['authcode']) == $_SESSION['authcode'] && $res != null) {
            // 跳转页面
            echo "<script language=\"javascript\">";
            echo "document.location=\"./admin/index.php\"";
            echo "</script>";
        } else {
            // 提示以及跳转页面
            $_SESSION['log'] = 1;
            echo "<script language=\"javascript\">";
            echo "alert('登录失败!');";
            echo "document.location=\"./login.php\"";
            echo "</script>";
        }
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="./Css/style.css">
</head>
<body>
	<!-- partial:index.partial.html -->
	<div class="panda">
		<div class="ear"></div>
		<div class="face">
			<div class="eye-shade"></div>
			<div class="eye-white">
				<div class="eye-ball"></div>
			</div>
			<div class="eye-shade rgt"></div>
			<div class="eye-white rgt">
				<div class="eye-ball"></div>
			</div>
			<div class="nose"></div>
			<div class="mouth"></div>
		</div>
		<div class="body"></div>
		<div class="foot">
			<div class="finger"></div>
		</div>
		<div class="foot rgt">
			<div class="finger"></div>
		</div>
	</div>
	<form  action="" method="post">
		<div class="hand"></div>
		<div class="hand rgt"></div>
		<h1>Panda Login</h1>
		<div class="form-group">
			<input name="username" required="required" class="form-control" /> <label
				class="form-label">用户名 </label>
		</div>
		<div class="form-group">
			<input name="password" id="password" type="password" required="required"
				class="form-control" /> <label class="form-label">密码</label>
				</div>
		  		<div class="form-group">
			<input name='authcode'  required="required" class="form-control" /> <label
				class="form-label">验证码 </label>
		</div>		

  <p>验证码: <img id="captcha_img" border='1' src='./captcha.php?r=echo rand(); ?>' style="width:100px; height:30px" />
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captcha.php?r='+Math.random()">换一个?</a>
  </p>


			<p class="alert">无效用户名或密码!!</p>
			<button class="btn" name="submit">登录</button>
		</div>


</form>
	<!-- partial -->
	<script
		src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="./Js/script.js"></script>
	<script type="text/javascript" src="./Js/login.js"></script>

</body>
</html>
