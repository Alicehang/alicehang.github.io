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
	<title>ALL DESSERTS | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php
require "head-part.php";
?>
	<div id="all-pro-label">
		<div id="all-pro-img">
			<img id="all-pro-image"src="logo/glyphicons_155_show_big_thumbnails.png" height="26" width="26"/>

		</div>
		<div id="all-pro-logo">
			<label>ALL DESSERTS</label>
		</div>
	</div>

    <div id="all-pro-show-noodle-category">
			<div class="all-pro-show-noodle-title-c">
				<div class="all-pro-show-noodle-title-label-c">
					<label>DESSERTS</label>
				</div>
			</div>
			<div class="all-pro-noodle-list">

				<?php 
				require"util/connect.php";
				$sql="SELECT * from product WHERE ProductCategoryId='3'";
				require "show-product-category.php";
				?></div>

		</div>
	<?php 
require "copyright.php";
?>

	<script src="js/all-product.js"></script>
</body>
</html>