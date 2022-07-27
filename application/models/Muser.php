<?php
class Muser extends CI_Model {
    public function getalldata()
    {
        $query = "SELECT *
        FROM user
        ";

        return $this->db->query($query);
    }

    public function getdatauser($email)
    {
        $query = "SELECT *
        FROM user, tb_kota, tb_provinsi
        WHERE email = $email AND kota_id = kota AND provinsi_id = provinsi
        ";

        return $this->db->query($query);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}