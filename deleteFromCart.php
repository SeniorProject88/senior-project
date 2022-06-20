<?php
session_start();

$productID=$_GET['id'];
unset($_SESSION['cart'][$productID]);

header("Location: cart.php");
?>