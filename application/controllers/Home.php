<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Home"
		);
		$this->load->view('v_home', $data);
	}

    public function cart() {
		$data = array(
			'title' => "Cart"
		);
		$this->load->view('v_cart', $data);
	}

    public function shop() {
		$data = array(
			'title' => "Shop"
		);
		$this->load->view('v_shop', $data);
	}

}