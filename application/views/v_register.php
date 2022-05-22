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
              <img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

           <div class="card card-primary">
            <div class="row">  
              <div class="col-lg">
                <div class="p-3">  
                  <div class="text-center">
                  <div class="card-header"><h1 class="h4 text-black-900 mb-2">Buat Akun Baru!</h1></div>
                  </div>
                    <div class="card-body">
                      <form method="POST">
                        <div class="row">
                          <div class="form-group col-12">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="select your gender" class="d-block">Jenis Kelamin</label>
                          <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                          <label class="form-check-label" for="exampleRadios1">
                          Laki-laki
                          </label>

                        </div>
                          <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" checked>
                          <label class="form-check-label" for="exampleRadios2">
                          Perempuan
                          </label>

                          </div>
                        </div>

                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" class="form-control">
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="email" class="d-block">Email</label>
                            <input id="email" type="email" class="form-control" name="email" autofocus>
                          </div>
                          <div class="form-group col-6">
                            <label for="nohandphone" class="d-block">No Handphone</label>
                            <input id="nohandphone" type="nohandphone" class="form-control" name="nohandphone">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                            <div id="pwindicator" class="pwindicator">
                              <div class="bar"></div>
                              <div class="label"></div>
                            </div>
                          </div>
                          <div class="form-group col-6">
                            <label for="password2" class="d-block">Konfirmasi Password</label>
                            <input id="password2" type="password" class="form-control" name="password-confirm">
                          </div>
                        </div>

                        <div class="form-divider">
                          Alamat Kamu
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label>Negara</label>
                            <select class="form-control selectric">
                              <option>Afghanistan</option>
                              <option>Albania</option>
                              <option>Algeria</option>
                              <option>AMerika Serikat</option>
                              <option>Angola</option>
                              <option>Antartika</option>
                              <option>Arab Saudi</option>
                              <option>Argentina</option>
                              <option>Armenia</option>
                              <option>Australia</option>
                              <option>Austria</option>
                              <option>Azerbajian</option>
                              <option>Bahama</option>
                              <option>Bahrain</option>
                              <option>Bangladesh</option>
                              <option>Barbados</option>
                              <option>Belanda</option>
                              <option>Belgia</option>
                              <option>Bhutan</option>
                              <option>Bolivia</option>
                              <option>Bosnia</option>
                              <option>Brazil</option>
                              <option>Brunei Darussalam</option>
                              <option>Burundi</option>
                              <option>Cambodia</option>
                              <option>Canada</option>
                              <option>Chad</option>
                              <option>Chile</option>
                              <option>China</option>
                              <option>Colombia</option>
                              <option>Comoros</option>
                              <option>Congo</option>
                              <option>Costa Rica</option>
                              <option>Cuba</option>
                              <option>Denmark</option>
                              <option>Dominicia</option>
                              <option>Equador</option>
                              <option>Egypt</option>
                              <option>El Salfador</option> 
                              <option>Finland</option>
                              <option>Gabon</option>
                              <option>Gambia</option>
                              <option>Georgia</option>
                              <option>Ghana</option>
                              <option>Green Land</option>
                              <option>Guinea</option>
                              <option>Guyana/option>
                              <option>Haiti</option>
                              <option>Hongkong</option>
                              <option>Hungary</option>
                              <option>Iceland</option>
                              <option>India</option>
                              <option>Indonesia</option>
                              <option>Iran</option>
                              <option>Iraq</option>
                              <option>Ireland</option>
                              <option>Israel</option>
                              <option>Italy</option>
                              <option>Jamaika</option>
                              <option>Jepang</option>
                              <option>Jerman</option>
                              <option>Jersey</option>
                              <option>Jordan</option>
                              <option>Kazakhtan</option>
                              <option>Kenya</option>
                              <option>Korea Selatan</option>
                              <option>Korea Utara</option>
                              <option>Kosovo</option>
                              <option>Lebanon</option>
                              <option>Liberia</option>
                              <option>Madagaskar</option>
                              <option>Malawi</option>
                              <option>Malaysia</option>
                              <option>Maldives</option>
                              <option>Mesir</option>
                              <option>Mexico</option>
                              <option>Mongolia</option>
                              <option>Myanmar</option>
                              <option>Nepal</option>
                              <option>New Zealand</option>
                              <option>Nigeria</option>
                              <option>Norwegia</option>
                              <option>Myanmar</option>
                              <option>Nepal</option>
                              <option>New Zealand</option>
                              <option>Niger</option>
                              <option>Nigeria</option>
                              <option>Oman</option>
                              <option>Pakistan</option>
                              <option>Palau</option>
                              <option>Palestina</option>
                              <option>Panama</option>
                              <option>Papua Nugini</option>
                              <option>Paraguay</option>
                              <option>Prancis</option>
                              <option>Peru</option>
                              <option>Polandia</option>
                              <option>Portugal</option>
                              <option>Qatar</option>
                              <option>Republik Ceko</option>
                              <option>Republik Kongo</option>
                              <option>Rumania</option>
                              <option>Rusia</option>
                              <option>Selandia Baru</option>
                              <option>Serbia</option>
                              <option>Singapura</option>
                              <option>Somalia</option>
                              <option>Spanyol</option>
                              <option>Sri Lanka</option>
                              <option>Sudan</option>
                              <option>Suria</option>
                              <option>Suriname</option>
                              <option>Swedia</option>
                              <option>Swiss</option>
                              <option>Syria</option>
                              <option>Taiwan</option>
                              <option>Tajikistan</option>
                              <option>Tanzania</option>
                              <option>Thailand</option>
                              <option>Timor Leste</option>
                              <option>Tongo</option>
                              <option>Tunisia</option>
                              <option>Turki</option>
                              <option>Tuvalu</option>
                              <option>Uganda</option>
                              <option>Ukraina</option>
                              <option>Uruguay</option>
                              <option>Uzbekistan</option>
                              <option>Venezuela</option>
                              <option>Vietnam</option>
                              <option>Yaman</option>
                              <option>Yordania</option>
                              <option>Zimbabwe</option>
                            </select>
                          </div>
                          <div class="form-group col-6">
                            <label>Provinsi</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label>Kota</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-6">
                            <label>Kode Pos</label>
                            <input type="text" class="form-control">
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
