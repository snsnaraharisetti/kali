
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Dashboard Login</title>
        <?php include('style.php'); ?>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
              <h3 style="text-align: center; color: white;">
                <?php if($msgs['msg'] != "none"){
                  echo $msgs['msg'];
                }?>
              </h3>
                <h1 style="text-align: center; color: black;">Login</h1>
                  <form action="<?= base_url('dashboard/login') ?>" id="loginform" method="post">
                    <p>
                        <label for="user_login" style="color: black;">Username<br />
                            <input type="email" name="email" class="input" required="true"/>
                          </label>

                    </p>
                    <p>
                        <label for="user_pass" style="color: black;">Password<br />
                            <input type="password" name="password" class="input" required="true"/>
                          </label>
                    </p>
                    <p class="submit">
                        <input type="submit" name="login" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                    <p><a href="<?= base_url('dashboard/forgot')?>">Forgot Password</a></p>
                  </div>
                </div>
            </div>
        </div>

<?php include('script.php'); ?>


    </body>
</html>
