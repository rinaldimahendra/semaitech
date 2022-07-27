<style>
    * {
        box-sizing: border-box;
    }

    .container {
        position: relative;
        width: 50%;
        max-width: 50px;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        bottom: 70%;
        right: 50%;
        height: 100px;
        width: auto;
        opacity: 1;
    }
</style>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<br>
<br>
<br>
<br>
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Rekomendasi Produk
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Best Seller
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div> -->
                <!-- 
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div> -->
            </div>

            <!-- Search product -->

            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <!-- <form class="form-horizontal" method="post" action="<?= base_url('home/search#s') ?>">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Pencarian Produk">
                    </div>
                </form> -->
            </div>


            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <!-- <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Kategori
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <?php foreach ($datakategori as $dk) : ?>
                                <a href="<?= base_url('home/kategori/') . $dk['Id_Kategori']; ?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    <?= $dk['Nama_Kategori'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row isotope-grid" id="s">
            <?php foreach ($datasayur as $d) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img class="overlay" src="<?= base_url('assets/img/ikon/medal.png') ?>" alt="">
                            <img class="image" src="<?= base_url('assets/img/sayur/') . $d['Foto']; ?>" alt="IMG-PRODUCT">
                            <div class="row">
                                <div class="column col-6">
                                    <a href="<?= base_url('home/AddCart/') . $d['Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-105 bg2 bor2 hov-btn1 p-lr-15 trans-04 js-addcart-sukses">
                                        <i class="zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
                                    </a>
                                </div>
                                <div class="column col-6">
                                    <a href="<?= base_url('home/footer/') . $d['Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-105 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        <i class="zmdi zmdi-zoom-in zmdi-hc-lg"></i>
                                    </a>
                                </div>
                            </div>


                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl3 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?= $d['Nama'] ?>
                                </a>

                                <span class="stext-105 cl3">
                                    Rp <?= number_format($d['Harga'], 0, ',', '.'); ?>
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                Stok <?= $d['Stok'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Flash Sale !!
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div> -->
                <!-- 
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div> -->
            </div>

            <!-- Search product -->

            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <!-- <form class="form-horizontal" method="post" action="<?= base_url('home/search#s') ?>">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Pencarian Produk">
                    </div>
                </form> -->
            </div>


            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <!-- <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Kategori
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <?php foreach ($datakategori as $dk) : ?>
                                <a href="<?= base_url('home/kategori/') . $dk['Id_Kategori']; ?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    <?= $dk['Nama_Kategori'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row isotope-grid" id="s">
            <?php foreach ($datasayur as $d) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <img src="<?= base_url('assets/img/ikon/tag.png') ?>" width="50" alt="">
                        <div class="block2-pic hov-img0">
                            <img src="<?= base_url('assets/img/sayur/') . $d['Foto']; ?>" alt="IMG-PRODUCT">
                            <div class="row">
                                <div class="column col-6">
                                    <a href="<?= base_url('home/AddCart/') . $d['Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-105 bg2 bor2 hov-btn1 p-lr-15 trans-04 js-addcart-sukses">
                                        <i class="zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
                                    </a>
                                </div>
                                <div class="column col-6">
                                    <a href="<?= base_url('home/footer/') . $d['Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-105 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        <i class="zmdi zmdi-zoom-in zmdi-hc-lg"></i>
                                    </a>
                                </div>
                            </div>


                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl3 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?= $d['Nama'] ?>
                                </a>

                                <span class="stext-105 cl3">
                                    Rp <?= number_format($d['Harga'], 0, ',', '.'); ?>
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                Stok <?= $d['Stok'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</section>
<?php $this->load->view('template_user/footer'); ?>