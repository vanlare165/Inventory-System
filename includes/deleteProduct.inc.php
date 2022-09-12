<?php

//covert the json string
if(isset($_POST['id']))
{
    
    // grabbing data
 $product_id = $_POST['id'];




 //instatiate ProductsController
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 $deleteProduct = new ProductsController();
 

//Running error handler and product model
$messgage = $deleteProduct->deleteProduct($product_id);
echo $messgage;


}else
{
    echo 'errorka';
}

