<?php if($this->session->userdata('lang')){
  $lang = $this->session->userdata['lang'];
}else{
  $lang = "ar";
}?>
      <header>
        <div class="header-area-style3" id="sticker">
          <div class="header-top">
            <div class="header-top-inner-bottom">
              <div class="container">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="search-left">

                    <?php if($lang == 'ar'){ ?>
                      <div class="search-area rtl">
                        <div class="input-group" id="adv-search">
                            <input type="text" class="form-control" placeholder="بحث" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-metro-search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                      </div>
                    <?php }else{ ?>
                      <div class="search-area ltr">
                              <div class="input-group" id="adv-search">
                                  <input type="text" class="form-control" placeholder="Search" />
                                  <div class="input-group-btn">
                                      <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-metro-search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                      </div>
                                  </div>
                              </div>
                      </div>
                    <?php } ?>

                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="logo-middle">
                    <div class="logo-area">
                      <a href="<?php echo base_url('Uae_Etisalat/home') ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo" style="margin: auto;width: 180px;"></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <ul class="header-cart-area">
                      <?php if($lang == 'ar'){ ?>
                        <li class="active"><a href="javascript:void(0)" class="arabic">AR</a>
                        <li class=""><a href="javascript:void(0)" class="english">EN</a>
                      <?php }else{ ?>
                          <li class=""><a href="javascript:void(0)" class="arabic">AR</a>
                          <li class="active"><a href="javascript:void(0)" class="english">EN</a>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-bottom">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <?php if($lang == 'ar'){ ?>
                    <div class="main-menu-area rtl">
                      <nav>
                        <ul>
                          <li><a href="<?php echo base_url('Uae_Etisalat/home') ?>"> الصفحة الرئيسية </a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/images') ?>"> صور </a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/videos') ?>"> فيديوهات </a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/animations') ?>"> رسوم متحركة </a></li>
                          <!-- <li><a href="<?php echo base_url('Uae_Etisalat/games') ?>"> ألعاب </a></li> -->
                          <!-- <li><a href="<?php echo base_url('Uae_Etisalat/music') ?>"> موسيقى </a></li> -->
                        </ul>
                      </nav>
                    </div>
                  <?php }else{ ?>
                    <div class="main-menu-area ltr">
                      <nav>
                        <ul>
                          <li><a href="<?php echo base_url('Uae_Etisalat/home') ?>">Home</a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/images') ?>">Images</a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/videos') ?>">Videos</a></li>
                          <li><a href="<?php echo base_url('Uae_Etisalat/animations') ?>">Animations</a></li>
                          <!-- <li><a href="<?php echo base_url('Uae_Etisalat/games') ?>">Games</a></li> -->
                          <!-- <li><a href="<?php echo base_url('Uae_Etisalat/music') ?>">Music</a></li> -->
                        </ul>
                      </nav>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- Mobile Menu Area Start Here -->
            <div class="mobile-menu-area">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <?php if($lang == 'ar'){ ?>
                      <div class="mobile-menu rtl">
                        <nav id="dropdown">
                          <ul>
                            <li><a href="<?php echo base_url('Uae_Etisalat/home') ?>"> الصفحة الرئيسية </a></li>
                            <li><a href="<?php echo base_url('Uae_Etisalat/images') ?>"> صور </a></li>
                            <li><a href="<?php echo base_url('Uae_Etisalat/videos') ?>"> فيديوهات </a></li>
                            <li><a href="<?php echo base_url('Uae_Etisalat/animations') ?>"> رسوم متحركة </a></li>
                            <!-- <li><a href="<?php echo base_url('Uae_Etisalat/games') ?>"> ألعاب </a></li> -->
                            <!-- <li><a href="<?php echo base_url('Uae_Etisalat/music') ?>"> موسيقى </a></li> -->
                          </ul>
                        </nav>
                      </div>
                      <?php }else{ ?>
                        <div class="mobile-menu ltr">
                          <nav id="dropdown">
                            <ul>
                              <li><a href="<?php echo base_url('Uae_Etisalat/home') ?>">Home</a></li>
                              <li><a href="<?php echo base_url('Uae_Etisalat/images') ?>">Images</a></li>
                              <li><a href="<?php echo base_url('Uae_Etisalat/videos') ?>">Videos</a></li>
                              <li><a href="<?php echo base_url('Uae_Etisalat/animations') ?>">Animations</a></li>
                              <!-- <li><a href="<?php echo base_url('Uae_Etisalat/games') ?>">Games</a></li> -->
                              <!-- <li><a href="<?php echo base_url('Uae_Etisalat/music') ?>">Music</a></li> -->
                            </ul>
                          </nav>
                        </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- Mobile Menu Area End Here -->
          </div>
        </div>
      </header>
