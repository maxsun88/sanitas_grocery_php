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
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    	<!-- Our Custom CSS -->
    	<link rel="stylesheet" href="../assets/Backstore/backstore.css">

    	<!-- Font Awesome JS -->
    	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
									<a style="font-size: 2rem" class="btn" href="edit_add_order.php?action=insert"><i class="far fa-plus-square"></i></a>
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
                                            <a href="./edit_add_order.php?id=<?php echo $item['id']; ?>&action=edit"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                            <a class="btn btn-danger" href="javascript:confirmDelete('<?php echo $item['id'];?>' , '<?php echo $item->name;?>') ">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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
          var r = window.confirm("Confirm deleting order: " + name);
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
