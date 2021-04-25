<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Back-Store Product Edit</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script></head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="../index.php"><h3>Sanitas Groceries</h3></a>
        </div>

        <ul class="list-unstyled components">
            <p>Back-Store Management</p>
            <li>
                <a href="product-management.php">Products</a>
            </li>
            <li>
                <a href="Page9.php">Users</a>
            </li>
            <li>
                <a href="../backstore_edit_order.html">Orders</a>
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
                            Product Edit
                        </div>
                        <div class="card-body">
                            <?php
                                $action = isset($_GET['action']) ? $_GET['action'] : null;
                            ?>
                            <form action="productHelper.inc.php?action=<?php echo $action;?>" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="category">
                                            <option value="veg">Fruits & Vegetables</option>
                                            <option value="dairy">Dairy Products</option>
                                            <option value="meat">Meat & Poultry</option>
                                            <option value="bakery">Bakery</option>
                                            <option value="seafood">Sea Food</option>
                                            <option value="frozen">Frozen Products</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" name="price" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="unit" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Image URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="img" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Types</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="types" placeholder="e.g. Mexico;Malaysia;Peru">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="stock" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12" style="text-align: end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-secondary">Cancel</button>
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
