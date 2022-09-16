<?php

class ProductsController extends Product
{
    private $product_name;
    private $product_quantity;
    private $product_desc;
    private $product_image;
    private $category;

    public function setItem( $product_name,  $product_quantity, $product_desc, $product_image,$category )
    {
        $this->product_name = $product_name;
        $this->product_quantity = $product_quantity;
        $this-> product_desc = $product_desc;
        $this->product_image = $product_image;
        $this->category = $category;
    }
    public function addProduct()
    {
        if($this->emptyInput() == false)
        {
            header("location: ../index.php?erorr=emptyinput");
            exit();
        }
        $this->setProduct($this->product_name,  $this->product_quantity, $this->product_desc, $this->product_image, $this->category);
    }
    public function index()
    {
        
        $data = $this->getProduct();
        return $data;
    }
    public function getUpdateDetails($id)
    {
        
        $data = $this->getUpdateProduct($id);
        return $data;
    }
    public function update($id,$product_name,$product_desc,$product_quantity,$product_image)
    {
        $data = $this->UpdateProduct($id,$product_name,$product_desc,$product_quantity,$product_image);
        return $data;
    }
    public function deleteProduct($productId)
    {
        
        $data = $this->deleteItem($productId);
        return $data;
    }
    private function emptyInput()
    {
        $result = null;
        if(empty($this->product_name) || empty($this->product_quantity) || empty($this->product_desc))
        {
           $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function fetchCategory()
    {
        
        $data = $this->getCategory();
        return $data;
    }

}
