<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companyprofile extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Company Profile | Semaitech"
		);
		
		$this->load->view('admin/v_companyprofile', $data);
	}
}