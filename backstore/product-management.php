<?php
    require_once '../xml_database/simplexml.php';
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'seafood';
    $productList = getProductsByCategory($tab);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Back Store</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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
              <div class="card management-table">
                  <div class="card-header">
                      Product Management
                  </div>
                  <div class="card-body">
                      <div class="d-flex justify-content-between my-3">
                          <nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link <?php if($tab=='veg') :?>active<?php endif; ?>"  href="product-management.php?tab=veg" role="tab" aria-selected="true">Vegetables</a>
                                  <a class="nav-item nav-link <?php if($tab=='meat') :?>active<?php endif; ?>" href="product-management.php?tab=meat" role="tab" aria-selected="false">Meat</a>
                                  <a class="nav-item nav-link <?php if($tab=='dairy') :?>active<?php endif; ?>" href="product-management.php?tab=dairy" role="tab" aria-selected="false">Dairy</a>
                                  <a class="nav-item nav-link <?php if($tab=='bakery') :?>active<?php endif; ?>" href="product-management.php?tab=bakery" role="tab" aria-selected="false">Bakery</a>
                                  <a class="nav-item nav-link <?php if($tab=='frozen') :?>active<?php endif; ?>" href="product-management.php?tab=frozen" role="tab" aria-selected="false">Frozen</a>
                                  <a class="nav-item nav-link <?php if($tab=='seafood') :?>active<?php endif; ?>" href="product-management.php?tab=seafood" role="tab" aria-selected="false">Seafood</a>
                              </div>
                          </nav>
                          <form class="d-flex">
                              <input class="form-control me-2" style="width: 300px" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                          <a style="font-size: 2rem" class="btn" href="product-edit.php?action=insert"><i class="far fa-plus-square"></i></a>
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
                                <?php foreach ($productList as $item) :?>
                                   <tr>
                                      <th scope="row"><?php echo $item["@attributes"]["id"]; ?></th>
                                      <td><?php echo $item["name"]; ?></td>
                                      <td><?php echo $item["price"]; ?></td>
                                      <td><?php echo $item["unit"]; ?></td>
                                      <td><?php echo $item["description"]; ?></td>
                                      <td><?php echo $item["stock"]; ?></td>
                                      <td>
                                        <form>
                                          <a class="btn btn-primary" href="#"><i class="fas fa-eye"></i></a>
                                          <a class="btn btn-success" href="product-edit.php?id=<?php echo $item["@attributes"]["id"]; ?>&action=edit"><i class="fas fa-edit"></i></a>
                                          <a class="btn btn-danger" href="javascript:confirmDelete('<?php echo $item["@attributes"]["id"];?>' , '<?php echo $item["name"];?>') ">
                                            <i class="fas fa-trash-alt"></i>
                                          </a>
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

      function confirmDelete(id, name) {
          var r = window.confirm("Confirm deleting product: " + name);
          if (r == true) {
              window.location.href = "productHelper.inc.php?id="+id+"&action=delete";
          }
      }

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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
