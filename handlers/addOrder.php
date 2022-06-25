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
        mysqli_query($conn, $query);
        $last_id = $conn->insert_id;




       foreach($_SESSION['cart'] as $key => $value){
   
        $query ="INSERT INTO `order_products` (`order_id`, `product_id`) VALUES
        ('$last_id' , '$key' );";  

        mysqli_query($conn, $query);

       }

       if(mysqli_error($conn)){
            echo mysqli_error($conn);

       }else{
        $_SESSION['create']="orders added successfuly";
        header("location: checkout.php");
        unset($_SESSION['cart']);
       }

        
           
        
        

?>