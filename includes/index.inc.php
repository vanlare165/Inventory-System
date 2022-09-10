<?php
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

    $addProduct = new ProductsController();
    $jsonData = $addProduct->index();
    echo $jsonData;
    

