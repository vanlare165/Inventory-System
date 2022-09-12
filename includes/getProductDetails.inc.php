<?php
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

 if(isset($_POST['id']))
{
    
    // grabbing data
    $product_id = $_POST['id'];
    $obj = new ProductsController();
    $jsonData = $obj->getUpdateDetails($product_id);
    echo $jsonData;
}
else
{
    echo "error ka boy";
}