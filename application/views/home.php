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
  </header>
  <div class="content-body">
    <div class="tp-banner-container">
      <div class="tp-banner-slider">
        <ul>
          <?php
          foreach ($slider->result() as $row) {?>
          <li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img src="<?php echo base_url()?><?php echo $row->pict_paket?>" data-lazyload="<?php echo base_url()?><?php echo $row->pict_paket?>" data-bgposition="center" alt="" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10">
            <div data-x="['center','center','center','center']" data-y="center" data-transform_in="x:-150px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:150px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content">
              <div class="sl-title-top"><?php echo $row->typeTrip_paket?> TRIP</div>
              <div class="sl-title"><?php echo $row->nama_paket?></div>
              <div class="sl-title-bot">IDR <span><?php echo number_format($row->harga_paket, 0, ',', '.')?></span></div>
            </div>
          </li>
          <?php    
        }
        ?>
      </ul>
    </div>
    <!-- slider info-->
    <div class="slider-info-wrap clearfix">
      <div class="slider-info-content">
        <?php
        foreach ($sliderNews->result() as $row) {?>
        <div class="slider-info-item">
          <div class="info-item-media"><img src="<?php echo base_url()?><?php echo $row->pict_paket?>" data-at2x="<?php echo base_url()?><?php echo $row->pict_paket?>" alt>
            <div class="info-item-text">
              <div class="info-price font-4"><span>Harga</span>IDR <?php echo number_format($row->harga_paket, 0, ',', '.');?></div>
              <div class="info-temp font-4"><span>Tipe Trip</span> <?php echo $row->typeTrip_paket;?></div>
              <p class="info-text"><?php echo $row->deskripsi_paket;?></p>
            </div>
          </div>
          <div class="info-item-content">
            <div class="main-title">
              <h3 class="title"><span class="font-4"><?php echo $row->lokasi_paket?></span> <?php echo $row->nama_paket?></h3>
              <div class="price"><b><span>IDR  <?php echo number_format($row->harga_paket, 0, ',', '.');?></span></b></div>
              <?php
              echo "<a class='button' href='http://localhost/travellovertour/Paket/pesan/$row->id_paket'>Details</a>";
              ?>
            </div>
          </div>
        </div>
        <?php  
      }
      ?>
    </div>
  </div>
  <!-- ! slider-info-->
