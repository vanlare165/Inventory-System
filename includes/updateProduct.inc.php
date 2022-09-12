<?php

//covert the json string
$obj = json_decode($_POST['data'],false);

    // grabbing data
 $product_name = $obj->product_name;
 $product_quantity = $obj->product_quantity;
 $product_desc = $obj->product_desc;
 $id = $obj->id;



 //instatiate ProductsController
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 $updateProduct = new ProductsController();
 $message = $updateProduct->update($id,$product_name,$product_desc,$product_quantity);

echo $message;

           
