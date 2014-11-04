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

require "util/connect.php";
$cid=$_SESSION['customer'];
$o_date=gmdate("M d Y");
$total=$_SESSION['total']*1.09;
// echo "line6";
$sq="INSERT INTO orders (OrderDate,CustomerId,Total)
VALUES('$o_date','$cid','$total')";
mysql_query($sq);
// echo "line 10";
$sq2="SELECT * FROM orders WHERE OrderDate='$o_date' AND CustomerId='$cid' AND Total='$total'";
$re=mysql_query($sq2);
while ($roww=mysql_fetch_array($re))
{
$oid=$roww["OrderId"];
}
//select all products in the tempcart
$sql="SELECT * FROM tempcart WHERE customerId='$cid'";

$res=mysql_query($sql);

while($row=mysql_fetch_array($res))
{
 $pid=$row['productId'];
 $price=$row['productPrice'];
 $qty=$row['productQty'];
 $sql="SELECT * FROM product WHERE ProductId='$pid'";
 $ress=mysql_query($sql);
 $roww=mysql_fetch_array($ress);
 $img=$roww['ProductImage'];
 $ca=$roww['ProductCategoryId'];
 $sqll="INSERT INTO orderdetail(OrderId,ProductId,ProductQty,ProductPrice,ProductImage,category)
 VALUES('$oid','$pid','$qty','$price','$img','$ca')";
  mysql_query($sqll);
}

$sql3="DELETE FROM tempcart WHERE customerId='$cid'";
mysql_query($sql3);
unset($_SESSION['total']);
unset($_SESSION['tocheckout']);

require"finish.php";
 ?>
