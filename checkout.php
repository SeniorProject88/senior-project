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
	// print_r($_SESSION);die;

	$roles = getAll('roles');

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
	<title>Check Out</title>

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

	<style>
        .id , .role_id , .created_at ,.status , .email , .password{
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

	<!-- check out section -->
	<div class="checkout-section mt-250 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						  <?php 
                    if(isset($_SESSION['create'])){ ?>
                        <div class="aletr alert-success h-10 d-flex justify-content-center align-items-center mb-5">
                            <?= $_SESSION['create']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['create']);    
                }
                ?>
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form  method="POST" action="handlers/updateCheckout.php">
						        	<!--	<p><input type="text" placeholder="Name"></p>
						        		<p><input type="email" placeholder="Email"></p>
						        		<p><input type="text" placeholder="Country"></p>
						        		<p><input type="text" placeholder="State"></p>
						        		<p><input type="text" placeholder="Zip"></p>
						        		<p><input type="text" placeholder="Address"></p>
						        		<p><input type="tel" placeholder="Phone"></p> -->
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
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Method
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
									<div class="mb-4">
										<div class="custom-control custom-radio">
											<input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
											<label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold"></span> </div>
										<div class="ml-4 mb-2 small">(3-7 business days)</div>
										<div class="custom-control custom-radio">
											<input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
											<label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold"></span> </div>
										<div class="ml-4 mb-2 small">(2-4 business days)</div>
										<div class="custom-control custom-radio">
											<input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
											<label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold"></span> </div>
									</div>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
									<div class="custom-control custom-radio">
										<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
										<label class="custom-control-label" for="credit">Credit card</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
										<label class="custom-control-label" for="debit">Debit card</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
										<label class="custom-control-label" for="paypal">Paypal</label>
									</div>
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="cc-name">Name on card</label>
											<input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
											<div class="invalid-feedback"> Name on card is required </div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="cc-number">Credit card number</label>
											<input type="text" class="form-control" id="cc-number" placeholder="" required>
											<div class="invalid-feedback"> Credit card number is required </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 mb-3">
											<label for="cc-expiration">Expiration</label>
											<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
											<div class="invalid-feedback"> Expiration date required </div>
										</div>
										<div class="col-md-3 mb-3">
											<label for="cc-expiration">CVV</label>
											<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
											<div class="invalid-feedback"> Security code required </div>
										</div>
										<div class="col-md-6 mb-3">
											<div class="payment-icon">
												<ul>
													<li><img class="img-fluid" src="assets/img/payment-icon/1.png" alt=""></li>
													<li><img class="img-fluid" src="assets/img/payment-icon/2.png" alt=""></li>
													<li><img class="img-fluid" src="assets/img/payment-icon/3.png" alt=""></li>
													<li><img class="img-fluid" src="assets/img/payment-icon/5.png" alt=""></li>
													<li><img class="img-fluid" src="assets/img/payment-icon/7.png" alt=""></li>
												</ul>
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

				<div class="col-lg-4">
					<div class="order-details-wrap">
					<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Products: </strong></td>
									<td class="total-price"><span><?= !empty($_SESSION['total-amount'])?$_SESSION['total-amount']['total_price'] : "" ?></span>$</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td class="shipping-price"><span>30</span>$</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="total-with-shipping"><span><?= !empty($_SESSION['total-amount'])?$_SESSION['total-amount']['total_with_shipping'] : "" ?></span>$</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="addOrder.php" class="boxed-btn black">Place Order</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

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
	<script>
		let products = <?= json_encode($products)?>;

		function getTotal(id){

			let quantity = $(`.count-${id}`).val() ;
			let price = $(`.price-${id}`).val();
			$(`.product-total-${id} span`).html(quantity * price)

			let totals = []
			products.forEach( x => {
				totals.push($(`.product-total-${x.id} span`).html())
			})
			$('.total-price span').html(totalPrice(totals)) 



			
			$('.total-with-shipping span').html(parseInt($('.total-price span').html()) + parseInt($('.shipping-price span').html()))
		}

		function totalPrice(prices){
			let sum = 0
			for(let i =0 ; i < prices.length ; i++){
				sum += parseInt(prices[i]);
			}
			return sum;
		}
	</script>

	<!-- js files -->
	<?php require_once("./layouts/scripts.php")?>
</body>
</html>