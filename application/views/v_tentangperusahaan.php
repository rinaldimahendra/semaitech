<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
        
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                    <h3 style="text-align:right"class="mtext-111 cl2 p-b-16">
                        
                    Tentang <?=htmlspecialchars_decode($profil_perusahaan['nama']); ?>
                    </h3>

                    <h3 class="mtext-111 cl2 p-b-16">
                        TENTANG
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                    <?=htmlspecialchars_decode($profil_perusahaan['tentang']); ?>
                    </p>

                    <h3 class="mtext-111 cl2 p-b-16">
                        VISI
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                    <?=htmlspecialchars_decode($profil_perusahaan['visi']); ?>
                    </p>

                    <h3 class="mtext-111 cl2 p-b-16">
                        MISI
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                    <?=htmlspecialchars_decode($profil_perusahaan['misi']); ?>
                    </p>

                    <h3 class="mtext-111 cl2 p-b-16">
                        KONTAK
                    </h3>

                    <!-- <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/rumput.jpg" alt="IMG">
						</div>
					</div> -->
                    
                    <p class="stext-113 cl6 p-b-26">
                    Nomor Telepon: <?=$profil_perusahaan['nomor_kontak']; ?>
                    E-mail: <?=$profil_perusahaan['email']; ?>
                    Alamat: <?=$profil_perusahaan['alamat']; ?>

                    </p>
        
                </div>
            </div>
        </div>
    </div> 
</section>	

        
      <!-- </h1>
    </div>
    <div class="card">
      <div class="card-header"> -->
<?php $this->load->view('template_user/footer'); ?>