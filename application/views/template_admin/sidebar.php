<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>admin/dashboard/index">Semaitech Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>admin/dashboard/index">SA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

      <li class="menu-header">Data</li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/datasayur"><i class="far fa-file-alt"></i> <span>Data Sayur</span></a></li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/datapenjualan"><i class="far fa-file-alt"></i></i><span>Data Penjualan</span></a></li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/companyprofile"><i class="far fa-file-alt"></i> <span>Data Company Profile</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/rekening"><i class="far fa-file-alt"></i> <span>Rekening Pembayaran</span></a></li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/kategorisayur"><i class="far fa-file-alt"></i> <span>Kategori Sayur</span></a></li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i><span>Blog</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/blog') ?>">Data Blog</a></li>
          <li><a class="nav-link" href="<?= base_url('admin/Kategoriblog') ?>">Kategori Blog</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i><span>Konten</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/Konten') ?>">Slider</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>User</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/user') ?>">Data Users</a></li>
          <li><a class="nav-link" href="<?= base_url('admin/user/add_admin') ?>">Add Admin</a></li>
        </ul>
      </li>
    </ul>

    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> -->
  </aside>
</div>