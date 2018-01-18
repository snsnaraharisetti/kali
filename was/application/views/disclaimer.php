<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Disclaimer | WAS Portal</title>
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
	        <div class="services2-area" style="background: url('../assets/img/disclaimer.jpg') no-repeat; background-size: cover; height: 300px;">
	        </div>
					<?php if($lang == 'ar'){ ?>
						<div class="services2-area bottom rtl">
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h2>تنصل<i class="fa fa-bolt"></i></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p> إخلاء مسؤولية: في حالة وجود أي استفسارات أو مشكلات، يُرجى مراسلتنا عبر البريد الإلكتروني  vas.support@tesync.net . وسنوفر لكم حلاً ملائمًا. </p>
									</div>
								</div>
							</div>
						</div>
					<?php }else{ ?>
						<div class="services2-area bottom">
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h2>Disclaimer <i class="fa fa-bolt"></i></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p>In case of any queries or issues , Please write to us at vas.support@tesync.net . We will get back to you with a favourable solution.</p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

			<!-- Footer Area Start Here -->
	        <?php include 'footer.php'; ?>
	        <!-- Footer Area End Here -->
		</div>
		<!-- Preloader Start Here -->
	    <div id="preloader"></div>
	    <!-- Preloader End Here -->
	    <?php include 'script.php'; ?>

    </body>

</html>
