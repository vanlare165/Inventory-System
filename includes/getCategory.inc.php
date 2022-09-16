<?php
 include "..//classes/dbh.classes.php";
 include "../classes/product.classes.php";
 include "../classes/productController.classes.php";

    $getCategory = new ProductsController();
    $jsonData =  $getCategory->fetchCategory();
    echo $jsonData;
    