<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>



	<!-- Add Modal -->
	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="category">Select Product Category</label>
						<select class="form-select" aria-label="Default select example" id="category">
							
							
						</select>
					</div>
					<div class="form-group">
						<label for="product_name">Product Name</label>
						<input type="text" class="form-control" id="product_name" placeholder="Enter Product Name">
					</div>
					<div class="form-group">
						<label for="product_quantity">Product Quantity</label>
						<input type="text" class="form-control" id="product_quantity" placeholder="Enter Product Quantity">
					</div>
					<div class="form-group">
						<label for="product_desc">Product Description</label>
						<textarea class="form-control" id="product_desc" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="image">Product Image</label>
						<input type="file" class="fileToUpload form-control" />
						<input type="text" placeholder="Image Name" id="image_name" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="addProduct()">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
	<!-- Modal delete-->
	<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to Delete this Product?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" onclick="deleteProduct()">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="hidden" id="hiddenId">

				</div>
			</div>
		</div>
	</div>
	<!-- update Modal -->
	<div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="updateproduct_name">Product Name</label>
						<input type="text" class="form-control" id="updateproduct_name" placeholder="Enter Product Name">
					</div>
					<div class="form-group">
						<label for="updateproduct_quantity">Product Quantity</label>
						<input type="text" class="form-control" id="updateproduct_quantity" placeholder="Enter Product Quantity">
					</div>
					<div class="form-group">
						<label for="updateproduct_desc">Product Description</label>
						<textarea class="form-control" id="updateproduct_desc" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="image">Product Image</label>
						<input type="file" class="updatefileToUpload form-control" />
						<input type="hidden" placeholder="Image Name" id="updateimage_name" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="updateProduct()">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="hidden" id="updateHiddenId">

				</div>
			</div>
		</div>
	</div>


	<div class="container mt-5">

		<h1 class="text-primary mt-3 mb-4 text-center"><b>Inventory System</b></h1>
		<div id="alert"></div>



		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col col-md-6"><b>Inventory</b></div>

				</div>
			</div>
			<div class="card-body">
				<div class="wrap-right">
					<div class="col col-md-6">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add Product</button>
					</div>
				</div>


				<div class="table-responsive-sm">
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>Product Image</th>
								<th>Product Name</th>
								<th>Quantity
									<span class="float-end text-sm" style="cursor: pointer">
										<i class="fa fa-arrow-up text-muted"></i>
										<i class="fa fa-arrow-down"></i>
									</span>
								</th>
								<th>Product Description</th>
								<th>Action</th>


							</tr>
						</thead>


					</table>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>



</body>

</html>