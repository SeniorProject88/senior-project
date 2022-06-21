<?php
    require_once("db.php");
    extract($_POST);

    $role_name = getRoleNameByRoleId($role_id)[0]['name'];
    
    if($role_name == 'customer'){

        $result = editCustomer($id , $name , $email , $password , $country , $address, $state, $zip , $status,$phone);
        if($result){
            $_SESSION['user'] = $result;
            $_SESSION['success'] = "your data updated successfully";
            header("location: ../checkout.php");
        }
    }


?>