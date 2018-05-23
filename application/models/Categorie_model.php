<?php

class Categorie_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('ehab_categorie');
        return $query->row();
    }

    function getAll() {
        $query = $this->db->get('ehab_categorie');
        return $query->result();
    }

    function getAllForHome() {
        $this->db->where('opstartpagina', 1);
        $query = $this->db->get('ehab_categorie');
        return $query->result();
    }

    function getAllByNaam() {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('ehab_categorie');
        return $query->result();
    }

    function getAllByNaamWithProducten() {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('ehab_categorie');
        $categories = $query->result();

        $this->load->model('product_model');

        foreach ($categories as $categorie) {
            $categorie->producten = $this->product_model->getAllByNaamWhereCategorie($categorie->id);
        }
        return $categories;
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