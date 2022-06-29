<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
				$data = array(
					'title' => "Admin | Semaitech"
				);
				
				
				$this->load->view('admin/v_dashboard', $data);
			}
		}
		
		
	}
}