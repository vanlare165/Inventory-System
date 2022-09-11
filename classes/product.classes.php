<?php

class Product extends Dbh
{
    protected function setProduct($product_name,  $product_quantity, $product_desc)
    {
       $stmt = $this->connect()->prepare('INSERT INTO products (product_name,  product_quantity, product_desc) VALUES (?,?,?);');

       
       if(!$stmt->execute(array($product_name,$product_quantity, $product_desc)))
       {
           $stmt = null;
           header("location: ../index.php?erorr=stmtfailed");
           exit();
       }
       $resultCheck = null;
       
    }
     protected function checkProduct($product_name)
     {
        $stmt = $this->connect()->prepare('SELECT product_name FROM products WHERE product_name =?;');

        if(!$stmt->execute($product_name))
        {
            $stmt = null;
            header("location: ../index.php?erorr=stmtfailed");
            exit();
        }
        $resultCheck = null;
        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
     }
     protected function deleteItem($product_id)
     {
        $stmt = $this->connect()->prepare('Delete FROM products WHERE id =?;');
        $stmt->execute($product_id);
        
       
     
        
        
     }
     protected function getProduct()
     {
        
        $stmt = $this->connect()->prepare('SELECT * FROM products;');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $jsonData = json_encode($data);
        return $jsonData ;
      
     }
}