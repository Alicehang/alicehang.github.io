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

require "connect.php";
$id=$_POST["did"];

// $c_login=$_SESSION["clogin"];
if(isset($_SESSION['customer']))
{
	$customer=$_SESSION['customer'];
	$sql="DELETE FROM tempcart WHERE productId=$id AND customerId='$customer'";
}else{
	$cid=$_SESSION['cId'];
	$sql="DELETE FROM tempcart WHERE productId=$id AND cId='$cid'";
}

	

	$result=mysql_query($sql);


?>
