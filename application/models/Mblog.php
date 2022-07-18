<?php
class Mblog extends CI_Model {

    var $table_konten = 'blog_data'; //nama tabel dari database
    var $join = 'user'; //nama tabel dari database
    var $column_order_konten = array('judul', 'status'); //field yang ada di table
    var $column_search_konten = array('judul'); //field yang diizin untuk pencarian
    var $order_konten = array('judul' => 'asc'); // default order

    public function post($slug){
        $this->db->where('slug', $slug);
        $query = $this->db->get($this->table_konten);
        return $query->row();
    }
    
    public function allpost(){
        $this->db->where('status', 1);
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get($this->table_konten);
        return $query->result_array();
    }

    public function allpostby($idkategori){
        $this->db->where('status', 1);
        $this->db->like('kategori', $idkategori, 'both'); 
        $this->db->order_by('id_blog', 'desc');
        $query = $this->db->get($this->table_konten);
        return $query->result_array();
    }
    
    public function kategori(){
        $this->db->where('status_kategoriblog', 'Y');
        $this->db->order_by('nama_kategoriblog', 'asc');
        $query = $this->db->get('kategori_blog');
        return $query->result();
    }

    public function firstLatePost(){
        //random
        $this->db->where('status', 1);
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get($this->table_konten);
        return $query->row();
    }

