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
$_SESSION['i']=0;
if(isset($_SESSION['customer']))
{
	$customer=$_SESSION['customer'];
	$c_id=0;
}else{
	$customer=0;
	if(!isset($_SESSION["cId"]))
	{
	$_SESSION["cId"]=$_SESSION['i'];
	$_SESSION["i"]+=1;
	}	
	$c_id=$_SESSION["cId"];
}


if(!isset($_SESSION["clogin"]))
{
	$_SESSION["clogin"]=0;
}

if(isset($_POST["number"]))
{
	 $_SESSION["item-number"]=$_POST["number"];
}
 echo "item-number".$_SESSION["item-number"];
// echo"<br>";

require "connect.php";
$f_id=$_SESSION["food-id"];
$f_num=$_SESSION["item-number"];
$f_price=$_SESSION["food-price"];
// $c_login=$_SESSION["clogin"];
// $c_id=$_SESSION["cId"];
echo "f_id ".$f_id;
echo " f_num ".$f_num;
// $_SESSION["food-id"]=0;
// $_SESSION["item-number"]=0;


// echo " Session judge ".$_SESSION["judge"][$f_id];
/*if(!isset($_SESSION["temp-cid"]))
{
$_SESSION["temp-cid"]=1;
}

$temp_cid=$_SESSION["temp-cid"];

if($c_login==0)
{   
	    $sq="SELECT * FROM tempcart WHERE productId=$f_id";
		$re=mysql_query($sq);
		
        $len=mysql_num_rows($re);
         echo "row" .$len;
	if( $len > 0)
	{
		echo " 1 here";
		$row=mysql_fetch_array($re);
		$add_qty=$row['productQty']+$f_num;
		$sql="UPDATE tempcart SET productQty=$add_qty WHERE productId=$f_id";
		
	
	}
		else{
			echo "2 here";
			// $_SESSION["judge"][$f_id]=1;
	     $sql="INSERT INTO tempcart (customerId,cId,productId,productQty,ProductPrice)VALUES('$temp_cid','$f_id','$f_num')";
		

	}
// $_SESSION["temp-cid"]+=1;
}
else{
	if(isset($_SESSION["judge"][$f_id]))
	{ 
		echo "3 here";
		$sq="SELECT * FROM shoppingcart WHERE productId=$f_id";
		$re=mysql_query($sq);
		$row=mysql_fetch_array($re);
		$add_qty=$row['productQty']+$f_num;
		$sql="UPDATE shoppingcart SET productQty=$add_qty WHERE productId=$f_id";
	}
	else{
		echo "4 here";
		$_SESSION["judge"][$f_id]=1;
	$sql="INSERT INTO shoppingcart(customerId,productId,productQty,login) VALUES('$c_id','$f_id','$f_num',1)";
}

}
if( $len > 0)
	{
		echo " 1 here";
		$row=mysql_fetch_array($re);
		$add_qty=$row['productQty']+$f_num;
		$sql="UPDATE tempcart SET productQty=$add_qty WHERE productId=$f_id";
		
	
	}
		else{
			echo "2 here";
			// $_SESSION["judge"][$f_id]=1;
	     $sql="INSERT INTO tempcart (customerId,productId,productQty)VALUES('$temp_cid','$f_id','$f_num')";
		

	}*/
	    $sq="SELECT * FROM tempcart WHERE productId=$f_id AND cId=$c_id AND customerId=$customer";
		$re=mysql_query($sq);
		
        $len=mysql_num_rows($re);
         // echo "row" .$len;
	if( $len > 0)
	{
		echo " 1 here";
		$row=mysql_fetch_array($re);
		$add_qty=$row['productQty']+$f_num;
		$sql="UPDATE tempcart SET productQty=$add_qty WHERE productId=$f_id AND cId=$c_id AND customerId=$customer";

		
	}
		else{
			echo "2 here";
			// $_SESSION["judge"][$f_id]=1;
	     $sql="INSERT INTO tempcart (customerId,cId,productId,productQty,ProductPrice)VALUES('$customer','$c_id','$f_id','$f_num','$f_price')";
		

	}
	$result=mysql_query($sql);

?>