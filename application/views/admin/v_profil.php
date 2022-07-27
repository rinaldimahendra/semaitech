<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_admin/header');
$this->load->view('template_admin/layout');
$this->load->view('template_admin/sidebar');
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profil</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">Profil</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Selamat Datang!</h2>
      <p class="section-lead">
        Ubah informasi tentang diri Anda di halaman ini.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <?php if ($data_user['foto_user'] == 'default.jpg') : ?>
                <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png'); ?>" class="rounded-circle profile-widget-picture">
              <?php else : ?>
                <img alt="image" src="<?= base_url('assets/img/avatar/') . $data_user['foto_user']; ?>" class="rounded-circle profile-widget-picture">
              <?php endif; ?>
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                </div>
              </div>
            </div>
            <form class="form-horizontal" action="<?= base_url('admin/profil/update_foto_profile') ?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6">
                  <input type="file" class="form-control" name="foto">
                  <input type="hidden" name="id_user" value="<?= $data_user['id_user']; ?>">
                </div>
                <div class="col-6">
                  <button class="btn btn-primary">Upload Foto</button>
                </div>
              </div>
            </form>


            <div class="profile-widget-description">

              <div class="profile-widget-name"> <?= $data_user['nama_user']; ?> <div class="text-muted d-inline font-weight-normal">
                  <div class="slash"></div> Admin SemaiTech
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form class="form-horizontal" action="<?= base_url('admin/profil/update_profile') ?>" method="POST" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Edit Profil</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Nama</label>
                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                    <input type="text" class="form-control" name="nama" value="<?= $data_user['nama_user']; ?>">
                    <input type="hidden" name="id_user" value="<?= $data_user['id_user']; ?>">
                    <div class="invalid-feedback">
                      Isi Nama Anda
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="nohandphone" class="d-block">No Handphone</label>
                    <input id="nohandphone" type="nohandphone" class="form-control" name="nohandphone" value="<?= $data_user['no_tlpn']; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="select your gender" class="d-block">Jenis Kelamin</label>
                    <?= form_error('jenis-kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                    <?php if ($data_user['jenis_kelamin'] == 'L') : ?>
                      <?= form_error('jenis-kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis-kelamin" value="L" id="exampleRadios1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Laki-laki
                        </label>

                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis-kelamin" value="P" id="exampleRadios2">
                        <label class="form-check-label" for="exampleRadios2">
                          Perempuan
                        </label>

                      </div>
                    <?php else : ?>
                      <?= form_error('jenis-kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis-kelamin" value="L" id="exampleRadios1">
                        <label class="form-check-label" for="exampleRadios1">
                          Laki-laki
                        </label>

                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis-kelamin" value="P" id="exampleRadios2" checked>
                        <label class="form-check-label" for="exampleRadios2">
                          Perempuan
                        </label>

                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Tanggal Lahir</label>
                    <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
                    <input type="date" class="form-control" name="tanggal" value="<?= $data_user['tanggal_lahir']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="email" class="d-block">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= $data_user['email']; ?>" readonly>
                  </div>

                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password Baru</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                </div>
                <div class="form-divider">
                  Alamat Kamu
                </div>
                <div class="row">

                  <div class="form-group col-6">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $data_user['alamat']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label>Provinsi</label>
                      <select class="form-control" name="provinsi" value="<?= $user['provinsi']; ?>">

                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Kota</label>
                    <select class="form-control" name="kota" value="<?= $user['kota']; ?>">
                      <option value="<?= $data_user['kota']?>"><?= $data_user['nama_kota']?></option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label>Kode Pos</label>
                    <input type="text" class="form-control" name="kode_pos" value="<?= $data_user['kode_pos']; ?>">
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template_admin/footer'); ?>

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