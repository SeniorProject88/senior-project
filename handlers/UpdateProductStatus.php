<?php
    require_once("db.php");
    extract($_POST);
  
    $product_id=$product['id'];

    if($status == 0){

        $result =  approve ($id , $name , $price , $quantity , $img , $description , $expire_date, $status , $owner_id , $category_id );
        if($result){
            $_SESSION['user'] = $result;
            $_SESSION['success'] = "status updated successfully";
            header("location: ../Products.php");
        }else{
            $_SESSION['error'] = "solve error";
            header("location: ../waitingList.php");
        }
    }


?>