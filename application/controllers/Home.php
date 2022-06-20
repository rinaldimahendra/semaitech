<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhome');
		$this->load->model('Mcart');
		$this->load->model('Mkonten');
    }
    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart){
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}
			
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_home', $data);
			}else{
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_home', $data);
			}
			
		}else{
			$data = array(
				'title' => "Home",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'slider' => $this->Mkonten->getslider_aktif()->result_array(),
				'datasayur' => $this->Mhome->getallsayur()->result_array(),
				'datakategori' => $this->Mhome->getallkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_home', $data);
		}
	}

	public function Cart(){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart){
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}
			
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_cart', $data);
			}else{
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_cart', $data);
			}
			
		}else{
			$this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Keranjang');
            redirect('auth/login');
		}
	}

    public function Addcart($id_sayur) {
		
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$cart = $this->Mcart->cek_cart($id_sayur, $user['id_user'])->row_array();
			if($cart){
				$this->db->set('qty', $cart['qty'] + 1);
                $this->db->where('id_keranjang', $cart['id_keranjang']);
                $this->db->update('keranjang');
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Berhasil ditambahkan ke <a href="' . base_url('home/cart') . '"><u>Keranjang!</u></a>
                </div>');
                redirect('home');
			}else{
				$data = array(
                    'id_sayur'  => $id_sayur,
                    'qty'     	=> 1,
                    'status' 	=> 1,
                    'id_user' 	=> $user['id_user'],
                );
                $this->db->insert('keranjang', $data);
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Berhasil ditambahkan ke <a href="' . base_url('home/cart') . '"><u>Keranjang!</u></a>
                </div>');
                redirect('home');
			}
		} else{
			$this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Menambahkan keranjang');
            redirect('auth/login');
		}
	}

	public function updateCart()
    {
        $id_keranjang = $_POST['id_keranjang'];
        $qty = $_POST['qty'];

        $query = "UPDATE keranjang SET qty = $qty WHERE id_keranjang = $id_keranjang";
        $this->db->query($query);
        echo json_encode($this->Mcart->get_keranjang_byid($id_keranjang)->row_array());
    }

	public function deleteCart($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('keranjang');
        redirect('home/cart');
    }

    public function shop() {
		$data = array(
			'title' => "Shop"
		);
		$this->load->view('v_shop', $data);
	}

	public function kategori($id_kategori){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart){
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}
			
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_kategori', $data);
			}else{
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
					'datakategori' => $this->Mhome->getallkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_kategori', $data);
			}
			
		}else{
			$data = array(
				'title' => "Home",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
				'datakategori' => $this->Mhome->getallkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_kategori', $data);
		}
	}

	public function Detailsayur($id) 
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart) {
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}
				$where = array('Id' => $id);
				$data = array(
					'title' => 'Detail Sayur',
					'datasayur' => $this->Mhome->detailsayur($where,'managemen_data_sayur')->result_array(),
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => $totalcart,
					'kategori'   => $this->d_kategorisayur->tampil_kategori()->result_array(),
				);

				$this->load->view('v_detail_sayur', $data);
				
			} else {
				$where = array('Id' => $id);
				$data = array(
					'title' => 'Detail Sayur',
					'datasayur' => $this->Mhome->detailsayur($where,'managemen_data_sayur')->result_array(),
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => 0,
					'kategori'   => $this->d_kategorisayur->tampil_kategori()->result_array(),
				);

				$this->load->view('v_detail_sayur', $data);
			}
		} else {
			$this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Keranjang');
			redirect('auth/login');
		}
		// $where = array('Id' => $id);
		// $data = array(
		// 	'title' => 'Detail Sayur',
		// 	'datasayur' => $this->Mhome->detailsayur($where,'managemen_data_sayur')->result_array(),
		// 	'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
		// 	'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
		// );

		// $this->load->view('v_detail_sayur', $data);
	}

}