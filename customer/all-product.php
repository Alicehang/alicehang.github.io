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
	<title>All Product | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<script src="js/jquery-1.11.1.min.js"></script></head>
<body>
	<?php require"head-part.php"; ?>
	<div id="all-pro-label">
		<div id="all-pro-img">
			<img id="all-pro-image"src="logo/glyphicons_155_show_big_thumbnails.png" height="26" width="26"/>

		</div>
		<div id="all-pro-logo">
			<label>ALL PRODUCTS</label>
		</div>
	</div>

	<div id="all-pro">

		<div id="all-pro-total">
			<div id="all-pro-text">
				<div id="all-pro-text-label">
					<label >ALL PRODUCTS</label>
				</div>
			</div>

			<div id="all-pro-pic">
				<img src="picture/main.jpg" height="480" width="800"></div>
		</div>

		<div id="all-pro-hop">
			<div class="all-pro-hop-list" onclick="location.href='#all-pro-hop'">
				<div class="hop-list-center">
					<label>NOODLE</label>
				</div>
			</div>
			<div  class="all-pro-hop-list" onclick="location.href='#all-pro-show-rice'">
				<div class="hop-list-center">
					<label>RICE</label>
				</div>
			</div>
			<div  class="all-pro-hop-list" onclick="location.href='#all-pro-show-dessert'">
				<div class="hop-list-center">
					<label>DESSERT</label>
				</div>
			</div>
			<div class="all-pro-hop-list" onclick="location.href='#all-pro-show-drink'">
				<div style=" border-right:none;"class="hop-list-center">
					<label>DRINK</label>
				</div>
			</div>
		</div>

		<div id="all-pro-show-noodle">
			<div class="all-pro-show-noodle-title">
				<div class="all-pro-show-noodle-title-label">
					<label>NOODLES</label>
				</div>
			</div>
			<div class="all-pro-noodle-list">

				<?php 
				require"util/connect.php";
				$sql="SELECT * from product WHERE ProductCategoryId='1'";
				require "show-product-main.php";
				?></div>

		</div>

		<div class="all-pro-show-234" id="all-pro-show-rice">
			<div class="all-pro-show-more">
				<input type="button" class="all-pro-show-234-btn" value="SHOP ALL" onclick="location.href='noodle.php'"/>
			</div>
			<div class="all-pro-show-noodle-title">
				<div class="all-pro-show-noodle-title-label">
					<label>RICE</label>
				</div>
			</div>

			<div class="all-pro-noodle-list">

				<?php 
				
				$sql="SELECT * from product WHERE ProductCategoryId='2'";
				require "show-product-main.php";
				?></div>
		</div>

		<div id="all-pro-show-dessert" class="all-pro-show-234" >
			<div class="all-pro-show-more">
				<input type="button" class="all-pro-show-234-btn" value="SHOP ALL" onclick="location.href='rice.php'"/>
			</div>
			<div class="all-pro-show-noodle-title">
				<div class="all-pro-show-noodle-title-label">
					<label>DESSERTS</label>
				</div>
			</div>

			<div class="all-pro-noodle-list">

				<?php 
				
				$sql="SELECT * from product WHERE ProductCategoryId='3'";
				require "show-product-main.php";
               
				?></div>
		</div>

		<div id="all-pro-show-drink" class="all-pro-show-234">
			<div class="all-pro-show-more">
				<input type="button" class="all-pro-show-234-btn" value="SHOP ALL" onclick="location.href='dessert.php'"/>
			</div>
			<div class="all-pro-show-noodle-title">
				<div class="all-pro-show-noodle-title-label">
					<label>DRINKS</label>
				</div>
			</div>

			<div class="all-pro-noodle-list">

				<?php 
				
				$sql="SELECT * from product WHERE ProductCategoryId='4'";
				require "show-product-main.php";
                mysql_close($con);
				?></div>
		</div>
		<div class="all-pro-show-more" style="border:none">
			<input type="button" class="all-pro-show-234-btn" value="SHOP ALL" onclick="location.href='drinks.php'"/>
		</div>
	</div>

	<div id="copy-right">
		<label>
			@ Xiaoya Hang All rights reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Privacy Policy&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp;Terms + Conditions
		</label>
	</div>

	<script src="js/all-product.js"></script>
</body>
</html>