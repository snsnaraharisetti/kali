<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Product Detail</title>
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

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <section class="box ">
                                <header class="panel_header">
                                  <h2 class="title pull-left">Product Detail</h2>
                                </header>
                                <div class="content-body">

                                  <?php if($msgs['msg'] != "none"){
                                    if($msgs['msg'] == "Success"){ ?>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="alert alert-success alert-dismissible fade in" >
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                      </button>
                                        Well done! You successfully updated a product.</div>
                                      </div>
                                    <?php }else{ ?>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="alert alert-error alert-dismissible fade in hide" >
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Oops! Something went wrong! Please try again.
                                      </div>
                                      </div>
                                  <?php } }?>

                              <form action="<?php echo base_url('dashboard/update-product')?>" method="post" enctype="multipart/form-data">
                                <?php foreach ($plist as $data) { ?>
                                <div class="row">
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                        <label>Catalog<span class="mandatory"> * </span></label>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                      <select name="catalog_id" id="catalog_id" class="form-control" required="true">
                                          <option>Select Catalog</option>
                                          <?php foreach ($catalog_combo as $key => $value): ?>
                                            <?php if($data->catalog_id == $key): ?>
                                            <option value="<?php echo $key; ?>" selected="true"><?php echo $value; ?></option>
                                          <?php else: ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                          <?php endif; ?>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                      <label>Sub Catalog<span class="mandatory"> * </span></label>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                      <select name="sub_catalog_id" id="sub_catalog_id" class="form-control" required="true">
                                          <option>Select Sub Catalog</option>
                                          <?php foreach ($sub_catalog_combo as $key => $value): ?>
                                            <?php if($data->sub_catalog_id == $key): ?>
                                            <option value="<?php echo $key; ?>" selected="true"><?php echo $value; ?></option>
                                          <?php endif; ?>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                   <label>Product Name<span class="mandatory"> * </span></label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <div class="form-group">
                                    <input type="text" name="product_name" id="product_name" value="<?php echo $data->product_name ?>" class="form-control" required="true">
                                    <input type="hidden" name="product_id" value="<?php echo $data->product_id ?>">
                                  </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <label>Price<span class="mandatory"> * </span></label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <div class="form-group">
                                    <input type="text" name="price" id="price" value="<?php echo $data->price ?>" class="form-control">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <label>Product image</label>
                                </div>
                                <div class="col-md-6 col-sm6 col-xs-6">
                                  <div class="form-group">
                                      <input type="file" name="pimg" class="form-control" accept="image/*">
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <img src="<?php echo base_url(PRODUCT_IMG_PATH.$data->pimg) ?>" style="height:100px;width:100px">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                   <label>Video/Game/Music/Animation</label>
                                </div>
                                <div class="col-md-6 col-sm6 col-xs-6">
                                  <div class="form-group">
                                      <input type="file" name="other" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                   <label>Pic of the day</label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <div class="form-group">
                                    <?php if($data->pic_day == 'on'): ?>
                                      <input type="checkbox" name="pic_day" class="state icheckbox_minimal" checked="true">
                                    <?php else: ?>
                                      <input type="checkbox" name="pic_day" class="state icheckbox_minimal">
                                    <?php endif; ?>
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                   <label>Deal of the day</label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <div class="form-group">
                                    <?php if($data->deal_day == 'on'): ?>
                                      <input type="checkbox" name="deal_day" class="state icheckbox_minimal" checked="true">
                                    <?php else: ?>
                                      <input type="checkbox" name="deal_day" class="state icheckbox_minimal">
                                    <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                   <label>Middle East</label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <div class="form-group">
                                    <?php if($data->region == 'on'): ?>
                                      <input type="checkbox" name="region" class="state icheckbox_minimal" checked="true">
                                    <?php else: ?>
                                      <input type="checkbox" name="region" class="state icheckbox_minimal">
                                    <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <input type="submit" name="update" value="Update" class="btn btn-primary btn-block">
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                            </form>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                </section>
            </section>
            <!-- END CONTENT -->

			</div>
        <!-- END CONTAINER -->
<?php include('script.php') ?>
<script>
(function ($) {
  // set value in state combo
  $("#catalog_id").change(function(){
    var url = "<?= base_url('dashboard/get-sub-catalog') ?>"; // the script where you handle the form input.
    var cat = $("#catalog_id").val();
   $.getJSON(url+'?cid='+cat, function(data){
     $('option',"#sub_catalog_id").remove();
     $("#sub_catalog_id").append('<option>Select Sub Catalog</option>');
     $.each(data, function(idx, obj) {
       if(obj.sub_catalog_id){
          $("#sub_catalog_id").append('<option value="'+obj.sub_catalog_id+'">'+obj.sub_catalog+'</option>');
       }
     });
   });
 });

  }(jQuery));
</script>
    </body>
</html>
