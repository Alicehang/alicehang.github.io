function buy() {
	location.href = "buy-food.php";
}

function c(v){
		
// alert(v);
		
		  $.ajax({
		  	type:'post',
		  	url:'buy-food.php',
		  	data:"id="+v,
		success:function()
		{   
			// alert(v);
		    window.location.href="buy-food.php";

		},
		error:function(){
			alert('ERROR');
		}
	});

		  
	}