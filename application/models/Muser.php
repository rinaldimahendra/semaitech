<?php
class Muser extends CI_Model {
    public function getalldata()
    {
        $query = "SELECT *
        FROM user
        ";

        return $this->db->query($query);
    }

    public function getdatauser($id_user)
    {
        $query = "SELECT *
        FROM user, tb_kota, tb_provinsi
        WHERE id_user = $id_user AND tb_kota.kota_id = kota AND tb_provinsi.provinsi_id = provinsi
        ";
        return $this->db->query($query);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Khusus Dashboard
    public function total_produk()
    {
        $query = "SELECT Id
        FROM managemen_data_sayur
        WHERE Status = 'Y'
        ";
        return $this->db->query($query);
    }

    public function total_order()
    {
        $query = "SELECT id_order
        FROM `order`
        ";
        return $this->db->query($query);
    }

    public function total_pemasukan()
    {
        $query = "SELECT SUM(grandtotal) AS total
        FROM `order`
        ";
        return $this->db->query($query);
    }
}