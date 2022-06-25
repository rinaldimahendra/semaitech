<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
        $this->load->model('Mcart');
        $this->load->model('Mkonten');
        $this->load->model('Mrekening');
        $this->load->model('Mcheckout');
    }

    public function index()
    {
        // $where = array('id_order' => $id_order);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $cart = $this->Mcart->show_cart($user['id_user'])->result_array();
            if ($cart) {
                $totalcart = 0;
                foreach ($cart as $c) {
                    $totalcart = $totalcart + $c['qty'];
                }

                $data = array(
                    'title'             => "Checkout",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => $totalcart,
                    'data_user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'rekening'          => $this->Mrekening->getallrek()->result_array(),
                    // 'order1'            => $this->Mcheckout->Add($where, 'managemen_data_sayur')->result(),
                    // 'kategori'          => $this->d_kategorisayur->tampil_kategori()->result_array(),
                );
                $this->load->view('v_checkout', $data);
            } else {
                $data = array(
                    'title'             => "Checkout",
                    'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
                    'keranjang'         => $this->Mcart->getcart($user['id_user'])->result_array(),
                    'carttotal'         => 0,
                    'data_user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'rekening'          => $this->Mrekening->getallrek()->result_array(),
                    // 'order1'         => $this->Mcheckout->Add($where, 'managemen_data_sayur')->result(),
                    // 'kategori'          => $this->d_kategorisayur->tampil_kategori()->result_array(),
                );
                $this->load->view('v_checkout', $data);
            }
        } else {
            $this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Keranjang');
            redirect('auth/login');
        }
    }

    public function AddCheckout()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $keranjang = $this->Mcart->getcart($user['id_user'])->result_array();

        $gambar                      = $_FILES['foto']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/user/images/slider';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Foto Gagal diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_user'           => $user['id_user'],
            'nama'              => $this->input->post('nama'),
            'alamat'            => $this->input->post('alamat'),
            'provinsi'          => $this->input->post('provinsi'),
            'kota'              => $this->input->post('kota'),
            'kode_pos'          => $this->input->post('kode_pos'),
            'no_tlp'            => $this->input->post('no_tlp'),
            'catatan_pembelian' => $this->input->post('catatan_pembelian'),
            'grandtotal'        => $this->input->post('grand_total'),
            'ongkir'            => $this->input->post('ongkir'),
            'total_bayar'       => $this->input->post('total_bayar'),
            'status'            => 1,
            'bukti_bayar'       => $gambar,
            'bank'              => $this->input->post('bank'),
            'tanggal_pesan'     => date('Y-m-d H:i:s')
            
        );

        $this->Mcheckout->tambah_order($data, 'order');

        // tambah keranjang -> detail order
        $id_order_recently = $this->db->insert_id();

        foreach ($keranjang as $k) {
            $data_keranjang = array(
                'id_order' => $id_order_recently,
                'id_sayur' => $k['id_sayur'],
                'qty' => $k['qty']
            );
            $this->Mcheckout->tambah_detail_order($data_keranjang, 'detail_order');
            
            // Hapus keranjang 
            $this->Mcheckout->hapus_data(['id_keranjang' => $k['id_keranjang']], 'keranjang');
        }
        redirect('home');
    }
}
