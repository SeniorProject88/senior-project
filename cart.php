<?php 
require_once('handlers/db.php');
require_once('handlers/data.php');
$sponsored=getAll('sponsored');
if(!isset($_SESSION)){ 
    session_start(); 
} 
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$roles = getAll('roles');
$products=getAll('products');
$categorys=getWhere('categorys', 'status = 1');
$user_id = $_SESSION['user'][0]['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>My Cart</title>

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

	<!-- cart -->
	<form action="handlers/checkout.php"" method="POST">
	<div class="cart-section mt-250 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
				
					<div class="cart-table-wrap">
					
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-tot">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(!empty($_SESSION['cart'])){ 
									$k=1;
									foreach($_SESSION['cart'] as $i => $product):
								?>
									<?php if(!empty($product[$user_id][0])){?>
											<tr class="table-body-row">
												<td class="product-remove"><a href="deleteFromCart.php?id=<?=$i?>"><i class="far fa-window-close"></i></a></td>
												<td class="product-image"><img src="<?= $product[$user_id][0]['img']?>" alt="" ></td>
												<td class="product-name"><?= $product[$user_id][0]['name']?></td>
												<td class="product-price"><?= $product[$user_id][0]['price']?>$</td>
												<td class="product-quantity">
													<input type="number" name="quantity<?= $k++ ; ?>" class="count-<?= $product[$user_id][0]['id']?>" 
													onchange="getTotal(<?= $product[$user_id][0]['id']?>)" 	placeholder="0" min="1" oninput="validity.valid||(value='');">

												</td>  
												<input type="hidden" class="price-<?= $product[$user_id][0]['id']?>" value="<?= $product[$user_id][0]['price']?>"> 
												<td class="product-total-<?= $product[$user_id][0]['id']?> total-order"><span>0</span>$</td>
											</tr>
									<?php }?>

											<?php
									endforeach;
								}else{ ?>
									<p class="text-center">No Products In Cart Yet !</p>
							<?php	} ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">

					
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
										<td class="total-price">
											<input type="hidden" name="total_price" value="">
											<span></span>$
										</td>
									</tr>
									<tr class="total-data">
										<td><strong>Shipping: </strong></td>
										<td class="shipping-price"><span>30</span>$</td>
									</tr>
									<tr class="total-data">
										<td><strong>Total: </strong></td>
										<td class="total-with-shipping">
											<input type="hidden" name="total_with_shipping" value="">
											<span></span>$
										</td>
									</tr>
								</tbody>
							</table>
							<div class="cart-buttons">
								<button name="checkout" class="cart-btn">Check Out</button>
							</div>
						
					
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!-- end cart -->

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
			totals = totals.filter( Number );
			$('.total-price span').html(totalPrice(totals)) 
			$('.total-price input').val(totalPrice(totals))


			
			$('.total-with-shipping span').html(parseInt($('.total-price span').html()) + parseInt($('.shipping-price span').html()))
			$('.total-with-shipping input').val(parseInt($('.total-price span').html()) + parseInt($('.shipping-price span').html()))
		}

		function totalPrice(prices){
			let sum = 0
			for(let i =0 ; i < prices.length ; i++){
				sum += parseInt(prices[i]);
			}
			return sum;
		}
	</script>

	<?php require_once("./layouts/scripts.php")?>


</body>
</html>