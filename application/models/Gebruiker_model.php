<?php

class Gebruiker_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        // geef gebruiker-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('ehab_gebruiker');
        return $query->row();
    }
    
    function getGebruiker($naam, $wachtwoord) {
        $this->db->where('naam', $naam);
        $this->db->where('geactiveerd', 1);
        $query = $this->db->get('ehab_gebruiker');

        if ($query->num_rows() == 1) {
            $gebruiker = $query->row();

            if (password_verify($wachtwoord, $gebruiker->wachtwoord)) {
                return $gebruiker;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
        function voegToe($naam, $wachtwoord) {
        // voeg nieuwe gebruker toe
        $gebruiker = new stdClass();
        $gebruiker->naam = $naam;
        $gebruiker->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $gebruiker->type = 1;
        $gebruiker->geactiveerd = 1;
        $this->db->insert('ehab_gebruiker', $gebruiker);
        return $this->db->insert_id();
    }

}

?>