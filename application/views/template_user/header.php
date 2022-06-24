<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title;?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/logo/favicon1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/user/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
					</div>

					<div class="right-top-bar flex-w h-full">
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="<?= base_url(); ?>" class="logo">
						<img src="<?= base_url(); ?>assets/img/logo/logo-dashboard.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?= base_url(); ?>">Beranda</a>
							</li>
							<li>
								<a href="#">Kategori</a>
								
								<ul class="sub-menu">
									<?php foreach($datakategori as $dk) : ?>
									<li><a href="<?= base_url('home/kategori/').$dk['Id_Kategori']; ?>"><?= $dk['Nama_Kategori']; ?></a></li>
									<?php endforeach; ?>
								</ul>
								
							</li>

							<li>
								<a href="product.html">Belanja</a>
							</li>

							<li>
								<a href="about.html">Tentang</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" href="<?= base_url('home/cart')?>" data-notify="<?= $carttotal;?>">				
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="zmdi zmdi-account"></i>
						</a> -->
						<div href="#" class="main-menu dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<li class="active-menu">
								<i class="zmdi zmdi-account"></i>
								<?php if ($this->session->userdata('nama')) : ?>
								<ul class="sub-menu">
									<li><a href="#"><i class="zmdi zmdi-account"></i>&ensp;Profile</a></li>
									<li><a href="<?= base_url('home/cart')?>"><i class="zmdi zmdi-shopping-cart"></i>&ensp;Keranjang Saya</a></li>
									<li><a href="<?= base_url('riwayat')?>"><i class="zmdi zmdi-assignment"></i>&ensp;Pesanan Saya</a></li>
									<li><a href="<?= base_url('auth/logout')?>"><i class="zmdi zmdi-power"></i>&ensp;Log out</a></li>
								</ul>
								<?php else : ?>
								<ul class="sub-menu">
									<li><a href="<?= base_url('auth/registrasi')?>"><i class="zmdi zmdi-account"></i>&ensp;Register</a></li>
									<li><a href="<?= base_url('auth/login')?>"><i class="zmdi zmdi-sign-in"></i>&ensp;Log in</a></li>
								</ul>
								<?php endif; ?>
							</li>
						</div>
						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="<?= base_url(); ?>assets/user/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<div href="#" class="main-menu dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
					<li class="active-menu">
						<i class="zmdi zmdi-account"></i>
						<?php if ($this->session->userdata('nama')) : ?>
						<ul class="sub-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="<?= base_url('home/cart')?>">&ensp;Cart</a></li>
							<li><a href="<?= base_url('auth/logout')?>">&ensp;Log out</a></li>
						</ul>
						<?php else : ?>
						<ul class="sub-menu">
							<li><a href="<?= base_url('auth/registrasi')?>">&ensp;Register</a></li>
							<li><a href="<?= base_url('auth/login')?>">&ensp;Log in</a></li>
						</ul>
						<?php endif; ?>
					</li>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<!-- <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul> -->

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url(); ?>">Beranda</a>
				</li>
				<li class="active-menu">
					<a href="#">Kategori</a>
					
					<ul class="sub-menu">
						<?php foreach($datakategori as $dk) : ?>
						<li><a href="<?= base_url('home/kategori/').$dk['Id_Kategori']; ?>"><?= $dk['Nama_Kategori']; ?></a></li>
						<?php endforeach; ?>
					</ul>
					
				</li>

				<li>
					<a href="product.html">Belanja</a>
				</li>

				<li>
					<a href="about.html">Tentang</a>
				</li>
			</ul>
		</div>
	</header>
    <!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?= base_url(); ?>assets/user/images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?= base_url(); ?>assets/user/images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?= base_url(); ?>assets/user/images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?= base_url('home/cart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="<?= base_url('home/cart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>