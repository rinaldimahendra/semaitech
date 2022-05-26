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
<script>
    function edit(id_kategori) {
        console.log(id_kategori);
        $('#header').html('Edit Kategori');
        $('#tambah').html('Ubah');
        $('.modal-content form').attr('action', '<?= base_url('admin/Event/') ?>update_kategori');

        $.ajax({
            url: '<?= base_url('admin/Event/') ?>getubah',
            data: {
                id_kategori: id_kategori
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#kategori').val(data.nama_kategori);
                $('#status').val(data.status);
                $('#id_kategori').val(data.id_kategori);
            }
        })
    }

    function tambah() {
        $('#header').html('Tambah Kategori');
        $('#tambah').html('Simpan');
        $('.modal-content form').attr('action', '<?= base_url('admin/user/') ?>tambah_user');
        $('#kategori').val('');
        $('#status').val('');
    }

    function hapus(id_kategori, nama_kategori) {
        console.log(id_kategori);
        console.log(nama_kategori);
        Swal.fire({
            title: 'Anda Yakin?',
            html: "Kategori " + nama_kategori + " <br><br><b>Akan di Hapus!<b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#9AD268',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url: '<?= base_url('admin/Event/') ?>delete_kategori',
                    data: {
                        id_kategori: id_kategori
                    },
                    method: 'post',
                    dataType: "JSON",
                    success: function(data) {
                        // $('#example1').DataTable().ajax.reload();
                        Swal.fire({
                            title: data.title,
                            html: nama_kategori + '<br>' + data.status,
                            icon: data.icon,
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            buttons: false,
                        });
                        setTimeout(function() {
                            window.location.href = "<?= base_url('admin/Event/kategori'); ?>";
                        }, 3000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            }
        });
    }
</script>


<?php $this->load->view('template_admin/footer'); ?>