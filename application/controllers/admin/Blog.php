<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mblog');
    }

    public function index() {
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
				$data = array(
					'title' => "Blog | Semaitech",
                    'js'    =>array("blog_konten.js?r=" . rand())
				);
				
				$this->load->view('admin/v_blog_konten', $data);
			}
		}		
	}

    public function create()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            if ($user['id_role'] == 2) {
                redirect('home');
            } else {
				$data = array(
					'title' => "Tambah Blog | Semaitech",
                    'js' => array("blog_create.js?r=" . rand()),
                    'kategori' => $this->Mblog->get_kategori(),
                    
				);
				
				$this->load->view('admin/v_blog_create', $data);
			}
		}
    }

    public function create_()
    {
        $upload = $_FILES['foto']['name'];
        if ($upload) {
            $nmfile = date('YmdHis');
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '2024';
            $config['upload_path'] = './assets/blog';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">' . $error['error'] . '</div>');
                redirect('admin/blog/create');
            } else {
                $fileupload = $this->upload->data();
                $filename = pathinfo($fileupload['full_path']);
                $foto = base_url('assets/blog/' . $filename['basename']);
            }
        } else {
            $foto = null;
        }

        $result = $this->Mblog->konten_add($foto);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">Konten Blog berhasil ditambahkan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">Error!</div>');
        }
        redirect('admin/blog/');
    }

    public function edit($id)
    {
        $cekid = $this->db->get_where('blog_data', ['id_blog' => $id])->num_rows();
        if ($cekid > 0) {
            $data['title'] = "Edit Blog | Semaitech";
            // $data['profil'] = $this->db->get('profile_perusahaan')->row();
            $data['js'] = array("blog_edit.js?r=" . rand());
            $data['konten'] = $this->Mblog->get_konten($id);
            $data['kategori'] = $this->Mblog->get_kategori();
            $data['selected'] = $data['konten']->kategori;

            $this->load->view('admin/v_blog_edit', $data);
        } else {
            echo 'Error 404 Not Found';
            die;
        }
    }

    public function update_()
    {
        $upload = $_FILES['foto']['name'];
        if ($upload) {
            //unlink file sebelumnya
            $src = $this->input->post('foto_');
            $file_name = str_replace(base_url(), '', $src);
            unlink($file_name);

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '2024';
            $config['upload_path'] = './assets/blog';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">' . $error['error'] . '</div>');
                redirect('admin/blog/create');
            } else {
                $fileupload = $this->upload->data();
                $filename = pathinfo($fileupload['full_path']);
                $foto = base_url('assets/blog/' . $filename['basename']);
            }
        } else {
            $foto = $this->input->post('foto_');
        }

        $result = $this->Mblog->konten_update($foto);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-success" role="alert">Konten Blog berhasil di Update!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">Error!</div>');
        }
        redirect('admin/blog/');
    }

    function upload_image()
    {
        if ($_FILES["image"]["name"]) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '2024';
            $config['upload_path'] = './assets/blog/img-konten';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', '<div class="alert tutup alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/blog/create');
            } else {
                $fileupload = $this->upload->data();
                $filename = pathinfo($fileupload['full_path']);
                echo base_url('assets/blog/img-konten/' . $filename['basename']);
            }
        }
    }

    public function konten_()
    {
        $list = $this->Mblog->konten_data();
        $data = array();
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->judul . '<br>' . $this->Mblog->get_kategori_IN($field->kategori, 'html') . '<br><i class="fas fa-user-circle"></i> ' . $field->nama_penulis . ', ' . $this->Mblog->format_tanggal($field->tanggal_dibuat);
            $row[] = ($field->status == 1) ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-secondary">Draft</span>';
            $row[] = '<a href="' . base_url('admin/blog/edit/' . $field->id_blog) . '" class="btn btn-info btn-sm">Edit</a>
                      <button type="button" class="ml-1 btn btn-danger delete btn-sm" data-id="' . $field->id_blog . '" data-judul="' . $field->judul . '">Hapus</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mblog->count_all_konten(),
            "recordsFiltered" => $this->Mblog->count_konten_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function konten_delete($id)
    {   
        $cekid = $this->db->get_where('blog_data', ['id_blog' => $id]);
        if ($cekid->num_rows() == 0) {
            echo 'Error';
            die;
        } else {
            //unlink file sebelumnya
            $src = $cekid->row()->foto;
            $file_name = str_replace(base_url(), '', $src);
            unlink($file_name);

            if ($this->Mblog->konten_delete($id)) {
                $r['title'] = 'Sukses!';
                $r['icon'] = 'success';
                $r['status'] = 'Berhasil di Hapus!';
            } else {
                $r['title'] = 'Maaf!';
                $r['icon'] = 'error';
                $r['status'] = '<br><b>Tidak dapat di Hapus! <br> Silakan hubungi Administrator.</b>';
            }
            echo json_encode($r);
        }
    }

    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
   
}