<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategoriblog extends CI_Controller
{	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('D_kategoriblog');
	}
    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $data = array(
                    'title' => "Kategori Blog | Semaitech",
                    'kategori1' => $this->D_kategoriblog->getallblog()->result(),
                );

                $this->load->view('admin/v_kategoriblog', $data);
            }
        }
    }

    public function tambah_aksi()
    {
        $nama_kategoriblog                   = $this->input->post('nama_kategoriblog');
        $status_kategoriblog                 = $this->input->post('status_kategoriblog');

        $data = array(
            'nama_kategoriblog'              => $nama_kategoriblog,
            'status_kategoriblog'            => $status_kategoriblog,
        );

        $this->D_kategoriblog->tambah_blog($data, 'kategori_blog');
        redirect('admin/Kategoriblog/index');
    }

    public function hapus($id_kategoriblog)
    {
        $data = array(
            'status_kategoriblog'            => 'D',
        );
        $where = array('id_kategoriblog' => $id_kategoriblog);
        $this->D_kategoriblog->update_blog($where, $data, 'kategori_blog');
        redirect('admin/Kategoriblog/index');
    }

    public function edit($id_kategoriblog)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
                $where = array('id_kategoriblog' => $id_kategoriblog);
                $data = array(
                    'title' => "Kategori Blog | Semaitech",
                    'kategori1' => $this->D_kategoriblog->edit_kategoriblog($where, 'kategori_blog')->result(),
                );
                $this->load->view('admin/v_kategoriblog', $data);
            }
        }
    }

    public function update()
    {
        $id_kategoriblog                     = $this->input->post('id_kategoriblog');
        $nama_kategoriblog                   = $this->input->post('nama_kategoriblog');
        $status_kategoriblog                 = $this->input->post('status_kategoriblog');

        $data = array(
            'id_kategoriblog'                => $id_kategoriblog,
            'nama_kategoriblog'              => $nama_kategoriblog,
            'status_kategoriblog'            => $status_kategoriblog,
        );

        $where = array(
            'id_kategoriblog'                => $id_kategoriblog
        );

        $this->D_kategoriblog->update_blog($where, $data, 'kategori_blog');
        redirect('admin/Kategoriblog/index');
    }
}
