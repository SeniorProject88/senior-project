<?php
require_once('./handlers/db.php');
if(!isset($_SESSION)){ 
    session_start(); 
} 
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}else{
    $user = $_SESSION['user'][0];
}
// echo "<pre>";
// print_r($_SESSION['user']);die;

$roles = getAll('roles');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Profile</title>

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
	<link rel="stylesheet" href="assets/css/custom3.css">
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
    <style>
        .id , .role_id , .created_at ,.status{
            display: none;
        }
    </style>
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
        <div class="container mt-5">
            <div class=" tm-content-row">
                <div class="tm-block-col tm-col-account-settings">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <div class="col-xl-12 col-lg-4 col-md-12 mx-auto mb-4 text-center">
                            <div class="container py-5 text-center">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <h3 class="mb-3 text-white">Edit <span class="text-Secondary"><?= $_SESSION['user'][0]['name'] ?></span> Profile</h3>
                                        <div class="card">
                                            <div class="card-body p-5">

                                                <form  method="POST" action="handlers/updateUser.php">
                                                <?php 
                                                    if(!empty($_SESSION['success'])):
                                                ?>
                                                            <div class="alert alert-success">
                                                                <?= $_SESSION['success']; ?>
                                                            </div>
                                                <?php
                                                    unset($_SESSION['success']) ;
                                                    endif;
                                                ?>

                                                <?php 
                                                    if(!empty($_SESSION['error'])):
                                                ?>
                                                            <div class="alert alert-danger">
                                                                <?= $_SESSION['error']; ?>
                                                            </div>
                                                <?php
                                                    unset($_SESSION['error']) ;
                                                    endif;
                                                ?>
                                                    <?php foreach($user as $key => $value) :?>
                                                        <div class="form-group <?= $key?>" >
                                                            <label class=" text-dark text-right fw-bold"><?= $key?></label>
                                                            <input type="text" class="form-control" name="<?= $key?>" value="<?= $value?>">
                                                        </div>
                                                    <?php endforeach;?>
                                                    <div class="text-center mt-5">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <a class="btn btn-dark" href="#">Back</a>
                                                    </div> 
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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