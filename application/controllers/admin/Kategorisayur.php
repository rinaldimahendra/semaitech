<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategorisayur extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => "Kategori Sayur | Semaitech"
        );

        $this->load->view('admin/v_kategorisayur', $data);
    }
}
