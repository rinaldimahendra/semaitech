<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_admin/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/logo/logo_semai2.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

           <div class="card card-primary">
            <div class="row">  
              <div class="col-lg">
                <div class="p-3">  
                  <div class="text-center">
                    <div class="card-header">
                      <h1 class="h4 text-black-900 mb-2">Registrasi Akun</h1>
                    </div>
                  </div>
                    <div class="card-body">
                       <?php if ($this->session->flashdata('message1')) : ?>
                            <?php $message = $this->session->flashdata('message1'); ?>
                            <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
                            <?php $this->session->unset_userdata('message1'); ?>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('message')) : ?>
                            <?php $message = $this->session->flashdata('message'); ?>
                            <?= '<div class="alert alert-danger">' . $message . '</div>'; ?>
                            <?php $this->session->unset_userdata('message'); ?>
                        <?php endif; ?>
                      <form action="<?= base_url('auth/registrasi'); ?>" method="post">
                        <div class="row">
                          <div class="form-group col-12">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="nama" autofocus>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="select your gender" class="d-block">Jenis Kelamin</label>
                            <?= form_error('jenis-kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jenis-kelamin" id="inlineRadio1" value="L">
                              <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>

                          
                            <?= form_error('jenis-kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jenis-kelamin" id="inlineRadio2" value="P">
                              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                          </div>
                          <div class="form-group col-6">
                            <label>Tanggal Lahir</label>
                            <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
                            <input type="date" class="form-control" name="tanggal">
                          </div>
                        </div>
                        

                        
                        
                        <div class="row">
                          <div class="form-group col-6">
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                            <label for="email" class="d-block">Email</label>
                            <input id="email" type="email" class="form-control" name="email" autofocus>
                          </div>
                          <div class="form-group col-6">
                            <label for="nohandphone" class="d-block">No Handphone</label>
                            <input id="nohandphone" type="tel" class="form-control" name="nohandphone" required>
                          </div>
                        </div>

                        <div class="row">
                          <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                          <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                            <div id="pwindicator" class="pwindicator">
                              <div class="bar"></div>
                              <div class="label"></div>
                            </div>
                          </div>
                          <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                          <div class="form-group col-6">
                            <label for="password2" class="d-block">Konfirmasi Password</label>
                            <input id="password2" type="password" class="form-control" name="password2">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">Saya setuju dengan syarat dan ketentuan</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Buat Akun
                          </button>
                        </div>
                        <div class="mt-5 text-muted text-center">
                          <a class="small" href="<?php echo base_url('auth/login'); ?>">Sudah punya akun? Login!</a>
                      </div>
                      </form>
                    </div>
                  </div>
                  <div class="simple-footer">
                    Copyright &copy; SAYur! 2022
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('template_admin/js'); ?>
