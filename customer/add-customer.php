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
$email=$_POST["remail"];
$gender=$_POST["gender"];
$firstname=$_POST["rfirstname"];
$lastname=$_POST["rlastname"];
$address=$_POST["raddress"];
$city=$_POST["rcity"];
$state=$_POST["rstate"];
$zipcode=$_POST["rzipcode"];
$pwd=$_POST["rpwd"];
/*
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $zipcode;
echo "<br>";
echo $pwd;*/
require "util/connect.php";
$md5_pwd=md5($pwd);
$sql="INSERT INTO customer (Email,Password,Gender,Firstname,Lastname,Address,City,State,Zipcode,Billing) 
     VALUES('$email','$md5_pwd','$gender','$firstname','$lastname','$address','$city','$state','$zipcode','$address')";
mysql_query($sql);

$sqll="SELECT * FROM customer WHERE Email='$email'AND Password='$md5_pwd'";
$res=mysql_query($sqll);
while($row=mysql_fetch_array($res))
{
// $_SESSION['customer']=$row['CustomerId'];
$cid=$row['CustomerId'];
$sql="INSERT INTO address (CustomerId,Firstname,Lastname,Address,City,State,Zipcode) 
     VALUES('$cid','$firstname','$lastname','$address','$city','$state','$zipcode')";
     mysql_query($sql);
}

// echo $_SESSION['customer'];
mysql_close($con);
require "login.php";
?>
