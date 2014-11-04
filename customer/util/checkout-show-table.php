<?php 
// $temp_id=$_SESSION["temp-cid"];
// $c_id=$_SESSION["customer"];
// $c_login=$_SESSION["clogin"];
        require "util/connect.php";
      
                $sql="SELECT *FROM tempcart ";
        
        $result=mysql_query($sql);
?>