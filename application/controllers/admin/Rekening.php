<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mrekening');
    }

    public function index() {
		$data = array(
			'title' => "Rekening Pembayaran | Semaitech",
            'rekening' => $this->Mrekening->getallrek()->result_array(),
		);

		$this->load->view('admin/v_rekening', $data);
		
	}

     public function tambah_rek(){
		$data = array(
			'nama_rek'	    => $this->input->post('nama_rek'),
			'bank_rek'   => $this->input->post('bank_rek'),
            'nomor_rek'      => $this->input->post('nomor_rek'),
            'status_rek'      => $this->input->post('status_rek'),
		);

		$this->Mrekening->tambah($data, 'rek_pembayaran');
		redirect('admin/rekening');
    }

    public function hapus($id)
	{
		$data = array(
			'status_rek'			=> 'D',
		);
		$where = array('id_rek' => $id);
		$this->Mrekening->update_data($where, $data, 'rek_pembayaran');
		redirect('admin/rekening');
	}

	public function edit($id)
	{
		$where = array('id_rek' => $id);
        
        $data = array(
			'nama_rek'	    => $this->input->post('nama_rek'),
			'bank_rek'   => $this->input->post('bank_rek'),
            'nomor_rek'      => $this->input->post('nomor_rek'),
            'status_rek'      => $this->input->post('status_rek'),
        );
        $this->Mrekening->update_data($where, $data, 'rek_pembayaran');
        redirect('admin/rekening');
		
	}
}