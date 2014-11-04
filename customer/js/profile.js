function checkProfile() {

	document.getElementById("cemail").style.display = "none";
	document.getElementById("cgender").style.display = "none";
	document.getElementById("cfirstname").style.display = "none";
	document.getElementById("clastname").style.display = "none";
	document.getElementById("caddress").style.display = "none";
	document.getElementById("ccity").style.display = "none";
	document.getElementById("cstate").style.display = "none";
	document.getElementById("czipcode").style.display = "none";
	document.getElementById("cpwd").style.display = "none";
	document.getElementById("cpwd2").style.display = "none";
	// document.getElementById("cterm").style.display = "none";
	flag = 0;


	var email = document.getElementById("lemail").value;

	var rex = /^[a-z]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/;
	if (!rex.test(email)) {
		document.getElementById("cemail").style.display = "block";
		flag += 1;
	}
	//
	var gender = document.getElementsByName("gender");
	var f_gender = 0;
	for (i = 0; i < gender.length; i++) {
		if (gender[i].checked) {
			f_gender = 1;
		}
	}
	if (f_gender == 0) {
		document.getElementById("cgender").style.display = "block";
		flag += 1;
	}
	//
	var firstname = document.getElementById("lfirstname").value;

	var r2 = /^[ A-Za-z]*$/;

	if (!r2.test(firstname) || !firstname) {
		document.getElementById("cfirstname").style.display = "block";
		flag += 1;
	}
	//
	var lastname = document.getElementById("llastname").value;


	if (!r2.test(lastname) || !lastname) {
		document.getElementById("clastname").style.display = "block";
		flag += 1;
	}
	//
	var address = document.getElementById("laddress").value;


	if (!address) {
		document.getElementById("caddress").style.display = "block";
		flag += 1;
	}
	//
	var city = document.getElementById("lcity").value;
	if (!r2.test(city) || !city) {
		document.getElementById("ccity").style.display = "block";
		flag += 1;
	}
	//
	var state = document.getElementById("lstate").value;
	if (!r2.test(state) || !state) {
		document.getElementById("cstate").style.display = "block";
		flag += 1;
	}
	//
	var zipcode = document.getElementById("lzipcode").value;
	var r3 = /^\d{5}$/;
	if (!r3.test(zipcode) || !zipcode) {
		document.getElementById("czipcode").style.display = "block";
		flag += 1;
	}

	var pwd = document.getElementById("lpwd").value;
	var pwd2 = document.getElementById("lpwd2").value;
	var r4 = /^[a-zA-Z]\w{5,9}$/;

	if(!(pwd==""|| pwd2==""))
	{
	if (!r4.test(pwd) || !pwd) {
		document.getElementById("cpwd").style.display = "block";
		flag += 1;
	}
	if (!(pwd2 == pwd)) {
		document.getElementById("cpwd2").style.display = "block";
		flag += 1;
	}
    }
	if (flag > 0) {
		return false;
		return true;
	}

}

