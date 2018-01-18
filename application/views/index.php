<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Home | WAP Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.png') ?>">

		<?php include 'style.php'; ?>

		<!-- Modernizr Js -->
        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
    </head>
    <body>
	   	<div class="wrapper-area">
	        <!-- Header Area Start Here -->
	        <?php include 'header.php'; ?>
	        <!-- Header Area End Here -->
	        <!-- Slider Area Start Here -->
			<div class="main-slider2">
				<div class="bend niceties preview-1">
					<div id="ensign-nivoslider-3" class="slides">
						<a href="#"><img src="<?php echo base_url('assets/img/slider/Candy rush 1024-500.jpg') ?>" alt=""  /></a>
						<a href="#"><img src="<?php echo base_url('assets/img/slider/Cars 1024-500.jpg') ?>" alt=""  /></a>
						<a href="#"><img src="<?php echo base_url('assets/img/slider/candyfusion 1024-500.jpg') ?>" alt=""  /></a>
					</div>
				</div>
			</div>
			<!-- Slider Area End Here -->
			<div class="services2-area">
				<div class="container">

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3 class="ltr">Pick of <span>The Day</span> <i class="fa fa-bolt"></i></h3>
						</div>
					</div>
					<div class="row">
						<?php if(!empty($picday)){
							shuffle($picday);

						if(count($picday) > 3){
							for($i=0; $i<4; $i++) { ?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<a href="javascript:void(0)"><img src="<?php echo PRODUCT_IMG_PATH.$picday[$i]->pimg ?>" alt="services" style="max-width: 130px; width:80%; height:100px; margin-bottom: 10px"></a>
								</div>
						<?php }}else{
							for($i=0; $i<count($picday); $i++) { ?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<a href="javascript:void(0)" onclick="buyPopup('<?php echo $picday[$i]->product_id ?>',
										'<?php echo $picday[$i]->catalog ?>','<?php echo $picday[$i]->price ?>')">
										<img src="<?php echo PRODUCT_IMG_PATH.$picday[$i]->pimg ?>" alt="services" style="max-width: 130px; width:80%; height:100px; margin-bottom: 10px"></a>
								</div>
						<?php }}} ?>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<a href="<?php echo base_url('wap/pic-of-the-day') ?>" class="btn btn-danger" style="float:right">Explore All</a>
						</div>
					</div>
				</div>
			</div>
			<div class="services2-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3 class="ltr">Deal of <span>The Day</span> <i class="fa fa-magic"></i></h3>
						</div>
					</div>
					<div class="row">
						<?php if(!empty($dealday)){
							shuffle($dealday);
							if(count($dealday) > 3){
						for($i=0; $i<4; $i++) {
							?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
								<a href="javascript:void(0)" onclick="buyPopup('<?php echo $dealday[$i]->product_id ?>',
									'<?php echo $dealday[$i]->catalog ?>','<?php echo $dealday[$i]->price ?>')">
									<img src="<?php echo PRODUCT_IMG_PATH.$dealday[$i]->pimg ?>" alt="services" style="max-width: 130px; width:80%; height:100px; margin-bottom: 10px"></a>
							</div>
						<?php }}else{
							for($i=0; $i<count($dealday); $i++) { ?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<a href="javascript:void(0)" onclick="buyPopup('<?php echo $dealday[$i]->product_id ?>',
										'<?php echo $dealday[$i]->catalog ?>','<?php echo $dealday[$i]->price ?>')">
										<img src="<?php echo PRODUCT_IMG_PATH.$dealday[$i]->pimg ?>" alt="services" style="max-width: 130px; width:80%; height:100px; margin-bottom: 10px"></a>
								</div>
							<?php }}} ?>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<a href="<?php echo base_url('wap/deal-of-the-day') ?>" class="btn btn-danger" style="float:right">Explore All</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer Area Start Here -->
	        <?php include 'footer.php'; ?>
	        <!-- Footer Area End Here -->
		</div>
		<!-- Modal Dialog Box Start Here-->
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
				<div class="modal-body">
					<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
					<div class="product-details1-area">
		        		<div class="product-details-info-area">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="inner-product-details-right ltr">
										<p class="price">2.5 AED</p>
										<p class="pdetail">The cost of this content is 2.5 AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.</p>
										<p>Please Enter Your Mobile Number </p>
										<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">
										<ul class="inner-product-details-cart">
											<li><a href="#">Buy</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<!-- Modal Dialog Box End Here-->
		<!-- Preloader Start Here -->
	    <div id="preloader"></div>
	    <!-- Preloader End Here -->
	    <?php include 'script.php'; ?>
<script>
// function buyPopup(pid, catalog, price){
// 		$('.price').text(price + "AED");
// 		$('.pdetail').text("The cost of this content is "+price+" AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.");
// 	$('#myModal').modal('show');
// }
</script>
    </body>

</html>
