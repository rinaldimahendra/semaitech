<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<style>
    body {
        margin-top: 0px;
        background-color: #f2f6fc;
        height: 60rem;
        color: #69707a;

    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
<br>
<br>
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4 mt-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0 mt-4">
                <div class="card-header">Foto Profil</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php if ($user['foto_user'] == 'default.jpg') : ?>
                        <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/img/avatar/avatar-1.png'); ?>" alt="">
                    <?php else : ?>
                        <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/img/avatar/') . $user['foto_user']; ?>" alt="">
                    <?php endif; ?>
                    <div class="small font-italic text-muted mb-4">Foto harus dalam format JPG atau PNG ya!</div>
                    <!-- <?= form_open_multipart('home/update_foto_profile'); ?> -->
                    <form class="form-horizontal" action="<?= base_url('home/update_foto_profile') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3 px-3">
                            <input type="file" class="form-control" name="foto">
                            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        </div>
                        <!-- Profile picture help block-->
                        <!-- Profile picture upload button-->
                        <button class="btn btn-success" type="submit">Ubah Profil</button>
                </div>
            </div>
        </div>
        </form>
        <div class="col-xl-8 mt-4">
            <!-- Account details card-->
            <div class="card mb-4 mt-4">
                <div class="card-header">Detail Akun</div>
                <div class="card-body">
                    <!-- <?= form_open_multipart('home/update_profile'); ?> -->
                    <form class="form-horizontal" action="<?= base_url('home/update_profile') ?>" method="POST" enctype="multipart/form-data">
                        <!-- Form Group (username)-->
                        <input class="form-control" name="id_user" type="hidden" value="<?= $user['id_user'] ?>">
                        <div class="mb-3">
                            <label class="small mb-1" for="nama_user">Nama</label>
                            <input class="form-control" name="nama_user" type="text" value="<?= $user['nama_user'] ?>">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control" name="email" type="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control pwstrength" data-indicator="pwindicator" name="password" type="password">
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="no_tlpn">Nomor Handphone</label>
                                <input class="form-control" name="no_tlpn" type="text" value="<?= $user['no_tlpn']; ?>">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control" name="tanggal_lahir" type="date" value="<?= $user['tanggal_lahir']; ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <!-- Form Group (birthday)-->
                            <?php if ($user['jenis_kelamin'] == 'L') {
                                $jenis_kelamin = 'Laki-Laki';
                            } else {
                                $jenis_kelamin = 'Perempuan';
                            }
                            ?>
                            <div class="col-md-6">
                                <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control form-control-lg" style=" height: 65%; padding: 0.6rem 1rem; " name="jenis_kelamin">
                                    <option selected name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>"><?= $jenis_kelamin ?></option>
                                    <option name="jenis_kelamin" value="L">Laki-Laki</option>
                                    <option name="jenis_kelamin" value="P">Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="alamat">Alamat</label>
                            <input class="form-control" name="alamat" type="text" value="<?= $user['alamat']; ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label class="small mb-1" for="provinsi">Provinsi</label>
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="provinsi" value="<?= $user['nama_provinsi']; ?>">

                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="kota">Kota</label>
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="kota" value="<?= $user['nama_kota']; ?>">

                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="kode_pos">Kode Pos</label>
                                <input class="form-control" name="kode_pos" type="text" value="<?= $user['kode_pos']; ?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php $this->load->view('template_user/footer'); ?>

<Script>
    $(document).ready(function() {
        // Memasukkan ke option provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('RajaOngkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // Memasukkan ke option kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('RajaOngkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
    });
</Script>