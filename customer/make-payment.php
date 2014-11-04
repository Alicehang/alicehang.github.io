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
	<title>Payment | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/payment.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php require"head-part.php";?>

	<div id="register">
		<div id="show-sign-up">
			<h1>PAYMENT</h1>
		</div>

		<div id="reg-content">
			<div id="reg-header">
				<label>YOU CAN PAY IN THE FOLLOWING WAYS:</label>
				<br>
				<img src="logo/payment.png" height="45" width="239">
				<p style="font-size:16px; font-weight:normal;">* = REQURIED</p>
			</div>

			<div id="reg-fill-in">
				<form id="form-reg" name="form-reg" method="post" action="place-order.php" onsubmit="return checkPayment()">
					<div id="reg-fill-info">

						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>CARD TYPE *</label>
								</div>
							</div>
							<div class="reg-right">
								<div class="reg-label">
									<input type="radio" id="g1"name="gender" value="male"/>

									<label>Visa</label>

									<input type="radio" id="g2"name="gender" value="female"/>

									<LABEL>MasterCard</LABEL>
								</div>

							</div>
							<div class="invalid-infor" id="cgender">
								<div class="invalid-infor-css">
									<label>please select one</label>
								</div>
							</div>
						</div>

						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>CARD NUMBER *</label>
								</div>
							</div>

							<div class="reg-right">
								<input type="text" name="rzipcode"id="lzipcode"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"'/>
							</div>

							<div class="invalid-infor" id="czipcode">
								<div class="invalid-infor-css">
									<label>be 16 numbers</label>
								</div>
							</div>
						</div>

						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>EXPIRATION DATE *</label>
								</div>
							</div>

							<div class="reg-right">
								<select name="month" id="lmonth"class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'>
									<option></option>
									<option class="loption" value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>

								<select name="year" id="lyear"class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'>
									<option></option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>

								</select>
							</div>
							<div class="invalid-infor" id="cdate">
								<div class="invalid-infor-css">
									<label>invalid</label>
								</div>
							</div>
						</div>
						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>CVV *</label>
								</div>
							</div>

							<div class="reg-right">
								<input type="text" name="rcvv"id="lcvv"class="fill-input-short" onfocus='this.className="fill-input-short-onfocus"'
							onblur='this.className="fill-input-short"'/>
							</div>

							<div class="invalid-infor" id="ccvv">
								<div class="invalid-infor-css">
									<label>be 3 numbers</label>
								</div>
							</div>
						</div>
					</div>
                     
				<div id="total">
					<div id="total-left"></div>
					<div id="total-right">
						<div id="left-text">
						<label >TOTAL</label>
					</div>
					<div id="right-text"><label >$ <?php echo $_SESSION['total']*1.09;?></label></div>
						
					</div>
				</div>
					<div id="reg-submit">
						<input type="submit" id="reg-submit-btn"  onclick="checkPayment()" value="PLACE ORDER"/>
					</div>
				</form>
			</div>
		</div>

	</div>

	<?php require"copyright.php";?>
	<script src="js/make-payment.js"></script>
</body>
</html>