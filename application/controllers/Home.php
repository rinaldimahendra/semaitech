<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mhome');
		$this->load->model('Mcart');
		$this->load->model('Mkonten');
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
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_home', $data);
			} else {
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_home', $data);
			}
		} else {
			$data = array(
				'title' => "Home",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'slider' => $this->Mkonten->getslider_aktif()->result_array(),
				'datasayur' => $this->Mhome->getallsayur()->result_array(),
				'datakategori' => $this->Mhome->getkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_home', $data);
		}
	}

	public function Cart()
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
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => $totalcart,
					'datakategori' => $this->Mhome->getkategori()->result_array(),
				);
				$this->load->view('v_cart', $data);
			} else {
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'keranjang'	=> $this->Mcart->getcart($user['id_user'])->result_array(),
					'carttotal' => 0,
					'datakategori' => $this->Mhome->getkategori()->result_array(),
				);
				$this->load->view('v_cart', $data);
			}
		} else {
			$this->session->set_flashdata('message2', 'Login terlebih dahulu sebelum Melihat Keranjang');
			redirect('auth/login');
		}
	}

	public function Addcart($id_sayur)
	{

		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($user) {
			$cart = $this->Mcart->cek_cart($id_sayur, $user['id_user'])->row_array();
			if ($cart) {
				$this->db->set('qty', $cart['qty'] + 1);
				$this->db->where('id_keranjang', $cart['id_keranjang']);
				$this->db->update('keranjang');
				$this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Berhasil ditambahkan ke <a href="' . base_url('home/cart') . '"><u>Keranjang!</u></a>
                </div>');
				redirect('home');
			} else {
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
		} else {
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

	public function shop()
	{
		$data = array(
			'title' => "Shop"
		);
		$this->load->view('v_shop', $data);
	}

	public function kategori($id_kategori)
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
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_kategori', $data);
			} else {
				$data = array(
					'title' => "Home",
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_kategori', $data);
			}
		} else {
			$data = array(
				'title' => "Home",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'datasayur' => $this->Mhome->getsayurbykategori($id_kategori)->result_array(),
				'datakategori' => $this->Mhome->getkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_kategori', $data);
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
					'title' => 'Detail Sayur',
					'datasayur' => $this->Mhome->detailsayur($where,'managemen_data_sayur')->result_array(),
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					// 'search' => $this->input->post('search'),
					'datasayur' => $this->Mhome->search($this->input->post('search'))->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => $totalcart,
					'kategori'   => $this->d_kategorisayur->tampil_kategori()->result_array(),
				);
				$this->load->view('v_home', $data);
			} else {
				$data = array(
					'title' => 'Detail Sayur',
					'datasayur' => $this->Mhome->detailsayur($where,'managemen_data_sayur')->result_array(),
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'slider' => $this->Mkonten->getslider_aktif()->result_array(),
					'datasayur' => $this->Mhome->search($this->input->post('search'))->result_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'carttotal' => 0,
					'kategori'   => $this->d_kategorisayur->tampil_kategori()->result_array(),
				);

				$this->load->view('v_detail_sayur', $data);
			}
		} else {
			$data = array(
				'title' => "Home",
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'slider' => $this->Mkonten->getslider_aktif()->result_array(),
				'datasayur' => $this->Mhome->search($this->input->post('search'))->result_array(),
				'datakategori' => $this->Mhome->getkategori()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_home', $data);
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

	public function profil()
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
					'title' => "Profil",
					'user' => $user,
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_profil', $data);
			} else {
				$data = array(
					'title' => "Profil",
					'user' => $user,
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_profil', $data);
			}
		} else {
			$data = array(
				'title' => "Profil",
				'user' => $user,
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'datasayur' => $this->Mhome->getallsayur()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_profil', $data);
		}
	}

	public function update_profile()
	{
		if (!$this->input->post('password')) {
			// $this->form_validation->set_rules('nama', 'Name', 'required|trim');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
			// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

			if ($this->form_validation->run() == false) {
				$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				if ($user) {
					$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
					if ($cart) {
						$totalcart = 0;
						foreach ($cart as $c) {
							$totalcart = $totalcart + $c['qty'];
						}

						$data = array(
							'title' => "Profil",
							'user' => $user,
							'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
							'datasayur' => $this->Mhome->getallsayur()->result_array(),
							'carttotal' => $totalcart,
						);
						$this->load->view('v_profil', $data);
					} else {
						$data = array(
							'title' => "Profil",
							'user' => $user,
							'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
							'datasayur' => $this->Mhome->getallsayur()->result_array(),
							'carttotal' => 0,
						);
						$this->load->view('v_profil', $data);
					}
				} else {
					$data = array(
						'title' => "Profil",
						'user' => $user,
						'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
						'datasayur' => $this->Mhome->getallsayur()->result_array(),
						'carttotal' => 0,
					);
					$this->load->view('v_profil', $data);
				}
			} else {
				date_default_timezone_set('Asia/Jakarta');
				$data = [
					'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
					'no_tlpn' => $this->input->post('no_tlpn'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'provinsi' => $this->input->post('provinsi'),
					'kode_pos' => $this->input->post('kode_pos'),

				];
				$this->db->where('id_user', $this->input->post('id_user'));
				$this->db->update('user', $data);
				$this->session->set_flashdata('message1', 'Update Berhasil!');
				redirect('home/profil');
			}
		} else {
			// $this->form_validation->set_rules('nama', 'Name', 'required|trim');
			$this->form_validation->set_rules('jenis_kelamin', 'Name', 'required|trim');
			// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
				'min_length' => 'Password telalu pendek minimal 6 karakter'
			]);
			if ($this->form_validation->run() == false) {
				$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				if ($user) {
					$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
					if ($cart) {
						$totalcart = 0;
						foreach ($cart as $c) {
							$totalcart = $totalcart + $c['qty'];
						}

						$data = array(
							'title' => "Profil",
							'user' => $user,
							'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
							'datasayur' => $this->Mhome->getallsayur()->result_array(),
							'carttotal' => $totalcart,
						);
						$this->load->view('v_profil', $data);
					} else {
						$data = array(
							'title' => "Profil",
							'user' => $user,
							'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
							'datasayur' => $this->Mhome->getallsayur()->result_array(),
							'carttotal' => 0,
						);
						$this->load->view('v_profil', $data);
					}
				} else {
					$data = array(
						'title' => "Profil",
						'user' => $user,
						'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
						'datasayur' => $this->Mhome->getallsayur()->result_array(),
						'carttotal' => 0,
					);
					$this->load->view('v_profil', $data);
				}
			} else {
				date_default_timezone_set('Asia/Jakarta');
				$data = [
					'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'password' => password_hash(
						$this->input->post('password'),
						PASSWORD_DEFAULT
					),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
					'tanggal_lahir' => $this->input->post('tanggal', true),
					'no_tlpn' => $this->input->post('no_tlpn'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'provinsi' => $this->input->post('provinsi'),
					'kode_pos' => $this->input->post('kode_pos'),
				];
				$this->db->where('id_user', $this->input->post('id_user'));
				$this->db->update('user', $data);
				$this->session->set_flashdata('message1', 'Update Berhasil!');
				redirect('home/profil');
			}
		}
	}

	public function update_foto_profile()
	{
		$foto_user        = $_FILES['foto']['name'];
		$id_user           = $this->input->post('id_user');
		if ($foto_user) {
			$config['upload_path']       = './assets/img/avatar';
			$config['allowed_types']     = 'jpg|jpeg|png|gif';
			$config['maintain_ratio']    = TRUE;
			$config['encrypt_name']     = TRUE;

			$this->load->library('image_lib', $config);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('message4', 'Update Foto Gagal!');
				redirect('home/profil');
			} else {
				$this->session->set_flashdata('message3', 'Update Foto Berhasil!');
				$item = $this->db->get_where('user', array('id_user' => $id_user))->row();
				if ($item->foto_user != 'default.jpg') {
					$target_file = './assets/img/avatar/' . $item->foto_user;
					unlink($target_file);
				}
				$foto_user = $this->upload->data('file_name');
			}

			$this->db->set('foto_user', $foto_user);
			$this->db->where('id_user', $id_user);
			$this->db->update('user');
			redirect('home/profil');
		}
	}

	public function pembayaran($id_order)
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$rek_pembayaran = "SELECT * FROM rek_pembayaran";
		$rek = $this->db->query($rek_pembayaran)->result_array();
		$id_user = $user['id_user'];
		$checkout = "SELECT * FROM `order`,rek_pembayaran WHERE order.bank = rek_pembayaran.id_rek AND
		id_user = $id_user AND id_order = $id_order ORDER BY id_order DESC LIMIT 1";
		$checkout2 = $this->db->query($checkout)->row_array();

		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($user) {
			$cart = $this->Mcart->show_cart($user['id_user'])->result_array();
			if ($cart) {
				$totalcart = 0;
				foreach ($cart as $c) {
					$totalcart = $totalcart + $c['qty'];
				}

				$data = array(
					'title' => "Pembayaran",
					'user' => $user,
					'rek' => $rek,
					'checkout' => $checkout2,
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'carttotal' => $totalcart,
				);
				$this->load->view('v_pembayaran', $data);
			} else {
				$data = array(
					'title' => "Pembayaran",
					'user' => $user,
					'rek' => $rek,
					'checkout' => $checkout2,
					'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
					'datakategori' => $this->Mhome->getkategori()->result_array(),
					'datasayur' => $this->Mhome->getallsayur()->result_array(),
					'carttotal' => 0,
				);
				$this->load->view('v_pembayaran', $data);
			}
		} else {
			$data = array(
				'title' => "Pembayaran",
				'user' => $user,
				'rek' => $rek,
				'checkout' => $checkout2,
				'profil_perusahaan' => $this->db->get('profile_perusahaan')->row_array(),
				'datakategori' => $this->Mhome->getkategori()->result_array(),
				'datasayur' => $this->Mhome->getallsayur()->result_array(),
				'carttotal' => 0,
			);
			$this->load->view('v_pembayaran', $data);
		}
	}

	public function checkout()
	{

		$this->form_validation->set_rules('id_user', 'Pembeli', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', 'Gagal Checkout');
			redirect('home/cart');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			// $data = [
			// 	'id_user' => htmlspecialchars($this->input->post('id_user', true)),
			// 	'waktu_order' => date('Y-m-d H:i:s'),
			// 	'total_belanja' => $this->input->post('grand', true),
			// 	'id_statuspembayaran' => 4
			// ];
			// $this->db->insert('orders', $data);
			$this->session->set_flashdata('message', 'Berhasil Checkout');

			redirect('home/pembayaran');
		}
	}
}
