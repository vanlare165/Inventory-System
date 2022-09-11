<?php

//covert the json string
$obj = json_decode($_POST['id'],false);

    // grabbing data
 $product_id = $obj->product_id;




 //instatiate ProductsController
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 $deleteProduct = new ProductsController();
 

//Running error handler and product model
$deleteProduct->deleteProduct($product_id);

//going back to front end
header("location: ../index.php?erorr=none");
           
