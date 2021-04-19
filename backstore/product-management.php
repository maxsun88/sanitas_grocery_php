<?php
  require_once '../xml_database/simplexml.php';
  $productList = getProducts();
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Back Store</title>

    <!-- Bootstrap CSS CDN -->
    <link href="../bootstrap-v4/css/bootstrap.min.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
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
                  <a href="#">Products</a>
              </li>
              <li>
                  <a href="../Page9.php">Users</a>
              </li>
              <li>
                  <a href="order-management.php">Orders</a>
              </li>
          </ul>
      </nav>

      <!-- Page Content  -->
      <div id="content">
          <div class="container-fluid">
              <div class="card management-table">
                  <div class="card-header">
                      Product Management
                  </div>
                  <div class="card-body">
                      <div class="d-flex justify-content-between my-3">
                          <ul class="nav nav-tabs">
                              <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="#">Vegetables</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Meat</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Dairy Product</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Frozen</a>
                              </li>
                          </ul>

                          <form class="d-flex">
                              <input class="form-control me-2" style="width: 300px" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                          <a style="font-size: 2rem" class="btn" href="product-edit.php"><i class="far fa-plus-square"></i></a>
                      </div>

                      <div class="table-responsive-lg">
                          <table class="table table-bordered table-hover">
                              <thead class="thead-light">
                              <tr>
                                  <th scope="col">Sequence Number</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Unit</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Stock</th>
                                  <th scope="col">Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($productList->product as $item) :?>
                                   <tr>
                                      <th scope="row"><?php echo $item['id']; ?></th>
                                      <td><?php echo $item->name; ?></td>
                                      <td><?php echo $item->price; ?></td>
                                      <td><?php echo $item->unit; ?></td>
                                      <td><?php echo $item->description; ?></td>
                                      <td><?php echo $item->stock; ?></td>
                                      <td>
                                        <form>
                                          <a class="btn btn-primary" href="job.php?id=<?php echo $item['id']; ?>"><i class="fas fa-eye"></i></a>
                                          <a class="btn btn-success" href="job.php?id=<?php echo $item['id']; ?>"><i class="fas fa-edit"></i></a>
                                          <a class="btn btn-danger" href="productHelper.inc.php?id=<?php echo $item['id']; ?>&action=delete"><i class="fas fa-trash-alt"></i></a>
                                        </form>
                                      </td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
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
