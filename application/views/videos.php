<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Videos | WAP Portal</title>
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

			<div class="services2-area bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h3 class="ltr" style="text-align: center;">Explore <span>Videos</span>
										<span style="color:#000">
											<select class="ltr schange">
												<option>Select Category</option>
												<?php foreach ($sub_catalog as $svalue): ?>
													<option value="<?php echo $svalue->sub_catalog_id; ?>"><?php echo $svalue->sub_catalog; ?></option>
												<?php endforeach; ?>
											</select>
										</span>
									</h3>
						</div>
					</div>
					<div class="row" id="plist">
						<?php foreach ($plist as $value) { ?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<div class="services2-box">
										<a href="javascript:void(0)" onclick="buyPopup('<?php echo $value->product_id ?>',
											'<?php echo $value->catalog ?>','<?php echo $value->price ?>')">
											<img src="<?php echo PRODUCT_IMG_PATH.$value->pimg ?>" alt="services" style="height:100px; width:130px">
										</a>
										<h5 class="ltr"><?php echo $value->price ?> AED</h5>
									</div>
								</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- Footer Area Start Here -->
			<footer>
							<div class="footer-area" style="padding: 15px 0 0">
								<div class="footer-area-top">
									<div class="container">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="footer-box" style="padding: 0">
														<p>DISCLAIMER : In case of any queries or issues , Please write to us at support.ops@aitekltd.com . We will get back to you with a favourable solution.</p>
													</div>
											</div>

										</div>
									</div>
								</div>
									<div class="footer-area-bottom ltr">
										<div class="container">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<p style="text-align:center">© 2017 WAP Portal All Rights Reserved.</p>
												</div>
											</div>
										</div>
									</div>
							</div>
								</footer>
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
										<p class="pdetail">The cost of this content is  2.5 AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.</p>
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
			function buyPopup(pid, catalog, price){
					$('.price').text(price + "AED");
					$('.pdetail').text("The cost of this content is "+price+" AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.");
				$('#myModal').modal('show');
			}

			$('.schange').change(function(){
				var sid = $('.schange').val();
				var url = "<?= base_url('Uae_Etisalat/video-filter') ?>";
				var data = "sid="+sid;
				$.ajax({
	             type: "POST",
	             url: url,
	             data: data,
	             success: function(data)
	             {
								 data = JSON.parse(data);
								 var lang = "<?= $lang ?>";
								 var burl = "<?= base_url() ?>";
								 $('#plist div').remove();
									 $.each(data, function (index, value) {
										 $('#plist').append(
											 '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">'+
				 								'<div class="services2-box">'+
				 									'<a href="javascript:void(0)" onclick="buyPopup("'+value.product_id+'","'+value.catalog+'","'+value.price+'")">'+
				 										'<img src='+burl+value.pimg+' alt="services" style="height:100px; width:130px">'+
				 									'</a>'+
													'<h5 class="rtl">'+value.price +'AED</h5>'+
				 								'</div>'+
				 							'</div>'
										 );
									 });
							 }
						 });
			});
			</script>
    </body>

</html>
