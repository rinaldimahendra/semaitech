<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('login', $data);
	}

    public function register() {
		$data = array(
			'title' => "Register"
		);
		$this->load->view('register', $data);
	}
}