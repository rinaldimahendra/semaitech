<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<section class="bg0 p-t-104 p-b-116">
    <div class="container-fluid">

        <?php foreach($datasayur as $d): ?>
            <div class="row mt-sm-4">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/sayur/').$d['Foto']; ?>" class="card-img-top">
                </div>
           
                <div class="col-md-7">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                            <input type="hidden" name="Id" value="<?= $d['Id']; ?>">
                                <tr>
                                    <td><strong>Nama Produk</td></strong>
                                    <td><?= $d['Nama']?></td>
                                </tr>

                                <tr>
                                    <?php foreach ($kategori as $ktgr) { ?>
                                        <td>
                                            <strong value="<?php echo $ktgr['Nama_Kategori']; ?>">Nama Kategori</strong>
                                        <td>
                                            <?php echo $ktgr['Nama_Kategori']; ?>
                                        </td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <td><strong>Stok</td></strong>
                                    <td><?= $d['Stok']?></td>
                                </tr>

                                <tr>
                                    <td><strong>Harga</td></strong>
                                    <td>Rp.<?= number_format($d['Harga'])?></td>
                                </tr>
                                
                                <tr>
                                    <td><strong>Keterangan</td></strong>
                                    <td><?= $d['Keterangan']?></td>
                                </tr>
                            </tr>    
                        </table>
                    </div>
                    
                    <hr>

                    <div class="row">
						<div class="column col-6">
                            <a href="<?= base_url('home/')?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04">
                                &ensp;Kembali 
                            </a> 
                        </div>

                        <div class="column col-6">   
                            <a href="<?= base_url('home/AddCart/').$d['Id'] ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 js-addcart-sukses">
                                &ensp;Tambah ke Keranjang
                            </a>   
                        </div>
                   </div>  
                </div>    
            </div>
            
        <?php endforeach; ?>
    </div>
</section>

<?php $this->load->view('template_user/footer'); ?>