<!-- header page-->
<header>
  <!-- Navigation panel-->
  <nav class="main-nav js-stick">
    <div class="full-wrapper relative clearfix container">
      <!-- Logo -->
      <div class="nav-logo-wrap local-scroll"><a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/img/logo.png" data-at2x="<?php echo base_url();?>assets/img/logo@2x.png" alt></a></div>
      <!-- Main Menu-->
      <div class="inner-nav desktop-nav">
        <ul class="clearlist">
          <!-- Item With Sub-->
          <li>
            <a href="<?php echo base_url();?>" class=" mn-has-sub">Home <i class="button_open"></i></a>
          </li>
          <!-- End Item With Sub-->
          <li class="slash">/</li>
          <!-- Item With Sub-->
          <li>
            <a href="<?php echo site_url('paket');?>" class="active mn-has-sub">Paket <i class="button_open"></i></a>
          </li>
          <!-- End Item With Sub-->
          <li class="slash">/</li>
          <!-- Item With Sub-->
          <li>
            <a href="#" class="mn-has-sub">Kendaraan <i class="button_open"></i></a>
          </li>
          <!-- End Item With Sub-->
          <!-- span /-->
          <li class="slash">/</li>
          <!-- Item-->
          <li>
            <a href="#" class="mn-has-sub">Promo <i class="button_open"></i></a>
          </li>
          <!-- End Item-->
          <!-- Search-->
          <li class="search"><a href="#" class="mn-has-sub">Search</a>
            <ul class="search-sub">
              <li>
                <div class="container">
                  <div class="mn-wrap">
                    <form method="post" class="form">
                      <div class="search-wrap">
                        <input type="text" placeholder="Where will you go next?" class="form-control search-field"><i class="flaticon-suntour-search search-icon"></i>
                      </div>
                    </form>
                  </div>
                  <div class="close-button"><span>Search</span></div>
                </div>
              </li>
            </ul>
          </li>
          <!-- End Search-->
        </ul>
      </div>
      <!-- End Main Menu-->
    </div>
  </nav>
  <!-- End Navigation panel-->
</header>