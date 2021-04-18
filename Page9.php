<!DOCTYPE html>
<?php
  require_once 'simplexml_P9.php';
  $userList = getUsers();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>List of users</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="index.php"><h3>Sanitas Groceries</h3></a>
        </div>

        <ul class="list-unstyled components">
            <p>List of users</p>
            <li>
                <a href="./backstore/product-management.php">Products</a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li>
                <a href="./backstore/order-management.php">Orders</a>
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
                            Users Management
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-between my-3">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">Users</a>
                                    </li>
                                </ul>

                                <form class="d-flex">
                                    <input class="form-control me-2" style="width: 300px" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Street Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Postal Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($userList->user as $item) :?>
                                  <tr>
                                      <th scope="row"><?php echo $item['id']; ?></th>
                                      <td><?php echo $item->title; ?></td>
                                      <td><?php echo $item->firstName; ?></td>
                                      <td><?php echo $item->lastName; ?></td>
                                      <td><?php echo $item->streetAddress; ?></td>
                                      <td><?php echo $item->city; ?></td>
                                      <td><?php echo $item->postalCode; ?></td>
                                      <td>
                                        <form>
                                          <a class="btn btn-success" href="job.php?id=<?php echo $item['id']; ?>"><i class="fas fa-edit"></i></a>
                                          <a class="btn btn-danger" href="productHelper.inc.php?id=<?php echo $item['id']; ?>&action=delete"><i class="fas fa-trash-alt"></i></a>
                                        </form>
                                      </td>
                                  </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button class="btn btn-outline-secondary" type="submit">Save</button>

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