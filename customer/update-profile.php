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

$firstname=$_POST["rfirstname"];
$lastname=$_POST["rlastname"];
$address=$_POST["raddress"];
$city=$_POST["rcity"];
$state=$_POST["rstate"];
$zipcode=$_POST["rzipcode"];
$pwd=$_POST["rpwd"];
$cid=$_SESSION['customer'];
require "util/connect.php";
if($pwd=="")
{
	$sql="UPDATE customer 
  SET Firstname='$firstname',Lastname='$lastname',Address='$address',City='$city',State='$state',Zipcode='$zipcode'
  WHERE CustomerId='$cid'";
}else{
$md5_pwd=md5($pwd);

$sql="UPDATE customer 
  SET Firstname='$firstname',Lastname='$lastname',Address='$address',City='$city',State='$state',Zipcode='$zipcode',Password='$md5_pwd'
  WHERE CustomerId='$cid'";
  }
mysql_query($sql);

mysql_close($con);

if(isset($_SESSION['tocheckout']))
{
	require "checkout.php";
}else{
	require "profile.php";
}
?>
