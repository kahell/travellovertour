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
    <!-- breadcrumbs start-->
    <section style="background-image:url(<?php echo base_url();?>assets/images/bg/imageBg_home.jpeg);" class="breadcrumbs">
      <div class="container">
        <div class="text-left breadcrumbs-item">
          <a href="<?php echo base_url();?>">home</a><i>/</i>
          <a href="<?php echo site_url("Paket");?>">Paket</a><i>/</i>
          <a href="#" class="last"><span>pesan</span></a>
          <h2><span>Pesan</span> Paket</h2>
        </div>
      </div>
    </section>
    <!-- ! breadcrumbs end-->
  </header>
  <!-- ! header page-->
  <div class="content-body">
    <section class="page-section pt-0 pb-50">
      <div class="container">
        <div class="menu-widget with-switch mt-30 mb-30">
          <ul class="magic-line">
            <li class="current_item"><a href="#overview" class="scrollto">Overview</a></li>
          </ul>
        </div>
      </div>
      <div class="container">
        <div id="flex-slider" class="flexslider">
          <ul class="slides">
            <?php
            foreach ($foto->result() as $row) {
              if ($row->typeFoto_paket == 'destinasi') {
                ?>
                <li style="max-height: 480px;"><img src="<?php echo base_url(); echo $row->foto_paket;?>" alt="Foto Travellover"></li>
                <?php
              }  
            }
            ?>
          </ul>
        </div>
        <div id="flex-carousel" class="flexslider">
          <ul class="slides">
            <?php
            foreach ($foto->result() as $row) {
              if ($row->typeFoto_paket == 'destinasi') {
                ?>
                <li><img src="<?php echo base_url(); echo $row->foto_paket;?>" data-at2x="<?php echo base_url(); echo $row->foto_paket;?>" alt="foto travellovertour"></li>
                <?php
              }  
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="container mt-30">
        <div class="row">
          <div class="col-md-12">
            <!-- tabs-->
            <div class="tabs mt-30 mb-50">
              <div class="block-tabs-btn clearfix">
                <div data-tabs-id="tabs1" class="tabs-btn active">Itenary</div>
                <div data-tabs-id="tabs2" class="tabs-btn">Syarat dan ketentuan</div>
                <div data-tabs-id="tabs3" class="tabs-btn">Booking Paket</div>
              </div>
              <!-- tabs keeper-->
              <div class="tabs-keeper">
                <!-- tabs container-->
                <div data-tabs-id="cont-tabs1" class="container-tabs active">
                  <?php foreach ($paket->result() as $row) {
                    echo $row->itenary_paket;
                  }?>
                </div>
                <!-- /tabs container-->
                <!-- tabs container-->
                <div data-tabs-id="cont-tabs2" class="container-tabs">
                  <?php foreach ($paket->result() as $row) {
                    echo $row->syarat_paket;
                  }
                  ?>
                </div>
                <!-- /tabs container-->
                <!-- tabs container-->
                <div data-tabs-id="cont-tabs3" class="woocommerce container-tabs">
                  <div class="row">
                    <div class="col-md-6">
                      <form action="<?php echo site_url('Paket/konfirmasi');?>" method="post" enctype="multipart/form-data">
                        <table class="shop_table cart">
                          <thead>
                            <tr>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="cart_item">
                              <td>
                                <span class="amount" style="padding-left: 20px;">IDR <?php 
                                     //$row->harga_paket;
                                $harga = number_format($row->harga_paket, 0, ',', '.');
                                echo $harga;
                                ?>
                                <input class="form-control" type="hidden" name="id_paket" id="id_paket" value="<?php foreach ($paket->result() as $row) {echo $row->id_paket;}?>">
                                <input class="form-control" id="harga_paket" name="harga_paket" type="hidden" value="<?php echo $row->harga_paket?>"> 
                              </span>
                            </td>
                            <td>
                              <div class="quantity buttons_added">
                                <input type="number" onkeyup="sum();" id="jumlah_orang" name="jumlah_orang" step="1" min="0" value="1" title="Qty" class="input-text qty text">
                              </div>
                            </td>
                            <td>
                              <span class="amount">IDR<input style="border: none;" type="text" name="total" id="total" value="<?php echo number_format($row->harga_paket, 0, ',', '.');?>" disabled>
                                <input type="hidden" name="total_harga" id="total_harga" value="<?php echo $row->harga_paket;?>">
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" class="actions">
                              <input type="submit" name="proceed" value="Pesan" class="cws-button">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </form>
                  </div>
                  <br>
                  <div class="col-md-6">
                    <div class="blog-item-data clearfix" style="border: 1px solid #efefef;    padding: 15px; margin-bottom: 10px;">
                      <?php 
                      foreach ($paket->result() as $row) {
                        ?>
                        <h3 class="blog-title"><?php echo $row->nama_paket?></h3>
                        <p class="post-info"> <i class="fa fa-map-marker"></i>
                          <span class="post-author"><?php echo $row->lokasi_paket?> </span>
                          <span>IDR </span><?php $harga = number_format($row->harga_paket, 0, ',', '.');echo $harga;?>
                        </p>
                        <p style="text-align: justify;"><?php echo $row->deskripsi_paket;?></p>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- /tabs keeper-->
          </div>
          <!-- /tabs container-->
        </div>
        <!-- /tabs-->
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!-- content-->
        <div class="col-md-12">
          <!-- /Main Single Produk-->
          <div class="cws_divider"></div>
          <!-- post carousel-->
          <div class="carousel-container mt-50 mb-50">
            <div class="title-carousel clearfix">
              <h1 class="carousel-heading">Rekomendasi Paket</h1>
              <div class="carousel-nav">
                <div class="prev"><i class="fa fa-angle-left"></i></div>
                <div class="next"><i class="fa fa-angle-right"></i></div>
              </div>
            </div>
            <div class="row">
              <div class="owl-three-item">
                <?php
                foreach ($popular_paket->result() as $row) {
                  ?>
                  <!-- product-->
                  <div class="shop-item">
                    <!-- Shop Image-->
                    <div class="shop-media">
                      <div class="pic">
                        <img src="<?php foreach($fotoPopular_paket->result() as $row2){if ($row2->typeFoto_paket == 'destinasi' && $row2->id_paket == $row->id_paket){echo base_url();echo $row2->foto_paket;break;}};?>" data-at2x="<?php foreach($fotoPopular_paket->result() as $row2){if ($row2->typeFoto_paket == 'destinasi' && $row2->id_paket == $row->id_paket){echo base_url();echo $row2->foto_paket;break;}};?>" alt="foto paket">
                      </div>
                      <div class="location"><?php echo $row->lokasi_paket;?></div>
                    </div>
                    <!-- Shop Content-->
                    <div class="shop-item-body">
                      <a href="#">
                        <h6 class="shop-title"><?php echo $row->lokasi_paket;?></h6>
                      </a>
                      <!--<div class="stars stars-4"></div>-->
                      <div class="shop-price">IDR <?php echo number_format($row->harga_paket, 0, ',', '.');?></div>
                      <p class="mb-30"><?php echo $row->deskripsi_paket;?></p>
                      <div class="price-review">
                        <?php
                        echo "<a href='http://localhost/travellovertour/Paket/pesan/$row->id_paket' class='cws-button small alt'>Lihat Paket</a>";
                        ?>
                      </div>
                      <div class="action font-2">IDR <?php echo number_format($row->harga_paket, 0, ',', '.');?></div>
                      <div class="action sale font-2"><?php echo $row->typeTrip_paket?> trip</div>
                    </div>
                    <div class="link"> <a href="<?php foreach($fotoPopular_paket->result() as $row2){if ($row2->typeFoto_paket == 'destinasi' && $row2->id_paket == $row->id_paket){echo base_url();echo $row2->foto_paket;break;}};?>" class="fancy"><i class="fa fa-expand"></i></a>
                    </div>
                  </div>
                  <!-- ! product-->
                  <?php
                }
                ?>
              </div>
            </div>
            <!-- Row -->
          </div>
          <!-- ! post carousel-->
        </div>
        <!-- ! content-->
      </div>
      <!-- /Row -->
    </div>
    <!-- /Container Row-->
  </section>
</div>
</div>
<?php $this->load->view('layouts/footer_home');?>
<!-- scroll top-->
<div id="scroll-top"><i class="fa fa-angle-up"></i></div>


<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script><script src="<?php echo base_url();?>assets/js/bootstrap.js"></script><script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script><script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script><script src="<?php echo base_url();?>assets/js/TweenMax.min.js"></script><script src="<?php echo base_url();?>assets/js/cws_parallax.js"></script><script src="<?php echo base_url();?>assets/js/jquery.fancybox.pack.js"></script><script src="<?php echo base_url();?>assets/js/jquery.fancybox-media.js"></script><script src="<?php echo base_url();?>assets/js/isotope.pkgd.min.js"></script><script src="<?php echo base_url();?>assets/js/imagesloaded.pkgd.min.js"></script><script src="<?php echo base_url();?>assets/js/masonry.pkgd.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.video.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script><script src="<?php echo base_url();?>assets/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery.form.min.js"></script><script src="<?php echo base_url();?>assets/js/script.js"></script><script src="<?php echo base_url();?>assets/js/bg-video/cws_self_vimeo_bg.js"></script><script src="<?php echo base_url();?>assets/js/bg-video/jquery.vimeo.api.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bg-video/cws_YT_bg.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.tweet.js"></script><script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery.flexslider.js"></script><script src="<?php echo base_url();?>assets/js/retina.min.js"></script>
<script>
  function sum() {
    var harga_paket = $('#harga_paket').val();
    var jumlah_orang = $('#jumlah_orang').val();
    document.getElementById('total_harga').value = jumlah_orang * harga_paket ;
    var result = parseInt(harga_paket) * parseInt(jumlah_orang);

    var angkaInt = parseInt(result, 10);
    var angkaStr = angkaInt.toString();
    var angkaStrRev = angkaStr.split('').reverse().join('');
    var angkaStrRevTitik = '';
    for(var i = 0; i < angkaStrRev.length; i++){
      angkaStrRevTitik += angkaStrRev[i];
      if((i+1) % 3 === 0 && i !== (angkaStrRev.length-1)){
        angkaStrRevTitik += '.';
      }
    }
    var angkaRp = angkaStrRevTitik.split('').reverse().join('');
    var harga_paket2 = angkaRp;


    if (!isNaN(result)) {
     document.getElementById('total').value = harga_paket2;

   }
 }
</script>
</body>
</html>