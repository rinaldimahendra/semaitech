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
                Konten Slider
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#slider_tambah">
                        <i class="fas fa-plus fa-sm"> TAMBAH</i>
                    </button>&ensp;
                </div>
                <table id="Table1" class="table table-striped">
                    <tr>
                        <th>NO</th>
						<th>BANK</th>
                        <th>NAMA REK</th>
						<th>NOMOR REK</th>
						<th>STATUS</th>
                        <th colspan="2">AKSI</th>
                    </tr>

                    <?php

                    $no = 1;
                    foreach ($rekening as $rk) : ?>

                        <tr>

                            <td><?php echo $no++; ?></td>
							<td><?php echo $rk['bank_rek']; ?></td>
							<td><?php echo $rk['nama_rek']; ?></td>
							<td><?php echo $rk['nomor_rek']; ?></td>
                            <td>
                                <?php
                                if ($rk['status_rek'] == 'Y') { ?>
                                    <span class="sucsess">
                                        Aktif
                                    </span>

                                <?php } elseif ($rk['status_rek'] == 'N') { ?>
                                    <span class="danger">
                                        Tidak Aktif
                                    </span>

                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_rek<?= $rk['id_rek']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <?php echo anchor('admin/rekening/hapus/' . $rk['id_rek'], '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Konten Slider-->
        <div class="modal fade" id="slider_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM INPUT KONTEN SLIDER</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/rekening/tambah_rek'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" name="bank_rek" placeholder="Masukan Nama Bank" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Nama Pemilik Rekening</label>
                                <input type="text" name="nama_rek" placeholder="Masukan Nama Rekening" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="text" name="nomor_rek" placeholder="Masukan Nomor Rekening" class="form-control" required>
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_rek" value="Y">
									<label class="form-check-label" for="status_rek">Aktif</label>

									&ensp;<input class="form-check-input" type="radio" name="status_rek" value="N">
									<label class="form-check-label" for="status_rek">Tidak Aktif</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal Edit Kategori-->
    <?php foreach ($rekening as $rk) : ?>
        <div class="modal fade" id="edit_rek<?= $rk['id_rek']; ?>" value="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT SLIDER</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/rekening/edit/'.$rk['id_rek']; ?>" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" name="bank_rek" placeholder="Masukan Nama Bank" class="form-control" value="<?php echo $rk['bank_rek']; ?>">
                                <input type="hidden" name="id_rek" class="form-control" value="<?php echo $rk['id_rek']; ?>">
                            </div>

							<div class="form-group">
                                <label>Nama Pemilik Rekening</label>
                                <input type="text" name="nama_rek" placeholder="Masukan Nama Pemilik Rekening" class="form-control" value="<?php echo $rk['nama_rek']; ?>">
                            </div>

							<div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="text" name="nomor_rek" placeholder="Masukan Nomor Rekening" class="form-control" value="<?php echo $rk['nomor_rek']; ?>">
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($rk['status_rek'] == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status_rek" value="Y" checked>
                                        <label class="form-check-label" for="status_rek">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_rek" value="N">
                                        <label class="form-check-label" for="status_rek">Tidak Aktif</label>
                                    <?php } elseif ($rk['status_rek'] == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status_rek" value="Y">
                                        <label class="form-check-label" for="status_rek">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_rek" value="N" checked>
                                        <label class="form-check-label" for="status_rek">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php $this->load->view('template_admin/footer'); ?>