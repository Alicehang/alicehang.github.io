<?php 
if(isset($_SESSION['customer']))
{
	$_SESSION['mypro']="123";
}else{
	$_SESSION['mypro']="1";
}
?>
<div id="myaccount">
	<div id="myprofile">
		<div class="myprofile-link" <?php echo 'id=m"'.$_SESSION['mypro'].'"';?>
			onclick="myAccount(this.id)">
			<script type="text/javascript">


function myAccount(v)
{
	var x=v.substr(1);
	
	if(x.length>1)
	{
		location.href="my-account.php";
	}else{
		location.href="login.php";
	}
}

				</script>
			<div class="x-css">
				<label class="myprofile-label-x">MY ACCOUNT</label>
			</div>
		</div>
		<div class="myprofile-link" <?php echo 'id=p"'.$_SESSION['mypro'].'"';?>
			onclick="myProfile(this.id)">
			<div class="x-css">
				<label class="myprofile-label-x ">PROFILE DETAILS</label>
			</div>
		</div>
		<div class="myprofile-link" <?php echo 'id=o"'.$_SESSION['mypro'].'"';?>
			onclick="myOrder(this.id)">
			<div id="xxx">
				<label class="myprofile-label-x">ORDER HISTORY</label>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">


function myProfile(v)
{
	var x=v.substr(1);
	// alert(x);
	if(x.length>1)
	{
		location.href='profile.php';
	}else{
		location.href="login.php";
	}
}



function myOrder(v)
{
	var x=v.substr(1);
	 // alert(x);
	if(x.length>1)
	{
		location.href='order-history.php';
	}else{
		location.href="login.php";
	}
}
				</script>