<?php 
    session_start();
    require('db.php') ;
    require('function.php') ;
    extract($_POST);

    // checck for email and password

    // $errors for select email password and the role
    if(!required($role_id)){
        $errors[] = "You must choose your user type.";
    }
    if(!required($email)){
        $errors[] = "You must enter the email.";
    }
    if(!required($password)){
        $errors[] = "You must enter the password.";
    }

    if(empty($errors)){
        $table = getRoleNameByRoleId($role_id)[0]['name'];
        $user = login($table, $email , $password);
        // echo "<pre>";
        // print_r($user);die;
        if($user) {
            $_SESSION['user'] = $user;
            header('location: ../index.php') ;
        }else{
            $errors[] = "Please check for your email and password";
            $_SESSION['errors']= $errors ;
            header('location: ../login.php') ;
        }
    }else{
        $_SESSION['errors']= $errors ;
        header('location: ../login.php') ;
    }
?>