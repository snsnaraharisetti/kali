
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>E3jobs</title>
        <?php include('style.php'); ?>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
                <h1 style="text-align: center; color: white;">E3jobs</h1>
                  <form action="<?= base_url('dashboard/forgot_password') ?>" id="loginform" method="post">
                    <p>
                        <label for="user_login">Username<br/>
                            <input type="email" name="email" class="input" required="true"/>
                          </label>
                    </p>
                    <p class="submit">
                        <input type="submit" name="forgot" class="btn btn-orange btn-block" value="Submit" />
                    </p>
                </form>
            </div>
        </div>

<?php include('script.php'); ?>


    </body>
</html>
