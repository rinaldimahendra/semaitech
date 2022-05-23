<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_admin/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

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
                <?php if ($this->session->flashdata('message2')) : ?>
                    <?php $message = $this->session->flashdata('message2'); ?>
                    <?= '<div class="alert alert-info">' . $message . '</div>'; ?>
                    <?php $this->session->unset_userdata('message2'); ?>
                <?php endif; ?>
                <form method="POST" action="<?= base_url('auth/login'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Silakan masukan email Anda!
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?php echo base_url(); ?>dist/auth_forgot_password" class="text-small">
                          Lupa password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Silakan masukan password Anda!
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>                                
                  </div>
                </div>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum punya akun? <a href="<?php echo base_url(); ?>auth/registrasi">Daftar</a>
            </div>
            <div class="simple-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('template_admin/js'); ?>