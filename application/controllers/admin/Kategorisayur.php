<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategorisayur extends CI_Controller
{
    public function index()
    {
        // echo "test";
        $data = array(
            'title' => "Data Penjualan | Semaitech",
            'datasayur1' => $this->d_datasayur->tampil_data()->result(),
        );

        $this->load->view('admin/v_kategorisayur', $data);
    }

    public function hapus($id)
    {
        $data = array(
            'Status'            => 'D',
        );
        $where = array('Id' => $id);
        $this->d_datasayur->update_data($where, $data, 'managemen_data_sayur');
        redirect('admin/Kategorisayur/index');
    }

    public function edit($id)
    {
        $where = array('Id' => $id);
        $data = array(
            'title' => "Data Penjualan | Semaitech",
            'datasayur1' => $this->d_datasayur->edit_produk($where, 'managemen_data_sayur')->result(),
        );
        $this->load->view('admin/v_kategorisayur', $data);
    }

    public function update()
    {
        $id                      = $this->input->post('id');
        $nama                    = $this->input->post('nama');
        $kategori                = $this->input->post('kategori');
        $status                    = $this->input->post('status');

        $data = array(
            'Nama'               => $nama,
            'Kategori'           => $kategori,
            'Status'            => $status,
        );

        $where = array(
            'Id'         => $id
        );

        $this->d_datasayur->update_data($where, $data, 'managemen_data_sayur');
        redirect('admin/Kategorisayur/index');
    }

    public function edit_barang()
    {
        // echo "test";
        $data = array(
            'title' => "Data Penjualan | Semaitech",
            'datasayur1' => $this->d_datasayur->tampil_data_edit_barang()->result(),
        );

        $this->load->view('admin/v_kategorisayur', $data);
    }
}
