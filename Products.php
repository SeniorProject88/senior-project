<?php 
require_once('handlers/db.php');
require_once('handlers/data.php');
require_once('layouts/classes.php');
$sponsored=getAll('sponsored');
$products=getWhere('products','status=1');
$products=getWhere('products', 'status = 1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Products</title>

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
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

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
	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>High quality & reliability</p>
						<h1>Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
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
                    <div class="product-filters">
                        <ul>
						<li data-filter="*" class="filter-active">All</li>
            <?php  foreach($categorys as $category):?>
								<li data-filter=".<?= $category['id']?>"> <?= $category['name']?> </li>
						<?php endforeach; ?>
                          
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists productsContainer">
			<?php foreach($products as $product):?>
					<div class="col-lg-4 col-md-6 text-center mix <?= $product['category_id']?>">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#"><img src="<?= $product['img']?>" alt=""></a>
								</div>
								<h3><?= $product['name']?></h3>
								<p><?= $product['description']?></p>
								<p class="product-price"><span></span> <?= $product['price']?>$</p>
									<a href="addToCart.php?id=<?=$product['id']?>" class="cart-btn">
								<i class="fas fa-shopping-cart"></i> Add to Cart</a>

							</div>
					</div>
				<?php endforeach; ?>
			</div>

		
		</div>
	</div>
	<!-- end products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
					<?php foreach($sponsored as $index=>$sponsore):?>
						<div class="single-logo-item">
						<img src="<?= $sponsore['img']?>" alt=" " />
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

    <!-- footer -->
				<?php require_once("./layouts/footer.php")?>
    <!-- end footer -->
	
	<!-- js files -->
    <?php require_once("./layouts/scripts.php")?>
</body>
</html>