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
$email=$_POST["email"];
$pwd=$_POST["pwd"];
// echo $email;
// echo"<br>";
// echo $pwd;
$md5_pwd=md5($pwd);
require "util/connect.php";

$sql="SELECT * FROM customer WHERE Email='$email'AND Password='$md5_pwd'";
$res=mysql_query($sql);
if($row=mysql_fetch_array($res))
{   
	
	$_SESSION['Time']=time();
	$_SESSION['customer']=$row['CustomerId'];
	$_SESSION['clogin']=$row['CustomerId'];
	require "temp-to-shop.php";
	if(isset($_SESSION['tocheckout']))
	{
		echo "checkout";
	}else{
		echo $_SESSION['customer'];
	}
}
else{
	echo "fail";
}
?>