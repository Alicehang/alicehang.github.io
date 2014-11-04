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
	<title>My Account | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<link rel="stylesheet" type="text/css" href="css/my-pro.css">
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
			<label>MY ACCOUNT</label>
		</div>
	</div>

    <div id="all-pro-show-noodle-category">
			<div class="all-pro-show-noodle-title-c">
				<div class="all-pro-show-noodle-title-label-c">
					<label>PROMOTIONS</label>
				</div>
			</div>
			<div class="all-pro-noodle-list">

				<?php 
				require"util/connect.php";
				$sql="SELECT * from specialsale";
				$result=mysql_query($sql);
while($roww=mysql_fetch_array($result))
{
	   
	$sqll="SELECT * from product WHERE productId=$roww[1]";
	$res=mysql_query($sqll);
	while($row=mysql_fetch_array($res)){
        echo'<div class="all-pro-noodle-items-c">

<div id="all-pro-noodle-customer-img" name="img" value="'.$row[0].'" onclick = "c('.$row[0].')" >
	<img  id="img123" src="http://localhost/mycompany/images/'.$row[5].'" height="260" width="380" ></div>
<div class="all-pro-noodle-description">
	<div class="all-pro-noodle-description-left">
		<br>
		<br>
		<a onclick = "c('.$row[0].')" >'.$row[2].'</a>
	</div>
	<div class="all-pro-noodle-description-right">

		<label class="past-price">$ '.$row[4].'</label>
	<br>
	<label class="special-sale-price">$'.$row[8].'</label>
	</div>
</div>
</div>
';
   }      
}


				?>
<?php require"my-pro.php"; ?>
				</div>


		</div>
	<?php 
require "copyright.php";
?>

	<script src="js/all-product.js"></script>
</body>
</html>