<?php 
require_once('./handlers/db.php');
$sponsored=getAll('sponsored');
$team=getAll('team');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>About</title>

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

	
	
<!-- featured section -->
<div class="feature-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mt-150">
				<div class="featured-text">
					<h2 class="pb-3 text-start ">Why <span class="orange-text">Ps-khan</span></h2>
					<div class="row">
						
							<div class="marjan">
						
						<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
							<div class="list-box d-flex">
								<div class="list-icon">
									<i class="fas fa-shipping-fast"></i>
								</div>
								<div class="content">
									<h3>Home Delivery</h3>
									<p>Fast and safe delivery</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
							<div class="list-box d-flex">
								<div class="list-icon">
									<i class="fas fa-money-bill-alt"></i>
								</div>
								<div class="content">
									<h3>Free Shipping</h3>
							<p>When order over $75</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
							<div class="list-box d-flex">
								<div class="list-icon">
									<i class="fas fa-briefcase"></i>
								</div>
								<div class="content">
									<h3>Custom Box</h3>
									<p>Encapsulated safe products assortment</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="list-box d-flex">
								<div class="list-icon">
									<i class="fas fa-sync-alt"></i>
								</div>
								<div class="content">
									<h3>Coupon </h3>
							<p>Use the Coupon Code</p>
								</div>
							</div>
						</div>
					</div>
						<!---->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end featured section -->


	<!-- shop banner
	<section class="shop-banner">
    	<div class="container">
        	<h2>August sale is on! <br> with big <span class="orange-text">Discount...</span></h2>
            <div class="sale-percent"><span>Sale! <br> Upto</span>40% <span>off olives oil</span></div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	 end shop banner -->

	<!-- team section -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h2>Our <span class="orange-text">Team</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
			<?php foreach($team as $index=>$t):?>
			<div class="col-lg-4 col-md-6">	
					<div class="single-team-item">
						<div class="team-bg team"><img src="<?= $t['img']?>" alt=" " /></div>
						<h4><?= $t['name']?>  <span><?= $t['job']?> </span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>	
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- end team section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
				
					<div class="testimonial-sliders">
					<?php foreach($sponsored as $index=>$sponsore):?>
						<div class="single-testimonial-slider">
							<div class="client-avater">
							<img src="<?= $sponsore['img']?>" alt=" " />
							</div>
							<div class="client-meta">
								<h4><?= $sponsore['title']?> </h4>
								<p class="testimonial-body">
								<?= $sponsore['description']?>
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

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