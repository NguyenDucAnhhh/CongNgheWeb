<?php
require('model/service.php');
require('controller/HomeController.php');
$home=new HomeController();

if(isset($_GET['action'])&&$_GET['action']=='add'){
    $home->addProduct();
}
else if (isset($_GET['action'])&&$_GET['action']=='edit'&&isset($_GET['index'])){
    $home->editProduct($_GET['index']);
}
else if (isset($_GET['action'])&&$_GET['action']=='delete'&&isset($_GET['index'])){
    $home->deleteProduct($_GET['index']);
}
else {
    $home->index();
}