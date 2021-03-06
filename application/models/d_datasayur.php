<?php

class D_datasayur extends CI_Model
{

    public function tampil_data()
    {
        // return $this->db->get('managemen_data_sayur');
        $query = "SELECT * FROM managemen_data_sayur, kategori_sayur WHERE Status in ('Y','N') AND Kategori = Id_Kategori";
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

    public function update_status($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function tampil_data_edit_barang()
    {
        $query = "SELECT * FROM managemen_data_sayur WHERE Status in ('Y','N')";
        return $this->db->query($query);
    }

    public function detailpesanan($id){
        $query = "SELECT *
        FROM managemen_data_sayur, `order`, detail_order, user
        WHERE order.id_order = detail_order.id_order AND user.id_user = order.id_user
        AND detail_order.id_sayur = managemen_data_sayur.Id AND order.id_order = $id";
        return $this->db->query($query);
    }

    public function order($id){
        $query = "SELECT *, order.alamat AS alamat_kirim, order.kota AS kota_kirim, order.provinsi AS provinsi_kirim,
        order.kode_pos AS kode_pos_kirim
        FROM `order`, detail_order, user, rek_pembayaran
        WHERE order.id_order = detail_order.id_order AND user.id_user = order.id_user
        AND rek_pembayaran.id_rek = bank AND order.id_order = $id";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_MenungguVerifikasiADMIN($id){
        $query = "SELECT *
        FROM user, `order`
        WHERE user.id_user = order.id_user AND order.status = 1
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_DikemasADMIN($id){
        $query = "SELECT *
        FROM user, `order`
        WHERE user.id_user = order.id_user AND order.status = 2
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_DikirimADMIN($id){
        $query = "SELECT *
        FROM user, `order`
        WHERE user.id_user = order.id_user AND order.status = 3
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_SelesaiADMIN($id){
        $query = "SELECT *
        FROM user, `order`
        WHERE user.id_user = order.id_user AND order.status = 4
        ";
        return $this->db->query($query);
    }
}
