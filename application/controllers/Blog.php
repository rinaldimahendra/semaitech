<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
        $this->load->model('Mcart');
        $this->load->model('D_kategoriblog');
        $this->load->model('Mblog');
    }

    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $cart = $this->Mcart->show_cart($user['id_user'])->result_array();
            if ($cart) {
                $totalcart = 0;
                foreach ($cart as $c) {
                    $totalcart = $totalcart + $c['qty'];
                }

                $data = array(
                    'title'             => "Blog",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => $totalcart,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),
                    'blog_konten'       => $this->Mblog->getallblog_konten()->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blog', $data);
            } else {
                $data = array(
                    'title'             => "Blog",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => 0,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),
                    'blog_konten'       => $this->Mblog->getallblog_konten()->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blog', $data);
            }
        } else {
            $this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Blog Kami');
            redirect('auth/login');
        }
    }

    public function detail_blog($where)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $cart = $this->Mcart->show_cart($user['id_user'])->result_array();
            if ($cart) {
                $totalcart = 0;
                foreach ($cart as $c) {
                    $totalcart = $totalcart + $c['qty'];
                }

                $data = array(
                    'title'             => "Blog Detail",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => $totalcart,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),
                    'blog_konten'       => $this->Mblog->getallblog_konten()->result(),                    
                    'blog_detail'       => $this->Mblog->blog_detail($where)->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blogDetail', $data);
            } else {
                $data = array(
                    'title'             => "Blog Detail",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => 0,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),
                    'blog_konten'       => $this->Mblog->getallblog_konten()->result(),                   
                    'blog_detail'       => $this->Mblog->blog_detail($where)->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blogDetail', $data);
            }
        } else {
            $this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Blog Kami');
            redirect('auth/login');
        }
    }

    public function search()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $cart = $this->Mcart->show_cart($user['id_user'])->result_array();
            if ($cart) {
                $totalcart = 0;
                foreach ($cart as $c) {
                    $totalcart = $totalcart + $c['qty'];
                }

                $data = array(
                    'title'             => "Blog",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => $totalcart,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),                   
                    'blog_konten'       => $this->Mblog->search($this->input->post('search'))->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blog', $data);
            } else {
                $data = array(
                    'title'             => "Blog",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => 0,
                    'kategori1'         => $this->D_kategoriblog->getallblog()->result(),                   
                    'blog_konten'       => $this->Mblog->search($this->input->post('search'))->result(),
                    'datakategori' => $this->Mhome->getallkategori()->result_array(),
                );
                $this->load->view('v_blog', $data);
            }
        } else {
            $this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Blog Kami');
            redirect('auth/login');
        }
    }
}