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

$result=mysql_query($sql);
while($roww=mysql_fetch_array($result))
{
	   
	$sqll="SELECT * from product WHERE productId=$roww[1]";
	$res=mysql_query($sqll);
	while($row=mysql_fetch_array($res)){
        echo'<div class="all-pro-noodle-items-c">

<div id="all-pro-noodle-customer-img" name="img" value="'.$row[0].'" onclick = "c('.$row[0].')" >
	<img  id="img123" src="http://localhost/mycompany/images/'.$row[5].'" height="260" width="404" ></div>
<div class="all-pro-noodle-description">
	<div class="all-pro-noodle-description-left">
		<br>
		<br>
		<a onclick = "c('.$row[0].')" >'.$row[2].'</a>
	</div>
	<div class="all-pro-noodle-description-right">

		<label class="past-price">$ '.$row[4].'</label>
	<br>
	<label class="special-sale-price">$'.$row[8].'</label>
	</div>
</div>
</div>
';
   }      
}

?>