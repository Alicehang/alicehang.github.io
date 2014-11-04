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
// echo $_SESSION['customer'];
if(!isset($_SESSION['tocheckout']))
{
	$_SESSION['tocheckout']=1;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Out | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/checkout.css">

	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php require "head-part.php" ;?>
	<div id="checkout-all">
		<div id="checkout-head">
			<div id="checkout-head-title">
				<label>CONFIRM &nbsp;INFO &nbsp; & &nbsp; PAYMENT</label>
			</div>
		</div>

		<div id="checkout-address">
			<div id="checkout-address-billing">
				<label>YOUR ORDER</label>
			</div>
		</div>

		<table id="shopping-cart-table">
			<thead>

				<tr>

					<th class="table-image">ITEM IMAGE</th>
					<th class="table-name">ITEM NAME</th>
					<th class="table-price">PRICE</th>
					<th class="table-quantity">QUANTITY</th>
					<th class="table-subtotal">SUBTOTAL</th>
					<!-- <th class="table-remove">REMOVE</th>
				-->
			</tr>
		</thead>
		<tbody id="shopping-cart-table-body">
			<?php
		require "util/checkout-show-table.php";
		$_SESSION["total"]=0;
		
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
			
				<tr class="shopping-cart-table-body-row-x" style="border-top: 1px solid black;">
			<td class="table-image">
				<div class="table-show-items">
					<img src="http://localhost/mycompany/images/'.$roww["ProductImage"].'" height="80" width="120"></div>
			</td>
			<td class="table-name">'.$roww["ProductName"].'</td>

			<td class="table-price" id="sprice['.$roww["ProductId"].']">$'.$roww["SalePrice"].'</td>

			<td class="table-quantity">'.$p_qty.'</td>

			<input type="hidden" id="single-price" value="'.$roww["SalePrice"].'"/>

			<td class="table-subtotal" >
				$
				<label id="p'.$roww["ProductId"].'">'.$p_qty*$roww["SalePrice"].'</label>
				';
				$_SESSION["total"]+=$p_qty*$roww["SalePrice"];
				echo'
			</td>

		</tr>
		';
					
        }
      
		}
	
	
		?>
	</tbody>
</table>

<div id="checkout-total">
	<div class="checkout-total-left">
		<div id="checkout-total-left-text">
			<label>ORDER SUMMARY</label>
		</div>
	</div>
	<div class="checkout-total-middle">
		<div id="checkout-total-middle-text">
			<label>SUBTOTAL</label>
			<br>
			<label>TAX</label>
		</div>
	</div>
	<div class="checkout-total-right">
		<div id="checkout-total-right-text">
			<label>
				$
				<?php echo $_SESSION["total"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<br>
			<label>
				$
				<?php echo $_SESSION["total"]*0.09; ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
		</div>
	</div>

</div>

<div id="checkout-summary">

	<div id="checkout-summary-left-text"></div>

	<div class="checkout-total-middle">
		<div id="checkout-summary-middle-text">
			<label>TOTAL</label>

		</div>
	</div>
	<div class="checkout-total-right">
		<div id="checkout-summary-right-text">
			<label>
				$
				<?php echo $_SESSION["total"]*1.09; ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
		</div>
	</div>

</div>

<div id="checkout-billing-a">
	<div class="checkout-total-left">
		<div class="billing-a-left">
			<label>BILLING ADDRESS</label>
		</div>
	</div>
	<div class="checkout-total-middle">
		<div class="billing-a-middle">
			
			<?php 
			require "util/connect.php";
			$id=$_SESSION['customer'];
			// echo $_SESSION['customer'];
			$sql="SELECT *FROM customer WHERE CustomerId='$id'";
			$res=mysql_query($sql);
			$row=mysql_fetch_array($res);
			echo '<label>'.$row['Firstname'].' '.$row['Lastname'].'</label><br>
			<label>'.$row['Billing'].'</label><br>
			<label>'.$row['City'].', '.$row['State'].'&nbsp; '.$row['Zipcode'].'</label>';
			?>
			

		</div>
	</div>
	<div class="checkout-total-right">
		<div class="billing-a-right">
			<input type="button" class="update-btn"value="UPDATE" onclick="location.href='profile.php'" />
		</div>
	</div>
</div>

<div id="checkout-shipping-a">
	<div class="checkout-total-left">
		<div class="billing-a-left">
			<label>SHIPPING ADDRESS</label>
		</div>
	</div>
	<div class="checkout-total-middle">
		<div class="billing-a-middle">
			
			<?php 
			require "util/connect.php";
			$id=$_SESSION['customer'];
			$sql="SELECT *FROM address WHERE CustomerId='$id'";
			$res=mysql_query($sql);
			$row=mysql_fetch_array($res);
			echo '<label>'.$row['Firstname'].' '.$row['Lastname'].'</label><br>
			<label>'.$row['Address'].'</label><br>
			<label>'.$row['City'].', '.$row['State'].'&nbsp; '.$row['Zipcode'].'</label>';
			?>
			

		</div>
	</div>
	<div class="checkout-total-right">
		<div class="billing-a-right">
			<input type="button" onclick="location.href='update-address.php'" class="update-btn"value="UPDATE"/>
		</div>
	</div>
</div>

<div id="get-to-pay">

		<div id="make-payment">
			<input type="button" id="payment-btn"value="MAKE&nbsp;PAYMENT" onclick="location.href='make-payment.php'"/>
		</div>

</div>

</div>

<?php require "copyright.php";?></body>
</html>