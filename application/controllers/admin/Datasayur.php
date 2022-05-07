<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasayur extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Data Sayur | Semaitech"
		);
		
		$this->load->view('admin/v_datasayur', $data);
	}
}