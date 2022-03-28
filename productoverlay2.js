$('.col-md-12.hoverbox').click(function(e){	
	if($(e.target).is('.btn.btn-success.initialb')) {
		var cartValue = sessionStorage.getItem( "cart" );
		if(cartValue === null){
			var cart = [
				{
				id: $(this).attr('id'),
				name: document.getElementsByClassName('purchasetitle '.concat($(this).attr('id')))[0].innerHTML,
				price: document.getElementsByClassName('prtext '.concat($(this).attr('id')))[0].innerHTML.substring(1),
				qty: "1",
				source: document.getElementsByClassName('img-rounded '.concat($(this).attr('id')))[0].src}
			];
			var jsonStr = JSON.stringify( cart );
			sessionStorage.setItem( "cart", jsonStr );
		}
		else{
			var cartObj = JSON.parse( cartValue );
			var items = {
				id: $(this).attr('id'),
				name: document.getElementsByClassName('purchasetitle '.concat($(this).attr('id')))[0].innerHTML,
				price: document.getElementsByClassName('prtext '.concat($(this).attr('id')))[0].innerHTML.substring(1),
				qty: "1",
				source: document.getElementsByClassName('img-rounded '.concat($(this).attr('id')))[0].src};
			cartObj.push(items);
			var jsonStr = JSON.stringify( cartObj );
			sessionStorage.setItem( "cart", jsonStr );
		}
		
		
	}
	else{
		$.post("DetailedProduct.php",{searchedid : $(this).attr('id')},function(data){
		var tempjson = JSON.parse(data);
		document.getElementsByClassName('paradescription')[0].innerHTML = tempjson.Description;
		document.getElementsByClassName('stockdetailed')[0].innerHTML = tempjson.Stock;
		document.getElementsByClassName('namedetailed')[0].innerHTML = tempjson.ProductName;
		document.getElementsByClassName('detailedprice')[0].innerHTML = '£'+tempjson.SalePrice;
		document.getElementsByClassName('detailedimage')[0].src = tempjson.ImageURL;
		document.getElementsByClassName('detailedimage')[0].name = tempjson.ProductID;
		/*
		$(this).find('.child').toggleClass('color')
		alert(tempjson.ProductID);
		alert(tempjson.ProductName);
		alert(tempjson.Description);
		alert(tempjson.SalePrice);
		alert(tempjson.Stock);
		alert(tempjson.MartialArt);
		alert(tempjson.ClothingCategory);
		alert(tempjson.Image);*/
		$("#overlay").fadeIn("400");
		$(".productoverlay").fadeIn("400");
		});
	}
});

$(".btn.btn-success.pull-center").on("click",function(){
	var cartValue = sessionStorage.getItem( "cart" );
	if(cartValue === null){
		var cart = [
			{
			id: document.getElementsByClassName('detailedimage')[0].name,
			name: document.getElementsByClassName('namedetailed')[0].innerHTML,
			price: document.getElementsByClassName('detailedprice')[0].innerHTML.substring(1),
			qty: $(".customrow > div > input").val(),
			source: document.getElementsByClassName('detailedimage')[0].src}
		];
		console.log(cart);
		var jsonStr = JSON.stringify( cart );
		sessionStorage.setItem( "cart", jsonStr );
		$(".productamount").val(1);
	}
	else{
		var cartObj = JSON.parse( cartValue );
		var items = {
			id: document.getElementsByClassName('detailedimage')[0].name,
			name: document.getElementsByClassName('namedetailed')[0].innerHTML,
			price: document.getElementsByClassName('detailedprice')[0].innerHTML.substring(1),
			qty: $(".customrow > div > input").val(),
			source: document.getElementsByClassName('detailedimage')[0].src}
		cartObj.push(items);
		console.log(cartObj);
		var jsonStr = JSON.stringify( cartObj );
		sessionStorage.setItem( "cart", jsonStr );
		$(".productamount").val(1);
	}	
});
$("#overlay").click(function(){
    $("#overlay").fadeOut("400");
    $(".productoverlay").fadeOut("400");
});


$("#overlay").click(function(){
    $("#overlay").fadeOut("400");
    $(".productoverlay").fadeOut("400");
});

$(".btn-minus").on("click",function(){
	var amount = $(".productamount").val();
	if (parseInt(amount) -1 > 0){ amount--;}
	$(".productamount").val(amount);
})  ;   
       
$(".btn-plus").on("click",function(){
	var amount = $(".productamount").val();
	$(".productamount").val(parseInt(amount)+1);
})  ;                      