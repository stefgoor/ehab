<?php

class Bezorgtijd_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $query = $this->db->get('ehab_bezorgtijd');
        return $query->result();
    }
}

?>