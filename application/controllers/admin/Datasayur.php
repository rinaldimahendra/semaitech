<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasayur extends CI_Controller
{

	public function index()
	{
		// echo "test";
		$data = array(
			'title' => "Data Penjualan | Semaitech",
			'datasayur1' => $this->d_datasayur->tampil_data()->result(),
		);

		$this->load->view('admin/v_datasayur', $data);
	}

	public function tambah_aksi()
	{
		$nama            		= $this->input->post('nama');
		$kategori				= $this->input->post('kategori');
		$keterangan            	= $this->input->post('keterangan');
		$stok	           		= $this->input->post('stok');
		$harga            		= $this->input->post('harga');
		$status					= 'Y';
		$foto          			= $_FILES['foto']['name'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/img/sayur';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Foto Gagal diupload!";
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'Nama'       		=> $nama,
			'Kategori'			=> $kategori,
			'Keterangan'        => $keterangan,
			'Stok'       		=> $stok,
			'Harga'      		=> $harga,
			'Status'			=> $status,
			'Foto'            	=> $foto
		);

		$this->d_datasayur->tambah_produk($data, 'managemen_data_sayur');
		redirect('admin/Datasayur/index');
	}

	public function hapus($id)
	{
		$data = array(
			'Status'			=> 'D',
		);
		$where = array('Id' => $id);
		$this->d_datasayur->update_data($where, $data, 'managemen_data_sayur');
		redirect('admin/Datasayur/index');
	}

	public function edit($id)
	{
		$where = array('Id' => $id);
		$data = array(
			'title' => "Data Penjualan | Semaitech",
			'datasayur1' => $this->d_datasayur->edit_produk($where, 'managemen_data_sayur')->result(),
		);
		$this->load->view('admin/v_datasayur_edit', $data);
	}

	public function update()
	{
		$id                     = $this->input->post('id');
		$nama            		= $this->input->post('nama');
		$kategori				= $this->input->post('kategori');
		$keterangan            	= $this->input->post('keterangan');
		$stok	           		= $this->input->post('stok');
		$harga            		= $this->input->post('harga');
		$status					= $this->input->post('status');
		$foto          			= $_FILES['foto']['name'];

		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/img/sayur';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Foto Gagal diupload!";
			} else {
				$item = $this->db->get_where('managemen_data_sayur', array('Id' => $id))->row();
				$target_file = './assets/img/sayur/' . $item->Foto;
				unlink($target_file);
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'Nama'       		=> $nama,
			'Kategori'			=> $kategori,
			'Keterangan'        => $keterangan,
			'Stok'       		=> $stok,
			'Harga'      		=> $harga,
			'Status'			=> $status,
			'Foto'            	=> $foto
		);

		$where = array(
			'Id'         => $id
		);

		$this->d_datasayur->update_data($where, $data, 'managemen_data_sayur');
		redirect('admin/Datasayur/index');
	}

	public function edit_barang()
	{
		// echo "test";
		$data = array(
			'title' => "Data Penjualan | Semaitech",
			'datasayur1' => $this->d_datasayur->tampil_data_edit_barang()->result(),
		);

		$this->load->view('admin/v_datasayur_edit', $data);
	}
}
