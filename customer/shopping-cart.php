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
	<title>My Shopping Bag | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/try.css">
	<link rel="stylesheet" type="text/css" href="css/my-pro.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>

	<?php
require "head-part.php";
?>
<div id="whole-all">
	<div id="shopping-bag">
		<div id="shopping-cart-head">
			<div id="shopping-cart-title">
				<h1>MY SHOPPING BAG</h1>
			</div>
		</div>

		<!--	<div id="shopping-cart-show-item"></div>
	-->
	<table id="shopping-cart-table">
		<thead>

			<tr>

				<th class="table-image">ITEM IMAGE</th>
				<th class="table-name">ITEM NAME</th>
				<th class="table-price">PRICE</th>
				<th class="table-quantity">QUANTITY</th>
				<th class="table-subtotal">SUBTOTAL</th>
				<th class="table-remove">REMOVE</th>
			</tr>
		</thead>
		<?php
		require "util/select-from-cart.php";
		$_SESSION["total"]=0;
		if(mysql_num_rows($result)>
		0)
		{
		while($row=mysql_fetch_array($result))
		{ 
		$i=1;
        $p_id=$row["productId"];
        $p_qty=$row["productQty"];
        $sqll="SELECT * FROM product WHERE ProductId='$p_id'";
        $res=mysql_query($sqll);
        while($roww=mysql_fetch_array($res))
        {
              echo'
		<tbody id="shopping-cart-table-body">
			<tr id="shopping-cart-table-body-row">
				<td class="table-image">
					<div class="table-show-items">
						<img src="http://localhost/mycompany/images/'.$roww["ProductImage"].'" height="80" width="120"></div>
				</td>
				<td class="table-name">'.$roww["ProductName"].'</td>

				<td class="table-price" id="sprice['.$roww["ProductId"].']">$'.$roww["SalePrice"].'</td>

				<td class="table-quantity-edit">

					<div class="table-quantity-change">
						<input class="table-quantity-number-v" id="q'.$roww["ProductId"].'"type="number" value="'.$p_qty.'"min="1" max="'.$roww["ProductQuantity"].'"/>

					</div>
					<div class="table-quantity-update">

						<input class="table-quantity-update-btn"  id="'.$roww["ProductId"].'"type="button" value="UPDATE" onclick="updateQuantity(this.id)"/>
					</div>
				</td>

				<input type="hidden" id="single-price" value="'.$roww["SalePrice"].'"/>

				<td class="table-subtotal" >
					$
					<label id="p'.$roww["ProductId"].'">'.$p_qty*$roww["SalePrice"].'</label>
					';
				$_SESSION["total"]+=$p_qty*$roww["SalePrice"];
				  // $_SESSION["cart"][$roww['productId']]["quantity"]=$p_qty;
				 // $_SESSION["cart"][$roww['productId']]["price"]=$roww["SalePrice"];
				echo'
				</td>
				<td class="table-remove" >
					<div class="table-remove-logo">
						<div class="table-remove-logo-x" id="r'.$roww["ProductId"].'" onclick="itemRemove(this.id)">
							<label>x</label>
						</div>
					</div>
				</td>

			</tr>

		</tbody>
		';
					
        }
      
		}
		}
		else{
			echo '
		<tbody>
			<tr id="shopping-cart-table-body-row" >
				<td colspan="6" >
					<div id="no-pro-in-bag">
						<div id="no-pro-in-bag-2">THERE ARE NO PRODUCTS IN YOUR SHOPPING BAG.</div>
					</div>
				</td>
			</tr>
		</tbody>
		'
			;
		}
		?>
	</table>

	<diV id="continue-shopping">
		<div id="continue-shopping-left">
			<div id="continue-shopping-left-logo">
				<div id="continue-shopping-left-logo-label">
					<label >
						YOU WILL RECEIVE FOOD
						<br>
						<span style="font-size:1.5em">IN AN HOUR</span>
					</label>
				</div>
			</div>
		</div>
		<div id="continue-shopping-right">
			<div id="continue-shopping-right-text">
				<div id="continue-shopping-right-text-css">
					<label>
						TOTAL
						<span style="font-size:0.6em">Tax not included</span>
					</label>
				</div>
			</div>
			<div id="continue-shopping-right-total">
				<div id="continue-shopping-right-total-css">
					$
					<label id="total-change-price">
						<?php
					echo $_SESSION["total"];
					?></label>
				</div>
			</div>
			<div id="continue-shopping-right-payway">
				<div id="continue-shopping-right-payway-desc">
					<label>Pay in the following ways:</label>
				</div>
				<div id="continue-shopping-right-payway-logo">
					<img src="logo/pay.png" height="70" width="140"></div>
			</div>
			<div class="continue-shopping-right-btn">
			<input type="button" value="CLEAR SHOPPING BAG" id="continue-shopping-right-btn-css-2" onclick="clearAll()"/>

			</div>
			<div class="continue-shopping-right-btn" >
				<input type="button" <?php echo'name="'.$_SESSION["clogin"].'"'; ?> id="continue-shopping-right-btn-css" value="PROCESS TO CHECKOUT" onclick="checkOut(this.name)"/>
			</div>


			
		</div>
	</diV>

</div>
<?php require "my-pro.php"; ?>
</div>
<?php 
require "copyright.php";
?>
<script src="js/shopping-cart.js"></script>
<script src="js/buy-food.js"></script>
<script src="js/my-pro.js"></script>
</body>
</html>