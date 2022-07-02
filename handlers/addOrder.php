<?php 
session_start();
if(empty($_SESSION['user'])){
    header("LOCATION: index.php");
};
require('db.php') ;
        
        $total_price= (int)$_SESSION['total-amount']['total_price']+30;
        $customer_id=$_SESSION['user'][0]['id'];

        $query="INSERT INTO orders (total_price, status, customer_id, delivery_id) VALUES
        ($total_price, '0',  $customer_id, 1);";
        mysqli_query($conn, $query);
        $last_id = $conn->insert_id;



        $k=1;
        foreach($_SESSION['cart'] as $key => $value){
            $q= $_SESSION['total-amount']['quantity'.$k];
            $k++;
            if( $q != "" && !empty($q) && $q != 0){
                $query ="INSERT INTO order_products (order_id,product_id , quantity) VALUES
                ($last_id , $key ,$q);"; 
        
                mysqli_query($conn, $query);
                $_SESSION['create']="orders added successfuly";
                header("location: checkout.php");
                unset($_SESSION['cart']);
            }else{
                $_SESSION['error'] = "Quantity can't be empty";
                header("LOCATION: ../cart.php");
            }
        }

?>