<?php
class Mrekening extends CI_Model {

    public function getallrek(){
        $query = "SELECT *
        FROM rek_pembayaran
        WHERE status_rek in ('Y','N')
        ";
        return $this->db->query($query);
    }

    // public function getrek_aktif(){
    //     $query = "SELECT *
    //     FROM rek_pembayaran
    //     WHERE status_rek = 'Y'
    //     ";
    //     return $this->db->query($query);
    // }

    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}