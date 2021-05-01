if (document.readyState == 'loading'){
	document.addEventListener('DOMContentLoaded', cartFunction());
} else {
	cartFunction();
}

function cartFunction(){
	var removeFromCartButtons = document.getElementsByClassName('cart-remove-btn');
	for (var i = 0; i<removeFromCartButtons.length; i++){
		var button = removeFromCartButtons[i];
		button.addEventListener('click', removeItem);
	}
	
	document.getElementsByClassName('purchase-btn')[0].addEventListener('click', purchaseClicked);

	addItemsToCart();
}

function removeItem(event){
	var buttonClicked = event.target;
	var buttonProduct = buttonClicked.parentElement.parentElement.parentElement.parentElement.parentElement;
	var name = buttonProduct.getElementsByClassName("p-name")[0].innerText;
	var productList = getProductCookies();
	var newList = "";
	for (var i = 0; i < productList.length; i++){
		if (productList[i][0] != name && productList[i][0] != undefined && productList[i][1] != undefined && productList[i][2] != undefined && productList[i][3] != undefined){
			newList += productList[i][0] + "," + productList[i][1] + "," + productList[i][2] + "," + productList[i][3] + "]";
		}
	}
	buttonClicked.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
	window.sessionStorage.setItem("product", newList);
	var cartItems = document.getElementsByClassName('cart-items')[0];
	while (cartItems.hasChildNodes()){
		cartItems.removeChild(cartItems.firstChild);
	}
	addItemsToCart();
}

function addItemsToCart(){
	var productList = getProductCookies();
	if (productList.length == 0){
		return;
	}
	
	var cartItems = document.getElementsByClassName('cart-items')[0];
	cartItems.innerText = "Cart (" + (productList.length - 1) + " items)";
	for (var i = 0; i < productList.length; i++){
		if (productList[i] == ""){
			break;
		}
		var cartRow = document.createElement('div');
		var cartRowContent = ` <div class="row mb-4">
								<div class="col-md-5 col-lg-3 col-xl-3">
									<div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
										<img class="img-fluid w-100 img" src=${productList[i][2]}>
	  										<a href="#!">
												<div class="mask"></div>
											</a>
									</div>
								</div>
								<div class="col-md-7 col-lg-9 col-xl-9">
									<div>
										<div class="d-flex justify-content-between">
											<div>
												<h5 class="p-name">${productList[i][0]}</h5>
												<p class="mb-2 text-muted text-uppercase small weight">190g avg.</p>
												<p class="mb-2 text-muted text-uppercase small price-per-kg">$${(productList[i][1]*2.20462).toFixed(2)} /kg</p>
												<p class="mb-2 text-muted text-uppercase small price-per-lb">$${productList[i][1]} /lb</p>
											</div>
											<div>
												<div class="def-number-input number-input safari_only mb-0 w-100">
													<input class="form-control" class="quantity" min="1" id="quantity${i}" name="quantity" value="${productList[i][3]}" type="number">
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center"></div>
											<div>
												<a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3 mb-4 cart-remove-btn"> Remove item </a>
												<p class="mb-0"><span><strong class="price summary" id="summary${i}">$${(productList[i][1]*productList[i][3]).toFixed(2)}</strong></span></p class="mb-0">
											</div>
										</div>
									</div>
								</div>
							<hr class="mb-4">`;
		cartRow.innerHTML = cartRowContent;
		cartItems.append(cartRow);
		cartRow.getElementsByClassName('cart-remove-btn')[0].addEventListener('click', removeItem);
		console.log("add remove item event listener");
		cartRow.getElementsByClassName('quantity')[0].addEventListener('click', productPrice);
		console.log("add quantity change event listener");
	}
	productPrice();
}

  function getProductCookies() {
	var storedProducts = window.sessionStorage.getItem("product");
	var productList = [];
	if (!storedProducts){
		return "";
	}
	storedProducts = storedProducts.split(']');
	for(var i = 0; i < storedProducts.length; i++) {
	  storedProducts[i] = storedProducts[i].split(",");
	  productList.push(storedProducts[i]);
	}
	return productList;
  }

function purchaseClicked(){
	alert('Thank you for your purchase!');
	var cartItems = document.getElementsByClassName('cart-items')[0];
	while (cartItems.hasChildNodes()){
		cartItems.removeChild(cartItems.firstChild);
	}
	window.sessionStorage.removeItem("product");
	cartPrice();
}

function productPrice(){
	console.log("productPrice called");
	var pricePerUnitList = document.getElementsByClassName('price-per-kg');
	var totalPerProductList = new Array(pricePerUnitList.length);
	for (var i = 0; i < totalPerProductList.length; i++){
		console.log("setting price for product" + i);
		totalPerProductList[i] = parseFloat(pricePerUnitList[i].innerText.substring(1)) * ((document.getElementsByClassName('quantity')[i] == undefined)? 1: document.getElementsByClassName('quantity')[i].value);
		document.getElementsByClassName("summary")[i].innerText = "$" + totalPerProductList[i].toFixed(2);
	}
	cartPrice();
}
        
function cartPrice(){
	console.log("cartPrice called");
	var productPriceList = document.getElementsByClassName('price');
	
	var sum = 0.0;
	for(var i = 0; i < productPriceList.length; i++){
		console.log("adding product " + i + " to sum");
		sum += parseFloat(productPriceList[i].innerText.substring(1));
	}
	console.log("setting subtotals and total prices");
	var gst = sum * 0.05;
	var qst = sum * 0.15;
	var total = sum + gst + qst;

	document.getElementById("subtotal").innerText = "$" + sum.toFixed(2);
	document.getElementById("gst").innerText = "$" + gst.toFixed(2);
	document.getElementById("qst").innerText = "$" + qst.toFixed(2);
	document.getElementById("total").innerText = "$" + total.toFixed(2);
}
