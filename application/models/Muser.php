<?php
class Muser extends CI_Model {
    public function getalldata()
    {
        $query = "SELECT *
        FROM user
        ";

        return $this->db->query($query);
    }   
}