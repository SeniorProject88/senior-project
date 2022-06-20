<?php 
require_once('handlers/db.php');
require_once('handlers/data.php');
$products=getAll('products');
$categorys=getWhere('categorys', 'status = 1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Waiting list</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom3.css">
    
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/myorder.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"  />
    
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    
    <!--
         Product Admin CSS Template
        https://templatemo.com/tm-524-product-admin
    -->


</head>
<body>
<?php 
 function GoToPage($page)
 {
    header('Location: '.$page);
 }
      if(isset($_POST['approve'])) 
           {
            $product_id=$_POST['product_id'];
            require_once('handlers/connect.php');
             $myQuery = mysqli_query($conn,"UPDATE products SET status=1 where id=".$product_id ) 
             or die(mysqli_error($conn) );                                    
             GoToPage("WaitingList.php");     
   } 
              else if(isset($_POST['delete'])) 
               {
                $product_id=$_POST['product_id'];
                 require_once('handlers/connect.php');
              $myQuery = mysqli_query($conn,"UPDATE products SET status=0 where id=".$product_id ) 
            or die(mysqli_error($conn) );                                    
             GoToPage("WaitingList.php");
             } 
             if( isset($_POST['approveAll']) && !empty($_POST['product']) ) {
                                                
               foreach($_POST['product'] as $prod) {
                 $myQuery = mysqli_query($conn,"UPDATE products SET status=1 where id=".$prod ) 
                     or die(mysqli_error($conn) );                                                                         
                    }
                 GoToPage("WaitingList.php");
                    }

               else if( isset($_POST['deleteAll']) && !empty($_POST['product']) ) {
                 foreach($_POST['product'] as $prod) {
                  $myQuery = mysqli_query($conn,"UPDATE products SET status=0 where id=".$prod ) 
                   or die(mysqli_error($conn) );                                                                                      
                }
                  GoToPage("WaitingList.php");
                   }
                        ?>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    
    <!-- navbar -->
        <?php require_once("./layouts/navbar.php")?>
	<!-- end navbar -->

        
        <div class="myorder">
            <div class="container ">
            <?php 
                    if(isset($_SESSION['create'])){ ?>
                        <div class="aletr alert-success h-10 d-flex justify-content-center align-items-center mb-5">
                            <?= $_SESSION['create']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['create']);    
                }
                ?>
                <div class="row tm-content-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                    <form method = "POST" >
                        <h2 class="text-center bg-light">waiting list</h2>
                        <div class="tm-bg-primary-dark tm-block tm-block-products">
                            <div class="tm-product-table-container">
                                
                                <table class="table table-hover tm-table-small tm-product-table">
                                    <thead>
                                        <tr>
                                            <th class="text-white" scope="col">Select</th>
                                            <th class="text-white" scope="col">Product Name</th>
                                            <th class="text-white" scope="col">Image</th>
                                            <th class="text-white" scope="col">Price</th>
                                            <th class="text-white" scope="col">Description</th>
                                            <th class="text-white" scope="col">Expire Date</th>
                                            <th class="text-white" scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                           
                                    <?php foreach($products as $product):?>
                                        <tr>
                                            <th scope="row"><input type="checkbox" name="product[]" value="<?= $product['id']?>" /></th>
                                            <td class="tm-product-name text-white"><?= $product['name']?></td>
                                            <td class="text-white product-image "><img src="<?= $product['img']?>" alt="Image Not Found" ></td>
                                            <td class="text-white"><?= $product['price']?>$</td>
                                            <td class="text-white" style="width:40%;"><?= $product['description']?></td>
                                            <td class="text-white"><?= $product['expire_date']?></td>
                                            <td>
                                                
                                            <form method="POST" >
                                                <input type="hidden" value="<?= $product['id']?>" name='product_id'>
                                            <?php 
                                            if($product['status']==1) 
                                            echo("<button type='submit'class='tm-product-delete-link bg-dark' name ='delete'>
                                                    <i class='far fa-trash-alt tm-product-delete-icon'></i>								
                                                </button>");
                                            else 
                                            echo("<button type='submit' class='tm-product-delete-link accept-icon bg-dark' name ='approve'>
                                                <i class='fas fa-check '></i>
                                                  </button>");
                                            ?>
                                            </form> 
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- table container -->
                        
                            <button class="btn btn-primary btn-block text-uppercase " name="deleteAll">
                            Delete selected products
                            </button>
                            <button class="btn  btn-block text-uppercase success-color " name="approveAll">
                            Accept selected products
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
                    
            
        <!-- footer -->
            <?php require_once("./layouts/footer.php")?>
        <!-- end footer -->
    
        <!-- js files -->
            <?php require_once("./layouts/scripts.php")?>
    </body>
</html>