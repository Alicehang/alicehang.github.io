<?php

 if(!isset($_SESSION))
{
session_start();
}

if(isset($_SESSION['Time']))
{
	// echo'<script type="text/javascript">alert("set time");</script>';
	if((time()-$_SESSION['Time'])>600)
{
  session_destroy();
  echo'
  <script type="text/javascript">
  window.alert("login time longer than 10min");
   location.href="homepage.php";
  </script>
   ';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>

<?php require "head-part.php";?>
	<div class="width">
		<div  class="sign_in sign_in_width">
			<header class="sign_in_header sign_in_width">
				<h1 >SIGN IN</h1>
				<h3>
					ENJOY YOUR FASTER, EASIER ORDERING PROCESS - EVERY TIME YOU SIGN IN.
				</h3>
			</header>
			<div  class="login">
				<div id="two_part">
					<div id="login_left">
						<h3>
							NEW TO
							<span style="color:#F00">Noodle & Rice</span>

						</h3>

						<a class="a_style" href="register.php">
							<input type="button" class="reg" value="SIGN UP"/>
						</a>
					</div>
					<div id="login_right">
						<div id="in_header">
							<h3>LOGIN WITH YOUR EMAIL</h3>
						</div>
						<div id="in_left">
							<div class="login_in">
								<label>EMAIL ADDRESS</label>
							</div>
							<div class="login_in">
								<label>PASSWORD</label>
							</div>
							<div class="login_in">
								<label style="color:#f00">FORGET IT ?</label>
							</div>
						</div>
						<div id="in_right">
							<form  >
								<input type="text" id="login_email"name="login_email" class="login_in in_text"/>
								<input type="password" id="login_password"name="login_password"class="login_in in_text"/>
								<input type="button" class="login_in form-button" value="SIGN IN" onclick="loginCheck()"/>
								<div id="authentication" style="display:none">
									<label style="color:#f00">&nbsp;Authentication Failed</label>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/login.js"></script>
</body>
</html>