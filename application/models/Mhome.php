<?php
class Mhome extends CI_Model
{

    public function getallsayur()
    {
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga, satuan 
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y'
        ";
        return $this->db->query($query);
    }

    public function getallkategori()
    {
        $query = "SELECT Nama_Kategori, Id_Kategori
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status_Kategori = 'Y'
        ";
        return $this->db->query($query);
    }

    public function getkategori()
    {
        $query = "SELECT Nama_Kategori, Id_Kategori
        FROM kategori_sayur
        WHERE Status_Kategori = 'Y'
        ";
        return $this->db->query($query);
    }

    public function getsayurbykategori($id_kategori)
    {
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga, satuan 
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y' AND Id_Kategori = $id_kategori
        ";
        return $this->db->query($query);
    }

    function search($search)
    {
        $query = "SELECT Id, Foto, Nama, Nama_Kategori, Keterangan, Stok, Harga, satuan 
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Status = 'Y'
        AND (Nama LIKE '%$search%' OR Nama_Kategori LIKE '%$search%' OR Keterangan LIKE '%$search%')
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_MenungguVerifikasi($id)
    {
        $query = "SELECT *
        FROM user, `order`
        WHERE order.id_user = $id
        AND user.id_user = order.id_user AND order.status = 1
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_Dikemas($id)
    {
        $query = "SELECT *
        FROM user, `order`
        WHERE order.id_user = $id
        AND user.id_user = order.id_user AND order.status = 2
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_Dikirim($id)
    {
        $query = "SELECT *
        FROM user, `order`
        WHERE order.id_user = $id
        AND user.id_user = order.id_user AND order.status = 3
        ";
        return $this->db->query($query);
    }

    public function getRiwayatPesanan_Selesai($id)
    {
        $query = "SELECT *
        FROM user, `order`
        WHERE order.id_user = $id
        AND user.id_user = order.id_user AND order.status = 4
        ";
        return $this->db->query($query);
    }

    public function detailsayur($where)
    {
        $query = "SELECT Id, Foto, Nama, Keterangan, Stok, Harga, Nama_Kategori, Id_Kategori
        FROM managemen_data_sayur, kategori_sayur
        WHERE Kategori = Id_Kategori AND Stok > 0 AND Id = $where
        ";
        return $this->db->query($query);
    }

}
