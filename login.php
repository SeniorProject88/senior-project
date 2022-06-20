<?php 
require_once('handlers/db.php');
if(!isset($_SESSION)){ 
    session_start(); 
} 

error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: profile.php");
}
$roles = getAll('roles');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['name'];
        header("Location: profile.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
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
    <title>login</title>

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
    <link rel="stylesheet" href="assets/css/custom2.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
    
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
    <div class="black-bg">
		
	</div>
        
    <!--login-->
    <section class="login-reg-panel">
        <div class="register-info-box">
            <h2>Don't have an account?</h2>
            <a id="label-login" href="register.php">Register</a>
            <input type="radio" name="active-log-panel" id="log-login-show" >
        </div>
                            
        <div class="white-panel">
            <div class="login-show">
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
                <h2>LOGIN</h2>
                <form action="handlers/handleLogin.php" method="POST">
                    <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    <button  type="submit" name="login" class="btnlogin" >Login</button>
                    <div class="d-flex align-items-center">
                        <?php foreach($roles as $role):?>
                            <input class="d-block " type="radio" name="role_id" value="<?= $role['id']?>" id="<?= $role['name']?>">
                            <label class="mr-3" for="<?= $role['name']?>"><?= $role['name']?></label>
                        <?php endforeach;?>
                    </div>
                </form>
                <p>Don't have an account?<a href="register.php">Click here</a></p>
            </div>
        </div>
    </section>
    <!--end login-->
        
    <!-- footer -->
    <section class="d-block">
        <?php require_once("./layouts/footer.php")?>
    </section>
    <!-- end footer -->
    
    <!-- js files -->
    <?php require_once("./layouts/scripts.php")?>
    </body>
</html>