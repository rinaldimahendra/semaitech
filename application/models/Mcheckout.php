<?php

class Mcheckout extends CI_Model
{

    public function Add()
    {
        // $query = "INSERT INTO order (nama, alamat, provinsi, kota, kode_pos, no_tlp) SELECT nama_user, alamat, provinsi, kota, kode_pos, no_tlp FROM user";
        return $this->db->get_where('order');
        // return $this->db->query($query);
    }

    public function tambah_order($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_detail_order($data, $table)
    {
        $this->db->insert($table, $data);
    }
    
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}