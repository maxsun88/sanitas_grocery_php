<?php
require_once '../xml_database/simplexml_orders.php';
$id = isset($_GET["id"]) ? $_GET["id"]:null;
$xml = simplexml_load_file("../xml_database/orders.xml") or die("Error: Cannot create object");
$orderList = json_decode(json_encode((array)$xml), TRUE)["order"];
$list = getOrderByID($id);
$name = isset($_GET["id"]) ? $list['name']: null;
$category = isset($_GET["id"]) ? $list['category']: null;
$price = isset($_GET["id"]) ? $list['price']: null;
$quantity= isset($_GET["id"]) ? $list['quantity']: null;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Back-Store Order Edit</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <a href="index.html"><h3>Sanitas Groceries</h3></a>
        </div>

        <ul class="list-unstyled components">
            <p>Back-Store Order Edit</p>
            <li>
                <a href="product-management.php">Products</a>
            </li>
            <li>
                <a href="Page9.php">Users</a>
            </li>
            <li>
                <a href="order-management.php">Orders</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Order Edit
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between my-3">
                            <?php
                              $action = isset($_GET['action']) ? $_GET['action'] : null;
                            ?>
                              <form method="post" action="orderHelper.inc.php?action=<?php echo $action;?>">

                                  <div class="form-group">
                                    <div class="container">
                                        <div class="row">
                                          <div class="col-sm">
                                            <label for="name">Name</label>
                                            <input name="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $name;?>"></input>
                                          </div>
                                          <div class="col-sm">
                                            <label for="category">Category</label>
                                            <select type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?php echo $category;?>">
                                                <option value="vegetables">Vegetables</option>
                                                <option value="dairy">Dairy</option>
                                                <option value="meat">Meat</option>
                                                <option value="bakery">Bakery</option>
                                                <option value="seafood">Seafood</option>
                                                <option value="frozen">Frozen</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                  </div>

                                <div class="form-group">
                                  <div class="container">
                                      <div class="row">
                                        <div class="col-sm">
                                          <label for="price">Price</label>
                                          <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price;?>"></input>
                                        </div>
                                        <div class="col-sm">
                                          <label for="quantity">Quantity</label>
                                          <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $quantity;?>"></input>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <br>

                              <div class="form-group row">
                                    <div class="col-sm-12" style="text-align: front">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-secondary"><a href="./order-management.php">Cancel</a></button>
                                    </div>
                                </div>
                            </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--&lt;!&ndash; jQuery Custom Scroller CDN &ndash;&gt;-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>-->


<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>
