<!DOCTYPE html>
<html>
<head>
	<title>Travellover | Blogs</title>
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
							<a href="<?php echo base_url();?>" class="mn-has-sub">Home <i class="button_open"></i></a>
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
							<a href="<?php echo site_url('blogs');?>" class="mn-has-sub" active>Blogs <i class="button_open"></i></a>
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
	<!-- Content -->
	<div class="content-body">
		<div class="container page">
			<div class="row">
				<div class="col-md-12">
					<div class="row blog-col">
						<!-- Blog Post-->
						<div class="col-md-4 col-sm-6 col-xs-6 mb-30">
							<!-- Blog item-->
							<div class="blog-item clearfix border boxed">
								<!-- Blog Image-->
								<div class="blog-media"><a href="blog-single.html">
									<div class="pic"><img src="pic/blog/270x270/1@2x.jpg" data-at2x="pic/blog/270x270/1@2x.jpg" alt>
									</div></a>
								</div>
								<!-- blog body-->
								<div class="blog-item-body clearfix">
									<!-- title-->
									<a href="blog-single.html">
										<h6 class="blog-title">Sed semper lacus et </h6>
									</a>
									<div class="blog-item-data">Mon, 03-23-2016</div>
									<!-- Text Intro-->
									<p>Etiam maximus molestie accumsan. Sed metus sapien, fermentum nec lorem ac, tempor gravida arcu.</p>
									<a href="blog-single.html" class="blog-button">Read more</a>
								</div>
							</div>
							<!-- ! Blog item-->
						</div>
						<!-- ! Blog Post-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content-->
	<?php $this->load->view('layouts/footer_home');?>
	<div id="scroll-top"><i class="fa fa-angle-up"></i></div>
	<?php $this->load->view('layouts/javascript_home');?>
</body>
</html>