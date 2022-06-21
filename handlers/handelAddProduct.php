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
            $errors[]= "plz input your name, name is required";
        }elseif(!minRange($name,2)){
            $errors[]= "name must be larger than 2 letters";

        }elseif(!maxRange($name,20)){
                $errors[]= "name must be less than 20 letters";
        }
        elseif(is_numeric($name)){
            $errors[]= "name must be a string";
    }
        //description validate 
        if(!required($description)){
            $errors[]= "plz input your description, description is required";
        }
        elseif(is_numeric($description)){
            $errors[]= "description must be a string";
    }

        //expire_date validate  
        if(!required($expire_date)){
            $errors[]= " expire_date is required";
        }

        //category_id validate  
        if(!required($category_id)){
            $errors[]= " category is required";
        }

        //price validate 
        if(!required($price)){
            $errors[]= "plz input your description, description is required";
        }
        elseif(!is_numeric($price)){
            $errors[]= "price must be number";
    }elseif(!positive($price)){
        $errors[]= "price must be a positive number";
}
        
      
       
        if(empty($errors)){  
            $img=$_FILES['img'];
            $imgName=$img['name'];
            $imgTmpName=$img['tmp_name'];
            $t=time();
            $nowDate=date('y,m,d',$t);
            $randomString="$nowDate".hexdec(uniqid());
            $ext=pathinfo($imgName,PATHINFO_EXTENSION);
            $imgNewName ="$randomString.$ext";
            $imgNewNameDB="assets/img/products/";
            $imgNewNameDB .="$randomString.$ext";
            $name=$_POST['name'];
            $category_id =$_POST['category_id']; 
            $price=$_POST['price'];
            $description=$_POST['description'];
            $Expire_Date=$_POST['expire_date'];
            $owner_id = $_POST['owner_id'];
            add("products","name, price, img, description, expire_date, owner_id ,category_id" ,
            " '$name','$price','$imgNewNameDB','$description','$Expire_Date','$owner_id' ,'$category_id' "
            ,"addproduct.php");
            move_uploaded_file($imgTmpName,"../assets/img/products/$imgNewName");
        }else{
            $_SESSION['errors']=$errors ;
            header('location: ../addproduct.php') ;
        } 
           
        
}
    else {
        header('location: ../Products.php') ;
    }

?>