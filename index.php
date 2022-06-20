<?php 
		require_once('./handlers/db.php');
		$news=getWhere('news', 'status = 1');
		$sponsored=getAll('sponsored');
		$products=getAll('products');
		if(isset($_SESSION['user'][0]['id'])){
			$id= $_SESSION['user'][0]['id'];
			$customer=getOnce('customer',"id = $id");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<!-- title -->
	<title>Ps-Khan</title>
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
	
	<!-- navbar -->
        <?php require_once("./layouts/navbar.php")?>
	<!-- end navbar -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Trusted & Organic</p>
									<h1>Welcome to Ps-khan</h1>
								<div class="hero-btns">
									<a href="Products.php" class="boxed-btn">Ps-khan collection</a>
									<a href="contact.php" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-right">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Fresh Everyday</p>
								<h1>100% Organic Collection</h1>
									
									<div class="hero-btns">
										<a href="Products.php" class="boxed-btn">Visit Shop</a>
										<a href="contact.php" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		<!-- single home slider -->
	<!--	<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Trusted & Organic</p>
								<h1>Welcome to</h1>
							
								<div class="hero-btns">
									<a href="shop.php" class="boxed-btn">Fruit Collection</a>
									<a href="contact.php" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
	
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-tag"></i>
						</div>
						<div class="content">
							<h3>Coupon </h3>
							<p>Use the Coupon Code</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<!-- <div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
				
					<div class="testimonial-sliders">
					<?php foreach($products as $product):?>
						<div class="single-testimonial-slider">
							<div class="product-img">
							<div class="client-avater2" > <img src="<?= $product['img']?>  " /> </div>
							<div class="client-meta ">
								<h4><?= $product['name']?> </h4>
								<p class="ttestimonial-body">
								<?= $product['description']?></p>
								<h3><?= $product['price']?> </h3>
								
								<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								
							</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					
				</div>
			</div>
		</div>
	</div> -->
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
						<img class="h-100" src="assets/img/b.jpg" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>On the occasion of Eid-aladha </h4>
                    <div class="text">30% off Eid-cake for this month</div>
                    <!-- Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2022/7/10"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

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
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=LT29lZ2RyS8" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
					
						<h2>We are <span class="orange-text">PS Khan</span></h2>
						
						<p>We work to support the local product and start-up companies in Palestine. We provide Palestinian-made products that are difficult to find abroad for expatriates. Welcome to our website.</p>
						<a href="about.php" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h2>July sale is on! <br> with big <span class="orange-text">Discount...</span></h2>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="Products.php" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	<!-- end shop banner -->

	

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