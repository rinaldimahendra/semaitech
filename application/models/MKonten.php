<?php
class Mkonten extends CI_Model {

    public function getallslider(){
        $query = "SELECT *
        FROM slider
        WHERE status_slider in ('Y','N')
        ";
        return $this->db->query($query);
    }

    public function getslider_aktif(){
        $query = "SELECT *
        FROM slider
        WHERE status_slider = 'Y'
        ";
        return $this->db->query($query);
    }

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