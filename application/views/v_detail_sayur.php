<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<section class="bg0 p-t-104 p-b-116">
    <div class="container-fluid">
 
        <?php foreach($datasayur as $d): ?>
            <div class="bor10 p-lr-40 p-t-40 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">  
                <div class="row">    
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/sayur/').$d['Foto']; ?>" class="card-img-top">
                    </div>
           
                    <div class="col-md-6">
                        <table class="table">
                                <input type="hidden" name="Id" value="<?= $d['Id']; ?>">
                                    <tr>
                                        <td><strong>Nama Produk</td></strong>
                                        <td><?= $d['Nama']?></td>
                                    </tr>
   
                                    <tr>    
                                        <td><strong>Nama Kategori</td></strong>
                                        <td><?php echo $d['Nama_Kategori']; ?></td>  
                                    </tr>
   
                                    <tr>
                                        <td><strong>Stok</td></strong>
                                        <td><?= $d['Stok']?></td>
                                    </tr>
   
                                    <tr>
                                        <td><strong>Harga</td></strong>
                                        <td>Rp <?= number_format($d['Harga'], 0, ',', '.');?></td>
                                    </tr>
                               
                                    <tr>
                                        <td><strong>Keterangan</td></strong>
                                        <td><?= $d['Keterangan']?></td>
                                    </tr>
                        </table>
                       
                        <div class="row">
                            <div class="column col-6">
                                <a href="<?= base_url('home/')?>" class="flex-c-m stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04">
                                    &ensp;Kembali
                                </a>
                            </div>
   
                            <div class="column col-6">  
                                <a href="<?= base_url('home/AddCart/').$d['Id'] ?>" class="flex-c-m stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 js-addcart-sukses">
                                    &ensp;Tambah ke Keranjang
                                </a>  
                            </div>
                        </div>
                    </div>
                   
                </div>
                   
            </div>
           
        <?php endforeach; ?>
    </div>
</section>
 
<?php $this->load->view('template_user/footer'); ?>