</div>
<!-- page section-->
<section class="page-section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h6 class="title-section-top font-4">Special offers</h6>
        <h2 class="title-section"><span>Popular</span> Destinations</h2>
        <div class="cws_divider mb-25 mt-5"></div>
        <p>Nullam ac dolor id nulla finibus pharetra. Sed sed placerat mauris. Pellentesque lacinia imperdiet interdum. Ut nec nulla in purus consequat lobortis. Mauris lobortis a nibh sed convallis.</p>
      </div>
      <div class="col-md-4"><img src="<?php echo base_url();?>assets/pic/promo-1.png" data-at2x="<?php echo base_url();?>assets/pic/promo-1@2x.png" alt class="mt-md-0 mt-minus-70"></div>
    </div>
  </div>
  <div class="features-tours-full-width">
    <div class="features-tours-wrap clearfix">
      <?php
      foreach ($popular_post->result() as $row) {?>
      <div class="features-tours-item"  style="overflow: hidden;">
        <div class="features-media"><img src="<?php echo base_url();?><?php echo $row->pict_paket?>" data-at2x="<?php echo base_url();?><?php echo $row->pict_paket?>" alt>
          <div class="features-info-top">
            <div class="info-price font-4"><span>Harga</span> IDR <?php echo number_format($row->harga_paket, 0, ',', '.');?></div>
            <div class="info-temp font-4"><span>Tipe Trip</span> <?php echo $row->typeTrip_paket;?></div>
            <p class="info-text" ><?php echo $row->deskripsi_paket;?></p>
          </div>
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4"><?php echo $row->lokasi_paket?></span> <?php echo $row->nama_paket?>
              <?php
              echo "<a class='button' href='http://localhost/travellovertour/Paket/pesan/$row->id_paket'>Details</a>";
              ?>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>
<!-- ! page section-->
<!-- counter section -->
<section class="small-section">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-6 mb-md-30">
        <div class="counter-block"><i class="counter-icon flaticon-suntour-world"></i>
          <div class="counter-name-wrap">
            <div data-count="345" class="counter">0</div>
            <div class="counter-name">Tours</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-6 mb-md-30">
        <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-fireworks"></i>
          <div class="counter-name-wrap">
            <div data-count="438" class="counter">0</div>
            <div class="counter-name">Holidays</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-6 mb-md-30">
        <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-hotel"></i>
          <div class="counter-name-wrap">
            <div data-count="526" class="counter">0</div>
            <div class="counter-name">Hotels</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-6">
        <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-car"></i>
          <div class="counter-name-wrap">
            <div data-count="675" class="counter">0</div>
            <div class="counter-name">Cars</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ! counter section-->
<!-- page section parallax-->
<section class="small-section cws_prlx_section bg-gray-40"><img src="<?php echo base_url();?>assets/images/bg/imageBg_home.jpeg" alt class="cws_prlx_layer">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h2 class="title-section-top alt">About</h2>
        <h2 class="title-section alt mb-20"><span>Travelover</span>Tour</h2>
        <p class="color-white">Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.</p>
        <div class="cws_divider short mb-30 mt-30"></div>
        <h3 class="font-5 color-white font-medium">Muhammad Pasca</h3>
      </div>
      <div class="col-md-7">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/yib7tvIrL6k" class="embed-responsive-item"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ! page section parallax-->
<!-- recomended section-->
<section class="small-section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h6 class="title-section-top font-4">Top rated</h6>
        <h2 class="title-section"><span>News</span> Our Blogs</h2>
        <div class="cws_divider mb-25 mt-5"></div>
        <p>Maecenas commodo odio ut vulputate cursus. Integer in egestas lectus. Nam volutpat feugiat mi vitae mollis. Aenean tristique dolor bibendum mi scelerisque ultrices non at lorem.</p>
      </div>
      <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
    </div>
    <div class="row">
      <?php
      foreach ($blogs->result() as $row) {?>
      <!-- Recomended item-->
      <div class="col-md-6">
        <div class="recom-item">
          <div  class="recom-media"><a href="#">
            <div style="max-height: 240px;"  class="pic" ><img src="<?php echo base_url();?><?php echo $row->pict_post?>" data-at2x="<?php echo base_url();?><?php echo $row->pict_post?>" alt="<?php echo $row->title_post?>"></div></a>
            <div class="location">By <?php echo $row->postedBy_post?></div>
          </div>
          <!-- Recomended Content-->
          <div class="recom-item-body"><a href="hotels-details.html">
            <h6 class="blog-title"><?php echo $row->date_post?></h6></a>
            <!--<div class="stars stars-4"></div>-->
            <div class="recom-price"><span class="font-4"><?php echo $row->title_post?></span></div>
            <p  class="mb-30" ><?php echo $row->deskripsi_post;?></p>
            <a href="#" class="cws-button small alt">Read more</a>
            <!--<div class="action font-2">20%</div>-->
          </div>
          <!-- Recomended Image-->
        </div>
      </div>
      <!-- ! Recomended item-->
      <?php
    }
    ?>
  </div>
</div>
</section>
<!-- ! recomended section-->
<!-- testimonials section-->
<section class="small-section cws_prlx_section bg-blue-40"><img src="<?php echo base_url()?>assets/images/bg/imageBg_home2.jpeg" alt class="cws_prlx_layer">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h6 class="title-section-top font-4">Happy Memories</h6>
        <h2 class="title-section alt-2"><span>Our</span> Testimonials</h2>
        <div class="cws_divider mb-25 mt-5"></div>
      </div>
    </div>
    <div class="row">
      <!-- testimonial carousel-->
      <div class="owl-three-item">
        <?php
        foreach ($testimonial_post->result() as $row) {?>
        <!-- testimonial item-->
        <div class="testimonial-item" style="height: 345px;">
          <div class="testimonial-top"><a href="#">
            <div class="pic"><img src="<?php echo base_url();?><?php echo $row->pictBg_testi;?>" data-at2x="<?php echo base_url();?><?php echo $row->pictBg_testi;?>" alt></div></a>
            <div class="author" > <img src="<?php echo base_url();?><?php echo $row->pict_testi;?>" data-at2x="<?php echo base_url();?><?php echo $row->pict_testi;?>" alt></div>
          </div>
          <!-- testimonial content-->
          <div class="testimonial-body">
            <h5 class="title"><span><?php echo $row->name_testi?></span></h5>
            <div class="stars stars-5"></div>
            <p class="align-center"><?php echo $row->desc_testi;?></p>
          </div>
        </div>
        <!-- End testimonial item-->
        <?php
      }
      ?>
    </div>
  </div>
</div>
</section>
<!-- ! testimonials section-->
<!-- gallery section-->
<section class="small-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h6 class="title-section-top font-4">Happy Memories</h6>
        <h2 class="title-section"><span>Photo</span> Gallery</h2>
        <div class="cws_divider mb-25 mt-5"></div>
        <p>Vestibulum feugiat vitae tortor ut venenatis. Sed cursus, purus eu euismod bibendum, diam nisl suscipit odio, vitae ultrices mauris dolor quis mauris. Curabitur ac metus id leo maximus porta.</p>
      </div>
      <div class="col-md-4"><i class="flaticon-suntour-photo title-icon"></i></div>
    </div>
    <div class="row portfolio-grid">
      <?php
      foreach ($gallery->result() as $row) {?>
      <!-- portfolio item-->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="portfolio-item">
          <!-- portfolio image-->
          <a href="<?php echo base_url();?><?php echo $row->pict_gallery?>" class="fancy">
            <div class="portfolio-media"><img src="<?php echo base_url();?><?php echo $row->pict_gallery?>" data-at2x="<?php echo base_url();?><?php echo $row->pict_gallery?>" alt></div></a>
            <div class="links"><a href="<?php echo base_url();?><?php echo $row->pict_gallery?>" class="fancy"><i class="fa fa-expand"></i></a></div>
          </div>
        </div>
        <!-- End portfolio item-->
        <?php
      }
      ?>
    </div>
  </div>
</section>
<!-- ! gallery section-->
</div>
<?php $this->load->view('layouts/footer_home');?>
<div id="scroll-top"><i class="fa fa-angle-up"></i></div>
<?php $this->load->view('layouts/javascript_home');?>
</body>
</html>