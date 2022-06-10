<?php
class Mhome extends CI_Model {

    public function getallsayur()
    {
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga 
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y'
        ";
        return $this->db->query($query);
    }

    public function getallkategori(){
        $query = "SELECT Nama_Kategori, Id_Kategori
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status_Kategori = 'Y'
        ";
        return $this->db->query($query);
    }

    public function getsayurbykategori($id_kategori){
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga 
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y' AND Id_Kategori = $id_kategori
        ";
        return $this->db->query($query);
    }
}