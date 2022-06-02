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

    public function get_keranjang($id_user)
    {
        $query = "SELECT keranjang_merchandise.*, foto_merchandise.*, merchandise.id_merch, merchandise.nama_merch, merchandise.stock, merchandise.harga, merchandise.diskon, merchandise.is_deliver
        FROM keranjang_merchandise, user, merchandise, foto_merchandise
        WHERE user.id_user = keranjang_merchandise.id_user AND keranjang_merchandise.id_user = $id_user AND merchandise.id_merch = keranjang_merchandise.id_merchandise AND foto_merchandise.id = merchandise.foto_utama";
        return $this->db->query($query);
    }
}