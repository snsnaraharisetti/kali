<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Subcription Pacakges | WAP Portal</title>
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
					<div class="main-slider2">
						<div class="bend niceties preview-1">
							<div id="ensign-nivoslider-3" class="slides">
								<a href="#"><img src="<?php echo base_url('assets/img/slider/banner1.jpg') ?>" alt=""  /></a>
								<a href="#"><img src="<?php echo base_url('assets/img/slider/banner2.png') ?>" alt=""  /></a>
							</div>
						</div>
					</div>
						<div class="services2-area bottom">
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h2>Subcription Packages <i class="fa fa-bolt"></i></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<a href="#" data-toggle="modal" data-target="#myModal1"><h3 style="background-color: #f00; padding:10px 0 ">Subscribe in package Ramadan Spl with 14 wallpapers and 7 animations with 21 AED per week</h3></a>
										<a href="#" data-toggle="modal" data-target="#myModal3"><h3 style="background-color: #f00; padding:10px 0 ">Subscribe in package Mobizone Spl to get 7 videos and 7 wallpapers with 14 AED per week</h3></a>
										<a href="#" data-toggle="modal" data-target="#myModal4">Click here to get Your Auto Login Url to use Subscription Service</a><br>
										<a href="#" data-toggle="modal" data-target="#myModal5">Click here to cancel Subscription</a>
									</div>
								</div>
							</div>
						</div>

			<!-- Footer Area Start Here -->
	        <?php include 'footer.php'; ?>
	        <!-- Footer Area End Here -->
		</div>
		<!-- Modal Dialog Box Start Here-->
		<div id="myModal1" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
				<div class="modal-body">
					<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
					<div class="product-details1-area">
		        		<div class="product-details-info-area">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="inner-product-details-right ltr">
											<p class="price" style="text-align: center;color: #f00">Subscription</p>
											<p>You will be charged for Ramadan Spl 21AED every 7 days.</p>
											<p>After every 7 days you will be charged again for Ramadan Spl 21AED every 7days</p>
											<p>Please Enter Your Mobile Number </p>
											<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">
											<ul class="inner-product-details-cart">
												<li><a href="#">Subscribe</a></li>
											</ul>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>

		<div id="myModal3" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
				<div class="modal-body">
					<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
					<div class="product-details1-area">
		        		<div class="product-details-info-area">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="inner-product-details-right ltr">
											<p class="price" style="text-align: center;color: #f00">Subscription</p>
											<p>You will subscribe in Mobizone Spl 14 AED per week.To Cancel your subscription, for mobizone subscribers please send Stop to 1151.To Cancel from the site please click on 'Click here to Cancel Subscription'.For any inquiries please contact us on support.ops@aitekltd.com</p>
											<p>Please Enter Your Mobile Number </p>
											<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">

											<ul class="inner-product-details-cart">
												<li><a href="javascript:void(0)">Subscribe</a></li>
											</ul>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<div id="myModal4" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
				<div class="modal-body">
					<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
					<div class="product-details1-area">
		        		<div class="product-details-info-area">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="inner-product-details-right ltr">
											<p class="price" style="text-align: center;color: #f00">Send Auto Login Url Request</p>
											<p>Please Enter Your Mobile Number </p>
											<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">

											<ul class="inner-product-details-cart">
												<li><a href="javascript:void(0)">click here to use the service</a></li>
											</ul>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<div id="myModal5" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
				<div class="modal-body">
					<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
					<div class="product-details1-area">
		        		<div class="product-details-info-area">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="inner-product-details-right ltr">
											<p class="price" style="text-align: center;color: #f00">Cancel Subscription</p>
											<p>Please Enter Your Mobile Number </p>
											<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">
											<ul class="inner-product-details-cart">
												<li><a href="javascript:void(0)">Cancel Subscription</a></li>
											</ul>
											<p>DISCLAIMER : In case of any queries or issues , Please write to us at support.ops@aitekltd.com. We will get back to you with a favourable solution.</p>
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

    </body>

</html>
