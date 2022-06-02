<?php
class Mhome extends CI_Model {

    public function getallsayur()
    {
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga 
        FROM managemen_data_sayur, kategori_sayur
        where Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y'
        ";
        return $this->db->query($query);
    }
}