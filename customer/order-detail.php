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
if(isset($_POST['oid']))
{
	$_SESSION['oid']=$_POST['oid'];
}
// echo $_SESSION['oid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order History | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/order-history.css">

	<link rel="stylesheet" type="text/css" href="css/my-pro.css">
    
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>

	<?php require"head-part.php";?>

	<div id="whole">
		<div id="left">
			<div id="show-sign-up">
				<h1>MY ORDERS</h1>
				<label id="head-label">CLICK ORDER NUMBER TO SEE DETAILS</label>
			</div>
			<table id="od-table">
				<thead>

					<tr>
						<th class="table-number">PRODUCT</th>
						<th class="table-date">QUANTITY</th>
						<th class="table-price">PRICE</th>
					</tr>
				</thead>
				<?php
		require "util/connect.php";
	$oid=$_SESSION['oid'];
		// $sql="SELECT * FROM orders WHERE CustomerId='$cid'";
	$sql="SELECT * FROM orderdetail WHERE OrderId='$oid'";
		$result=mysql_query($sql);
		
		while($row=mysql_fetch_array($result))
		{ 
	
             echo'
				<tbody id="shopping-cart-table-body">
					<tr id="shopping-cart-table-body-row">

                        <td class="table-number">
					<div class="table-show-items">
						<img src="http://localhost/mycompany/images/'.$row["ProductImage"].'" height="80" width="120"></div>
				</td>
					
						<td class="table-number">'.$row["ProductQty"].'</td>
						<td class="table-number" > $ &nbsp;'.$row["ProductPrice"].'</td>
						';
					
        }

		?>
					</table>

				</div>

				<div id="right">
					<?php require 'my-pro.php'; ?></div>

			</div>

			<?php require"copyright.php"; ?>
			 <!-- <script src="js/order-history.js"></script> -->
		
</body>
	</html>