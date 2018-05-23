<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('notation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index() {
        $data['titel'] = 'Ehab eetcafé | Menu';

        $this->load->model('product_model');
        //$data['karretje'] = $this->haalOpKarretje();

        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAllByNaamWithProducten();
        //$data['producten'] = $this->product_model->getProductenInKarretje($karretje);

        $this->load->model('saus_model');
        $data['sauzen'] = $this->saus_model->getAll();

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'menu',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    private function haalOpKarretje() {
        if (!$this->session->has_userdata('karretje')) {
            return array();
        } else {
            return $this->session->userdata('karretje');
        }
    }

    public function voegToe($id) {
        $karretje = $this->haalOpKarretje();
        $aantal = $this->input->post('aantal' . $id);
        $type = $this->input->post('type');
        $saus = $this->input->post('saus');

//        //toevoegen aan karretje
//        if ($type == 1) {
//            $karretje[$id . 'Klein'] = $karretje[$id . 'Klein'] + array(
//                "$saus" => array(
//                    'aantal' => $aantal
//                )
//            );
//        } elseif ($type == 2) {
//            $karretje[$id . 'Groot'] = $karretje[$id . 'Groot'] + array(
//                "$saus" => array(
//                    'aantal' => $aantal
//                )
//            );
//        }
        //controleren op groot of klein product
        if ($type == 1) {
            //klein product
            //$karretje[$id.'Klein'][$saus] = $karretje[$id.'Klein'][$saus] + $aantal;

            $karretje[$id . 'Klein'] = $karretje[$id . 'Klein'] + $aantal;
        } elseif ($type == 2) {
            //groot product
            //$karretje[$id.'Groot'][$saus] = $karretje[$id.'Groot'][$saus] + $aantal;

            $karretje[$id . 'Groot'] = $karretje[$id . 'Groot'] + $aantal;
        }
        //karretje updaten en terug sturen
        $this->session->set_userdata('karretje', $karretje);
        redirect('menu/');
    }

    public function voegEnkelToe($id_type) {
        $karretje = $this->haalOpKarretje();

        $waardes = explode("_", $id_type);

        $id = $waardes[0];
        $type = $waardes[1];

        //controleren op groot of klein product
        if ($type == 1) {
            //klein product
            $karretje[$id] += 1;
        } elseif ($type == 2) {
            //groot product
            $karretje[$id] += 1;
        }
        //karretje updaten en terug sturen
        $this->session->set_userdata('karretje', $karretje);
        redirect('menu/');
    }



    // haalt het volledig winkelmandje op
    public function haalAjaxOp_Winkelmandje() {
        $this->load->model('product_model');
        $data['karretje'] = $this->haalOpKarretje();
        $karretje = $data['karretje'];

        $data['producten'] = $this->product_model->getProductenInKarretje($karretje);

        $this->load->view("ajax/ajax_winkelmandje", $data);
    }
    
    // maak winkelmandje leeg
    public function haalAjaxOp_Winkelmandje_MaakLeeg() {
        $this->session->unset_userdata('karretje');
    }
    
    // haalt het volledig winkelmandje op
    public function haalAjaxOp_Winkelmandje_VoegToe() {
        $id = $this->input->get('formData');

        //controleren op groot of klein product
        if ($type == 1) {
            //klein product
            //$karretje[$id.'Klein'][$saus] = $karretje[$id.'Klein'][$saus] + $aantal;

            $karretje[$id . 'Klein'] = $karretje[$id . 'Klein'] + $aantal;
        } elseif ($type == 2) {
            //groot product
            //$karretje[$id.'Groot'][$saus] = $karretje[$id.'Groot'][$saus] + $aantal;

            $karretje[$id . 'Groot'] = $karretje[$id . 'Groot'] + $aantal;
        }
        //karretje updaten en terug sturen
        $this->session->set_userdata('karretje', $karretje);
    }
    
    //Verwijder alles van een product
    public function haalAjaxOp_Winkelmandje_Verwijder() {
        $id = $this->input->get('id');
        $karretje = $this->haalOpKarretje();

        unset($karretje[$id]);

        $this->session->set_userdata('karretje', $karretje);
    }
    
    //Verhoogt het aantal een product
    public function haalAjaxOp_Winkelmandje_Verhoog() {
        $id_type = $this->input->get('id');
        $karretje = $this->haalOpKarretje();

        $waardes = explode("_", $id_type);

        $id = $waardes[0];
        $type = $waardes[1];

        //controleren op groot of klein product
        if ($type == 1) {
            //klein product
            $karretje[$id] += 1;
        } elseif ($type == 2) {
            //groot product
            $karretje[$id] += 1;
        }
        //karretje updaten en terug sturen
        $this->session->set_userdata('karretje', $karretje);
    }
    
    //Verlaagt het aantal een product
    public function haalAjaxOp_Winkelmandje_Verlaag() {
        $id = $this->input->get('id');
        $karretje = $this->haalOpKarretje();

        if (isset($karretje[$id])) {
            if ($karretje[$id] > 1) {
                --$karretje[$id];
            } else {
                unset($karretje[$id]);
            }

            $this->session->set_userdata('karretje', $karretje);
        }
    }
}
