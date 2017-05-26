<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="canonical" href="http://www.travellovertour.com"><link rel="alternate" href="http://www.travellovertour.com" hreflang="en-id"><meta name="robots" content="index,nofollow" /><meta name="copyright" content="Copyright © 2017" /><title>Travellovertour</title><meta name="google" content="notranslate" /><meta name="google-site-verification" content=""><meta name="keywords" content="cari travel, pesan travel, cari tempat wisata, pesan tempat wisata" /><meta name="url" content="http://travellovertour.com" /><meta name="language" content="English"><meta name="description" content="Travellovertour jagonya travel" /><meta name="author" content="Helfi Pangestu"><meta name="csrf-token" content="" /><meta name="revisit-after" content="7"><meta name="webcrawlers" content="all"><meta name="rating" content="general"><meta name="spiders" content="all"><meta itemprop="name" content="Travellovertour"><meta itemprop="description" content="Travellovertour jagonya travel"><meta name="twitter:card" content="Travellovertour"><meta name="twitter:site" content="@travellovertour"><meta name="twitter:title" content="Travellovertour"><meta name="twitter:description" content="Travellovertour jagonya travel"><meta name="twitter:creator" content="@travellovertour"><meta property="og:url" content="http://travellovertour.com" /><meta property="og:type" content="article" /><meta property="og:title"content="Travellovertour jagonya travel" /><meta property="og:description" content="Travellovertour jagonya travel" /><meta property="og:site_name" content="Travellover jagonya travel"><meta property="og:title" content="Travellover jagonya travel"><meta property="og:type" content="Travellover jagonya travel"><meta property="og:url" content="http://www.travellovertour.com"><link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-57x57.png"><link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-57x57.png"><link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-72x72.png"><link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-76x76.png"><link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-114x114.png"><link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-120x120.png"><link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-144x144.png"><link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-152x152.png"><link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/fav/apple-icon-180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/ images/fav/android-icon-192x192.png"><link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/fav/favicon-32x32.png"><link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/images/fav/favicon-96x96.png"><link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/fav/favicon-16x16.png"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="#ffffff"><meta name="apple-mobile-web-app-title" content="Travellovertour"><meta name="application-name" content="Travellovertour"><link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div style="padding-top: 110px;">
            <div><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" data-at2x="<?php echo base_url();?>assets/img/logo@2x.png" alt="logo Travellover"></a>
            </div><br>
            <h3>Welcome to Travellover</h3>
            <p>Love your travel feel
            </p>
            <?php 
                if (!empty($this->session->flashdata('gagalmasuk'))) {?>
                    <div class="alert alert-danger">
                        <strong>Oops! </strong><?php echo $this->session->flashdata('gagalmasuk');?>
                    </div>
            <?php
                }
            ?>
            <form class="m-t" role="form" method="post" action="<?php echo site_url('Pasca/selectLogin');?>">
                <div class="form-group">
                    <input name="username" id="username" type="username" class="form-control" placeholder="Username / Email" required>
                </div>
                <div class="form-group">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</body>

</html>
