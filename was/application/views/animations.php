<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Animations | WAS Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

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
						<a href="<?php echo base_url('Uae_Etisalat/images') ?>"><img src="<?php echo base_url('assets/img/slider/ramadan_banner.jpg') ?>" alt=""  /></a>
						<a href="<?php echo base_url('Uae_Etisalat/videos') ?>"><img src="<?php echo base_url('assets/img/slider/ramadan_banner2.gif') ?>" alt=""  /></a>
					</div>
				</div>
			</div>
			<!-- Slider Area End Here -->

			<div class="services2-area bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
								<?php if($lang == 'ar'){ ?>
									<h3 class="rtl" style="text-align: center;">إستكشاف <span>الصور </span>
										<span style="color:#000">
											<select class="rtl schange" style="padding: 8px 5px;">
												<option> تحديد فئة </option>
												<?php foreach ($sub_catalog as $svalue): ?>
													<option value="<?php echo $svalue->sub_catalog_id; ?>"><?php echo $svalue->sub_catalog_arabic; ?></option>
												<?php endforeach; ?>
											</select>
										</span>
									</h3>
								<?php }else{ ?>
									<h3 class="ltr" style="text-align: center;">Explore <span>Animations</span>
										<span style="color:#000">
									<select class="ltr schange">
										<option>Select Category</option>
										<?php foreach ($sub_catalog as $svalue): ?>
											<option value="<?php echo $svalue->sub_catalog_id; ?>"><?php echo $svalue->sub_catalog; ?></option>
										<?php endforeach; ?>
									</select>
								</span>
								</h3>
								<?php } ?>
						</div>
					</div>
					<div class="row" id="plist">
						<?php if($lang == 'ar'){
						foreach ($plist as $value) { ?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
								<div class="services2-box">
									<a href="javascript:void(0)" onclick="buyPopup('<?php echo $value->product_id ?>',
										'<?php echo $value->catalog ?>','<?php echo $value->price ?>')">
										<img src="<?php echo base_url(PRODUCT_IMG_PATH.$value->pimg) ?>" alt="services" style="max-width: 130px; width:80%; height:100px;">
									</a>
									<h5 class="rtl"><?php echo $value->price ?> درهم إماراتي</h5>
								</div>
							</div>
						<?php }}else{
							 foreach ($plist as $value) { ?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<div class="services2-box">
										<a href="javascript:void(0)" onclick="buyPopup('<?php echo $value->product_id ?>',
											'<?php echo $value->catalog ?>','<?php echo $value->price ?>')">
											<img src="<?php echo base_url(PRODUCT_IMG_PATH.$value->pimg) ?>" alt="services" style="max-width: 130px; width:80%; height:100px;">
										</a>
										<h5 class="ltr"><?php echo $value->price ?> AED</h5>
									</div>
								</div>
						<?php }} ?>
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
												<?php if($lang == 'ar'){ ?>
													<div class="footer-box rtl" style="padding: 0">
														<p>إخلاء مسؤولية: في حالة وجود أي استفسارات أو مشكلات، يُرجى مراسلتنا عبر البريد الإلكتروني  support.ops@aitekltd.com . وسنوفر لكم حلاً ملائمًا.</p>
													</div>
												<?php }else{ ?>
													<div class="footer-box" style="padding: 0">
														<p>DISCLAIMER : In case of any queries or issues , Please write to us at support.ops@aitekltd.com . We will get back to you with a favourable solution.</p>
													</div>
												<?php } ?>
											</div>

										</div>
									</div>
								</div>
								<?php if($lang == 'ar'){ ?>
									<div class="footer-area-bottom rtl">
										<div class="container">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<p style="text-align:center">© 2017 بوابة واس جميع الحقوق محفوظة. صمم بواسطة</p>
												</div>
											</div>
										</div>
									</div>
								<?php }else{ ?>
									<div class="footer-area-bottom ltr">
										<div class="container">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<p style="text-align:center">© 2017 WAS Portal All Rights Reserved.</p>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
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
								<?php if($lang == 'ar'){ ?>
									<div class="inner-product-details-right rtl">
										<p class="price">2.5 درهم إماراتي</p>
										<p class="pdetail">وتبلغ تكلفة هذا المحتوى 2.5 درهم لأول مرة، ويمكنك تنزيل هذا المحتوى مجانا خلال 24 ساعة. بعد ذلك إذا كنت ترغب في شراء نفس المحتوى، سيكون لديك لدفع. </p>
										<p>الرجاء إدخال رقم هاتفك المحمول </p>
										<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">
										<ul class="inner-product-details-cart">
											<li><a href="#">يشترى</a></li>
										</ul>
									</div>
								<?php }else{ ?>
									<div class="inner-product-details-right ltr">
										<p class="price">2.5 AED</p>
										<p class="pdetail">The cost of this content is 2.5 AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.</p>
										<p>Please Enter Your Mobile Number </p>
										<input type="text" name="Phone" placeholder="971xxxxxxxxx" style="margin-bottom: 10px">
										<ul class="inner-product-details-cart">
											<li><a href="#">Buy</a></li>
										</ul>
									</div>
								<?php } ?>
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
				var lang = "<?= $lang ?>";
				if(lang == "ar"){
					$('.price').text(price + "درهم إماراتي");
					$('.pdetail').text(" تكلفة هذا المحتوى هي " + price + " درهم لأول مرة، ويمكنك تحميل هذا المحتوى مجانا في غضون 24 ساعة.بعد أن إذا كنت ترغب في شراء نفس المحتوى، سيكون لديك لدفع " );
				}else{
					$('.price').text(price + "AED");
					$('.pdetail').text("The cost of this content is "+price+" AED for the first time and you can download this content for free within 24 hours. After that if you wish to buy same content, you will have to pay.");
				}
				$('#myModal').modal('show');
			}

			$('.schange').change(function(){
				var sid = $('.schange').val();
				var url = "<?= base_url('Uae_Etisalat/animation-filter') ?>";
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
								 if(lang == 'ar'){
									 $.each(data, function (index, value) {
										 $('#plist').append(
											 '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">'+
				 								'<div class="services2-box">'+
				 									'<a href="javascript:void(0)" onclick="buyPopup("'+value.product_id+'","'+value.catalog+'","'+value.price+'")">'+
				 										'<img src='+burl+value.pimg+' alt="services" style="height:100px; width:130px">'+
				 									'</a>'+
													'<h5 class="rtl">'+value.price +'درهم إماراتي</h5>'+
				 								'</div>'+
				 							'</div>'
										 );
									 });
								 }else{
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
							 }
						 });
			});
			</script>
    </body>

</html>
