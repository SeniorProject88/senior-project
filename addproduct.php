<?php 
    session_start();
    if(empty($_SESSION['user'])){
        header("LOCATION: index.php");
    };

    require_once('handlers/db.php');
    $categorys=getWhere('categorys', 'status = 1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"/>
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
  
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
														<h3 class="mb-3 text-dark">Add Your Product</h3>
                            <div class="form-group">
                                <label class=" text-dark">Products Image</label>
                                <input type="file" name="img" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class=" text-dark">Products Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" text-dark">Products Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" text-dark">Products Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" text-dark">Products Expire_Date</label>
                                <input type="date" name="expire_date" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class=" text-dark">Products category</label>
                                <select class="form-control" name="category_id">
                                    <?php foreach($categorys as $category):?>
                                        <option value="<?= $category['id'] ?>"> <?= $category['name'] ?> </option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                            <div class="text-center mt-5">
                                <button name="addProduct" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                                <input type="hidden" name="owner_id" value="<?= $_SESSION['user'][0]['id']?>">
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