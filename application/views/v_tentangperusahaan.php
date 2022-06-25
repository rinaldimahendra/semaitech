<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <div class="container">
    <img src="<?= $profil_perusahaan['logo']; ?>" alt="" style="width:190px">
        <h2 class="ltext-105 cl0 txt-center p-b-60 "style="color:#000000;">
			Tentang <?=htmlspecialchars_decode($profil_perusahaan['nama']); ?>
		</h2>
        <p class="stext-113 cl2 p-b-26">
        <?=htmlspecialchars_decode($profil_perusahaan['tentang']); ?>
        </p>

        <h3 class="mtext-111 cl2 p-b-16">
            VISI
        </h3>
        <p class="stext-113 cl2 p-b-26">
        <?=htmlspecialchars_decode($profil_perusahaan['visi']); ?>
        </p>

        <h3 class="mtext-111 cl2 p-t-26 p-b-16">
            MISI
        </h3>
        <p class="stext-113 cl2 p-b-26">
        <?=htmlspecialchars_decode($profil_perusahaan['misi']); ?>
        </p>


        <h3 class="mtext-111 cl2 p-b-16">
            KONTAK
        </h3>
        
        <p class="stext-113 cl2 p-b-26">
        Nomor Telepon: <?=$profil_perusahaan['nomor_kontak']; ?> <br>
        E-mail: <?=$profil_perusahaan['email']; ?> <br>
        Alamat: <?=$profil_perusahaan['alamat']; ?>

        </p>
    </div>
    
</section>	
        	
<?php $this->load->view('template_user/footer'); ?>