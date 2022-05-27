<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Profil"
		);
		$this->load->view('admin/v_profil', $data);
	}
}    