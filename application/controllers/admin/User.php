<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
    }

    public function index() {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
                    'title' => "Data User | Semaitech",
                    'user' => $this->Muser->getalldata()->result_array(),
                    'admin' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
                );
                $this->load->view('admin/v_user', $data);
            }
        } else {
            redirect('home');
        }
		
	}

    public function update()
    {
        $data = array(
            'id_user'          => $this->input->post('id_user'),
            'nama_user'        => $this->input->post('nama_user'),
            'is_active'        => $this->input->post('status_user'),
        );

        // var_dump($data);
        // die;
        $where = array(
            'id_user'                => $this->input->post('id_user')
        );
        $this->Muser->update($where, $data, 'user');
        redirect('admin/user');
    }

    public function add_admin(){
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 0) {
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
                    $data = array(
                        'title' => "Add Admin | Semaitech",
                    );
                    $this->load->view('admin/v_add_admin', $data);
                } else {
                    date_default_timezone_set('Asia/Jakarta');
                    $data = [
                        'nama_user' => htmlspecialchars($this->input->post('nama', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'password' => password_hash(
                            $this->input->post('password1'),
                            PASSWORD_DEFAULT
                        ),
                        'foto_user' => 'default.jpg',
                        'jenis_kelamin' => $this->input->post('jenis-kelamin', true),
                        'tanggal_lahir' => $this->input->post('tanggal', true),
                        'id_role' => 1,
                        'is_active' => 1,
                        'date_created' => date('Y-m-d H:i:s')
                    ];
                    $this->db->insert('user', $data);
                    $this->session->set_flashdata('message', 'Akun Sudah Berhasil Dibuat!');
                    redirect('admin/user');
                }
            } else {
                $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses!');
                redirect('admin/user');
            }
        } else {
            redirect('home');
        }

    }


}