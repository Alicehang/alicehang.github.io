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
	<title>Order Placed | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/finish.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	
<?php require"head-part.php";?>

<div id="register">
	<div id="show-sign-up">
		<h1>THANK YOU FOR PLACING AN ORDER !</h1>
	</div>

	<div id="go-to-login">
		<h3>
			DO YOU WANT TO CONTINUE SHOPPING ?
		</h3>
		<input id="go-to-login-btn"type="button" onclick="location.href='all-product.php'"value="CONTINUE SHOPPING"/>
	</div>



		
</div>


<?php require"copyright.php";?>
<script src="js/register.js"></script>
</body>
</html>