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
$customer=$_SESSION['customer'];
$cid=$_SESSION['cId'];
$sql="UPDATE tempcart SET customerId='$customer' WHERE cId='$cid'";
mysql_query($sql);

?>