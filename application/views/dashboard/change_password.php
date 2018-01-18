<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Hotjobz Reset Password</title>
    <?php include('style.php'); ?>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
      <!-- START TOPBAR -->
      <?php include('top_menu.php')?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">
            <!-- SIDEBAR - START -->
            <?php include('side_menu.php'); ?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Change Password</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <form class="form-inline" role="form" id="change_password">
                                            <div class="form-group">
                                                <input type="password" name="pass" class="form-control" placeholder="Enter new password" required="true">
                                            </div>
                                            <button class="btn btn-primary">Save</button>
                                        </form>

                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 hide" id="change-pssword-success">
                                    <div class="alert alert-success alert-dismissible fade in" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Your password has been reset succesfully.</strong></div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 hide" id="change-pssword-error">
                                    <div class="alert alert-error alert-dismissible fade in hide" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Error:</strong>Something went wrong! Please try again.
                                    </div>
                                    </div>

                                </div>

                            </div>
                        </section>
                      </div>

                </section>
            </section>
            <!-- END CONTENT -->

			</div>
        <!-- END CONTAINER -->

<?php include('script.php') ?>
<script>
(function ($) {
  // add new locality
  $("#change_password").submit(function(e) {
    var url = "<?= base_url('dashboard/reset_password') ?>"; // the script where you handle the form input.
    $.ajax({
           type: "POST",
           url: url,
           data: $(this).serialize(), // serializes the form's elements.
           success: function(data)
           {
            //  console.log(data);
               if(data == "Success"){
                 $("#change-pssword-success").removeClass('hide');
               }else{
                 $("#change-pssword-error").removeClass('hide');
               }
               $(':input','#change_password').val('');
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
  }(jQuery));

</script>
    </body>

</html>
