function clearAll()
{
	// alert("first");
	$.ajax({
		type:'post',
		url:'clear.php',
		success:function(data){
			// alert(data);
			location.href="shopping-cart.php";
		},
		error:function()
		{
			alert("clear error");
		}
	});
}