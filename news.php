<?php 
require_once('./handlers/db.php');
require_once('handlers/data.php');
$news=getWhere('news', 'status = 1');
$sponsored=getAll('sponsored');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>News</title>

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

	<!-- latest news -->
	<div class="latest-news mt-250 mb-150">
		<div class="container">
		
			<div class="row">
			<div class="grid">
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
				<div class="g-col-4 ">
				<?php foreach($news as $index=>$new):?>
					<div class="single-latest-news">
						<a href="news.php"><img src="<?= $new['img']?>" alt=" " class="latest-news-bg "/></a>
						<div class="news-text-box2">
							<h3><a href="news.php"><?= $new['title']?></a></h3>
							<p class="blog-meta">
								<span class="date"><i class="fas fa-calendar"></i><?= $new['created_at']?></span>
							</p><?= $new['description']?></p>
							
							
				</div>
			</div>
						<?php endforeach; ?>
					</div>
					
				</div>
				</div>					
			</div>

		<!--	<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		
	
	<!-- end latest news -->

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