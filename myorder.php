<?php 
require_once('handlers/db.php');
require_once('handlers/data.php');
$customer_id = $_SESSION['user'][0]['id'];
$customer_name = $_SESSION['user'][0]['name']; 

function getorder($table, $where){
    global $conn ;
    $getAll = "SELECT * FROM $table where $where 
    ORDER BY datetime DESC ;";
    $getAll = mysqli_query($conn,$getAll);
    $getAllData = mysqli_fetch_all($getAll,MYSQLI_ASSOC);

    return $getAllData;
}

$orders = getorder('orders' , " customer_id = $customer_id"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>My order</title>
    
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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
        
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
<body>
	
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

        
     <?php 
           if(isset($_GET['id'])){
            $products = getProductsByOrder($_GET['id']);    
                                            
   } 
        ?> 
	 <?php foreach($orders as $order):?>
                 <?php $customer = getWhere('customer' , "id = ". $order['customer_id'])[0];?>
                 
       <div class="myorder"> 
       
 <div class="card">
     

 <?php 
                    if(isset($_SESSION['create'])){ ?>
                        <div class="aletr alert-success h-10
                                d-flex justify-content-center align-items-center mb-5">
                            <?= $_SESSION['create']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['create']);    
                }
                ?>
                
               

            <div class="title">Purchase Receipt</div>
            <div class="title">Recipient: <?= $customer_name ?></div>
            <div class="info">
                <div class="row">
                    <div class="total">
                        <span id="heading">Date</span><br>
                        <span id="details"><?= $order['datetime']?></span>
                    </div>
                    <div class="total">
                        <span id="heading">Order No.</span><br>
                        <span id="details"><?= $order['id']?></span>
                    </div>
                </div>      
            </div>      
            <div class="pricing">
                <div class="row">
                     <div class="col-9">
                        <span id="name">Products</span>  
                    </div>
                    <div class="col-3">  
                        <?php $products = getProductsByOrder($order['id']);
                         for($i=0 ; $i<count($products) ;$i++ ){ ?>
                         <p class="text-white"><span class="fw-bold">(<?php echo  $products[$i]['quantity'] ?>)</span>  <?php echo $products[$i]['name'] ;?> </p> 
                        <?php  } ?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Products price</span>  
                    </div>
                    <div class="col-3">
                        <span id="price"><?= $order['total_price']-30?>$</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Shipping</span>
                    </div>
                    <div class="col-3">
                        <span id="price">30$</span>
                    </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3"><big><?= $order['total_price']?>$</big></div>
                </div>
            </div>
            <div class="tracking">
                <div class="title">Order state:</div>
            </div>
            <div class="progress-track">
            <?php if($order['status']=='0'){ ?>
                <button class="btn btn-secondary btn-lg">
                    <?php echo "Orderd"; ?> </button> <?php }
                     
                else if($order['status']=='1'){ ?>
                    <button class="btn btn-warning btn-lg">
                    <?php echo "Shipping"; ?> </button> <?php }

                     else if($order['status']=='2'){ ?>
                        <button class="btn btn-success btn-lg">
                        <?php echo "Deliverd"; ?> </button> <?php }
                    ?> 
          
            </div>
            

            <div class="footer">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">The order is expected to be received within 30 days!</div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-9">Want any help? Please &nbsp;<a href="contact.php"> contact us</a></div>
                </div>
                
               
            </div>
        </div>
        
    </div>
    <?php endforeach; ?>
		
		<!-- footer -->
			<?php require_once("./layouts/footer.php")?>
	<!-- end footer -->
	
		<!-- js files -->
    <?php require_once("./layouts/scripts.php")?>
	
	</body>
</html>