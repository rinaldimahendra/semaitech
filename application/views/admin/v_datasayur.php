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
                Data Sayur
            </h1>
        </div>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus fa-sm"> TAMBAH PRODUK</i>
                </button>&ensp;
            </div>
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FOTO</th>
                        <th>NAMA PRODUK</th>
                        <th>KATEGORI</th>
                        <th>KETERANGAN</th>
                        <th>STOK PRODUK</th>
                        <th>HARGA</th>
                        <th>STATUS</th>
                        <th colspan="2">AKSI</th>
                    </tr>

                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($datasayur1 as $ds) : ?>

                        <tr>

                            <td><?php echo $no++ ?></td>
                            <td><img class="img-thumbnail" style="height: 50px" src="<?php echo base_url() . '/assets/img/sayur/' . $ds->Foto ?>" alt="<?= $ds->Foto ?>"></td>
                            <td><?php echo $ds->Nama ?></td>
                            <td><?php echo $ds->Nama_Kategori ?></td>
                            <td><?php echo $ds->Keterangan ?></td>
                            <td><?php echo $ds->Stok ?></td>
                            <td>Rp. <?php echo number_format($ds->Harga, 0, ',', '.') ?></td>
                            <td>
                                <?php
                                if ($ds->Status == 'Y') { ?>
                                    <span class="sucsess">
                                        Aktif
                                    </span>

                                <?php } elseif ($ds->Status == 'N') { ?>
                                    <span class="danger">
                                        Tidak Aktif
                                    </span>

                                <?php } ?>
                            </td>
                            <td>
                                <?php echo anchor('admin/Datasayur/edit/' . $ds->Id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                            </td>
                            <td>
                                <?php echo anchor('admin/Datasayur/hapus/' . $ds->Id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal Tambah Barang-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">FORM INPUT DATA SAYUR</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/Datasayur/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value=''>- Pilih -</option>
                                <?php foreach ($kategori as $ktgr) { ?>
                                    <option value="<?php echo $ktgr['Id_Kategori']; ?>"><?php echo $ktgr['Nama_Kategori']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Stok Produk</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>

                        <!-- <div class="form-group">
                            <label>Berat Produk</label>
                            <input type="text" name="berat_produk" class="form-control">
                        </div> -->

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button onclick="window.location.href='<?php echo base_url('admin/Datasayur/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Barang-->
    <?php foreach ($datasayur1 as $ds) : ?>
        <div class="modal fade" id="Edit_Barang<?= $ds->Id; ?>" value="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT PRODUK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/Datasayur/update'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $ds->Nama ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $ds->Id ?>">
                                <input type="text" name="keterangan" class="form-control" value="<?php echo $ds->Keterangan ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="number" name="stok" class="form-control" value="<?php echo $ds->Stok ?>" min="0" required>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $ds->Harga ?>" min="0" required>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" value="<?php echo $ds->Foto ?>">
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($ds->Status == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status" value="Y" checked>
                                        <label class="form-check-label" for="status">Aktif</label>

                                        <input class="form-check-input" type="radio" name="status" value="N">
                                        <label class="form-check-label" for="status">Tidak Aktif</label>
                                    <?php } elseif ($ds->Status == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status" value="Y">
                                        <label class="form-check-label" for="status">Aktif</label>

                                        <input class="form-check-input" type="radio" name="status" value="N" checked>
                                        <label class="form-check-label" for="status">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach; ?>
</div>
<?php $this->load->view('template_admin/footer'); ?>