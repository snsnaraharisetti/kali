<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Catalog</title>
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
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Add Catalog</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">

                                        <form role="form" id="add_catalog">
                                          <div class="col-md-8 col-xs-8">
                                            <div class="form-group">
                                                <input type="text" name="catalog" class="form-control" placeholder="Enter catalog" required="true">
                                            </div>
                                          </div>
                                            <div class="col-md-4 col-xs-4">
                                              <button class="btn btn-primary">Add</button>
                                            </div>
                                        </form>

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

        <!-------------- List of Area start ----------->
        <section id="main-content" class=" ">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
          <div class="col-lg-12">
          <section class="box ">
              <header class="panel_header">
                  <h2 class="title pull-left">Catalog List</h2>
                  <div class="actions panel_actions pull-right">
                      <i class="box_toggle fa fa-chevron-down"></i>
                  </div>
              </header>
              <div class="content-body">

                  <?php if($msgs['msg'] != "none"){
                    if($msgs['msg'] == "Success"){ ?>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="alert alert-success alert-dismissible fade in" >
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                        You successfully deleted a catalog.</div>
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
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th>Catalog Id</th>
                                      <th>Name</th>
                                      <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($clist as $value):?>
                                  <tr>
                                      <td><?php echo $value->catalog_id ?></td>
                                      <td><?php echo $value->catalog ?></td>
                                      <td><a href="<?php echo base_url('dashboard/delete-catalog/'.$value->catalog_id)?>" class="btn btn-danger">Delete<a></td>
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
<script>
(function ($) {
  // add new category
  $("#add_catalog").submit(function(e) {
    var url = "<?= base_url('dashboard/add-catalog') ?>"; // the script where you handle the form input.
    $.ajax({
           type: "POST",
           url: url,
           data: $(this).serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == "Success"){
                 showSuccess('Well done! You successfully added a catalog.');
               }else if(data == "Error"){
                 showErrorMessage('Ops! Something went wrong, please try again.');
               }else{
                 showErrorMessage('Ops! Already exist.');
               }
               $(':input','#add_catalog').val('');
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
  }(jQuery));

</script>


    </body>

</html>
