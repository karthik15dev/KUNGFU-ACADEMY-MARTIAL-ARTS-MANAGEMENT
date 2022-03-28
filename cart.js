function populateCart() {
	var cartValue = sessionStorage.getItem( "cart" );
	if(cartValue === null){
	}
	else{
		var cartObj = JSON.parse( cartValue );
		var total=0;
		for(var i = 0; i < cartObj.length; i++){
			total=total+parseFloat(cartObj[i].price)*parseInt(cartObj[i].qty);
			document.getElementsByClassName('col-md-12 cartdata')[0].innerHTML+='<div style="border-bottom:1px solid silver;margin-top:1.5vh;" class="row"><div class="col-md-4"><img class="cartimg" style="width:100%;height:15vh;border-radius:10px" src="'+cartObj[i].source+'"></img></div><div style="text-align:center;margin-top:4vh;margin-bottom:4vh;" class="col-md-2"><h4 class="cartproducttitle">'+cartObj[i].name+'</h4></div><div style="text-align:center;margin-top:4vh;margin-bottom:4vh;" class="col-md-3"><h4 class="cartproductquantity">'+cartObj[i].qty+'</h4></div><div style="text-align:center;margin-top:4vh;margin-bottom:4vh;" class="col-md-2"><h4 class="cartproductprice">£'+(parseFloat(cartObj[i].price)*parseInt(cartObj[i].qty)).toString()+'</h4></div><div style="text-align:center;margin-top:4vh;margin-bottom:4vh;" class="col-md-1"><a href="#" onclick="removeCart()" data-rel="back" name="'+i.toString()+'" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">x</a></div></div>'
		}
		document.getElementsByClassName('totalcheckout')[0].innerHTML="Total: £"+(Math.round(total * 100) / 100).toString();
		
	}
}

function removeCart(){	
	var temp = parseInt($(event.target).attr('name'));
	var cartValue = sessionStorage.getItem( "cart" );
	var cartObj = JSON.parse( cartValue );
	cartObj.splice(temp, 1);
	var jsonStr = JSON.stringify( cartObj );
	sessionStorage.setItem( "cart", jsonStr );
	location.reload();
}