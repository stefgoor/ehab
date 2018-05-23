<?php

class Contact_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $query = $this->db->get('ehab_contact');
        return $query->result();
    }
    
    function getContact()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('ehab_contact');	// genereert SELECT * FROM ehab_contact WHERE id = 1
        return $query->row();                           // 1 object
    }
}

?>