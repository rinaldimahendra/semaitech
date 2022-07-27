<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?= base_url(); ?>assets/user/images/semai_tech.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Blog Detail
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <?php foreach ($blog_detail as $bk) : ?>
                        <div class="wrap-pic-w how-pos5-parent">
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
                        </div>

                        <div class="p-t-32">
                            <span class="flex-w flex-m stext-111 cl2 p-b-19">
                                <span>
                                    <span class="cl4">By</span> <?php echo $bk->nama_user ?>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                </span>

                                <span>
                                    <?= date("d M, Y", strtotime($waktu)); ?>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                </span>

                                <span>
                                    <?php echo $bk->nama_kategoriblog ?>
                                </span>

                            </span>

                            <h4 class="ltext-109 cl2 p-b-28">
                                <?php echo $bk->judul ?>
                            </h4>

                            <p style="text-align: justify;" class="stext-117 cl6 p-b-26">
                                <?= htmlspecialchars_decode($bk->isi_konten); ?>
                            </p>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('template_user/footer'); ?>