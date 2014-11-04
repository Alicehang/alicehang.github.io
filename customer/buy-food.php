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
	<title>Product | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/buy-food.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php
require "head-part.php";
?>

	<div id="buy-food-all">

		<div id="buy-food">
			<div id="buy-food-left">
				<div id="buy-food-left-img">
					<?php
			    if(isset($_POST["id"]))
			    {
                    $_SESSION["food-id"]=$_POST["id"];
			    	
			    }
				$pro_id= $_SESSION["food-id"];
				// echo $pro_id;
				$sql="SELECT * from product WHERE productId='$pro_id'";
			    

				require "util/connect.php";
			
				$result=mysql_query($sql);
                while($row=mysql_fetch_array($result)){
                	// echo $row['ProductImage'];
                	echo'<img src="http://localhost/mycompany/images/'.$row['ProductImage'].'" height="400" width="600">
					';
					$_SESSION["food-name"]=$row["ProductName"];
					$_SESSION["food-price"]=$row["SalePrice"];
					$_SESSION["food-des"]=$row["ProductDescription"];
					$_SESSION["food-qty"]=$row["ProductQuantity"];
					$_SESSION["food-image"]=$row['ProductImage'];
                }
					
					
					mysql_close($con);	
					?>
				</div>
			</div>

			<div id="buy-food-right">
				<div id="buy-food-name">
					<div id="buy-food-name-left">

						<?php
						echo"<h1>".$_SESSION["food-name"]."</h1>
					";
                        ?>
				</div>
				<div id="buy-food-price">
					<?php
						echo"<h1>$&nbsp;".$_SESSION["food-price"]."</h1>
				";
                        ?>
			</div>
		</div>

		<div id="buy-food-des">
			<?php
						echo"<label>".$_SESSION["food-des"]."</label>
		";
                        ?>
	</div>

	<div id="buy-food-qty">
		<label>Quantity:&nbsp;&nbsp;</label>
		<!--  $row['productQuantity']-->
		<?php
				echo'<input id="buy-food-number" type="number" min="0" max="'.$_SESSION["food-qty"].'"/>
		';
				?>
	</div>

	<div id="buy-food-add-bag">
		<div id="buy-food-add-line">
			<input type="button" id="buy-food-add-bag-btn"value="ADD TO BAG" />
		</div>
	</div>

</div>
</div>

<div id="other-things">
<div id="other-things-title">
	<div id="other-things-head">
		<label>OTHER FOOD YOU MAY LIKE</label>
	</div>
</div>

<div id="other-things-recommend-item">
	<?php 
     $pid=$_SESSION["food-id"];
	require"recommend.php"; ?>
</div>
</div>

</div>

<?php 
require "copyright.php";
?>

<script src="js/buy-food.js"></script>
<script src="js/all-product.js"></script>
</body>
</html>