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
$firstname=$_POST["rfirstname"];
$lastname=$_POST["rlastname"];
$address=$_POST["raddress"];
$city=$_POST["rcity"];
$state=$_POST["rstate"];
$zipcode=$_POST["rzipcode"];
$cid=$_SESSION['customer'];
require "util/connect.php";

$sql="UPDATE address 
  SET Firstname='$firstname',Lastname='$lastname',Address='$address',City='$city',State='$state',Zipcode='$zipcode'
  WHERE CustomerId='$cid'";
mysql_query($sql);

mysql_close($con);

require "checkout.php";
?>
