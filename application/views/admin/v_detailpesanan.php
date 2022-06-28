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
        Detail Pesanan
      </h1>
    </div>
    <div class="invoice">
      <div class="invoice-print">
        <div class="row">
          <div class="col-lg-12">
            <div class="invoice-title">
              <h2>Invoice</h2>
              <div class="invoice-number">Order #<?= $order['id_order']; ?></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Dikirim Ke:</strong><br>
                  Nama: <?= $order['nama']; ?><br>
                  Alamat: <?= $order['alamat_kirim']; ?><br>
                  <?= $order['kota_kirim'] . ',' . $order['provinsi_kirim'] . ' ' . $order['kode_pos_kirim']; ?>
                </address>
              </div>
              <div class="col-md-6 text-md-right">
                <address>
                  <strong>Tanggal Pesan:</strong><br>
                  <?= $order['tanggal_pesan']; ?><br><br>
                  <?php if ($order['tanggal_kirim'] != '0000-00-00 00:00:00') : ?>
                    <strong>Tanggal Kirim:</strong><br>
                    <?= $order['tanggal_kirim']; ?><br><br>
                  <?php endif; ?>

                </address>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Metode Pembayaran:</strong><br>
                  <?= $order['bank_rek']; ?><br>
                  <?= $order['nomor_rek'] . ' ' . $order['nama_rek']; ?>
                </address>
              </div>
              <div class="col-md-6 text-md-right">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="section-title">Rincian Belanja</div>

            <div class="table-responsive">
              <table class="table table-striped table-hover table-md">
                <tbody>
                  <tr>
                    <th data-width="40" style="width: 40px;">#</th>
                    <th>Nama Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Total</th>
                  </tr>
                  <?php foreach ($pesanan as $ps) :
                    $no = 1;
                    $total = $ps['qty'] * $ps['Harga'];
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $ps['Nama']; ?></td>
                      <td class="text-center">Rp <?= number_format($ps['Harga'], 0, ',', '.'); ?> / <?= $ps['satuan'] ?></td>
                      <td class="text-center"><?= $ps['qty']; ?></td>
                      <td class="text-right">Rp <?= number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <div class="row mt-4">
              <div class="col-lg-8">
                <strong>Bukti Pembayaran:</strong><br>
                <img class="img-thumbnail" style="height: 200px" src="<?= base_url('/assets/img/bukti_bayar/') . $order['bukti_bayar'] ?>" alt="">
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Subtotal</div>
                  <div class="invoice-detail-value">Rp <?= number_format($order['grandtotal'], 0, ',', '.'); ?></div>
                </div>
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Ongkir</div>
                  <div class="invoice-detail-value">Rp <?= number_format($order['ongkir'], 0, ',', '.'); ?></div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Total</div>
                  <div class="invoice-detail-value invoice-detail-value-lg">Rp <?= number_format($order['total_bayar'], 0, ',', '.'); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <a class="btn btn-danger btn-icon icon-left" href="<?= base_url('admin/datapenjualan') ?>"><i class="fas fa-times"></i> Kembali</a>
      <!-- <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                </div>
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
              </div>
            </div> -->
  </section>

</div>
<?php $this->load->view('template_admin/footer'); ?>