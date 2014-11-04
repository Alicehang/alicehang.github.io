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

						<th class="table-number">ORDER NUMBER</th>
						<th class="table-date">ORDER DATE</th>
						<th class="table-price">TOTAL</th>
					</tr>
				</thead>
				<?php
		require "util/connect.php";
		 $cid=$_SESSION['customer'];
		$sql="SELECT * FROM orders WHERE CustomerId='$cid'";
	// $sql="SELECT * FROM orders ";
		$result=mysql_query($sql);
		
		if(mysql_num_rows($result)>
				0)
		{
		while($row=mysql_fetch_array($result))
		{ 
		// $i=1;
        // $o_id=$row["OrderId"];
        // $o_date=$row["OrderDate"];
             echo'
				<tbody id="shopping-cart-table-body">
					<tr id="shopping-cart-table-body-row">

						<td class="table-number" >
						<div id="'.$row["OrderId"].'" class="order-link" onclick="seeDetail(this.id)">'.$row["OrderId"].'</div>
						</td>
						<td class="table-number">'.$row["OrderDate"].'</td>
						<td class="table-number" >'.$row["Total"].'</td>
						';
					
        }

		}
		else{
			echo '
						<tbody>
							<tr id="shopping-cart-table-body-row" >
								<td colspan="3" >
									<div id="no-pro-in-bag">
										<div id="no-pro-in-bag-2">THERE ARE NO ORDER HISTOTY IN YOUR ACCOUNT.</div>
									</div>
								</td>
							</tr>
						</tbody>
						'
			;
		}
		?>
					</table>

				</div>

				<div id="right">
					<?php require 'my-pro.php'; ?></div>

			</div>

			<?php require"copyright.php"; ?>
			 <script src="js/order-history.js"></script>
		
</body>
	</html>