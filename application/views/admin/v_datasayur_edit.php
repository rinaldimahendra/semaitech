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
            <div class="card-body">
                <?php foreach ($datasayur1 as $ds) : ?>

                    <form method="post" action="<?php echo base_url() . 'admin/Datasayur/update'; ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $ds->Nama ?>">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value=''>- Pilih -</option>
                                <?php foreach ($kategori as $ktgr) { ?>
                                    <option value="<?php echo $ktgr['Id_Kategori']; ?>" <?php if ($ds->Kategori == $ktgr['Id_Kategori']) { ?> selected <?php } ?>>
                                        <?php echo $ktgr['Nama_Kategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" value="<?php echo $ds->Stok ?>">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $ds->Id ?>">
                            <input type="text" name="keterangan" class="form-control" value="<?php echo $ds->Keterangan ?>">
                        </div>

                        <div class="form-group" method="get">
                            <label class="d-block">Satuan</label>
                            <div class="form-check form-check-inline">
                                <?php
                                if ($ds->satuan == 'Ons') { ?>
                                    <input class="form-check-input" type="radio" name="satuan" value="Ons" checked>
                                    <label class="form-check-label" for="satuan">Ons</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Gram">
                                    <label class="form-check-label" for="satuan">Gram</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Kilogram">
                                    <label class="form-check-label" for="satuan">Kilogram</label>
                                <?php } elseif ($ds->satuan == 'Gram') { ?>
                                    <input class="form-check-input" type="radio" name="satuan" value="Ons">
                                    <label class="form-check-label" for="satuan">Ons</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Gram" checked>
                                    <label class="form-check-label" for="satuan">Gram</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Kilogram">
                                    <label class="form-check-label" for="satuan">Kilogram</label>
                                <?php } elseif ($ds->satuan == 'Kilogram') { ?>
                                    <input class="form-check-input" type="radio" name="satuan" value="Ons">
                                    <label class="form-check-label" for="satuan">Ons</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Gram">
                                    <label class="form-check-label" for="satuan">Gram</label>

                                    &ensp;<input class="form-check-input" type="radio" name="satuan" value="Kilogram" checked>
                                    <label class="form-check-label" for="satuan">Kilogram</label>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="<?php echo $ds->Harga ?>">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="author-box-left">
                                <img class="img-thumbnail" style="height: 150px" src="<?php echo base_url() . '/assets/img/sayur/' . $ds->Foto ?>" alt="<?= $ds->Foto ?>">
                            </div>&ensp;
                            <input type="file" name="foto" class="form-control" value="<?php echo $ds->Foto ?>">
                        </div>

                        <div class="form-group" method="get">
                            <label class="d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <?php
                                if ($ds->Status == 'Y') { ?>
                                    <input class="form-check-input" type="radio" name="status" value="Y" checked>
                                    <label class="form-check-label" for="status">Aktif</label>

                                    &ensp;<input class="form-check-input" type="radio" name="status" value="N">
                                    <label class="form-check-label" for="status">Tidak Aktif</label>
                                <?php } elseif ($ds->Status == 'N') { ?>
                                    <input class="form-check-input" type="radio" name="status" value="Y">
                                    <label class="form-check-label" for="status">Aktif</label>

                                    &ensp;<input class="form-check-input" type="radio" name="status" value="N" checked>
                                    <label class="form-check-label" for="status">Tidak Aktif</label>
                                <?php } ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button onclick="window.location.href='<?php echo base_url('admin/Datasayur/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('template_admin/footer'); ?>

<script>
    $(document).ready(function() {
        $('#Table1').DataTable();
    });
</script>