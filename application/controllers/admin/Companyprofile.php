<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companyprofile extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mprofile');
    }

    public function index() {
		$data = array(
			'title' => "Company Profile | Semaitech",
			'profile' => $this->db->get('profile_perusahaan')->row(),
			'js' => array("companyprofile.js?r=" . rand()),
		);
		$this->load->view('admin/v_companyprofile', $data);
	}

	function update_perusahaan()
    {
        $upload = $_FILES['logo']['name'];
        if ($upload) {
            $src = $this->input->post('logo_');
            $file_name = str_replace(base_url(), '', $src);
            unlink($file_name);

            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2024';
            $config['upload_path']      = './assets/img/companyprofile';
            $config['encrypt_name']     = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">' . $error['error'] . '</div>');
                redirect('admin/companyprofile');
            } else {
                $fileupload = $this->upload->data();
                $filename = pathinfo($fileupload['full_path']);
                $logo = base_url('assets/img/companyprofile/' . $filename['basename']);
                $result = $this->Mprofile->updateProfilPerusahaan($logo);
                redirect('admin/companyprofile');

            }
        } else {
            $logo = $this->input->post('logo_');
            $result = $this->Mprofile->updateProfilPerusahaan($logo);
            redirect('admin/companyprofile');
        }

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">Profil perusahaan berhasil di update!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">Error!</div>');
        }
        redirect('admin/companyprofile');
    }
}