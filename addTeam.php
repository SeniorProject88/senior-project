<?php 
session_start();
if(empty($_SESSION)){
	header("LOCATION: index.php");
};
require_once('handlers/db.php');
$news=getWhere('news', 'status = 1');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Add product</title>

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
	<link rel="stylesheet" href="assets/css/myorder.css">
	<link rel="stylesheet" href="assets/css/custom3.css">
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
	
		<div class="myorder">
		<div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
			<?php 
                    if(isset($_SESSION['create'])){ ?>
                        <div class="aletr alert-success h-10 d-flex justify-content-center align-items-center mb-5">
                            <?= $_SESSION['create']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['create']);    
                }
                ?>
                <div class="card w-auto">
                    <div class="card-body p-5">
                        <form action="handlers/db.php" method="post" enctype="multipart/form-data">
														<h3 class="mb-3 text-dark">Add Team</h3>
                            <div class="form-group">
                              <label class=" text-dark">Member name</label>
                              <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                              <label class=" text-dark">Member job description</label>
                              <input type="text" name="job" class="form-control">
                            </div> 
							<div class="form-group">
                              <label class=" text-dark">Member Image</label>
                              <input type="file" name="img" class="form-control">
                            </div>  
                            <div class="text-center mt-5">
                                <button name="addTeam" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
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