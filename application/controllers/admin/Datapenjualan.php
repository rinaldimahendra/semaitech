<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenjualan extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Data Penjualan | Semaitech"
		);

		$this->load->view('admin/v_datapenjualan', $data);
		
	}
}