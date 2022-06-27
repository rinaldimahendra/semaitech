<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenjualan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('d_datasayur');
    }

    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
                    'title' => "Data Penjualan",
                    'kategori1' => $this->d_kategorisayur->tampil_data1()->result(),
					'pesanan_menungguverifikasi' => $this->d_datasayur->getRiwayatPesanan_MenungguVerifikasiADMIN($user['id_user'])->result_array(),
					'pesanan_dikemas' => $this->d_datasayur->getRiwayatPesanan_DikemasADMIN($user['id_user'])->result_array(),
					'pesanan_dikirim' => $this->d_datasayur->getRiwayatPesanan_DikirimADMIN($user['id_user'])->result_array(),
					'pesanan_selesai' => $this->d_datasayur->getRiwayatPesanan_SelesaiADMIN($user['id_user'])->result_array(),
					'p_menungguverifikasi' => count($this->d_datasayur->getRiwayatPesanan_MenungguVerifikasiADMIN($user['id_user'])->result_array()),
					'p_dikemas' => count($this->d_datasayur->getRiwayatPesanan_DikemasADMIN($user['id_user'])->result_array()),
					'p_dikirim' => count($this->d_datasayur->getRiwayatPesanan_DikirimADMIN($user['id_user'])->result_array()),
					'p_selesai' => count($this->d_datasayur->getRiwayatPesanan_SelesaiADMIN($user['id_user'])->result_array()),
                );

                $this->load->view('admin/v_datapenjualan', $data);
            }
        }
    }

	public function to_dikemas($id){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
				'status'			=> 2,
                    );
                $result = $this->d_datasayur->update_status(['id_order' => $id], $data, 'order');
                if ($result){
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">ID#'.$id.' Berhasil diupdate!</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">ID#'.$id.' Gagal diupdate!</div>');
			    }
			    redirect('admin/datapenjualan');
            }
        }
	}

	public function to_dikirim($id){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
				'status'			=> 3,
                'tanggal_kirim'     => date('Y-m-d H:i:s')
                );
                $result = $this->d_datasayur->update_status(['id_order' => $id], $data, 'order');
                if ($result){
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">ID#'.$id.' Berhasil diupdate!</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">ID#'.$id.' Gagal diupdate!</div>');
			    }
			    redirect('admin/datapenjualan');
            }
        }
	}

    public function detail($id){

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
				'title'		  => 'Detail Pesanan',
                'pesanan'     => $this->d_datasayur->detailpesanan($id)->result_array(),
                'order'       => $this->d_datasayur->order($id)->row_array(),
                );

                $this->load->view('admin/v_detailpesanan', $data);
            }
        }
    }
}