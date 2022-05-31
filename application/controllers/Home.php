<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
    }
    public function index() {
		$data = array(
			'title' => "Home",
			'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
			'datasayur' => $this->Mhome->getallsayur()->result_array(),
		);
		$this->load->view('v_home', $data);
	}

    public function cart() {
		
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$data = array(
				'title' => "Cart"
			);
			$this->load->view('v_cart', $data);
		} else{
			$this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum melihat keranjang');
            redirect('auth/login');
		}
	}

    public function shop() {
		$data = array(
			'title' => "Shop"
		);
		$this->load->view('v_shop', $data);
	}

}