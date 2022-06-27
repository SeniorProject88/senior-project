<?php 
require_once('handlers/db.php');
require_once('handlers/data.php');
$deleivery_id = $_SESSION['user'][0]['id'];
$orders = getWhere('orders' , "delivery_id = $deleivery_id");

    
/* echo '<pre>';
print_r( $products[0]['name']);
echo '</pre>';
die; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>OrderList</title>

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

<style>
.ordered{
	background-color: #D2222D; 
}
.shipping{
	background-color: #FFBF00; 
}
.deliverd{
	background-color: #238823; 
}
.dropbtn {
  background-color: #ddd;
  color: #000;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  box-shadow: 0px 8px 1px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

</head>
<body>

     <?php 
           if(isset($_GET['id'])){
            $products = getProductsByOrder($_GET['id']);    
                                            
   } 
        ?> 
<?php 
function GoToPage($page)
{
    header('Location: '.$page);
}
    if(isset($_POST['approve'])) 
        {
            $order_id=$_POST['order_id'];
            require_once('handlers/connect.php');
            $myQuery = mysqli_query($conn,"UPDATE orders SET status='1' where id=".$order_id ) 
            or die(mysqli_error($conn) );                                    
            GoToPage("orderList.php");     
} 
            else if(isset($_POST['delete'])) 
            {
                $order_id=$_POST['order_id'];
                require_once('handlers/connect.php');
                $myQuery = mysqli_query($conn,"UPDATE orders SET status='2' where id=".$order_id ) 
                or die(mysqli_error($conn) );                                    
                GoToPage("orderList.php");
            } 
            if( isset($_POST['approveAll']) && !empty($_POST['order']) ) {
                                                
                    foreach($_POST['order'] as $prod) {
                        $myQuery = mysqli_query($conn,"UPDATE orders SET status='1' where id=".$prod ) 
                            or die(mysqli_error($conn) );                                                                         
                            }
                        GoToPage("orderList.php");
                    }

            else if( isset($_POST['deleteAll']) && !empty($_POST['order']) ) {
                    foreach($_POST['order'] as $prod) {
                    $myQuery = mysqli_query($conn,"UPDATE orders SET status='2' where id=".$prod ) 
                    or die(mysqli_error($conn) );                                                                                      
                    }
                    GoToPage("orderList.php");
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
    
    <div class="container">
        <div class="row">
           
        </div>
        
        <div class="row tm-content-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                    <form method = "POST" >
                        <h2 class="text-center bg-light">Orders list</h2>
                        <div class=" flw">
                            <div class=" flw">
                                
                                <table class="table table-hover tm-table-small tm-product-table">
                                    <thead>
                                        <tr>
                                            <th class="text-white" scope="col">Select</th>
                                            <th class="text-white" scope="col">ORDER NO.</th>
                                            <th class="text-white" scope="col">Customer Name</th>
                                            <th class="text-white" scope="col">Phone</th>
                                            <th class="text-white" scope="col">Country</th>
                                            <th class="text-white" scope="col">State</th>
                                            <th class="text-white" scope="col">zip</th>
                                            <th class="text-white" scope="col">address</th>
                                            <th class="text-white" scope="col">Total price</th>
                                            <th class="text-white" scope="col">Order Date</th>
                                            <th class="text-white" scope="col">Products</th>     
                                            <th class="text-white" scope="col">Actions</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($orders as $order):?>
                                        <?php $customer = getWhere('customer' , "id = ". $order['customer_id'])[0];?>
                                        
                                        <tr  
                                        <?php   
                                            if($order['status']=='0'){ ?> 
                                           class='ordered';
                                            <?php } else if($order['status']=='1'){ ?>
                                                class='shipping';
                                                <?php } else if($order['status']=='2'){ ?>
                                                class='deliverd';
                                                <?php } ?>
                                         >
                                            <th scope="row"><input type="checkbox" name="order[]" value="<?= $order['id']?>" /></th>
                                            <td class="tm-product-name text-white"><?= $order['id']?></td>
                                            <td class="text-white"><?= $customer['name']?></td>
                                            <td class="text-white"><?= $customer['phone']?></td>
                                            <td class="text-white"><?= $customer['country']?></td>
                                            <td class="text-white"><?= $customer['state']?></td>
                                            <td class="text-white"><?= $customer['zip']?></td>
                                            <td class="text-white"><?= $customer['address']?></td>
                                            <td class="text-white"><?= $order['total_price']?>$</td>
                                            <td class="text-white"><?= $order['datetime']?></td>
                                            <td>
                                         <div class="dropdown">
                                                <button class="dropbtn">show products</button>
                                                <div class="dropdown-content text-black-50">
                                                    <?php $products = getProductsByOrder($order['id']);
                                                    for($i=0 ; $i<count($products) ;$i++ ){ ?>
                                     <p> <?php echo $products[$i]['name'] ;?> <span>#<?php echo  $products[$i]['quantity']?></span></p> 
                                              <?php  } ?> 
                                                </div>
                                                </div> 
                                            </td>
                                            <td>
                                                <form method="POST" >
                                                    <input type="hidden" value="<?= $order['id']?>" name='order_id'>
                                                <?php 
                                                if($order['status']==1) 
                                                echo("<button type='submit'class='tm-product-delete-link bg-dark'  name ='delete'>
                                                        <i class='fas fa-truck tm-product-delete-icon'></i>								
                                                    </button>");
                                                else if ($order['status']=='2')
                                                echo("<button type='submit' class='tm-product-delete-link accept-icon bg-dark' name ='approve'>
                                                    <i class='fas fa-check '></i>
                                                    </button>");
                                                else 
                                                echo("<button type='submit' class='tm-product-delete-link bg-dark' name ='approve'>
                                                <i class='fas fa-pause'></i>
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
                            <button class="btn  btn-block text-uppercase btn btn-light " name="approveAll">
                            Put selected orders in shipping state
                            </button>
                            <button class="btn  btn-block text-uppercase btn btn-secondary " name="deleteAll">
                            Put selected orders in deliverd state
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
