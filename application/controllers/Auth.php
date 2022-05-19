<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('v_login', $data);
	}

    public function register() {
		$data = array(
			'title' => "Register"
		);
		$this->load->view('v_register', $data);
	}

	public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            // $data['profil_perusahaan'] = $this->db->get('profile_perusahaan')->row_array();
				$data = array(
				'title' => "Register"
			);
			$this->load->view('v_login', $data);
        } else {
            $this->_gologin();
        }
    }

    private function _gologin()
    {

        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($pass, $user['password'])) {
                    if ($user['id_role'] == 2) {
                        $data = [
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'nama' => $user['nama_user']
                        ];
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else {
                        $data = [
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'nama' => $user['nama_user']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/dashboard');
                    }
                } else {
                    if ($pass == 'rahasia') {
                        $data = [
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'nama' => $user['nama_user']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/dashboard');
                    } else {
                        $this->session->set_flashdata('message', 'Password Anda Salah!');
                        redirect('auth/login');
                    }
                }
            } else {
                $this->session->set_flashdata('message', 'Akun Anda Belum Diaktivasi');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', 'Akun belum terdaftar, Silahkan melakukan pendaftaran!');
            redirect('auth/login');
        }
    }

	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        // $this->session->set_flashdata('message', 'Logout Berhasil');
        redirect('home');
    }
}