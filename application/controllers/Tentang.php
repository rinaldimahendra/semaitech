<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
        $this->load->model('Mcart');

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
					'title' => "Tentang",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_tentangperusahaan', $data);
			}else{
				$data = array(
					'title' => "Tentang",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_tentangperusahaan', $data);
			}
			
		}else{
			$data = array(
				'title' => "Tentang",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'datasayur' => $this->Mhome->getallsayur()->result_array(),
				'datakategori' => $this->Mhome->getallkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_tentangperusahaan', $data);
		}
	}

}