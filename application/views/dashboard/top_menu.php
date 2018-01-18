<div class='page-topbar '>
    <div class='logo-area'>

    </div>
    <div class='quick-area'>
      <div class='pull-left'>
        <ul class="info-menu left-links list-inline list-unstyled">
            <li class="sidebar-toggle-wrap">
                <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
          </ul>
      </div>
        <div class='pull-right' style="margin-right:100px">
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                  <?php
                      if($this->session->userdata['user']['logged_in']){ ?>
                    <a href="#" data-toggle="dropdown" class="toggle">
                          <span><?php echo $this->session->userdata['user']['name'] ?><i class='fa fa-angle-down'></i></span>
                    </a>
                    <?php  }else{
                      redirect('dashboard/index');
                      }
                    ?>
                    <ul class="dropdown-menu profile animated fadeIn">

                        <li class="last">
                            <a href="<?php echo base_url('dashboard/changePassword') ?>">
                                <i class="fa fa-lock"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="last">
                            <a href="<?php echo base_url('dashboard/logout') ?>">
                                <i class="fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>
