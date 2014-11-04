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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Shipping Address | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/update-address.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	
<?php require"head-part.php";?>

<div id="register">

	<div id="reg-content">
		<div id="reg-header">
			<h1>SHIP TO A NEW ADDRESS</h1>
			
		</div>

		<div id="reg-fill-in">
			<form id="form-reg" name="form-reg" method="post" action="add-address.php" onsubmit="return checkAddress()">
					<div class="reg-input-text">
						<div class="reg-left">
							<div class="reg-label">
								<label>FIRST NAME *</label>
							</div>
						</div>

						<div class="reg-right">
							<input type="text" name="rfirstname"id="lfirstname"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
						</div>
						<div class="invalid-infor" id="cfirstname">
							<div class="invalid-infor-css">
								<label>invalid</label>
							</div>
						</div>
					</div>
					<div class="reg-input-text">
						<div class="reg-left">
							<div class="reg-label">
								<label>LAST NAME *</label>
							</div>
						</div>

						<div class="reg-right">
							<input type="text" name="rlastname"id="llastname"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
						</div>
						<div class="invalid-infor" id="clastname">
							<div class="invalid-infor-css">
								<label>invalid</label>
							</div>
						</div>
					</div>
					<div class="reg-input-text">
						<div class="reg-left">
							<div class="reg-label">
								<label>ADDRESS LINE 1 *</label>
							</div>
						</div>

						<div class="reg-right">
							<input type="text" name="raddress"id="laddress"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
						</div>
						<div class="invalid-infor"id="caddress" >
							<div class="invalid-infor-css">
								<label>please enter address</label>
							</div>
						</div>
					</div>
				<div class="reg-input-text">
					<div class="reg-left">
						<div class="reg-label">
							<label>CITY *</label>
						</div>
					</div>

					<div class="reg-right">
						<input type="text" name="rcity"id="lcity"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
					</div>
					<div class="invalid-infor" id="ccity">
						<div class="invalid-infor-css">
							<label>invalid</label>
						</div>
					</div>
				</div>
				<div class="reg-input-text">
					<div class="reg-left">
						<div class="reg-label">
							<label>STATE *</label>
						</div>
					</div>

					<div class="reg-right">
						<input type="text"name="rstate" id="lstate"class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'/>
					</div>
					<div class="invalid-infor" id="cstate">
						<div class="invalid-infor-css">
							<label>invalid</label>
						</div>
					</div>
				</div>
				<div class="reg-input-text">
					<div class="reg-left">
						<div class="reg-label">
							<label>ZIP CODE *</label>
						</div>
					</div>

					<div class="reg-right">
						<input type="text" name="rzipcode"id="lzipcode"class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'/>
					</div>
					<div class="invalid-infor" id="czipcode">
						<div class="invalid-infor-css">
							<label>be 5 numbers</label>
						</div>
					</div>
				</div>
			
		</div>

	

		<div id="reg-submit">
			<input type="submit" id="change-address-btn"  onclick="check()" value="SAVE + SHIP TO THIS ADDRESS"/>
		</div>
	</form>
</div>
</div>

</div>

<?php require"copyright.php";?>
<script src="js/update-address.js"></script>
</body>
</html>