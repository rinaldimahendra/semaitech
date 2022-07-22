<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<section class="bg0 p-t-95 p-b-60">
    <div class="container">
        <h1 class="h3 mb-20 text-gray-800">Riwayat Pesanan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#VerifikasiPembayaran" role="tab" aria-controls="#VerifikasiPembayaran" aria-selected="true">Verifikasi Pembayaran (<?= $p_menungguverifikasi; ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikemas" role="tab" aria-controls="#Dikemas" aria-selected="false">Dikemas (<?= $p_dikemas; ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikirim" role="tab" aria-controls="#Dikirim" aria-selected="false">Dikirim (<?= $p_dikirim; ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Selesai" role="tab" aria-controls="#Selesai" aria-selected="false">Selesai (<?= $p_selesai; ?>)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="VerifikasiPembayaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table">
                                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Total Bayar</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $number_ps1 = 1;
                                            foreach ($pesanan_menungguverifikasi as $ps1) : ?>
                                            <tr class="text-center">
                                                <td><?= $number_ps1++; ?></td>
                                                <td>
                                                <?php foreach ($detail_menungguverifikasi as $d1):
                                                    if ($d1['id_order'] == $ps1['id_order']){ ?>
                                                    <div class="table_row">
                                                        <div class="column-1">
                                                            <img src="<?= base_url('assets/img/sayur/') . $d1['Foto']; ?>" style="height: 50px" alt="IMG">&nbsp;<?= $d1['Nama']; ?>
                                                        </div>
                                                        <div class="column-2">
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                <?php }else{} endforeach;?>
                                                </td>
                                            
                                                <!-- <td><?= $ps1['id_order']; ?></td> -->
                                                <td><?= $ps1['tanggal_pesan']; ?></td>
                                                <td>Rp <?= number_format($ps1['total_bayar'], 0, ',', '.');?></td>
                                                <td>
                                                    <span class='badge badge-primary text-light'>Menunggu Verifikasi</span>
                                                </td>
                                                <td>
                                                    <a class="flex-c-s stext-60 cl0 size-100 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer text-light" href="<?= base_url('home/pembayaran/').$ps1['id_order']; ?>">Detail</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Dikemas" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table3">
                                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Total Bayar</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $number_ps2 = 1;
                                            foreach ($pesanan_dikemas as $ps2) : ?>
                                                <tr class="text-center">
                                                    <td><?= $number_ps2++; ?></td>
                                                    <td>
                                                        <?php foreach ($detail_dikemas as $d2):
                                                            if ($d2['id_order'] == $ps2['id_order']){ ?>
                                                            <div class="table_row">
                                                                <div class="column-1">
                                                                    <img src="<?= base_url('assets/img/sayur/') . $d2['Foto']; ?>" style="height: 50px" alt="IMG">&nbsp;<?= $d2['Nama']; ?>
                                                                </div>
                                                                <div class="column-2">
                                                                </div>
                                                                
                                                            </div>
                                                                
                                                        <?php }else{} endforeach;?>
                                                    </td>
                                                    <td><?= $ps2['tanggal_pesan']; ?></td>
                                                    <td>Rp <?= number_format($ps2['total_bayar'], 0, ',', '.');?></td>
                                                    <td>
                                                        <span class='badge badge-danger text-light'>Dikemas</span>
                                                    </td>
                                                    <td>
                                                        <a class="flex-c-s stext-60 cl0 size-100 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer text-light" href="<?= base_url('home/pembayaran/').$ps2['id_order']; ?>">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Dikirim" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table4">
                                    <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Total Bayar</th>
                                                <th class="text-center">Tanggal Kirim</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $number_ps3 = 1;
                                            foreach ($pesanan_dikirim as $ps3) : ?>
                                                <tr class="text-center">
                                                    <td><?= $number_ps3++; ?></td>
                                                    <td>
                                                        <?php foreach ($detail_dikirim as $d3):
                                                            if ($d3['id_order'] == $ps3['id_order']){ ?>
                                                            <div class="table_row">
                                                                <div class="column-1">
                                                                    <img src="<?= base_url('assets/img/sayur/') . $d3['Foto']; ?>" style="height: 50px" alt="IMG">&nbsp;<?= $d3['Nama']; ?>
                                                                </div>
                                                                <div class="column-2">
                                                                </div>
                                                                
                                                            </div>
                                                                
                                                        <?php }else{} endforeach;?>
                                                    </td>
                                                    <td><?= $ps3['tanggal_pesan']; ?></td>
                                                    <td>Rp <?= number_format($ps3['total_bayar'], 0, ',', '.');?></td>
                                                    <td></td>
                                                    <td>
                                                        <span class='badge badge-info text-light'>Dikirim</span>
                                                    </td>
                                                    <td>
                                                        <a class="flex-c-s stext-60 cl0 size-100 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer text-light" href="<?= base_url('riwayat/to_selesai/').$ps3['id_order']; ?>">Pesanan Diterima</a>
                                                        <a class="flex-c-s stext-60 cl0 size-100 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer text-light" href="<?= base_url('home/pembayaran/').$ps3['id_order']; ?>">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Selesai" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table5">
                                    <table class="table table-bordered" id="table3" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Tgl Pemesanan</th>
                                                <th class="text-center">Total Bayar</th>
                                                <th class="text-center">Tanggal Kirim</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $number_ps4 = 1;
                                            foreach ($pesanan_selesai as $ps4) : ?>
                                                <tr class="text-center">
                                                    <td><?= $number_ps4++; ?></td>
                                                    <td>
                                                        <?php foreach ($detail_selesai as $d4):
                                                            if ($d4['id_order'] == $ps4['id_order']){ ?>
                                                            <div class="table_row">
                                                                <div class="column-1">
                                                                    <img src="<?= base_url('assets/img/sayur/') . $d4['Foto']; ?>" style="height: 50px" alt="IMG">&nbsp;<?= $d4['Nama']; ?>
                                                                </div>
                                                                <div class="column-2">
                                                                </div>
                                                                
                                                            </div>
                                                                
                                                        <?php }else{} endforeach;?>
                                                    </td>
                                                    <td><?= $ps4['tanggal_pesan']; ?></td>
                                                    <td>Rp <?= number_format($ps4['total_bayar'], 0, ',', '.');?></td>
                                                    <td></td>
                                                    <td>
                                                        <span class='badge badge-success text-light'>Selesai</span>
                                                    </td>
                                                    <td>
                                                        <a class="flex-c-s stext-60 cl0 size-100 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer text-light" href="<?= base_url('home/pembayaran/').$ps4['id_order']; ?>">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</section>

<?php $this->load->view('template_user/footer'); ?>