function checkAddress() {

	// document.getElementById("cemail").style.display = "none";
	// document.getElementById("cgender").style.display = "none";
	document.getElementById("cfirstname").style.display = "none";
	document.getElementById("clastname").style.display = "none";
	document.getElementById("caddress").style.display = "none";
	document.getElementById("ccity").style.display = "none";
	document.getElementById("cstate").style.display = "none";
	document.getElementById("czipcode").style.display = "none";
	// document.getElementById("cpwd").style.display = "none";
	// document.getElementById("cpwd2").style.display = "none";
	// document.getElementById("cterm").style.display = "none";
	flag = 0;

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


	if (flag > 0) {
		return false;
		return true;
	}

}

