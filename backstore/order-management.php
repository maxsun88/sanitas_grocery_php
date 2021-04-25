<?php
require_once '../xml_database/simplexml_orders.php';
$orderList = getOrdersXML();
?>

<html lang = "en">
	<head>
		<title> Sanitas Backstore - Edit order </title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<nav id="sidebar">
			<div class="sidebar-header">
				<a href="index.html"><h3>Sanitas Groceries</h3></a>
			</div>

			<ul class="list-unstyled components">
				<p>Back-Store Order Management</p>
				<li>
					<a href="./product-management.php">Products</a>
				</li>
				<li>
					<a href="Page9.php">Users</a>
				</li>
				<li>
					<a href="#">Orders</a>
				</li>
			</ul>
		</nav>
		<div id="content">
			<div class="container-fluid">
		
				<div class="row">
					<div class="col-12">
					
						<div class="card">
							<div class="card-header">
								Order #00000
							</div>
							<div class="card-body">
							 <h5> Order Details </h5> 
								Customer email: JohnSmith@email.com <br />
								Order date: 01/01/1999 <br />

								<br /> <h5> Product list: </h5> 

								<div class="d-flex justify-content-between my-3">

									<form class="d-flex">
										<input class="form-control me-2" style="width: 300px" type="search" placeholder="Search" aria-label="Search">
										<button class="btn btn-outline-success" type="submit">Search</button>
									</form>
								</div>
								<div class="table-responsive-lg">
								<table class="table table-bordered table-hover">
									<thead class="thead-light">
									<tr>
										<th scope="col">Sequence Number</th>
										<th scope="col">Name</th>
										<th scope="col">Category</th>
										<th scope="col">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">Actions</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($orderList->order as $item): ?>
									<tr>
										<th scope="row"><?php echo $item['id']; ?></th>
										<td><?php echo $item->name;?></td>
										<td><?php echo $item->category;?></td>
										<td><?php echo $item->price.'$';?></td>
										<td><?php echo $item->quantity;?></td>
										<td>
                                            <a href="./edit_add_order.php?id=<?php echo $item['id']; ?>"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                            <a class="btn btn-danger" href="javascript:confirmDelete('<?php echo $item['id'];?>' , '<?php echo $item->name;?>') ">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
									</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								<button onclick="writeOrders()" class="btn btn-outline-secondary" type="submit">Save</button>
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
              window.location.href = "orderHelper.inc.php?id="+id+"&action=delete";
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	</body>

</html>
