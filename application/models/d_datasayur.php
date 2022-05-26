<?php

class D_datasayur extends CI_Model
{

    public function tampil_data()
    {
        // return $this->db->get('managemen_data_sayur');
        $query = "SELECT * FROM managemen_data_sayur WHERE Status in ('Y','N')";
        return $this->db->query($query);
    }

    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_data_edit_barang()
    {
        $query = "SELECT * FROM managemen_data_sayur WHERE Status in ('Y','N')";
        return $this->db->query($query);
    }
}
