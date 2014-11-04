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
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>

     
<script type="text/javascript">
	alert("YOU ARE LOGGING OUT...");
</script>


<?php 
					if(isset($_SESSION['customer']))
							{
							unset($_SESSION['customer']);
	}
session_destroy();
					?>
	<script type="text/javascript">
	location.href="homepage.php";
</script>
</body>
</html>



					