<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>
<!-- Checkout -->
<section class="bg0 p-t-104 p-b-116">
    <form method="post" action="<?php echo base_url() . 'Checkout/AddCheckout'; ?>" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="size-130 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

                            <h4 class="mtext-109 cl2 p-b-30">
                                Checkout
                            </h4>
                            <div class="flex-w flex-t bor12 p-b-13">

                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Nama Lengkap
                                </span>
                            </div>
                            <div class="wrap-input1 p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="nama" placeholder="Nama Lengkap" value="<?= $data_user['nama_user'] ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Alamat Lengkap
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="alamat" placeholder="Alamat Lengkap" value="<?= $data_user['alamat']; ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Provinsi
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="provinsi" placeholder="Provinsi" value="<?= $data_user['provinsi']; ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tinggal
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="kota" placeholder="Kota" value="<?= $data_user['kota']; ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Kode Pos
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="kode_pos" placeholder="Kode Pos" value="<?= $data_user['kode_pos']; ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    No. Telepon
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="no_tlp" placeholder="No. Handphone" value="<?= $data_user['no_tlpn']; ?>">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Catatan Pembelian
                                </span>
                            </div>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-102 cl6" type="text" name="catatan_pembelian" placeholder="Catatan Pembelian">
                                <div class="focus-input1 trans-04"></div>
                            </div><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Ringkasan Belanja
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                        </div><br>

                        <?php
                        foreach ($keranjang as $k) {
                            $total_qty = $k['qty'] + $k['qty'];
                        ?>

                            <div class="size-215">
                                <span class="stext-110 cl2">
                                    Nama Produk:
                                </span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="stext-115 cl2" id="nama_produk">
                                    <input id="grand" value="<?= $k['Nama']; ?>" name="nama_produk" hidden>
                                    <?= $k['Nama']; ?> | Rp. <?= number_format($k['Harga'], 0, ',', '.') ?> X <?= $k['qty']; ?>
                                </span>
                            </div><br>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="harga">
                                    <input id="grand" value="<?= $k['Harga']; ?>" name="harga" hidden>
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="qty_<?= $k['id_keranjang']; ?>">
                                    <input id="grand" value="<?= $total_qty ?>" name="qty" hidden>
                                </span>
                            </div>

                        <?php } ?>

                        <div class="flex-w flex-t bor12 p-b-13">
                        </div><br>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <?php
                            $grand_total = 0;
                            foreach ($keranjang as $k) :
                                $total_harga = $k['Harga'] * $k['qty'];
                            ?>
                            <?php
                                $grand_total = $grand_total + $total_harga;
                            endforeach ?>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="grand_total">
                                    Rp. <?= number_format($grand_total, 0, ',', '.'); ?>
                                    <input id="grand" value="<?= $grand_total ?>" name="grand_total" hidden>
                                </span>
                            </div>

                            <br><br>

                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Ongkir:
                                </span>
                            </div>
                            <?php
                            $ongkir = 15000;
                            ?>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="ongkir">
                                    Rp. <?= number_format($ongkir, 0, ',', '.'); ?>
                                    <input id="grand" value="<?= $ongkir ?>" name="ongkir" hidden>
                                </span>
                            </div>
                        </div><br>

                        <!-- <div class="flex-w flex-t bor12 p-b-13">

                        </div><br> -->
                        <span class="stext-110 cl2">
                            Pilih Metode Pembayaran:
                        </span>
                        <div class="size-180 respon6-next">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2" name="bank">
                                    <!-- <option>Metode Pembayaran</option> -->
                                    <?php foreach ($rekening as $rk) { ?>
                                        <option value="<?php echo $rk['id_rek']; ?>">
                                            <?php echo $rk['bank_rek']; ?> - <?php echo $rk['nomor_rek']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <span class="stext-110 cl2">
                                Upload Bukti Pembayaran:
                            </span>
                            <input type="file" name="foto" class="form-control" required>
                        </div>

                        <div class="flex-w flex-t bor12 p-b-13">
                        </div><br>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>
                            <?php
                            $grand_total = 0;
                            $ongkir_total = 15000;
                            foreach ($keranjang as $k) :
                                $total_harga = $k['Harga'] * $k['qty'];
                            ?>
                            <?php
                                $grand_total = $grand_total + $total_harga;
                                $total_bayar = $grand_total + $ongkir_total;
                            endforeach ?>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="total_bayar">
                                    Rp. <?= number_format($total_bayar, 0, ',', '.'); ?>
                                    <input id="grand" value="<?= $total_bayar ?>" name="total_bayar" hidden>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php $this->load->view('template_user/footer'); ?>