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
        

      <?php if ($this->session->flashdata('message')) : ?>
            <?php $message = $this->session->flashdata('message'); ?>
            <?= '<div class="alert alert-danger">' . $message . '</div>'; ?>
            <?php $this->session->unset_userdata('message'); ?>
        <?php endif; ?>
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
                        <?php if ($admin['id_role'] == '0') : ?>
                        <th colspan="2"></th>
                        <?php endif; ?>
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
                        <?php if ($u['id_role'] == 2) : ?>
                            <td style="text-align: center;">Customer</td>
                        <?php elseif ($u['id_role'] == 1) : ?>
                            <td style="text-align: center;">Admin</td>
                        <?php else : ?>
                            <td style="text-align: center;">Super Admin</td>
                        <?php endif; ?>
                        <?php if ($u['is_active'] == 1) : ?>
                            <td style="text-align: center;"><span class="badge badge-success">Aktif</span></td>
                        <?php else : ?>
                            <td style="text-align: center;"><span class="badge badge-danger">Tidak Aktif</span></td>
                        <?php endif; ?>
                        <td> <?= $u['date_created']; ?> </td>
                    
                        <?php if ($u['id_role'] == '0') : ?>
                        <?php else : ?>
                            <?php if ($admin['id_role'] == '0') : ?>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Edit_User<?= $u['id_user']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <?php endif; ?>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
  </section>
</div>

    <!-- Modal Edit User-->
    <?php foreach ($user as $u) : ?>
        <div class="modal fade" id="Edit_User<?= $u['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">FORM EDIT USER</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'admin/user/update'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="hidden" name="id_user" class="form-control" value="<?= $u['id_user']; ?>">
                                <input type="text" name="nama_user" class="form-control" value="<?= $u['nama_user']; ?>" required>
                            </div>


                            <div class="form-group" method="get">
                                <label class="d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <?php
                                    if ($u['is_active'] == 1) { ?>
                                        <input class="form-check-input" type="radio" name="status_user" value="1" checked>
                                        <label class="form-check-label" for="status_user">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_user" value="0">
                                        <label class="form-check-label" for="status_user">Tidak Aktif</label>
                                    <?php } elseif ($u['is_active'] == 0) { ?>
                                        <input class="form-check-input" type="radio" name="status_user" value="1">
                                        <label class="form-check-label" for="status_user">Aktif</label>

                                        &ensp;<input class="form-check-input" type="radio" name="status_user" value="0" checked>
                                        <label class="form-check-label" for="status_user">Tidak Aktif</label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button onclick="window.location.href='<?php echo base_url('admin/user/index/') ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php $this->load->view('template_admin/footer'); ?>