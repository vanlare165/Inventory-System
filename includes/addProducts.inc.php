<?php

//covert the json string
$obj = json_decode($_POST['data'],false);
$image_name = $_POST['image_name'];
$taget_directory = "../images/";
$target_file = $taget_directory.basename($_FILES["image"]["name"]);
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newfilename = $image_name.".".$filetype;
$file_name_with_directory = $taget_directory.$image_name.".".$filetype;


//move the image file to images
move_uploaded_file($_FILES["image"]["tmp_name"],$file_name_with_directory);

    // grabbing data
 $product_name = $obj->product_name;
 $product_quantity = $obj->product_quantity;
 $product_desc = $obj->product_desc;
 $category = $obj->category;



 //instatiate ProductsController
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 $addProduct = new ProductsController();
 $addProduct->setItem($product_name, $product_quantity,$product_desc,$newfilename,$category);

//Running error handler and product model
$addProduct->addProduct();

//going back to front end

           
