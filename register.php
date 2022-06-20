<?php 
require_once('handlers/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>registration</title>

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
	<!-- custom style -->
	<link rel="stylesheet" href="assets/css/custom.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .btn-primary.focus, .btn-primary:focus {
            color: #fff;
            background-color: #5b0701 !important;
            border-color: #5b0701 !important;
            box-shadow: 0 0 0 0.2rem rgb(38 143 255 / 50%);
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #5b0701 !important;
            border-color: #5b0701 !important;
        }
        .owner-form{
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
	
	<!-- header -->
	<div class="top-header-area-custom" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
		
    <!--login-->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register as : </h3>
                    
                        
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-around mb-4">
                                    <button class="btn btn-primary" id="customer_btn">Customer</button>
                                    <button class="btn btn-outline-primary" id="owner_btn">Product Owner</button>
                                </div>
                                <!-- customer form -->
                                <div class="customer-form">
                                    <?php 
                                        if(!empty($_SESSION['errors'])):
                                            foreach($_SESSION['errors'] as $error):
                                    ?>
                                                <div class="alert alert-danger">
                                                        <?= $error; ?>
                                                </div>
                                                
                                    <?php
                                            endforeach;
                                            unset($_SESSION['errors']) ;
                                        endif;
                                    ?>
                                    <form action="handlers/handlerRegister.php" class="customer-form" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" placeholder="Customer name"  id="name" name="name" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email"  id="email" name="email" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" minlength="10" maxlength="21" name="phone" placeholder="Phone" class="form-control" id="phone" required/>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" placeholder="Country" name="country" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" id="state" placeholder="State" name="state" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="zip">Zip</label>
                                                    <input type="text" class="form-control" placeholder="Zip" id="zip" name="zip" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address" required/>
                                                </div>
                                                <input type="hidden" name="role_name" value="customer">
                                                <button  type="submit" class="btnRegister" >Register</button>
                                            </div>
                                        </div>				
                                    </form>
                                </div>
                                <!-- owner form -->
                                <div class="owner-form">
                                    <?php 
                                        if(!empty($_SESSION['errorss'])):
                                            foreach($_SESSION['errorss'] as $errorr):
                                    ?>
                                                <div class="alert alert-danger">
                                                    <?= $errorr; ?>
                                                </div>
                                    <?php
                                            endforeach;
                                        unset($_SESSION['errorss']) ;
                                        endif;
                                    ?>
                                    <form action="handlers/handlerRegisterOwner.php" class="owner-form" method="post">				
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pname">Name</label>
                                                    <input type="text" class="form-control" placeholder="Owner name" id="pname" name="pname" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pemail">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" id="pemail" name="pemail" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ppassword">Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" id="ppassword" name="ppassword" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="companyname">Company's Name</label>
                                                    <input type="text" class="form-control" placeholder="Company name" id="companyname" name="companyname" required/>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="companyid">Company id</label>
                                                    <input type="text" class="form-control" placeholder="Company id" id="companyid" name="companyid" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pphone">Phone</label>
                                                    <input type="text"  name="pphone" placeholder="Phone" class="form-control" id="pphone" required/>
                                                </div>
                                                <input type="hidden" name="role_name" value="product_owners">
                                                <button  type="submit" class="btnRegister" >Register</button>
                                            </div>
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
    <!--end login-->
	
		
    <!-- footer -->
        <?php require_once("./layouts/footer.php")?>
    <!-- end footer -->
	
		<!-- js files -->
    <?php require_once("./layouts/scripts.php")?>
	
	</body>
</html>