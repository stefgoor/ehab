<?php

class Bestelling_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('ehab_bestelling');
        return $query->row();
    }

    function getAll() {
        $query = $this->db->get('ehab_bestelling');
        return $query->result();
    }

    function getAllWhereStatusWithBetaalmethodeEnBezorgmethode($status) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', $status);
        $query = $this->db->get('ehab_bestelling');

        $bestellingen = $query->result();
        $this->load->model('bezorgmethode_model');
        $this->load->model('betaalmethode_model');
        $this->load->model('gemeente_model');


        foreach ($bestellingen as $bestelling) {
            $bestelling->bezorgmethode = $this->bezorgmethode_model->get($bestelling->bezorgmethodeId);
            $bestelling->betaalmethode = $this->betaalmethode_model->get($bestelling->betaalmethodeId);
            $bestelling->gemeente = $this->gemeente_model->get($bestelling->gemeenteId);
        }
        
        return $bestellingen;
    }

    function insert($categorie) {
        $this->db->insert('ehab_categorie', $categorie);
        return $this->db->insert_id();
    }

    function update($categorie) {
        $this->db->where('id', $categorie->id);
        $this->db->update('ehab_categorie', $categorie);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('ehab_categorie');
    }

}

?>