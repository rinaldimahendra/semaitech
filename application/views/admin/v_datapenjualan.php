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
                Data Pesanan
            </h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?= $this->session->flashdata('message'); ?>
            <?php $this->session->unset_userdata('message'); ?>
        <?php endif; ?>
        <div class="card shadow mb-4">
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
                                            <th class="text-center">Invoice</th>
                                            <th class="text-center">Tgl Pemesanan</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $number_ps1 = 1; 
                                        foreach ($pesanan_menungguverifikasi as $ps1) : ?>
                                        <tr>
                                            <td class="text-center"><?= $number_ps1++; ?></td>
                                            <td class="text-center"><?= $ps1['id_order']; ?></td>
                                            <td><?= $ps1['tanggal_pesan']; ?></td>
                                            <td>Rp <?= number_format($ps1['grandtotal'], 0, ',', '.');?></td>
                                            <td class="text-center">
                                                <span class='badge badge-primary text-light'>Menunggu Verifikasi</span>
                                            </td>
                                            <td class="text-center">
                                            <a class="btn btn-info" href="<?= base_url('admin/datapenjualan/to_dikemas/').$ps1['id_order'];?>">Verifikasi</a>
                                            <a class="btn btn-primary" href="<?= base_url('admin/datapenjualan/detail/').$ps1['id_order'];?>">Detail</a>
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
                                            <th class="text-center">Invoice</th>
                                            <th class="text-center">Tgl Pemesanan</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number_ps2 = 1;
                                        foreach ($pesanan_dikemas as $ps2) : ?>
                                            <tr>
                                                <td class="text-center"><?= $number_ps2++; ?></td>
                                                <td class="text-center"><?= $ps2['id_order']; ?></td>
                                                <td><?= $ps2['tanggal_pesan']; ?></td>
                                                <td>Rp <?= number_format($ps2['grandtotal'], 0, ',', '.');?></td>
                                                <td class="text-center">
                                                    <span class='badge badge-danger text-light'>Dikemas</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-info" href="<?= base_url('admin/datapenjualan/to_dikirim/').$ps2['id_order'];?>">Kirim</a>
                                                    <a class="btn btn-primary" href="<?= base_url('admin/datapenjualan/detail/').$ps2['id_order'];?>">Detail</a>
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
                                            <th class="text-center">Invoice</th>
                                            <th class="text-center">Tgl Pemesanan</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Tanggal Kirim</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number_ps3 = 1;
                                        foreach ($pesanan_dikirim as $ps3) : ?>
                                            <tr>
                                                <td class="text-center"><?= $number_ps3++; ?></td>
                                                <td class="text-center"><?= $ps3['id_order']; ?></td>
                                                <td><?= $ps3['tanggal_pesan']; ?></td>
                                                <td>Rp <?= number_format($ps3['grandtotal'], 0, ',', '.');?></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <span class='badge badge-info'>Dikirim</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="<?= base_url('admin/datapenjualan/detail/').$ps3['id_order'];?>">Detail</a>
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
                                            <th class="text-center">Invoice</th>
                                            <th class="text-center">Tgl Pemesanan</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Tanggal Kirim</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number_ps4 = 1;
                                        foreach ($pesanan_selesai as $ps4) : ?>
                                            <tr>
                                                <td class="text-center"><?= $number_ps4++; ?></td>
                                                <td class="text-center"><?= $ps4['id_order']; ?></td>
                                                <td><?= $ps4['tanggal_pesan']; ?></td>
                                                <td>Rp <?= number_format($ps4['grandtotal'], 0, ',', '.');?></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <span class='badge badge-success'>Selesai</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="<?= base_url('admin/datapenjualan/detail/').$ps4['id_order'];?>">Detail</a>
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
  
    </section>

</div>
<?php $this->load->view('template_admin/footer'); ?>