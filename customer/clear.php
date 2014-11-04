<?php

 if(!isset($_SESSION))
{
session_start();
}

if(isset($_SESSION['Time']))
{
	
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
if(isset($_SESSION['customer']))
{
	$customer=$_SESSION['customer'];
	$sql="DELETE FROM tempcart WHERE customerId='$customer'";
}else{
	$cid=$_SESSION['cId'];
	$sql="DELETE FROM tempcart WHERE  cId='$cid'";
}

// $sql="DELETE FROM tempcart WHERE ";
mysql_query($sql);

?>