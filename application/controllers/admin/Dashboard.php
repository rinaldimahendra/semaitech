<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
	}

    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
				$data = array(
					'title' => "Admin | Semaitech",
					'total_produk' 		=> COUNT($this->Muser->total_produk()->result()),
					'total_order'		=> COUNT($this->Muser->total_order()->result()),
					'total_pemasukan'	=> $this->Muser->total_pemasukan()->row_array(),
				);
				
				
				$this->load->view('admin/v_dashboard', $data);
			}
		}
		
		
	}
}