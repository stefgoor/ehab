<?php

class Openingsuren_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $query = $this->db->get('ehab_openingsuren');
        return $query->result();
    }
}

?>