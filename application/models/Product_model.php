<?php

class Product_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('ehab_product');
        return $query->row();
    }
    
    function getWithCategorie($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('ehab_product');
        
        $product = $query->row();

        $this->load->model('categorie_model');

        $product->categorie = $this->categorie_model->get($product->categorieId);
    
        return $product;
    }

    function getAllByNaam() {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('ehab_product');
        return $query->result();
    }

    function getAllByNaamWithCategorie() {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('ehab_product');
        $producten = $query->result();

        $this->load->model('categorie_model');

        foreach ($producten as $product) {
            $product->categorie = $this->categorie_model->get($product->categorieId);
        }
        return $producten;
    }

    function getAllByNaamWhereCategorie($categorieId) {
        $this->db->where('categorieId', $categorieId);
        $this->db->where('zichtbaar', 1);
        $this->db->order_by('prijsgroot', 'asc');
        $query = $this->db->get('ehab_product');
        return $query->result();
    }

    function getProductenInKarretje($karretje) {
        $producten = array();
        foreach ($karretje as $id => $aantal) {
            $producten[$id] = $this->get($id);
        }
        return $producten;
    }

    function getNextByNederlandseNaam($aantal, $startRow) {
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product', $aantal, $startRow);
        return $query->result();
    }

    function getNextByNederlandseNaamWithCategorie($aantal, $startRow) {

        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product', $aantal, $startRow);
        $producten = $query->result();

        $this->load->model('categorie_model');

        foreach ($producten as $product) {
            $product->categorie = $this->categorie_model->get($product->categorieId);
        }
        return $producten;
    }

    function getCountAll() {
        return $this->db->count_all('shop_product');
    }

    function getAllJoinLeverancier() {
        $this->db->select('*, shop_product.id as productId');
        $this->db->from('shop_product');
        $this->db->join('shop_leverancier', 'shop_leverancier.id = shop_product.leverancierId');
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllWhereInBestellingIsNotNull() {
        $this->db->where('inBestelling !=', 0);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('shop_product');
        return $query->result();
    }

    function registreerBestelling($id) {
        $this->db->where('id', $id);
        $this->db->set('voorraad', 'voorraad + inBestelling', false);
        $this->db->set('inBestelling', 0, false);
        $this->db->update('shop_product');
    }

    function insert($product) {
        $this->db->insert('ehab_product', $product);
        return $this->db->insert_id();
    }

    function update($product) {
        $this->db->where('id', $product->id);
        $this->db->update('ehab_product', $product);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('ehab_product');
    }

}

?>