<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Back-Store User Edit</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/Backstore/backstore.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script></head>
</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <a href="index.html"><h3>Sanitas Groceries</h3></a>
        </div>

        <ul class="list-unstyled components">
            <p>Back-Store User Edit</p>
            <li>
                <a href="product-management.php">Products</a>
            </li>
            <li>
                <a href="Page9.php">Users</a>
            </li>
            <li>
                <a href="">Orders</a>
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
                            User Edit
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between my-3">
                              <form>

                                  <div class="form-group">
                                    <div class="container">
                                        <div class="row">
                                          <div class="col-sm">
                                            <label for="title">Title</label>
                                            <select class="form-control" name="title">
          							                       <option> Mr. </option>
          							                       <option> Mrs. </option>
          							                       <option> Miss </option>
          							                       <option> Ms. </option>
          						                      </select>
                                          </div>
                                          <div class="col-sm">
                                            <label for="firstName">First Name</label>
                                            <input type = "text" class="form-control" name = "firstName"  size="50" required placeholder="Jerry"></input>
                                          </div>
                                          <div class="col-sm">
                                            <label for="lastName">Last Name</label>
                                            <input type = "text" class="form-control" name = "lastName" size="50" required placeholder="Labowski"></input>
                                          </div>
                                        </div>
                                      </div>
                                  </div>

                                <div class="form-group">
                                  <div class="container">
                                      <div class="row">
                                        <div class="col-sm">
                                          <label for="streetAddress">Street Address</label>
                                          <input type = "text" class="form-control" name = "streetAddress" size="50" required placeholder="555 William Wonka ave.">
                                        </div>
                                        <div class="col-sm">
                                          <label for="city">City</label>
                                          <input class="form-control" type = "text" name = "city" size="20" required placeholder="Montréal">
                                      </div>
                                      <div class="col-sm">
                                          <label for="postalCode">Postal Code</label>
                                          <input type="text" class="form-control" name="postalCode" size="20" required placeholder="A1B 2C3">
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <br>

                              <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                      <div class="col-sm">
                                          <button type="submit" class="btn btn-dark">Make Changes</button>
                                      </div>
                                    </div>
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
