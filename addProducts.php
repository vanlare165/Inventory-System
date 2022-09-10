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
<div class='card'>
    <div class='card-header'>Add Product</div>
    <div class='card-body'>
        <form action="includes/addProducts.inc.php" method="POST">
         
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Name</label>
				<div class="col-sm-10">
					<input type="text" name="product_name" class="form-control" />
				</div>
            </div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Quantity</label>
				<div class="col-sm-10">
					<input type="text" name="product_quantity" class="form-control" />
				</div>
               
            </div>
            <div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Description</label>
				<div class="col-sm-10">
                <textarea id="pdesc" name="product_desc" rows="4" cols="50">
                  
                </textarea>
				</div>
            </div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Image</label>
				<div class="col-sm-10">
					<input type="file" name="product_img"/>
				</div>
            </div>
            
            <div class="text-center">
				<input type="submit" class="btn btn-primary" name="add" />
			</div>	
        </form>
    </div>
</div>

    
</body>
</html>

