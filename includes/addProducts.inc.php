<?php

//covert the json string
$obj = json_decode($_POST['data'],false);

    // grabbing data
 $product_name = $obj->product_name;
 $product_quantity = $obj->product_quantity;
 $product_desc = $obj->product_desc;



 //instatiate ProductsController
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 $addProduct = new ProductsController();
 $addProduct->setItem($product_name, $product_quantity,$product_desc);

//Running error handler and product model
$addProduct->addProduct();

//going back to front end
header("location: ../index.php?erorr=none");
           
