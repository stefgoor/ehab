<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('notation');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index() {
        $data['titel'] = 'Ehab eetcafé';
        
        $this->load->model('openingsuren_model');
        $data['openingsuren'] = $this->openingsuren_model->getAll();
        $data['currentUren'] = $this->openingsuren_model->getUrenWhereDag(getCurrentDagVanDeWeek());
        
        $this->load->model('contact_model');
        $data['contact'] = $this->contact_model->getContact();
        
        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAll();
        
        $this->load->model('categorie_model');
        $data['categorieenHome'] = $this->categorie_model->getAllForHome();
        
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'home',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }
    
}