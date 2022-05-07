<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Admin | Semaitech"
		);
		
  		
		$this->load->view('admin/v_dashboard', $data);
		
		
	}
}