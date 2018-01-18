<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Bulk Upload</title>
    <?php include('style.php'); ?>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
      <!-- START TOPBAR -->
      <?php include('top_menu.php'); ?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">
            <!-- SIDEBAR - START -->
            <?php include('side_menu.php'); ?>
            <!--  SIDEBAR - END -->

			</div>
        <!-- END CONTAINER -->

        <!-------------- List of Area start ----------->
        <section id="main-content" class=" ">
            <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class="page-title">
                        <div class="pull-left">
                            <h1 class="title">File Uploader</h1>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Upload an excel file of product</h2>
                        </header>
                        <div class="content-body">

                          <h3 style="text-align: center; color: red;">
                            <?php if($msgs['msg'] != "none"){
                              echo $msgs['msg'];
                            }?>
                          </h3>

                          <div class="row">

                                <form name="upload_file" action="<?= base_url('dashboard/upload_file')?>" method="post" enctype="multipart/form-data">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <div class="controls">
                                          <input type="file" name="fname" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                        <div class="controls">
                                          <input type="submit" value="Upload" class="btn btn-danger btn-block">
                                        </div>
                                      </div>
                                    </div>

                                </div>
                              </form>

                          </div>
                        </div>
                    </section>
                  </div>
                </section>
              </section>
        <!---------- list of Area End ---------->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<?php include('script.php') ?>

    </body>

</html>
