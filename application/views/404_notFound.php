<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('layouts/head_home');?>
</head>
<body>
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
                  <a href="<?php echo base_url();?>" class="active mn-has-sub">Home <i class="button_open"></i></a>
              </li>
              <!-- End Item With Sub-->
              <li class="slash">/</li>
              <!-- Item With Sub-->
              <li>
                  <a href="<?php echo site_url('paket');?>" class="mn-has-sub">Paket <i class="button_open"></i></a>
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
<!-- breadcrumbs start-->
<section style="background-image:url(<?php echo base_url(); ?>/assets/pic/breadcrumbs/bg1.jpg);" class="breadcrumbs">
   <div class="container">
    <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">pages</a><i>/</i><a href="#" class="last">404 Page</a>
      <h2>404 Page</h2>
  </div>
</div>
</section>
<!-- ! breadcrumbs end-->
</header>

<!-- section 404-->
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-404">
           <img src="<?php echo base_url();?>assets/img/logo.png" alt="404 Not Found">
       </div>
       <h2 class="mt-40 mb-50 align-center">Ooops ... Maaf, halaman yang Anda inginkan tidak ada di sini lagi.</h2>
       <div class="row">
          <div class="col-md-12"> 
            <p class="mb-15" style="text-align: center;">Silahkan tekan tombol homepage untuk kembali </p>
            <a style="width: 100%;" href="<?php echo base_url();?>" type="submit" class="cws-button alt" id="next" >Homepage <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- ! section 404-->

<?php $this->load->view('layouts/footer_home');?>
<div id="scroll-top"><i class="fa fa-angle-up"></i></div>
<!-- ! footer-->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/cws_parallax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/masonry.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo base_url(); ?>assets/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bg-video/cws_self_vimeo_bg.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bg-video/jquery.vimeo.api.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bg-video/cws_YT_bg.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.tweet.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/retina.min.js"></script>
</body>
</html>