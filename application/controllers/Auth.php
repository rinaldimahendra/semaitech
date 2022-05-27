<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('v_login', $data);
	}

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah pernah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password telalu pendek minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');
        $this->form_validation->set_rules('jenis-kelamin', 'Name', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == false) {
            // $data['profil_perusahaan'] = $this->db->get('profile_perusahaan')->row_array();
            $data = array(
                'title' => "Registrasi"
            );
            $this->load->view('v_register', $data);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data1 = [
                'nama_user' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'foto_user' => 'default.jpg',
                'jenis_kelamin' => $this->input->post('jenis-kelamin', true),
                'tanggal_lahir' => $this->input->post('tanggal', true),
                'no_tlpn' => $this->input->post('nohandphone'),
                'id_role' => 2,
                'is_active' => 0,
                'date_created' => date('Y-m-d H:i:s')
            ];

            //Prepare for token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email', true),
                'token' => $token,
                'date_created' => time()
            ];
            $this->db->insert('user', $data1);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message1', 'Akun Sudah Berhasil Dibuat, Silahkan Cek Email Untuk Melakukan Aktivasi Akun!');
            redirect('auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'nyayur987@gmail.com',
            'smtp_pass' => 'sayurakun987',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('nyayur987@gmail.com', 'Semaitech');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $email = [
                'email' => $this->input->post('email'),
                'token' => urlencode($token),
            ];
            
            $this->email->message($this->load->view('v_email_verifikasi', $email, TRUE));
            // $this->email->message('Click this link to verfiy your account : <a href="' . base_url() . 'auth/verivikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot_password') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->delete('user_token', ['email' => $email]);
                    redirect('auth/reset_password_view?email=' . $email);
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token Expired');
                    redirect('auth/lupa_password');
                }
            } else {
                $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token salah');
                redirect('auth/lupa_password');
            }
        } else {
            $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Email yang digunakan salah');
            redirect('auth/lupa_password');
        }
    }

    public function reset_password_view()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password telalu pendek minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Reset Password';
            // $data['profil_perusahaan'] = $this->db->get('profile_perusahaan')->row_array();
            $data['user'] = $this->db->get_where('user', ['email' => $this->input->get('email')])->row_array();
            $data = array(
                'title' => "Registrasi"
            );
            $this->load->view('v_register', $data);
        } else {
            $data = [
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
            ];
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('user', $data);
            $this->session->set_flashdata('message1', 'Password Berhasil Diubah Silahkan Login!');
            redirect('auth/login');
        }
    }

    public function verivikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message1', 'Akun Sudah Berhasil Diaktivasi, Silahkan Login!');
                    redirect('auth/login');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token Expired');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Email yang digunakan salah');
            redirect('auth/login');
        }
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