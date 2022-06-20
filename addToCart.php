<?php
session_start();

require_once("handlers/connect.php");
require_once("handlers/db.php");

$productID=$_GET['id'];

$product = getWhere('products','id='.$productID);




$product[0]['qtyUser'] = 1;


if(isset($_SESSION['cart'])){
    
  $_SESSION['cart'][$productID] = $product;
}else{
    $_SESSION['cart'] = [];
    $_SESSION['cart'][$productID] = $product;
}


$_SESSION['successAddToCart'] ="add to cart ";
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';

header("Location: Products.php");
?>