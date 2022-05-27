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
                Kategori Sayur
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#kategori_tambah">
                        <i class="fas fa-plus fa-sm"> TAMBAH KATEGORI</i>
                    </button>&ensp;
                </div>
                <table id="Table1" class="table table-striped">
                    <tr>
                        <th>NO</th>
                        <th>KATEGORI</th>
                        <th>STATUS</th>
                        <th colspan="2">AKSI</th>
                    </tr>

                    <?php

                    $no = 1;
                    foreach ($kategori1 as $kt) : ?>

                        <tr>

                            <td><?php echo $no++ ?></td>
                            <td><?php echo $kt->Nama_Kategori ?></td>
                            <td>
                                <?php
                                if ($kt->Status_Kategori == 'Y') { ?>
                                    <span class="sucsess">
                                        Aktif
                                    </span>

                                <?php } elseif ($kt->Status_Kategori == 'N') { ?>
                                    <span class="danger">
                                        Tidak Aktif
                                    </span>

                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Edit_Barang<?= $kt->Id_Kategori; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <?php echo anchor('admin/Kategorisayur/hapus/' . $kt->Id_Kategori, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Kategori-->
    <?php foreach ($kategori1 as $kt) : ?>
        <div class="modal fade" id="kategori_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM INPUT KATEGORI SAYUR</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/Kategorisayur/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($kt->Status_Kategori == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategori" value="Y" checked>
                                        <label class="form-check-label" for="status_kategori">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategori" value="N">
                                        <label class="form-check-label" for="status_kategori">Tidak Aktif</label>
                                    <?php } elseif ($kt->Status_Kategori == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategori" value="Y">
                                        <label class="form-check-label" for="status_kategori">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategori" value="N" checked>
                                        <label class="form-check-label" for="status_kategori">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button onclick="window.location.href='<?php echo base_url('admin/Kategorisayur/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- Modal Edit Kategori-->
    <?php foreach ($kategori1 as $kt) : ?>
        <div class="modal fade" id="Edit_Barang<?= $kt->Id_Kategori; ?>" value="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT KATEGORI</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/Kategorisayur/update1'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="hidden" name="id_kategori" class="form-control" value="<?php echo $kt->Id_Kategori ?>">
                                <input type="text" name="nama_kategori" class="form-control" value="<?php echo $kt->Nama_Kategori ?>" required>
                            </div>


                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($kt->Status_Kategori == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategori" value="Y" checked>
                                        <label class="form-check-label" for="status_kategori">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategori" value="N">
                                        <label class="form-check-label" for="status_kategori">Tidak Aktif</label>
                                    <?php } elseif ($kt->Status_Kategori == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategori" value="Y">
                                        <label class="form-check-label" for="status_kategori">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategori" value="N" checked>
                                        <label class="form-check-label" for="status_kategori">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button onclick="window.location.href='<?php echo base_url('admin/Kategorisayur/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php $this->load->view('template_admin/footer'); ?>