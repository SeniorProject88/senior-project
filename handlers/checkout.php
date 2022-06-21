<?php
session_start();
$_SESSION['total-amount'] = $_POST;

header("location: ../checkout.php");

?>