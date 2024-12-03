<?php
require 'model/product.php';
require 'config/BaseModel.php';

class productService {
    public function getAllProduct()
    {
        require 'config/BaseModel.php';
        $stmt = $conn->query("SELECT * FROM product");
        $products = array();
        while ($row = $stmt->fetch()) {
            $product = new product($row['id'],$row['name'],$row['price']);
            $products[] = $product;

        }
        return $products;
    }
    public function addProduct($name,$price){
        require 'config/BaseModel.php';
        $stmt = $conn->prepare( "INSERT INTO product(name,price) VALUES(:name,:price)");
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':price',$price,PDO::PARAM_STR);
        $stmt->execute();
    }
    public function editProduct($id,$name,$price){
        require 'config/BaseModel.php';
        $stmt = $conn->prepare( "UPDATE product SET name=:name, price=:price WHERE id=:id");
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':price',$price,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getProductById($id){
        require 'config/BaseModel.php';
        $stmt = $conn->prepare( "SELECT * FROM product WHERE id=:id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $product = $stmt->fetch();
    }
    public function deleteProduct($id){
        require 'config/BaseModel.php';
        $stmt = $conn->prepare( "DELETE FROM product WHERE id=:id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}