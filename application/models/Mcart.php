<?php
class Mcart extends CI_Model {

    public function cek_cart($id_sayur, $id_user)
    {
        $query = "SELECT *
        FROM keranjang
        WHERE id_sayur = $id_sayur AND id_user = $id_user";
        return $this->db->query($query);
    }

    public function show_cart($id_user){
        $query = "SELECT qty
        FROM keranjang
        WHERE keranjang.id_user = $id_user";
        return $this->db->query($query);
    }

    public function getcart($id_user){
        $query = "SELECT *
        FROM keranjang, managemen_data_sayur, user
        WHERE keranjang.id_user = $id_user AND Id = id_sayur
        GROUP BY id_keranjang";
        return $this->db->query($query);
    }

    public function get_keranjang_byid($id_keranjang)
    {
        $query = "SELECT *
        FROM keranjang
        WHERE id_keranjang = $id_keranjang";
        return $this->db->query($query);
    }
}