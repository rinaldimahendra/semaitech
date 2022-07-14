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
                Kategori Blog
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#kategori_tambah">
                        <i class="fas fa-plus fa-sm"> TAMBAH KATEGORI BLOG</i>
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
                            <td><?php echo $kt->nama_kategoriblog ?></td>
                            <td>
                                <?php
                                if ($kt->status_kategoriblog == 'Y') { ?>
                                    <span class="sucsess">
                                        Aktif
                                    </span>

                                <?php } elseif ($kt->status_kategoriblog == 'N') { ?>
                                    <span class="danger">
                                        Tidak Aktif
                                    </span>

                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Edit_Barang<?= $kt->id_kategoriblog; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <?php echo anchor('admin/Kategoriblog/hapus/' . $kt->id_kategoriblog, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Kategori-->
    
        <div class="modal fade" id="kategori_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM INPUT KATEGORI BLOG</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/Kategoriblog/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategoriblog" class="form-control" required>
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                   
                                        <input class="form-check-input" type="radio" name="status_kategoriblog" value="Y" checked>
                                        <label class="form-check-label" for="status_kategoriblog">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategoriblog" value="N">
                                        <label class="form-check-label" for="status_kategoriblog">Tidak Aktif</label>
                                    
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button onclick="window.location.href='<?php echo base_url('admin/Kategoriblog/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <!-- Modal Edit Kategori-->
    <?php foreach ($kategori1 as $kt) : ?>
        <div class="modal fade" id="Edit_Barang<?= $kt->id_kategoriblog; ?>" value="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT KATEGORI</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/Kategoriblog/update'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="hidden" name="id_kategoriblog" class="form-control" value="<?php echo $kt->id_kategoriblog ?>">
                                <input type="text" name="nama_kategoriblog" class="form-control" value="<?php echo $kt->nama_kategoriblog ?>" required>
                            </div>


                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($kt->status_kategoriblog == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategoriblog" value="Y" checked>
                                        <label class="form-check-label" for="status_kategoriblog">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategoriblog" value="N">
                                        <label class="form-check-label" for="status_kategoriblog">Tidak Aktif</label>
                                    <?php } elseif ($kt->status_kategoriblog == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status_kategoriblog" value="Y">
                                        <label class="form-check-label" for="status_kategoriblog">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_kategoriblog" value="N" checked>
                                        <label class="form-check-label" for="status_kategoriblog">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button onclick="window.location.href='<?php echo base_url('admin/Kategoriblog/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php $this->load->view('template_admin/footer'); ?>