<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('template_user/header');
?>

<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1"></th>
                                <th class="column-2 text-right">Produk</th>
                                <th></th>
                                <th class="column-3">Harga</th>
                                <th class="column-4 text-center">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>
                            <?php
                            $grand_total = 0;
                            foreach ($keranjang as $k) :
                                $total_harga = $k['Harga'] * $k['qty'];  ?>
                                <?php if ($k['Stok'] == 0) {
                                    redirect('home/deleteCart/' . $k['id_keranjang']);
                                } ?>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <a class="flex-c-m stext-101 cl0 size-116 bg10 bor14 hov-btn2 p-lr-15 trans-04 pointer" onclick="window.location='<?= base_url('home/deleteCart/') . $k['id_keranjang']; ?>'"><i class="zmdi zmdi-delete"></i></a>
                                    </td>
                                    <td class="column-1">
                                        
                                        <div class="how-itemcart1" onclick="window.location='<?= base_url('home/deleteCart/') . $k['id_keranjang']; ?>'">
                                            <img src="<?= base_url('assets/img/sayur/') . $k['Foto']; ?>" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2"><?= $k['Nama']; ?></td>
                                    <td class="column-3">Rp. <?= number_format($k['Harga'], 0, ',', '.') ?> /<br> <?= $k['satuan'] ?></td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <button class="btn-down cl8 hov-btn3 trans-04 flex-c-m" onclick="kurang_qty(<?= $k['id_keranjang']; ?>)">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </button>

                                            <input class="mtext-104 cl3 txt-center num-product" id="qty_<?= $k['id_keranjang']; ?>" type="text" value="<?= $k['qty']; ?>" readonly>

                                            <button class="btn-up cl8 hov-btn3 trans-04 flex-c-m" onclick="tambah_qty(<?= $k['id_keranjang']; ?>)">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <input type="hidden" id="harga_<?= $k['id_keranjang']; ?>" value="<?= $total_harga; ?>">
                                    <td class="column-5" id="total_harga_<?= $k['id_keranjang']; ?>">Rp. <?= number_format($total_harga, 0, ',', '.') ?></td>
                                </tr>
                            <?php
                                $grand_total = $grand_total + $total_harga;
                            endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Ringkasan Pembayaran
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">

                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2" id="grand_total">
                                Rp. <?= number_format($grand_total, 0, ',', '.'); ?>
                                <input id="grand" value="<?= $grand_total ?>" hidden>
                            </span>
                        </div>
                    </div>

                    <?php if ($carttotal != 0) : ?>
                        <a href="<?= base_url('Checkout/index/') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Checkout
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('home') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Lanjut Belanja
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function uncheck_status_merchandise(id_keranjang) {
        $.ajax({
            url: '<?= base_url('home/uncheck_status_merchandise'); ?>',
            data: {
                id_keranjang: id_keranjang,
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                location.reload();
            }
        });
    }

    function check_status_merchandise(id_keranjang) {
        $.ajax({
            url: '<?= base_url('home/check_status_merchandise'); ?>',
            data: {
                id_keranjang: id_keranjang,
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                location.reload();
            }
        });
    }

    function tambah_qty(id_keranjang) {
        if ($('#status_' + id_keranjang).val() == 0) {
            let qty = $('#qty_' + id_keranjang).val();
            let qty_new = parseInt(qty) + 1;
            $('#qty_' + id_keranjang).val(qty_new);

            $.ajax({
                url: '<?= base_url('home/updateCart'); ?>',
                data: {
                    id_keranjang: id_keranjang,
                    qty: qty_new
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    let harga_before = $('#harga_' + id_keranjang).val();
                    let new_harga = parseInt(harga_before) * data.qty;
                    $('#total_harga_' + id_keranjang).html('Rp. ' + new_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                }
            });
        } else {
            let qty = $('#qty_' + id_keranjang).val();
            let qty_new = parseInt(qty) + 1;
            $('#qty_' + id_keranjang).val(qty_new);

            $.ajax({
                url: '<?= base_url('home/updateCart'); ?>',
                data: {
                    id_keranjang: id_keranjang,
                    qty: qty_new
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    let harga_before = $('#harga_' + id_keranjang).val();
                    let new_harga = parseInt(harga_before) * data.qty;
                    $('#total_harga_' + id_keranjang).html('Rp. ' + new_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                    let grand_total_before = $('#grand').val();
                    let new_grand = parseInt(grand_total_before) + parseInt($('#harga_' + id_keranjang).val());

                    $('#grand_total').html('Rp. ' + new_grand.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                    $('#grand').val(new_grand);
                }
            });
        }

    }

    function kurang_qty(id_keranjang) {
        if ($('#qty_' + id_keranjang).val() - 1 < 1) {
            alert('Minimal quantity yang dapat dibeli adalah 1');
        } else if ($('#status_' + id_keranjang).val() == 0) {
            let qty = $('#qty_' + id_keranjang).val();
            let qty_new = parseInt(qty) - 1;
            $('#qty_' + id_keranjang).val(qty_new);

            $.ajax({
                url: '<?= base_url('home/updateCart'); ?>',
                data: {
                    id_keranjang: id_keranjang,
                    qty: qty_new
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    let harga_before = $('#harga_' + id_keranjang).val();
                    let new_harga = parseInt(harga_before) * data.qty;
                    $('#total_harga_' + id_keranjang).html('Rp. ' + new_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                }
            });
        } else {
            let qty = $('#qty_' + id_keranjang).val();
            let qty_new = parseInt(qty) - 1;
            $('#qty_' + id_keranjang).val(qty_new);

            $.ajax({
                url: '<?= base_url('home/updateCart'); ?>',
                data: {
                    id_keranjang: id_keranjang,
                    qty: qty_new
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    let harga_before = $('#harga_' + id_keranjang).val();
                    let new_harga = parseInt(harga_before) * data.qty;
                    $('#total_harga_' + id_keranjang).html('Rp. ' + new_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                    let grand_total_before = $('#grand').val();
                    let new_grand = parseInt(grand_total_before) - parseInt($('#harga_' + id_keranjang).val());

                    $('#grand_total').html('Rp. ' + new_grand.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                    $('#grand').val(new_grand);
                }
            });
        }

    }
</script>
<?php $this->load->view('template_user/footer'); ?>