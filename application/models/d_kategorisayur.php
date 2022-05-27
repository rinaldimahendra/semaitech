<?php

class D_kategorisayur extends CI_Model
{
    public function tampil_data1()
    {
        // return $this->db->get('managemen_data_sayur');
        $query = "SELECT * FROM kategori_sayur WHERE Status_Kategori in ('Y','N')";
        return $this->db->query($query);
    }

    public function tampil_kategori()
    {
        $query = "SELECT * FROM kategori_sayur WHERE Status_Kategori = 'Y'";
        return $this->db->query($query);
    }

    public function tambah_produk1($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data1($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_produk1($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data1($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_data_edit_barang1()
    {
        $query = "SELECT * FROM kategori_sayur WHERE Status_Kategori in ('Y','N')";
        return $this->db->query($query);
    }
}
