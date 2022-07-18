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
                Konten Blog
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h5 class="card-title">
                        Buat Konten Blog
                    </h5> 
                </div>

                <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('admin/blog/create_') ?>" method="POST">
              <div class="card-body">
                <?= $this->session->flashdata('message');
                $this->session->unset_userdata('message'); ?>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Isi</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" name="isi"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" multiple="multiple" name="kategori[]" data-placeholder="Select a State" style="width: 100%;">
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k->id_kategoriblog ?>"><?= $k->nama_kategoriblog ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Penulis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="sumber" name="sumber">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Foto Header</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto" accept="image/*" onchange="preview_image(event)">
                    <div style="display:none" id="row-display">
                      <hr>
                      <label for="output_image">Preview Foto</label><br>
                      <img id="output_image" class="img-thumbnail" width="200" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a href="<?= base_url('admin/blog/index') ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-info" name="draft" value="draft">Simpan Draft</button>
                <button type="submit" class="btn btn-primary">Terbitkan</button>
              </div>
            </form>
                
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('template_admin/footer'); ?>