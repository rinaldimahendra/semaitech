<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?= base_url(); ?>assets/user/images/semai_tech.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <?php foreach ($blog_konten as $bk) : ?>
                        <!-- item blog -->
                        <div class="p-b-63">
                            <a href="<?= base_url('Blog/detail_blog/') . $bk->id_blog ?>" class="hov-img0 how-pos5-parent">
                                <img src="<?php echo $bk->foto ?>" alt="IMG-BLOG">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <?php $waktu = $bk->tanggal_dibuat ?>
                                    <span class="ltext-107 cl2 txt-center">
                                        <?= date("d", strtotime($waktu)); ?>
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        <?= date("M Y", strtotime($waktu)); ?>
                                    </span>
                                </div>
                            </a>

                            <div class="p-t-32">
                                <h4 class="p-b-15">
                                    <a href="<?= base_url('Blog/detail_blog/') . $bk->id_blog ?>" class="ltext-108 cl2 hov-cl1 trans-04">
                                        <?php echo $bk->judul ?>
                                    </a>
                                </h4>

                                <div style="height: 115px; overflow:hidden;">
                                    <p class="stext-117 cl6">
                                        <?= htmlspecialchars_decode($bk->isi_konten); ?>
                                    </p>
                                </div>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">By</span> <?php echo $bk->nama_user ?>
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>


                                        <?php
                                        $kategoriall = explode(",", $bk->kategori);
                                        $arrlength = count($kategoriall);
                                        for ($x = 0; $x < $arrlength; $x++) {
                                            foreach ($kategori1 as $k1) :
                                        ?>
                                                <span>
                                                    <?php

                                                    if ($kategoriall[$x] == $k1->id_kategoriblog) {
                                                        if ($x == $arrlength - 1) {
                                                            echo $k1->nama_kategoriblog;
                                                        } else {
                                                            echo $k1->nama_kategoriblog . ",&nbsp;";
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                        <?php
                                            endforeach;
                                        } ?>

                                    </span>

                                    <a href="<?= base_url('Blog/detail_blog/') . $bk->id_blog ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                        Baca Selengkapnya

                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Pagination -->
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                            1
                        </a>

                        <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                            2
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <form class="" method="post" action="<?= base_url('Blog/search#s') ?>">
                        <div class=" bor17 of-hidden pos-relative">
                            <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                            <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Pencarian Blog">
                        </div>
                    </form>
                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Kategori Blog
                        </h4>

                        <ul>
                            <?php foreach ($kategori1 as $kt) : ?>
                                <li class="bor18">
                                    <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                        <?php echo $kt->nama_kategoriblog ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('template_user/footer'); ?>