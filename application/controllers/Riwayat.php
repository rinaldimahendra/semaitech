<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
		$this->load->model('Mcart');
		$this->load->model('Mkonten');
    }

    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart){
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}
			
				$data = array(
					'title' => "Riwayat Pesanan",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'pesanan_menungguverifikasi' => $this->Mhome->getRiwayatPesanan_MenungguVerifikasi($user['id_user'])->result_array(),
					'pesanan_dikemas' => $this->Mhome->getRiwayatPesanan_Dikemas($user['id_user'])->result_array(),
					'pesanan_dikirim' => $this->Mhome->getRiwayatPesanan_Dikirim($user['id_user'])->result_array(),
					'pesanan_selesai' => $this->Mhome->getRiwayatPesanan_Selesai($user['id_user'])->result_array(),
					'detail_menungguverifikasi' => $this->Mhome->getDetailPesanan_MenungguVerifikasi($user['id_user'])->result_array(),
					'detail_dikemas' => $this->Mhome->getDetailPesanan_Dikemas($user['id_user'])->result_array(),
					'detail_dikirim' => $this->Mhome->getDetailPesanan_Dikirim($user['id_user'])->result_array(),
					'detail_selesai' => $this->Mhome->getDetailPesanan_Selesai($user['id_user'])->result_array(),
					'p_menungguverifikasi' => count($this->Mhome->getRiwayatPesanan_MenungguVerifikasi($user['id_user'])->result_array()),
					'p_dikemas' => count($this->Mhome->getRiwayatPesanan_Dikemas($user['id_user'])->result_array()),
					'p_dikirim' => count($this->Mhome->getRiwayatPesanan_Dikirim($user['id_user'])->result_array()),
					'p_selesai' => count($this->Mhome->getRiwayatPesanan_Selesai($user['id_user'])->result_array()),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_riwayat', $data);
			}else{
				$data = array(
					'title' => "Riwayat Pesanan",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'pesanan_menungguverifikasi' => $this->Mhome->getRiwayatPesanan_MenungguVerifikasi($user['id_user'])->result_array(),
					'pesanan_dikemas' => $this->Mhome->getRiwayatPesanan_Dikemas($user['id_user'])->result_array(),
					'pesanan_dikirim' => $this->Mhome->getRiwayatPesanan_Dikirim($user['id_user'])->result_array(),
					'pesanan_selesai' => $this->Mhome->getRiwayatPesanan_Selesai($user['id_user'])->result_array(),
					'detail_menungguverifikasi' => $this->Mhome->getDetailPesanan_MenungguVerifikasi($user['id_user'])->result_array(),
					'detail_dikemas' => $this->Mhome->getDetailPesanan_Dikemas($user['id_user'])->result_array(),
					'detail_dikirim' => $this->Mhome->getDetailPesanan_Dikirim($user['id_user'])->result_array(),
					'detail_selesai' => $this->Mhome->getDetailPesanan_Selesai($user['id_user'])->result_array(),
					'p_menungguverifikasi' => count($this->Mhome->getRiwayatPesanan_MenungguVerifikasi($user['id_user'])->result_array()),
					'p_dikemas' => count($this->Mhome->getRiwayatPesanan_Dikemas($user['id_user'])->result_array()),
					'p_dikirim' => count($this->Mhome->getRiwayatPesanan_Dikirim($user['id_user'])->result_array()),
					'p_selesai' => count($this->Mhome->getRiwayatPesanan_Selesai($user['id_user'])->result_array()),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_riwayat', $data);
			}
			
		}else{
			redirect('home');
		}
	}

	public function to_selesai($id){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 1) {
                redirect('home');
            } else {
                $data = array(
				'status'			=> 4,
                    );
                $result = $this->d_datasayur->update_status(['id_order' => $id], $data, 'order');
                if ($result){
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">ID#'.$id.' Berhasil diupdate!</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">ID#'.$id.' Gagal diupdate!</div>');
			    }
			    redirect('riwayat');
            }
        }
	}
}