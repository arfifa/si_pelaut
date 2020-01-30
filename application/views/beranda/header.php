<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $judul ?></title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/swiper.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/style.css">
    <!--my css  -->
      <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/my_css.css">
</head>

<body>
<div class="color-line"></div>
    <!--::header part start::-->
    <header class="header_area">
        <div class="sub_header">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 col-xl-6">
                      <div id="logo">
                          <a href="<?= base_url(); ?>"><img src="<?php echo base_url('assets/') ?>img/logo.jpg" alt="" title="" / style = "width: 180px; height: 47px;"></a>
                      </div>
                  </div>
                  <div class="col-md-8 col-xl-6">
                      <div class="sub_header_social_icon float-right">
                        <i class="flaticon-phone"></i>021 8237221</a>
                        <a href="<?php echo base_url().'Login/registrasiMember' ?>" class="register_icon"><i class="ti-arrow-right"></i>REGISTRASI MEMBER</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="<?= base_url() ?>">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#galeriKami" class="nav-link">Galeri Kami</a>
                                    </li>
                                </ul>
                                <div class="header_social_icon d-none d-lg-block">
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                        <li><a href="<?php echo base_url().'Login' ?>" class="btn btn-info">Masuk Member</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="header_social_icon d-block d-lg-none">
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="<?php echo base_url().'Login' ?>" class="btn btn-info">Masuk Member</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->