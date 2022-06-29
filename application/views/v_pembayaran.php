<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<br><br>
<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <?php $message = $this->session->flashdata('message'); ?>
        <div class="row">
            <?php $id_user = $user['id_user'];
            ?>
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <!-- <div class="logo">
                            <img style="align: right;" alt="" src="<?= base_url(); ?>assets/img/logo/logo-dashboard.png" alt="IMG-LOGO">
                        </div> -->
                        <h4 class="mtext-109 cl2 p-b-30">
                            Invoice
                        </h4>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    No. Invoice :
                                </p>
                            </div>
                            <?php $id_order = $checkout['id_order'] ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= $id_order ?>
                                </p>
                            </div>
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    Tanggal Order :
                                </p>
                            </div>
                            <?php $waktu = $checkout['tanggal_pesan'] ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= date("d/m/Y", strtotime($waktu)); ?>
                                </p>
                            </div>
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    Nama Customer :
                                </p>
                            </div>
                            <?php $nama = $checkout['nama'] ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= $nama ?>
                                </p>
                            </div>
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    No. Hp :
                                </p>
                            </div>
                            <?php $no_telp = $checkout['no_tlp'] ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= $no_telp ?>
                                </p>
                            </div>
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    Alamat :
                                </p>
                            </div>
                            <?php
                            $alamat = $checkout['alamat'];
                            $kota = $checkout['kota'];
                            $provinsi = $checkout['provinsi'];
                            $kode_pos = $checkout['kode_pos'];
                            ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= $alamat ?>, <?= $kota ?>, <?= $provinsi ?>. <?= $kode_pos ?>
                                </p>
                            </div>
                            <div class="size-208 mb-2">
                                <p class="stext-111 cl6 p-t-2">
                                    Transfer ke Bank :
                                </p>
                            </div>
                            <?php $bank = $checkout['bank_rek'] ?>
                            <div class="size-209">
                                <p class="stext-111 cl6 p-t-2">
                                    <?= $bank ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208 mb-2">
                                <span class="stext-110 cl2">
                                    Rincian:
                                </span>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <?php $produk = "SELECT * FROM detail_order, managemen_data_sayur 
                            WHERE detail_order.id_sayur = managemen_data_sayur.Id 
                            AND id_order = $id_order";
                                $produk = $this->db->query($produk)->result_array();
                                $i = 1; ?>
                                <tbody>
                                    <?php foreach ($produk as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $p['Nama']; ?></td>
                                            <td><?= $p['qty']; ?></td>
                                            <td>Rp <?= number_format($p['Harga'], 0, ',', '.'); ?> / <?= $p['satuan'] ?></td>
                                        </tr>

                                    <?php
                                        $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <?php $subtotal =  $checkout['grandtotal'] ?>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208 mb-2">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    Rp <?= number_format($subtotal, 0, ',', '.'); ?>
                                </span>
                            </div>
                            <?php $ongkir =  $checkout['ongkir'] ?>
                            <div class="size-208 mb-2">
                                <span class="stext-110 cl2">
                                    Ongkos Kirim:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    Rp <?= number_format($ongkir, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                        <?php $grand_total =  $checkout['total_bayar'] ?>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    Rp <?= number_format($grand_total, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208 mb-2">
                                <span class="stext-110 cl2">
                                    Bukti Transfer:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <div class="logo">
                                        <img style="align: right;" alt="" src="<?= base_url('assets/img/bukti_bayar/') . $checkout['bukti_bayar'] ?>" alt="IMG-LOGO">
                                    </div>
                                </span>
                            </div>
                            <div class="size-208 mb-2 mt-2">
                                <span class="stext-110 cl2">
                                    Status Pembayaran:
                                </span>
                            </div>
                            <div class="size-208 mb-2 mt-2">
                                <span class="stext-110 cl2">
                                    <?php if ($checkout['status'] == 2) {
                                        echo "Berhasil";
                                    } else {
                                        echo "Menunggu Verifikasi";
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">

        </div>
    </div>
    </div>
    </div>
</form>

<?php $this->load->view('template_user/footer'); ?>