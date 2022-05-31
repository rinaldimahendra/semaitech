<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template_admin/header');
$this->load->view('template_admin/layout');
$this->load->view('template_admin/sidebar');
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        Data User
      </h1>
    </div>
    <div class="card">
      <div class="card-header">

      </div>
        <div class="card-body">
            <?=$this->session->flashdata('message'); $this->session->unset_userdata('message');?>
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status Aktif</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($user as $u) : ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td> <?= $u['nama_user']; ?> </td>
                        <td> <?= $u['email']; ?> </td>
                        <?php if ($u['id_role'] == 1) : ?>
                            <td style="text-align: center;">Admin</td>
                        <?php else : ?>
                            <td style="text-align: center;">Customer</td>
                        <?php endif; ?>
                        <?php if ($u['is_active'] == 1) : ?>
                            <td style="text-align: center;"><span class="badge badge-success">Aktif</span></td>
                        <?php else : ?>
                            <td style="text-align: center;"><span class="badge badge-danger">Tidak Aktif</span></td>
                        <?php endif; ?>
                        <td> <?= $u['date_created']; ?> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
  </section>
</div>
<?php $this->load->view('template_admin/footer'); ?>