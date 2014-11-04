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
	<title>My Profile | Noodle & Rice</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/copy-right.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/my-pro.css">
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php require"head-part.php";?>
  <div id="all-whole">
	<div id="register">
		<div id="show-sign-up">
			<h1>MY ACCOUNT PROFILE</h1>
		</div>

		<div id="reg-content">
			<div id="reg-header">
				<h3>ENTER YOUR PERSONAL DETAILS</h3>

				<p style="font-size:16px; font-weight:normal;">* = REQURIED</p>
			</div>

			<div id="reg-fill-in">
				<form id="form-reg" name="form-reg" method="post" action="update-profile.php" onsubmit="return checkProfile()">
					<div id="reg-fill-info">
						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>EMAIL ADDRESS *</label>
								</div>
							</div>
							<?php 
require "util/connect.php";
$cid=$_SESSION['customer'];
// echo $cid;
$sql="SELECT * FROM customer WHERE CustomerId='$cid'";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
?>
							<div class="reg-right">
								<input type="text" name="remail"id="lemail"class="fill-input" onfocus='this.className="fill-input-onfocus"'
							onblur='this.className="fill-input"' />
							</div>
			<?php	echo'<script type="text/javascript">
                  document.getElementById("lemail").value="'.$row['Email'].'";
				</script>';
				?>
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
									<input type="radio" id="g1"name="gender" value="male"/>

									<label>MALE</label>

									<input type="radio" id="g2"name="gender" value="female"/>
<?php
if($row['Gender']=="male")
        {
  echo'<script type="text/javascript">
              document.getElementById("g1").checked=true;
  document.getElementById("g2").checked=false;
            </script>
            ';
}else{
	  echo'<script type="text/javascript">
              document.getElementById("g2").checked=true;
  document.getElementById("g1").checked=false;
            </script>
            ';
}
?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("lfirstname").value="'.$row['Firstname'].'";
				</script>';
				?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("llastname").value="'.$row['Lastname'].'";
				</script>';
				?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("laddress").value="'.$row['Address'].'";
				</script>';
				?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("lcity").value="'.$row['City'].'";
				</script>';
				?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("lstate").value="'.$row['State'].'";
				</script>';
				?>
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
								<?php	echo'<script type="text/javascript">
                  document.getElementById("lzipcode").value="'.$row['Zipcode'].'";
				</script>';
				?>
							<div class="invalid-infor" id="czipcode">
								<div class="invalid-infor-css">
									<label>be 5 numbers</label>
								</div>
							</div>
						</div>
						<div class="reg-input-text">
							<div class="reg-left">
								<div class="reg-label">
									<label>NEW PASSWORD *</label>
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
									<label>RE-ENTER  *</label>
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

					<div id="reg-submit">
						<input type="submit" id="reg-submit-btn"  onclick="checkProfile()" value="SAVE"/>
					</div>
				</form>
			</div>
		</div>

	</div>
<?php require"my-pro.php";
?>

</div>

	<?php require"copyright.php";?>
	<script src="js/register.js"></script>
</body>
</html>