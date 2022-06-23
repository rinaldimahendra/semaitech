<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategorisayur extends CI_Controller
{
    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
                    'title' => "Kategori Sayur | Semaitech",
                    'kategori1' => $this->d_kategorisayur->tampil_data1()->result(),
                );

                $this->load->view('admin/v_kategorisayur', $data);
            }
        }
    }

    public function tambah_aksi()
    {
        $nama_kategori                   = $this->input->post('nama_kategori');
        $status_kategori                 = $this->input->post('status_kategori');

        $data = array(
            'Nama_Kategori'              => $nama_kategori,
            'Status_Kategori'            => $status_kategori,
        );

        $this->d_kategorisayur->tambah_produk1($data, 'kategori_sayur');
        redirect('admin/Kategorisayur/index');
    }

    public function hapus($id_kategori)
    {
        $data = array(
            'Status_Kategori'            => 'D',
        );
        $where = array('Id_Kategori' => $id_kategori);
        $this->d_kategorisayur->update_data1($where, $data, 'kategori_sayur');
        redirect('admin/Kategorisayur/index');
    }

    public function edit($id_kategori)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $where = array('Id_Kategori' => $id_kategori);
                $data = array(
                    'title' => "Data Penjualan | Semaitech",
                    'kategori1' => $this->d_kategorisayur->edit_produk1($where, 'kategori_sayur')->result(),
                );
                $this->load->view('admin/v_kategorisayur', $data);
            }
        }
    }

    public function update1()
    {
        $id_kategori                     = $this->input->post('id_kategori');
        $nama_kategori                   = $this->input->post('nama_kategori');
        $status_kategori                 = $this->input->post('status_kategori');

        $data = array(
            'Id_Kategori'                => $id_kategori,
            'Nama_Kategori'              => $nama_kategori,
            'Status_Kategori'            => $status_kategori,
        );

        $where = array(
            'Id_Kategori'                => $id_kategori
        );

        $this->d_kategorisayur->update_data1($where, $data, 'kategori_sayur');
        redirect('admin/Kategorisayur/index');
    }

    public function edit_barang()
    {
        // echo "test";
        $data = array(
            'title' => "Data Penjualan | Semaitech",
            'datasayur1' => $this->d_kategorisayur->tampil_data_edit_barang1()->result(),
        );

        $this->load->view('admin/v_kategorisayur', $data);
    }
}
