<?php
    require_once("db.php");
    extract($_POST);

    $role_name = getRoleNameByRoleId($role_id)[0]['name'];

    if($role_name == 'admin'){

        $result = editAdmin($id , $name , $email , $password );
        if($result){
            $_SESSION['user'] = $result;
            $_SESSION['success'] = "profile updated successfully";
            header("location: ../profile.php");
        }else{
            $_SESSION['error'] = "email already taken";
            header("location: ../profile.php");
        }
    }elseif($role_name == 'customer'){

        $result = editCustomer($id , $name , $email , $password ,$phone, $address, $country, $zip , $state, $status);
        if($result){
            $_SESSION['user'] = $result;
            $_SESSION['success'] = "profile updated successfully";
            header("location: ../profile.php");
        }else{
            $_SESSION['error'] = "email already taken";
            header("location: ../profile.php");
        }
    }elseif($role_name == "product_owners"){

        $result = editProductOwner($id , $name , $email , $password , $phone , $company_name , $company_id);
        if($result){
            $_SESSION['user'] = $result;
            $_SESSION['success'] = "profile updated successfully";
            header("location: ../profile.php");
        }else{
            $_SESSION['error'] = "email already taken";
            header("location: ../profile.php");
        }
    }


?>