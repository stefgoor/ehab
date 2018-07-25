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
    
    function getUrenWhereDag($dagVanDeWeek){
        $this->db->where('id', $dagVanDeWeek);
        $query = $this->db->get('ehab_openingsuren');
        return $query->row();
    }
}

?>