<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_admin/header');
$this->load->view('template_admin/layout');
$this->load->view('template_admin/sidebar');
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        Data Company Profile
      </h1>
    </div>
    <div class="card">
      <div class="card-header">

      </div>
      <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('admin/companyprofile/update_perusahaan') ?>" method="POST">
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="nama" value="<?= $profile->nama ?>">
            <input type="hidden" id="id" name="id" value="<?= $profile->id ?>">
          </div>

        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote" name="tentang"><?= $profile->tentang ?></textarea>
          </div>

        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Visi perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote" name="visi"><?= $profile->visi ?></textarea>
          </div>

        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Misi perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote" name="misi"><?= $profile->misi ?></textarea>
          </div>

        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote" name="alamat"><?= $profile->alamat ?></textarea>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Wa/telephone</label>
          <div class="col-sm-12 col-md-7">
            <input type="tel" class="form-control" name="nomor_kontak" value="<?= $profile->nomor_kontak ?>"></input>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <input type="file" name="logo" accept="image/*" onchange="preview_image(event)">
            <input type="hidden" class="custom-file-input" value="<?= $profile->logo ?>" name="logo_">
            <hr>
            <label for="output">Preview Foto Logo</label><br>
            <img id="output" src="<?= $profile->logo ?>" class="img-thumbnail" width="200" />
            <div style="display:none" id="row-display">
              <hr>
              <label for="output">Preview Update Foto Logo</label><br>
              <img id="output_image" class="img-thumbnail" width="200" />
            </div>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('template_admin/footer'); ?>