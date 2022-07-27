<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(1, 191, 17, 0.97), rgba(248, 255, 119, 0.63));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(1, 191, 17, 0.97), rgba(248, 255, 119, 0.63))
    }
</style>

<br>
<br>
<br>
<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <br>
                            <?php if ($user['foto_user'] == 'default.jpg') : ?>
                                <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/img/avatar/avatar-1.png'); ?>" width="150" alt="">
                            <?php else : ?>
                                <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/img/avatar/') . $user['foto_user']; ?>" width="150" alt="">
                            <?php endif; ?>
                            <h5><?= $user['nama_user'] ?></h5>
                            <br>
                            <a href="<?= base_url('home/profil') ?>"><i class="far fa-edit mb-5"></i>&ensp;Edit Profile</a></li>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Informasi</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted"><?= $user['email'] ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>No. Hp</h6>
                                        <p class="text-muted"><?= $user['no_tlpn']; ?></p>
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Tanggal Lahir</h6>
                                        <p class="text-muted"><?= $user['tanggal_lahir']; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Jenis Kelamin</h6>
                                        <?php $jk = $user['jenis_kelamin'];
                                        if ($jk == "P") { ?>
                                            <p class="text-muted">Perempuan</p>
                                        <?php } else { ?>
                                            <p class="text-muted">Laki-laki</p>
                                        <?php }
                                        ?>

                                    </div>
                                </div>
                                <br>
                                <h6>Alamat</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col mb-3">
                                        <p class="text-muted"><?= $user['alamat']; ?>, <?= $user['kota']; ?>, <?= $user['provinsi']; ?>. <?= $user['kode_pos']; ?>.</p>
                                    </div>
                                </div>
                                <!-- <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template_user/footer'); ?>