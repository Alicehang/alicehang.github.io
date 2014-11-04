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
	<title>Sign Up | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<!--<div id ="head">

	<div id="logo" onclick="location.href='homepage.php'">
		<a id="logo_content" href="homepage.php">NOODLE   RICE</a>
	</div>

	<div id="head-search">
		<form id="form-search" onsubmit="check-register.php">
			<button type="submit" id="search-btn">
				<img src="logo/glyphicons_027_search.png" height="24" width="24"></button>
			<input type="text" id="search-text"name="search-content" placeholder="SEARCH"/>
		</form>
	</div>

	<div id="head-category">
		<ul>
			<li class="head-ca" id="" onclick="location.href='noodle.php'">
				<div>
					<a href="noodle.php" class="cat-a">NOODLE</a>
				</div>
			</li>
			<li class="head-ca" id="" onclick="location.href='rice.php'">
				<div>
					<a href="rice.php" class="cat-a">RICE</a>
				</div>
			</li>
			<li class="head-ca" id="" onclick="location.href='dessert.php'">
				<div>
					<a href="dessert.php" class="cat-a">DESSERT</a>
				</div>
			</li>
			<li class="head-ca" id="" onclick="location.href='drinks.php'">
				<div>
					<a href="drinks.php" class="cat-a">DRINKS</a>
				</div>
			</li>
			<li id="head-sale"  onclick="location.href='sale.php'">
				<div  >
					<a href="sale.php" class="cat-a">SALE</a>
				</div>
			</li>
		</ul>
	</div>

	<div id="head-login">
		<ul>
			<li style="width:170px;">
				<div>
					<a href="login.php" class="cat-a">SIGN IN / REGISTER</a>
				</div>
			</li>
			<li>
				<div>
					<a href="#">
						<img src="logo/glyphicons_350_shopping_bag.png" height="26" width="23"></a>
				</li>
			</ul>
		</div>

	</div>
</div>
-->
<?php require"head-part.php";?>

<div id="register">
	<div id="show-sign-up">
		<h1>SIGN UP</h1>
	</div>

	<div id="go-to-login">
		<h3>
			DO YOU HAVE AN EXISTING
			<span style="color:#f00">Noodle & Rice</span>
			ACCOUNT?
		</h3>
		<input id="go-to-login-btn"type="button" onclick="location.href='login.php'"value="LOGIN"/>
	</div>

	<div id="reg-content">
		<div id="reg-header">
			<h3>ENTER YOUR INFORMATION BELLOW</h3>
			<h5>
				NOTE: YOUR NAME AND BILLING ADDRESS MUST BE ENTERED EXACTLY AS THEY APPEAR ON YOUR CREDIT CARD
			</h5>
			<p style="font-size:16px; font-weight:normal;">* = REQURIED</p>
		</div>

		<div id="reg-fill-in">
			<form id="form-reg" name="form-reg" method="post" action="add-customer.php" onsubmit="return check()">
				<div id="reg-fill-info">
					<div class="reg-input-text">
						<div class="reg-left">
							<div class="reg-label">
								<label>EMAIL ADDRESS *</label>
							</div>
						</div>

						<div class="reg-right">
							<input type="text" name="remail"id="lemail"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"' />
						</div>
						<div class="invalid-infor" id="cemail">
							<div class="invalid-infor-css">
								<label>xxx@xxx.xxx</label>
							</div>
						</div>
					</div>

					<div class="reg-input-text">
						<div class="reg-left">
							<div class="reg-label">
								<label>GENDER *</label>
							</div>
						</div>
						<div class="reg-right">
							<div class="reg-label">
								<input type="radio" name="gender" value="male"/>

								<label>MALE</label>

								<input type="radio" name="gender" value="female"/>

								<LABEL>FEMALE</LABEL>
							</div>

						</div>
						<div class="invalid-infor" id="cgender">
							<div class="invalid-infor-css">
								<label>please choose one gender</label>
							</div>
						</div>
					</div>

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
					<!-- <div class="reg-input-text">
					<div class="reg-left">
						<div class="reg-label">
							<label>ADDRESS LINE 2</label>
						</div>
					</div>

					<div class="reg-right">
						<input type="text" class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
					</div>
				</div>
				-->
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
				<!-- <div class="reg-input-text">
				<div class="reg-left">
					<div class="reg-label">
						<label>PHONE *</label>
					</div>
				</div>

				<div class="reg-right">
					<input type="text" class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'/>
				</div>
			</div>
			-->
			<div class="reg-input-text">
				<div class="reg-left">
					<div class="reg-label">
						<label>PASSWORD *</label>
					</div>
				</div>

				<div class="reg-right">
					<input type="password" name="rpwd" id="lpwd"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
				</div>
				<div class="invalid-infor" id="cpwd">
					<div class="invalid-infor-css">
						<label>be 6-10 begin with character</label>
					</div>
				</div>
			</div>
			<div class="reg-input-text">
				<div class="reg-left">
					<div class="reg-label">
						<label>CONFIRM PASSWORD *</label>
					</div>
				</div>

				<div class="reg-right">
					<input type="password" id="lpwd2"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"' />
				</div>
				<div class="invalid-infor" id="cpwd2">
					<div class="invalid-infor-css">
						<label>please enter again</label>
					</div>
				</div>
			</div>

		</div>

		<div id="reg-term">
			<div id="reg-term-content" class="reg-input-text">
				<div class="reg-left">
					<div class="reg-label">
						<label>TERMS + CONDITIONS *</label>
					</div>
				</div>

				<div class="reg-right">
					<div class="reg-label">
						<label style="font-size:14px;">
							By joining, you agree to our
							<a id="term-a" href="terms.php">TERMS AND CONDITION</a>
						</label>
						<br>
						<input type="checkbox"name="term" id="lterm"/>
						<label style="font-size:14px;">&nbsp; Yes, I agree to the Terms + Conditions</label>
					</div>

				</div>
				<div class="invalid-condition" id="cterm">
					<div class="invalid-condition-terms">
						<label>please select terms of conditions</label>
					</div>
				</div>
			</div>
		</div>

		<div id="reg-submit">
			<input type="submit" id="reg-submit-btn"  onclick="check()" value="REGISTER"/>
		</div>
	</form>
</div>
</div>

</div>

<?php require"copyright.php";?>
<script src="js/register.js"></script>
</body>
</html>