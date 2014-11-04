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
        if(isset($_SESSION['customer']))
        {
                $customer=$_SESSION['customer'];
        	$sql="SELECT *FROM tempcart WHERE customerId='$customer'";
        }
        else 
        { 
                $c_id=$_SESSION["cId"];
        	$sql="SELECT *FROM tempcart WHERE cId='$c_id'";
        }
        $result=mysql_query($sql);
?>