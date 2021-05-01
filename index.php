<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanitas Groceries</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="assets/Home_Page/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <script>
        $(function(){
            $('#our-header').load('header.html');
            $('#our-footer').load('footer.html');
        });
    </script>
</head>
<body>

<div id="our-header"></div>

<main>
  <div class="products" class="img-fluid">
    <table>
    <tr>
        <td>
            <a href="aisle.php?category=veg">
                <img class="zoom" class="image" width="267px" height="400px" src="./assets/Home_Page/imgs/bananas.jpg">
                <div class="mid">
                    Fruits and Vegetables
                </div>
            </a>
        </td>
        <td><a href="aisle.php?category=dairy"><img class="zoom" class="image"  width="267px" height="400px" src="./assets/Home_Page/imgs/dairy.jpg">
        <div class="mid">
            <div>
            Dairy products
            </div>
            </a>
        </div>
        </td>
        <td><a href="aisle.php?category=meat"><img class="zoom" class="image" width="267px" height="400px" src="./assets/Home_Page/imgs/meatcrop.jpg">
        <div class="mid">
            <div>
            Meat & Poultry
            </div>
            </a>
        </div>
        </td>
    </tr>
    <tr>
        <td><a href="aisle.php?category=bakery"><img class="zoom" class="image" width="267px" height="400px" src="./assets/Home_Page/imgs/bread.jpg">
        <div class="mid">
            <div>
            Bread & Bakery products
            </div>
            </a>
        </div>
        </td>
        <td><a href="aisle.php?category=seafood"><img class="zoom" class="image" width="267px" height="400px" src="./assets/Home_Page/imgs/fish.jpg">
        <div class="mid">
            <div>
            Fish & Seafood
            </div>
            </a>
        </div>
        </td>
        <td><a href="aisle.php?category=frozen"><img class="zoom" class="image" width="267px" height="400px" src="./assets/Home_Page/imgs/frozen.jpg">
        <div class="mid">
            <div>
            Frozen Food
            </div>
            </a>
        </div>
        </td>
    </tr>
    </table>
  </div>


</main>

<div id="our-footer"></div>
