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
                Konten Blog
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <a href="<?=base_url('admin/blog/create')?>" class="add btn btn-primary btn-sm">
                        Tambah Konten
                    </a>
                </div>
                <table id="tableBlog" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th width="10%">Status</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('template_admin/footer'); ?>
