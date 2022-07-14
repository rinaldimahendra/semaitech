<?php
class D_kategoriblog extends CI_Model {

    public function getallblog(){
        $query = "SELECT *
        FROM kategori_blog
        WHERE status_kategoriblog in ('Y','N')
        ";
        return $this->db->query($query);
    }

    public function getblog_aktif(){
        $query = "SELECT *
        FROM kategori_blog
        WHERE status_kategoriblog = 'Y'
        ";
        return $this->db->query($query);
    }

    public function tambah_blog($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_blog($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tambah_kategori(){
        $query = "SELECT *
        FROM kategori_blog
        WHERE status_kategoriblog = 'Y'
        ";
        return $this->db->query($query);
    }
    
    public function edit_kategoriblog($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}