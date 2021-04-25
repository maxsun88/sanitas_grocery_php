<?php
    require_once '../xml_database/simplexml_P9.php';
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'customer';
    $userList = getUsersByCategory($tab);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>List of users</title>

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
            <p>List of users</p>
            <li>
                <a href="product-management.php">Products</a>
            </li>
            <li>
                <a href="#">Users</a>
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
                    <div class="card management-table">
                        <div class="card-header">
                            Users Management
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-between my-3">
                            <nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link <?php if($tab=='customer') :?>active<?php endif; ?>"  href="Page9.php?tab=customer" role="tab" aria-selected="true">Customers</a>
                                  <a class="nav-item nav-link <?php if($tab=='admin') :?>active<?php endif; ?>" href="Page9.php?tab=admin" role="tab" aria-selected="false">Admins</a>
                              </div>
                          </nav>

                                <form class="d-flex">
                                    <input class="form-control me-2" style="width: 300px" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                <a style="font-size: 2rem" class="btn" href="edit_add_user.php?action=insert"><i class="far fa-plus-square"></i></a>
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
                                <?php foreach ($userList as $item) :?>
                                  <tr>
                                      <th scope="row"><?php echo $item["@attributes"]["id"]; ?></th>
                                      <td><?php echo $item["title"]; ?></td>
                                      <td><?php echo $item["firstName"]; ?></td>
                                      <td><?php echo $item["lastName"]; ?></td>
                                      <td><?php echo $item["streetAddress"]; ?></td>
                                      <td><?php echo $item["city"]; ?></td>
                                      <td><?php echo $item["postalCode"]; ?></td>
                                      <td>
                                        <form>
                                          <a class="btn btn-success" href="#"><i class="fas fa-edit"></i></a>
                                          <a class="btn btn-danger" href="javascript:confirmDelete('<?php echo $item["@attributes"]["id"];?>' , '<?php echo $item["firstName"];?>') ">
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