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
	<title>Home Page | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css"></head>
<body>

<?php require"head-part.php"; ?>
		<div id="show-food">
			<div id="show-left">
				<img src="picture/chef/o-FEMALE-CHEF-facebook.jpg" height="600" width="500"></div>
			<div id="show-right">
				<img src="picture/chef/Classic-Short-Sleeves-Chef-Coat--X-large--White-_20090665909.jpg" height="600" width="500"></div>
			<div id="show-text">
				<div id="show-motto">
					<label >HEALTHY FOOD</label>
					<label style="font-size:41px">GOOD TASTE</label>
				</div>
				<div id="show-description">
					<label>Let us help you make a good choice, eat healthier!</label>
				</div>
				<div id="show-all" onclick="location.href='all-product.php'">
					<a id="show-all-a"href="all-product.php">SEE ALL PRODUCT</a>
				</div>
			</div>

		</div>

		<div id="copy-right">
			<label>@ Xiaoya Hang All rights reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Privacy Policy&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp;Terms + Conditions</label>
		</div>
</body>
	</html>