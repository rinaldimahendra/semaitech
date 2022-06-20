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
						<th>GAMBAR</th>
						<th>JUDUL</th>
						<th>SUB JUDUL</th>
						<th>AKSES BUTTON</th>
						<th>LABEL BUTTON</th>
                        <th>STATUS</th>
                        <th colspan="2">AKSI</th>
                    </tr>

                    <?php

                    $no = 1;
                    foreach ($konten as $kt) : ?>

                        <tr>

                            <td><?php echo $no++; ?></td>
							<td><img class="img-thumbnail" style="height: 75px" src="<?= base_url('assets/user/images/slider/').$kt['gambar_slider']; ?>" alt="IMG-SLIDER"></td>
							<td><?php echo $kt['judul_slider']; ?></td>
							<td><?php echo $kt['subjudul_slider']; ?></td>
							<td><?php echo $kt['akses_button']; ?></td>
							<td><?php echo $kt['label_button']; ?></td>
                            <td>
                                <?php
                                if ($kt['status_slider'] == 'Y') { ?>
                                    <span class="sucsess">
                                        Aktif
                                    </span>

                                <?php } elseif ($kt['status_slider'] == 'N') { ?>
                                    <span class="danger">
                                        Tidak Aktif
                                    </span>

                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_slider<?= $kt['id_slider']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <?php echo anchor('admin/konten/hapus/' . $kt['id_slider'], '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
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
                        <form action="<?php echo base_url() . 'admin/konten/tambah_slider'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
                                <label>Judul Slider</label>
                                <input type="text" name="judul_slider" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Sub-Judul Slider</label>
                                <input type="text" name="subjudul_slider" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Akses Button</label>
                                <input type="text" name="akses_button" placeholder="example.com/here/" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Label Button</label>
                                <input type="text" name="label_button" placeholder="example.com/here/" class="form-control" required>
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_slider" value="Y">
									<label class="form-check-label" for="status_slider">Aktif</label>

									&ensp;<input class="form-check-input" type="radio" name="status_slider" value="N">
									<label class="form-check-label" for="status_slider">Tidak Aktif</label>
                                </div>
                            </div>

							<div class="form-group">
                                
                                <!-- <input type="file" name="gambar_slider" class="form-control" required> -->

								<label>Gambar Slider</label>
								<input type="hidden" name="id_slider" value="">
								<input type="file" class="form-control" name="gambar_slider" accept="image/*" onchange="preview_image(event)" required>
								<!-- <input type="hidden" class="custom-file-input" name="gambar_slider_"> -->
	
								
								<hr>
								<div style="display:none" id="row-display">
									<hr>
									<label for="output">Preview Update Gambar Slider</label><br>
									<img id="output_image" class="img-thumbnail" width="200" />
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

    <!-- Modal Edit Konten-->
    <?php foreach ($konten as $kt) : ?>
        <div class="modal fade" id="edit_slider<?= $kt['id_slider']; ?>" value="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT SLIDER</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/konten/edit/'.$kt['id_slider']; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
                                <label>Judul Slider</label>
								<input type="hidden" name="id_slider" class="form-control" value="<?php echo $kt['id_slider']; ?>">
                                <input type="text" name="judul_slider" value="<?php echo $kt['judul_slider']; ?>" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Sub-Judul Slider</label>
                                <input type="text" name="subjudul_slider" value="<?php echo $kt['subjudul_slider']; ?>" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Akses Button</label>
                                <input type="text" name="akses_button" value="<?php echo $kt['akses_button']; ?>" placeholder="example.com/here/" class="form-control" required>
                            </div>

							<div class="form-group">
                                <label>Label Button</label>
                                <input type="text" name="label_button" value="<?php echo $kt['label_button']; ?>" class="form-control" required>
                            </div>

                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($kt['status_slider'] == 'Y') { ?>
                                        <input class="form-check-input" type="radio" name="status_slider" value="Y" checked>
                                        <label class="form-check-label" for="status_slider">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_slider" value="N">
                                        <label class="form-check-label" for="status_slider">Tidak Aktif</label>
                                    <?php } elseif ($kt['status_slider'] == 'N') { ?>
                                        <input class="form-check-input" type="radio" name="status_slider" value="Y">
                                        <label class="form-check-label" for="status_slider">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_slider" value="N" checked>
                                        <label class="form-check-label" for="status_slider">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

							<div class="form-group">
                                <!-- <input type="file" name="gambar_slider" class="form-control" required> -->
								<label>Gambar Slider</label>
								<input type="file" class="form-control" name="gambar_slider" value="<?= $kt['gambar_slider']?>" accept="image/*" onchange="preview_image(event)">
								<!-- <input type="hidden" class="custom-file-input" name="gambar_slider_"> -->

								<hr>
								<div style="display:none" id="row-display">
									<hr>
									<label for="output">Preview Update Gambar Slider</label><br>
									<img id="output_image" class="img-thumbnail" width="200" />
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
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName);
    });
</script>