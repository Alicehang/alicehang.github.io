<?php 

require "util/connect.php";
$f_id=$_SESSION["food-id"];
$f_num=$_SESSION["item-number"];
$sql="INSERT INTO tempcart (pId,pQuantity)VALUES('$f_id','$f_num')";
$result=mysql_query($sql);
?>