    public function konten_add($foto)
    {
        if (!isset($_POST['draft'])) {
            $status = 1;
        } else {
            $status = 2;
        }
        
        date_default_timezone_set('Asia/Jakarta');
        $kategori = implode(',', $_POST['kategori']); 
        $slug = strtolower(url_title($this->input->post('judul')));
        $data = array(
            'judul' => htmlspecialchars($this->input->post('judul'), ENT_QUOTES),
            'isi_konten' => htmlspecialchars($this->input->post('isi'), ENT_QUOTES),
            'sumber' => htmlspecialchars($this->input->post('sumber'), ENT_QUOTES),
            'slug' => htmlspecialchars($slug, ENT_QUOTES), 
            'foto' => htmlspecialchars($foto, ENT_QUOTES), 
            'kategori' => htmlspecialchars($kategori, ENT_QUOTES), 
            'status' => htmlspecialchars($status, ENT_QUOTES),
            'penulis' => $this->session->userdata('id_user'),
            'tanggal_dibuat' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('blog_data', $data);
    }

    public function konten_update($foto)
    {
        if (!isset($_POST['draft'])) {
            $status = 1;
        } else {
            $status = 2;
        }

        date_default_timezone_set('Asia/Jakarta');
        $kategori = implode(',', $_POST['kategori']); 
        $slug = strtolower(url_title($this->input->post('judul')));
        $id = htmlspecialchars($this->input->post('id'), ENT_QUOTES);
        $data = array(
            'judul' => htmlspecialchars($this->input->post('judul'), ENT_QUOTES),
            'isi_konten' => htmlspecialchars($this->input->post('isi'), ENT_QUOTES),
            'sumber' => htmlspecialchars($this->input->post('sumber'), ENT_QUOTES),
            'slug' => htmlspecialchars($slug, ENT_QUOTES), 
            'foto' => htmlspecialchars($foto, ENT_QUOTES), 
            'kategori' => htmlspecialchars($kategori, ENT_QUOTES), 
            'status' => htmlspecialchars($status, ENT_QUOTES),
            'penulis' => $this->session->userdata('id_user'),
            'tanggal_dibuat' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_blog', $id);
        return $this->db->update('blog_data', $data);
    }

    public function get_konten($id)
    {
        $this->db->from($this->table_konten);
        $this->db->where('id_blog', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function konten_data()
    {
        $this->_get_konten_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_konten_query()
    {
        $this->db->select('blog_data.*, user.nama_user as nama_penulis');
        $this->db->from($this->table_konten);
        $this->db->join('user', 'user.id_user = blog_data.penulis');
        $i = 0;
        foreach ($this->column_search_konten as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) // looping awal
                {
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_konten[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order_konten;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_konten_filtered()
    {
        $this->_get_kategori_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_konten()
    {
        $this->db->from($this->table_konten);
        return $this->db->count_all_results();
    }

    public function konten_delete($id)
    {
        // unlink();
        $this->db->where('id_blog', $id);
        $result = $this->db->delete($this->table_konten);
        return $result;
    }

    //PENULIS BLOG
    public function penulis($idpenulis){
        $this->db->where('id_user', $idpenulis);
        $result = $this->db->get('user');
        return $result->row()->nama_user;
    }

    public function late_post_exclude($id){
        $this->db->where('status', 1);
        $this->db->where_not_in('id_blog', $id);
        $this->db->limit(3);
        $this->db->order_by('rand()');
        $result = $this->db->get($this->table_konten);
        return $result->result();
    }

    public function format_tanggal($Tgal,$jam="yes",$idBahasa = 'id'){
		if($Tgal == ""){
			return;
		}
		$tanggal = explode(' ',$Tgal);
		$mdy=explode('-',$tanggal[0]);
		$mBul=$mdy[1];
		
		if($idBahasa == "id"){
	
		    if($mBul=='01'){$isBulan='Januari';}elseif($mBul=='02'){$isBulan='Februari';}
		    elseif($mBul=='03'){$isBulan='Maret';}elseif($mBul=='04'){$isBulan='April';}
		    elseif($mBul=='05'){$isBulan='Mei';}elseif($mBul=='06'){$isBulan='Juni';}
		    elseif($mBul=='07'){$isBulan='Juli';}elseif($mBul=='08'){$isBulan='Agustus';}
		    elseif($mBul=='09'){$isBulan='September';}elseif($mBul=='10'){$isBulan='Oktober';}
		    elseif($mBul=='11'){$isBulan='November';}elseif($mBul=='12'){$isBulan='Desember';}
		    elseif($mBul=='00'){$isBulan='00';}
		    
		    $hasil = $mdy[2].' '.$isBulan.' '.$mdy[0];
		    if(count($tanggal) == 2) {
			if($jam == "yes"){
			    $hasil = $mdy[2].' '.$isBulan.' '.$mdy[0]. ' '. substr($tanggal[1],0,5);
			}else{
			    $hasil = $mdy[2].' '.$isBulan.' '.$mdy[0];
			}
		    }
		    
		}
		return $hasil;
	}

    //KATEGORI BLOG
    var $table = 'kategori_blog'; //nama tabel dari database
    var $column_order = array('nama_kategoriblog', 'status_kategoriblog'); //field yang ada di table
    var $column_search = array('nama_kategoriblog'); //field yang diizin untuk pencarian
    var $order = array('nama_kategoriblog' => 'asc'); // default order

    public function kategori_data()
    {
        $this->_get_kategori_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kategori_IN($id, $return)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where_in('id_kategoriblog', explode(',', $id));
        $query = $this->db->get();
        if($return == 'data'){
            return $query->result();
        }else{
            $kategori='';
            foreach($query->result() as $kt){
                $kategori.='<a href="'.base_url('blog/kategori/'.$kt->id_kategoriblog).'" class="entry-meta meta-0 mr-2"><span class="post-in bg-warning text-white font-x-small">'.$kt->nama_kategoriblog.'</span></a>';
            }
            return $kategori;
        }
    }

    public function kategori_add()
    {
        $data = array(
            'nama_kategori' => htmlspecialchars($this->security->xss_clean($this->input->post('kategori')), ENT_QUOTES),
            'status' => htmlspecialchars($this->security->xss_clean($this->input->post('status')), ENT_QUOTES),
        );
        return $this->db->insert($this->table, $data);
    }

    public function kategori_update()
    {
        $id = htmlspecialchars($this->security->xss_clean($this->input->post('id')), ENT_QUOTES);
        $data = array(
            'nama_kategori' => htmlspecialchars($this->security->xss_clean($this->input->post('kategori')), ENT_QUOTES),
            'status' => htmlspecialchars($this->security->xss_clean($this->input->post('status')), ENT_QUOTES),
        );
        $this->db->where('id_kategori', $id);
        return $this->db->update($this->table, $data);
    }

    public function kategori_delete($id)
    {
        $query="SELECT kategori FROM blog_data WHERE kategori LIKE '%$id%'";
        $result = $this->db->query($query)->result();
        $arr = '';
        foreach($result as $r){
            $arr.= $r->kategori.',';
        }
        
        $str = rtrim($arr,',');
        $array = explode(',', $str);

        if(array_search($id, $array) != ''){
            return 'gagal';
        }else{
            $this->db->where('id_kategori', $id);
            $this->db->delete($this->table);
            return 'sukses';
        }
    }

    private function _get_kategori_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) // looping awal
                {
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_kategori_filtered()
    {
        $this->_get_kategori_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kategori()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_kategori(){
        return $this->db->get_where('kategori_blog', ['status_kategoriblog' => 'Y'])->result();
    }
}