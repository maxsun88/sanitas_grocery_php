<?php
    require_once 'xml_database/simplexml.php';
    $id = $_GET['id'];
    $item = getProductById($id);
    $types = explode(";", $item["types"]);
?>

<html lang = "en">
	<head>
		<title> Sanitas Groceries - Product description </title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<!-- Custom styles for this template -->
		<link href="assets/Home_Page/style.css" rel="stylesheet">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Import header and footer -->
		<script>
			$(function(){
				$('#our-header').load('header.html');
				$('#our-footer').load('footer.html');
			});
		</script>
		<script src="addToCartP3.js" async></script>

		<!-- Save values on refresh -->
		<script> 
			$(function() {
				// For two buttons
			myStorage = window.sessionStorage;
			$("#sel1").on('change', function() {
        	myStorage.setItem('sel1', $('option:selected', this).index());
    		});
			$("#sel2").on('change', function() {
        	myStorage.setItem('sel2', $('option:selected', this).index());
    		});
    		
				// For quantity button
			window.onbeforeunload = function() {
			
			myStorage.setItem("origin", window.location.href);
   			myStorage.setItem("qty", $('#qty').val());
    

   			console.log("onbeforeunload " + myStorage);
			}

			window.onload = function() {
				if(myStorage.getItem("origin") !== window.location.href){
					if(myStorage.getItem("product") == null){
						myStorage.clear();
					}else{
						var productList = myStorage.getItem("product");
       					myStorage.clear();
						myStorage.setItem("product", productList)
					}
    			}
   			var quantity1 = myStorage.getItem("qty");
   			console.log("onload " + quantity1);
   			if (quantity1 !== null || quantity === 1) $('#qty').val(quantity1);

			   //This is good.

			if (myStorage.getItem('sel1')) $("#sel1 option").eq(myStorage.getItem('sel1')).prop('selected',true); 
			if (myStorage.getItem('sel2')) $("#sel2 option").eq(myStorage.getItem('sel2')).prop('selected',true);
			
			}
			

			});
		</script>
	</head>
	<body>
	<div id="our-header"></div>
	
	<div class="container">
		<div class="row">
			<div class="col">
				<br />
				<br /><h2 class="p-name"> <?php echo $item["name"]; ?> </h2>
				<h4> 420g </h4>
				<br />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<img src="<?php echo $item["img"]; ?>" class="img-fluid rounded mb-3 img" alt="Carrots" width="300px"/>
			</div>
			<div class="col-sm-9">
				<h3 class="price"> $<?php echo $item["price"] . " / " . $item["unit"]; ?> </h3>
				<h4> Product description </h4> <br />
				<p> <?php echo $item["description"]; ?> </p>
				<hr />
				<a class="btn btn-outline-secondary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					More description
				</a>
				<div class="collapse" id="collapseExample">
					<br/><?php echo $item["description"]; ?>
				</div>
			</br> </br>
			
			<form action="">
				<div class="form-group row">
					<div class="col-sm-2">
						<label>Quantity:</label>
					</div>
					<div class="col-sm-3">
						<input type="number" min="1" class="form-control p-quantity" id="qty" value="1" name="quantity">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">
						<label>Type:</label>
					</div>
					<div class="col-sm-3">
						<select class="form-control" id="sel1">
                            <?php foreach ($types as $str) :?>
                                <option><?php echo $str ?></option>
                            <?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">
						<a class="btn btn-primary form-control mt-3 add-to-cart" href="#" role="button">Add to cart</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<br /> <br />
	</body>
	<div id="our-footer"></div>
</html>