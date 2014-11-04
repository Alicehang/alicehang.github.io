$("#buy-food-add-bag-btn").click(function() {
	if ($("#buy-food-number").val() == 0) {
		alert("quantity can not be 0 !");
	} else {
		v = $("#buy-food-number").val();
		// alert(v);
		$.ajax({
			type: 'post',
			url: 'util/add-to-cart.php',
			data: "number=" + v,
			success: function(data) {
				// alert(data);
				// alert("success");
				location.href = "shopping-cart.php";
			},
			error: function() {
				alert("error");
			}

		});
	}
});


function updateQuantity(v) {

	str = "p" + v;
	str2 = "#q" + v;
	str3 = "sprice[" + v + "]";

	str4 = document.getElementById(str3).innerHTML;
	str5 = str4.substr(1);

	total = document.getElementById("total-change-price").innerHTML;
	// alert(total);
	old = document.getElementById(str).innerHTML;
	total = parseInt(total) - parseInt(old);
	// alert(total);
	document.getElementById(str).innerHTML =
		$(str2).val() * str5;

	document.getElementById("total-change-price").innerHTML =
		parseInt($(str2).val() * str5) + total;
	qty = $(str2).val();
	$.ajax({
		type: 'post',
		url: 'util/update-quantity.php',
		data: "id=" + v + "&qty=" + qty,
		success: function(data) {
			// alert(data);

			location.href = "shopping-cart.php";
		},
		error: function() {
			alert("error");
		}

	});

}

	function itemRemove(v)
			{
				str=v.substr(1);
                // alert(str);

                $.ajax({
                	type:"post",
                	url:"util/remove-from-temp.php",
                	data:"did="+str,
                	success:function(data)
                	{
                		// alert(data);
                		location.href="shopping-cart.php";
                	},
                	error:function()
                	{
                		alert("error");
                	}

                });
			}

		





					function checkOut(v){
						 // alert(v);
						if(v==0){
							// alert("go-to-login");
							$.ajax({
								type:"post",
								url:"before-login.php",
								// data:"nothing="+1;
							    success:function(data)
							    {
							    	// alert(data);
							    	location.href="login.php";
							    },
							    error:function()
							    {
							    	alert("checkout error");
							    }

							});
						   
						}else{
							 // alert("go-to-checkout");
							location.href="checkout.php";
						}
                      
                         
			}	