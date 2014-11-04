function seeDetail(v)
{
// alert(v);
$.ajax({
	type:'post',
	url:'order-detail.php',
	data:'oid='+v,
	success:function(data){
      // alert(data);
      location.href="order-detail.php";
	},
	error:function(){
		alert("order-detail error");
	}
});
}