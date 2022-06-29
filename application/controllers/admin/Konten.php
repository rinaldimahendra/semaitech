<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mkonten');
    }

    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
				$data = array(
					'title'  => "Konten Slider | Semaitech",
					'konten' => $this->Mkonten->getallslider()->result_array(),
					// 'gambar' => $this->db->get('slider')->row(),
					'js' => array("slider.js?r=" . rand()),
				);

				$this->load->view('admin/v_slider', $data);
			}
		}
	}

    public function tambah_slider(){
        $gambar          			= $_FILES['gambar_slider']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './assets/user/images/slider';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar_slider')) {
				echo "Foto Gagal diupload!";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'judul_slider'	    => $this->input->post('judul_slider'),
			'subjudul_slider'   => $this->input->post('subjudul_slider'),
            'akses_button'      => $this->input->post('akses_button'),
            'label_button'      => $this->input->post('label_button'),
			'status_slider'     => $this->input->post('status_slider'),
			'gambar_slider'     => $gambar
		);

		$this->Mkonten->tambah($data, 'slider');
		redirect('admin/konten');
    }

    public function hapus($id)
	{
		$data = array(
			'status'			=> 'D',
		);
		$where = array('id_slider' => $id);
		$this->Mkonten->update_data($where, $data, 'slider');
		redirect('admin/konten');
	}

	public function edit($id)
	{
		$where = array('id_slider' => $id);
        $gambar          			= $_FILES['gambar_slider']['name'];
		if (!$gambar) {
            $data = array(
                'judul_slider'	    => $this->input->post('judul_slider'),
                'subjudul_slider'   => $this->input->post('subjudul_slider'),
                'akses_button'      => $this->input->post('akses_button'),
                'label_button'      => $this->input->post('label_button'),
                'status_slider'     => $this->input->post('status_slider'),
            );
            $this->Mkonten->update_data($where, $data, 'slider');
            redirect('admin/konten');
		} else {
			$config['upload_path'] = './assets/user/images/slider';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar_slider')) {
				echo "Foto Gagal diupload!";
			} else {
                $item = $this->db->get_where('slider', array('id_slider' => $id))->row();
				$target_file = './assets/user/images/slider/' . $item->gambar_slider;
				unlink($target_file);
				$gambar = $this->upload->data('file_name');
                $data = array(
                    'judul_slider'	    => $this->input->post('judul_slider'),
                    'subjudul_slider'   => $this->input->post('subjudul_slider'),
                    'akses_button'      => $this->input->post('akses_button'),
                    'label_button'      => $this->input->post('label_button'),
                    'status_slider'     => $this->input->post('status_slider'),
                    'gambar_slider'     => $gambar
                );
                $this->Mkonten->update_data($where, $data, 'slider');
                redirect('admin/konten');
			}
           
		}
	}

}