<?php 
    session_start();
    require('function.php') ;
    require('db.php') ;
        if($_SERVER['REQUEST_METHOD']=='POST'){

            foreach($_POST as $key=>$value){
                $$key=validate($value);
            }


                //product owner validaaate
                //name validate 
                if(!required($pname)){
                    $errorss[]= "plz input your name, name is required";
                }elseif(!minRange($pname,3)){
                    $errorss[]= "name must be larger than 3 letters";

                }elseif(!maxRange($pname,20)){
                        $errorss[]= "name must be less than 20 letters";
                }

                //email validate 
                if(!required($pemail)){
                    $errorss[]= "plz input your email, email is required";
                }elseif(!minRange($pemail,10)){
                    $errorss[]= "email must be larger than 4 letters";

                }elseif(!maxRange($pemail,60)){
                        $errorss[]= "email must be less than 60 letters";
                }elseif(emailvalidate($pemail)){
                    $errorss[]= "plz enter valid email";
                }

                //password validate 
                if(!required($ppassword)){
                    $errorss[]= "plz input your password, password is required";
                }elseif(!minRange($ppassword,4)){
                    $errorss[]= "password must be larger than 4 letters and numbers";

                }elseif(!maxRange($ppassword,30)){
                        $errorss[]= "password must be less than 30 letters and numbers";
                }



                //Company's Name
                if(!required($companyname)){
                    $errorss[]= "plz input your company name, company name is required";
                }elseif(!minRange($companyname,3)){
                    $errorss[]= "company name must be larger than 3 letters";

                }elseif(!maxRange($companyname,20)){
                        $errorss[]= "company name must be less than 20 letters";
                }

                //Company's ID
                if(!required($companyid)){
                    $errorss[]= "plz input your company id, company id is required";
                }elseif(!minRange($companyid,3)){
                    $errorss[]= "company name must be larger than 3 numbers";

                }elseif(!maxRange($companyid,20)){
                        $errorss[]= "company name must be less than 20 numbers";
                }

                //phone validate 
                if(!required($pphone)){
                    $errorss[]= "plz input your phone, phone is required";
                }elseif(!minRange($pphone,4)){
                    $errorss[]= "phone must be larger than 4 numbers";

                }elseif(!maxRange($pphone,30)){
                        $errorss[]= "phone must be less than 21 numbers";
                }
                  // Check if the email is exist or not
                $select = mysqli_query($conn, "SELECT * FROM product_owners WHERE email = '{$pemail}' ");
                if (mysqli_num_rows($select)) {
                    $errorss[]= "Email is already taken.";
                }   

                if(empty($errorss)){
                    $role= getIdByRoleName('roles' , $_POST["role_name"]);
                    $role_id = $role[0]['id'];
                    register("product_owners","Name,Email,Password,Company_name,Company_ID,Phone,role_id" ," '$pname','$pemail','$ppassword','$companyname','$companyid','$pphone', '$role_id'");
                }else{
                    $_SESSION['errorss']=$errorss ;
                    header('location: ../register.php') ;
                }

    }else {
        header('location: ../register.php') ;
    }
?>