<?php

class HomeController{
    public function index(){
        $ps = new productService();
        $products = $ps->getAllProduct();
        include 'view/index.php';
    }

    public function addProduct(){
        include 'view/Add.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name=$_POST["name"];
            $price=$_POST["price"];
            $ps = new productService();
            $ps->addProduct($name, $price);
            header ("location: index.php");
        }
    }

    public function editProduct($id){
        $ps= new productService();
        $current_product=$ps->getProductById($id);
        include 'view/Edit.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $name=$_POST["name"];
            $price=$_POST["price"];
            $ps = new productService();
            $ps->editProduct($id, $name, $price);
            header ("location: index.php");
        }
    }
    public function deleteProduct($id){
        $ps= new productService();
        $ps->deleteProduct($id);
        header ("location: index.php");
    }


}