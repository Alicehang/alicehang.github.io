function checkPayment() {

	
	document.getElementById("cgender").style.display = "none";
	// document.getElementById("cfirstname").style.display = "none";
	// document.getElementById("clastname").style.display = "none";
	// document.getElementById("caddress").style.display = "none";
	// document.getElementById("ccity").style.display = "none";
	// document.getElementById("cstate").style.display = "none";
	document.getElementById("czipcode").style.display = "none";
	document.getElementById("ccvv").style.display = "none";
	document.getElementById("cdate").style.display = "none";
	// document.getElementById("cterm").style.display = "none";
	
	flag = 0;

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
	var month= document.getElementById("lmonth");
	var f_month= 0;
	if(month.value=="")
	{f_month = 1;}
	if (f_month!= 0) {
		document.getElementById("cdate").style.display = "block";
		flag += 1;
	}

	var year= document.getElementById("lyear");
	var f_year= 0;
	if(year.value=="")
	{f_year = 1;}
	if (f_year!= 0) {
		document.getElementById("cdate").style.display = "block";
		flag += 1;
	}
	//
	var zipcode = document.getElementById("lzipcode").value;
	var r3 = /^\d{16}$/;
	if (!r3.test(zipcode) || !zipcode) {
		document.getElementById("czipcode").style.display = "block";
		flag += 1;
	}
    var cvv = document.getElementById("lcvv").value;
	var r4 = /^\d{3}$/;
	if (!r4.test(cvv) || !cvv) {
		document.getElementById("ccvv").style.display = "block";
		flag += 1;
	}
	
	if (flag > 0) {
		return false;
	
		return true;
	}

}

