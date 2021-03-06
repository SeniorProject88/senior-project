<?php 
    session_start();
    require('function.php') ;
    require('db.php') ;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $data = $_SESSION;

        foreach($_POST as $key=>$value){
            $$key=validate($value);
        }

        //name validate 
        if(!required($name)){
            $errors[]= "name is required";
        }elseif(!minRange($name,3)){
            $errors[]= "name must be larger than 2 letters";

        }elseif(!maxRange($name,20)){
                $errors[]= "name must be less than 20 letters";
        }
        elseif(is_numeric($name)){
            $errors[]= "name must be a string";
    }

        //email validate 
        if(!required($email)){
            $errors[]= "email is required";
        }elseif(!minRange($email,10)){
            $errors[]= "email must be larger than 4 letters";

        }elseif(!maxRange($email,60)){
                $errors[]= "email must be less than 60 letters";
        }elseif(!emailvalidate($email)){
            $errors[]= "enter valid email";
        }

        //password validate 
       
        if(empty($password)){
            $errors[]="password is required";
            }elseif(strlen($password)>30){
                $errors[]="password is too large";
            }elseif(!preg_match("#[0-9]+#",$password)) {
                $errors[] = "Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                $errors[] = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
    

        //phone validate 
        if(!required($phone)){
            $errors[]= "phone is required";
        }elseif(!minRange($phone,4)){
            $errors[]= "phone must be larger than 4 numbers";

        }elseif(!maxRange($phone,20)){
                $errors[]= "phone must be less than 21 numbers";
        }elseif(!is_numeric($phone)){
            $errors[]= "phone must be number";
    }


        //country validate 
        if(!required($country)){
            $errors[]= "country is required";
        }elseif(!minRange($country,3)){
            $errors[]= "country must be larger than 2 letters";

        }elseif(!maxRange($country,21)){
                $errors[]= "country must be less than 21 letters";
        }elseif(is_numeric($country)){
            $errors[]= "country must be a string";
    }
        //state validate 
        if(!required($state)){
            $errors[]= "state is required";
        }elseif(!minRange($state,3)){
            $errors[]= "state must be larger than 3 letters";

        }elseif(!maxRange($state,30)){
                $errors[]= "state must be less than 30 letters";
        }
        elseif(is_numeric($state)){
            $errors[]= "state must be a string";
    }

        //zip validate 
        if(!required($zip)){
            $errors[]= "zip is required";
        }elseif(!minRange($zip,3)){
            $errors[]= "zip must be larger than 3 numbers";

        }elseif(!maxRange($zip,21)){
                $errors[]= "zip must be less than 21 numbers";
        }elseif(!is_numeric($zip)){
            $errors[]= "zip must be number";
    }


        //address validate 
        if(!required($address)){
            $errors[]= "address is required";
        }elseif(!minRange($address,3)){
            $errors[]= "address must be larger than 3 letters";

        }elseif(!maxRange($address,30)){
                $errors[]= "address must be less than 30 letters";
        }elseif(is_numeric($address)){
            $errors[]= "address must be a string";
    }


        // Check if the email is exist or not
        $select = mysqli_query($conn, "SELECT * FROM customer WHERE email = '{$email}' ");
        if (mysqli_num_rows($select)) {
            $errors[]= "Email is already taken.";
        }
        if(empty($errors)){
            $role= getIdByRoleName('roles' , $_POST["role_name"]);
            $role_id = $role[0]['id'];
            register("customer","Name,Email,Password,Phone,Address,Country,Zip,State ,role_id" ," '$name','$email','$password','$phone','$address','$country','$zip','$state' , '$role_id' ");
        }else{
            $_SESSION['errors']=$errors ;
            header('location: ../register.php') ;
        }
}
    else {
        header('location: ../profile.php') ;
    }

?>