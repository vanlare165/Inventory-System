<?php

class Product extends Dbh
{
    protected function setProduct($product_name,  $product_quantity, $product_desc, $product_image,$category)
    {
       $stmt = $this->connect()->prepare('INSERT INTO products (product_name,  product_quantity, product_desc, product_image, category_id) VALUES (?,?,?,?,?);');

       
       if(!$stmt->execute(array($product_name,$product_quantity, $product_desc,$product_image,$category)))
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
        $stmt = $this->connect()->prepare('Delete FROM products WHERE id ='.$product_id.';');
        $stmt->execute();
        $message = 'The product has been deleted!';
        return $message;
       
     
        
        
     }
     protected function getProduct()
     {
        
        $stmt = $this->connect()->prepare('SELECT * FROM products;');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $jsonData = json_encode($data);
        return $jsonData ;
      
     }
     protected function getUpdateProduct($id)
     {
        
        $stmt = $this->connect()->prepare('SELECT * FROM products WHERE id='.$id.';');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $jsonData = json_encode($data);
        return $jsonData ;
      
     }
     protected function UpdateProduct($id,$product_name,$product_desc,$product_quantity,$product_image)
     {
        
        $stmt = $this->connect()->prepare('UPDATE products SET product_name =?, product_desc =?, product_quantity =?, product_image=? WHERE id =?;');
        $stmt->execute(array($product_name,$product_desc,$product_quantity,$product_image,$id));
        $message = 'The product has been updated!';
        return $message;
      
     }
     protected function getCategory()
     {
        
        $stmt = $this->connect()->prepare('SELECT * FROM category;');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $jsonData = json_encode($data);
        return $jsonData ;
      
     }
}
