function loginCheck() {
	document.getElementById("authentication").style.display = "none";
	var email = document.getElementById("login_email").value;
	var pwd = document.getElementById("login_password").value;
	// alert("before ajax");
	$.ajax({
		type: 'post',
		url: 'handle-login.php',
		data: "email=" + email + "&pwd=" + pwd,
		success: function(data) {
			// alert(data);
			if (data == 'fail') {
				document.getElementById("authentication").style.display = "block";
			} else if(data=="checkout"){
				location.href = "checkout.php";
			}else{
				location.href="all-product.php";
				// alert(data);
			}


		},
		error: function() {
			alert("error");

		}

	});
}