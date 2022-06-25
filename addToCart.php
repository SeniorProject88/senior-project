<?php
session_start();

require_once("handlers/connect.php");
require_once("handlers/db.php");



$productID=$_GET['id'];
$product = getWhere('products','id='.$productID);
$user_id = $_SESSION['user'][0]['id'];



$product[0]['qtyUser'] = 1;


if(isset($_SESSION['cart'])){
    
  $_SESSION['cart'][$productID][$user_id] = $product;
}else{
    $_SESSION['cart'] = [];
    $_SESSION['cart'][$productID][$user_id]  = $product;
}
// echo "<pre>";
// print_r($_SESSION['cart']);
// die;

$_SESSION['successAddToCart'] ="add to cart ";



header("Location: Products.php");
?>