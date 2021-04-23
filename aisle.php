<?php
    require_once 'xml_database/simplexml.php';
    $category = isset($_GET['category']) ? $_GET['category'] : 'seafood';
    $productList = getProductsByCategory($category);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Setting the viewpoint -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> SANITAS Bread and Bakery </title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/Page2/stylep2.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#our-header').load('header.html');
            $('#our-footer').load('footer.html');
        });
    </script>
    <script src="addToCartP2.js" async="true"></script>
    
    <style>
        .banner-image {
            <?php if($category=='seafood') :?>background-image: url("assets/Page2/imgs/banner_fish.jpg"); <?php endif; ?>
            <?php if($category=='meat') :?>background-image: url("assets/Page2/imgs/meat_banner.png"); <?php endif; ?>
            <?php if($category=='dairy') :?>background-image: url("assets/Page2/imgs/banner_milk.jpg"); <?php endif; ?>
            <?php if($category=='bakery') :?>background-image: url("assets/Page2/imgs/BreadBakeryBanner.jpg"); <?php endif; ?>
            <?php if($category=='frozen') :?>background-image: url("assets/Page2/imgs/Frozen_banner.png"); <?php endif; ?>
            <?php if($category=='veg') :?>background-image: url("assets/Page2/imgs/banner.png"); <?php endif; ?>
            height: 15%;
            background-position: 50% 37%;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .banner-text {
            font-family: 'Rubik', sans-serif;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: rgb(255, 255, 255);
            text-shadow:
                    -2px -2px  #636363,
                    -1px -1px #636363,
                    1px -1px #636363,
                    -1px 1px #636363,
                    1px 1px #636363;
        }
    </style>
    <div id="our-header"></div>
    <div class="banner-image">
        <div class="banner-text">
            <?php if($category=='seafood') :?>
                <h1><b>Fish And Seafood</b></h1>
                <p><i>A selection of local fresh fish and seafood!</i></p>
            <?php endif; ?>
            <?php if($category=='meat') :?>
                <h1><b>Meat & Poultry</b></h1>
                <p><i>A selection of local fresh meats!</i></p>
            <?php endif; ?>
            <?php if($category=='dairy') :?>
                <h1><b>Dairy Products</b></h1>
                <p><i>Eggs and Dairy from our local farms straight to your door!</i></p>
            <?php endif; ?>
            <?php if($category=='bakery') :?>
                <h1><b>Bread And Bakery</b></h1>
                <p><i>A selection of local fresh breads and baked goods!</i></p>
            <?php endif; ?>
            <?php if($category=='frozen') :?>
                <h1><b>Frozen Foods</b></h1>
                <p><i>A selection of all frozen foods!</i></p>
            <?php endif; ?>
            <?php if($category=='veg') :?>
                <h1><b>Fruits & Vegetables</b></h1>
                <p><i>A selection of local fresh fruits and vegetables!</i></p>
            <?php endif; ?>
        </div>
    </div>
</head>
<body>
<main>
    <div class="container">
        <div class="row">
            <?php foreach ($productList as $item) :?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="element-wrapper">
                        <div class="box-up">
                            <img class="img" src="<?php echo $item["img"]; ?>" alt="" height="110px">
                            <div class="img-info">
                                <div class="info-inner">
                                    <span class="p-name"><?php echo $item["name"]; ?></span>
                                    <span class="p-addinfo">(455 g avg.)</span>
                                </div>
                                <div class="a-size"><span class="size">$1.77 /100g</span></div>
                            </div>
                        </div>
                        <div class="box-down">
                            <div class="h-bg"></div>
                            <div class="h-bg-inner"></div>
                            <a class="cart" href="#">
                                <span class="price">$<?php echo $item["price"] . " / " . $item["unit"]; ?></span>
                                <span class="add-to-cart">
                                    <span class="txt">Add in cart</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="our-footer"></div>
</main>
</body>
</html>