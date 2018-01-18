<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Images</title>
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
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-3 col-xs-12" style="margin-bottom: 10px;">
                <a href="<?php echo base_url('dashboard/add-product') ?>" class="btn btn-danger">Add Product</a>
              </div>
              <div class="col-md-3 col-xs-12" style="margin-bottom: 10px;">
                <a href="<?php echo base_url('dashboard/delete-all-images') ?>" onclick="return confirm('Are you sure you want to delete all image product?');" class="btn btn-danger">Delete All Image Product</a>
              </div>
            </div>
          <section class="box ">
              <header class="panel_header">
                  <h2 class="title pull-left">Image Product List</h2>
              </header>
              <div class="content-body">

                  <?php if($msgs['msg'] != "none"){
                    if($msgs['msg'] == "Success"){ ?>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="alert alert-success alert-dismissible fade in" >
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                        You successfully deleted a product.</div>
                      </div>
                    <?php }else{ ?>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="alert alert-error alert-dismissible fade in hide" >
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Ops! Something went wrong! Please try again.
                      </div>
                      </div>
                  <?php } }?>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Sub Catalog</th>
                            <th>Price</th>
                            <th>PD</th>
                            <th>DD</th>
                            <th>Middle East</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Sub Catalog</th>
                              <th>Price</th>
                              <th>PD</th>
                              <th>DD</th>
                              <th>Middle East</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>

                        <tbody>
                          <?php foreach ($plist as $value):?>
                            <tr>
                              <td><img src="<?php echo base_url(PRODUCT_IMG_PATH.$value->pimg) ?>" style="height: 50px; width: 50px;"></td>
                                <td><?php echo $value->product_name ?></td>
                                <td><?php echo $value->sub_catalog ?></td>
                                <td><?php echo $value->price ?></td>
                                <td>
                                  <?php if($value->pic_day == 'on'){ ?>
                                    <i class="fa fa-check icon-warning animated fadeIn"><i>
                                  <?php } ?>
                                </td>
                                <td>
                                  <?php if($value->deal_day == 'on'){ ?>
                                    <i class="fa fa-check icon-warning animated fadeIn"><i>
                                  <?php } ?>
                                </td>
                                <td>
                                  <?php if($value->region == 'on'){ ?>
                                    <i class="fa fa-check icon-success animated fadeIn"><i>
                                  <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('dashboard/product_detail/'.$value->product_id)?>" class="fa fa-pencil icon-md" title="Edit"><a>
                                    <span style="margin-left: 3px;"><a href="<?php echo base_url('dashboard/delete-image-product/'.$value->product_id)?>" onclick="return confirm('Are you sure you want to delete this product?');" class="fa fa-remove icon-md icon-danger animated fadeIn" title="Delete"><a></span>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
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
