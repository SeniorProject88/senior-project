<?php 
session_start();
if(empty($_SESSION['user'])){
    header("LOCATION: index.php");
};
require('db.php') ;

        $total_price=$_SESSION['total-amount']['total_price']+30;
        $customer_id=$_SESSION['user'][0]['id'];

        $query="INSERT INTO `orders` (`total_price`, `status`, `customer_id`, `delivery_id`) VALUES
        ( $total_price, 0,  $customer_id, 1);";
        
        if(mysqli_query($conn,$query)){
            $_SESSION['create']="orders added successfuly";
            header("location: checkout.php");
        }else{
            echo mysqli_error($conn) ;
        }
        unset($_SESSION['cart']);

?>