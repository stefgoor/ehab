<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('notation');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index() {
        if (!$this->authex->isAangemeld()) {
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        redirect('dashboard/bestellingen');
    }

//   
//  BESTELLINGEN
//   

    public function bestellingen() {
        if (!$this->authex->isAangemeld()) {
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $data['titel'] = 'Ehab eetcafé | Dashboard - Bestellingen';

        $this->load->model('bestelling_model');
        $data['bestellingenNieuw'] = $this->bestelling_model->getAllWhereStatusWithBetaalmethodeEnBezorgmethode(1);
        $data['bestellingenBezig'] = $this->bestelling_model->getAllWhereStatusWithBetaalmethodeEnBezorgmethode(2);
        $data['bestellingenOud'] = $this->bestelling_model->getAllWhereStatusWithBetaalmethodeEnBezorgmethode(3);

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_bestellingen',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

//   
//  STATISTIEKEN
//   

    public function statistieken() {
        if (!$this->authex->isAangemeld()) {
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        
        $data['titel'] = 'Ehab eetcafé | Dashboard - Statistieken';

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_statistieken',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

//   
//  PRODUCTEN
//    

    public function producten() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        
        $data['titel'] = 'Ehab eetcafé | Dashboard - Producten';

        $this->load->model('product_model');
        $data['producten'] = $this->product_model->getAllByNaamWithCategorie();

        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAllByNaam();

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_producten',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    function getEmptyProduct() {
        $product = new stdClass();

        $product->id = 0;
        $product->naam = '';
        $product->beschrijving = '';
        $product->categorieId = 0;
        $product->prijsklein = '';
        $product->prijsgroot = '';
        $product->vegetarisch = 1;
        $product->zichtbaar = 1;

        return $product;
    }

    public function verwijderProduct() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $id = $this->input->post('id');
        $this->load->model('product_model');
        $data['product'] = $this->product_model->delete($id);

        redirect('/dashboard/producten');
    }

    public function registreerProduct() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $product = new stdClass();

        $product->id = $this->input->post('id');
        $product->naam = $this->input->post('naam');
        $product->beschrijving = $this->input->post('beschrijving');
        $product->categorieId = $this->input->post('categorieId');
        if ($this->input->post('prijsklein') != 0) {
            $product->prijsklein = zetOmNaarPunt($this->input->post('prijsklein'));
        }
        $product->prijsgroot = zetOmNaarPunt($this->input->post('prijsgroot'));
        $product->vegetarisch = $this->input->post('vegetarisch');
        $product->zichtbaar = $this->input->post('zichtbaar');

        $this->load->model('product_model');
        if ($product->id == 0) {
            $this->product_model->insert($product);
        } else {
            $this->product_model->update($product);
        }

        redirect('/dashboard/producten');
    }

    public function haalAjaxOp_Product() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $id = $this->input->get('id');

        if ($id == 0) {
            $data['product'] = $this->getEmptyProduct();
        } else {
            $this->load->model('product_model');
            $data['product'] = $this->product_model->getWithCategorie($id);
        }
        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAllByNaam();

        $this->load->view("ajax/ajax_product", $data);
    }

    public function haalAjaxOp_Producten() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $soortId = $this->input->get('categorie');

        $this->load->model('product_model');
        $data['productenBijCategorie'] = $this->product_model->getAllByNaamWhereCategorie($categorieId);

        $this->load->view('ajax/ajax_producten', $data);
    }

    public function haalAjaxOp_ProductVerwijder() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $id = $this->input->get('id');

        $this->load->model('product_model');
        $data['product'] = $this->product_model->getWithCategorie($id);

        $this->load->view("ajax/ajax_productVerwijder", $data);
    }

    //
    //  CATEGORIEEN
    //
    
    public function categorieen() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        
        $data['titel'] = 'Ehab eetcafé | Dashboard - Categorieën';

        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAllByNaamWithProducten();

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_categorieen',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    function getEmptyCategorie() {
        $categorie = new stdClass();

        $categorie->id = 0;
        $categorie->naam = '';
        $categorie->beschrijving = '';
        $categorie->foto = '';
        $categorie->heeftSaus = 0;
        $categorie->opstartpagina = 0;
        $categorie->zichtbaar = 0;

        return $categorie;
    }

    public function verwijderCategorie($id) {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $this->load->model('categorie_model');

        //TODO Controleer dat er geen artikels meer onder de categorie zit voor het verwijderen
        //$data['categorie'] = $this->categorie_model->delete($id);

        redirect('/dashboard/categorien');
    }

    public function registreerCategorie() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $categorie = new stdClass();

        $categorie->id = $this->input->post('id');
        $categorie->naam = $this->input->post('naam');
        $categorie->beschrijving = $this->input->post('beschrijving');
        //$categorie->foto = '';
        $categorie->heeftSaus = $this->input->post('saus');
        $categorie->opstartpagina = $this->input->post('startpagina');
        $categorie->zichtbaar = $this->input->post('zichtbaar');

        $this->load->model('categorie_model');
        if ($categorie->id == 0) {
            $this->categorie_model->insert($categorie);
        } else {
            $this->categorie_model->update($categorie);
        }

        redirect('/dashboard/categorieen');
    }

    public function haalAjaxOp_Categorie() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $id = $this->input->get('id');

        if ($id == 0) {
            $data['categorie'] = $this->getEmptyCategorie();
        } else {
            $this->load->model('categorie_model');
            $data['categorie'] = $this->categorie_model->get($id);
        }

        $this->load->view("ajax/ajax_categorie", $data);
    }

    public function haalAjaxOp_CategorieVerwijder() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $id = $this->input->get('id');

        $this->load->model('categorie_model');
        $data['categorie'] = $this->categorie_model->get($id);

        $this->load->view("ajax/ajax_categorieVerwijder", $data);
    }

    //
    //  GEGEVENS
    //
    
    public function gegevens() {
        if (!$this->authex->isAangemeld()){
            //redirect('dashboard/aanmelden');
        }
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        
        $data['titel'] = 'Ehab eetcafé | Dashboard - Gegevens';

        $this->load->model('contact_model');
        $this->load->model('openingsuren_model');
        $this->load->model('openingsuren_model');

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_gegevens',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    //
    // INLOGGEN
    //
    
    public function aanmelden() {
        if ($this->authex->isAangemeld()){
            //redirect('dashboard/index');
        }

        $data['titel'] = 'Aanmelden';
        $data['fout'] = '';

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_login',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function toonFout() {
        $data['titel'] = 'Fout';
        $data['fout'] = 'Foute inlog gegevens!';
        
        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_login',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function controleerAanmelden() {
        $naam = $this->input->post('naam');
        $wachtwoord = $this->input->post('wachtwoord');

        if ($this->authex->meldAan($naam, $wachtwoord)) {
            redirect('dashboard/index');
        } else {
            redirect('dashboard/toonFout');
        }
    }

    public function meldAf() {
        $this->authex->meldAf();
        redirect('home/index');
    }
   
    
    public function registreer() {
        // Ophalen ingevulde gegevens
        $wachtwoord = $this->input->post('wachtwoord');
        $naam = $this->input->post('naam');

        // Controleren van gegevens
        if (strlen($naam) > 2 && strlen($wachtwoord)) {
            $returnwaardeVanMethode = $this->authex->registreer($naam, $wachtwoord);
//            if ($returnwaardeVanMethode == 0) {
//                // Toon foutmelding dat email bestaat
//                redirect('gebruiker/toonMeldingEmailBestaatAl');
//            } else {
//                // Toon dat registreren gelukt is
//                redirect('gebruiker/toonMeldingRegistratieOK/' . $returnwaardeVanMethode);
//            }
        } else {
            // Toon foutmelding dat gegevens niet juist zijn ingevuld
//            redirect('gebruiker/toonMeldingRegistratieNOK');
        }
        
        redirect('dashboard/admin');
    }
    
    //
    // ADMIN
    //
    
    public function admin() {
//        if (!$this->authex->isAangemeld()){
//            redirect('dashboard/aanmelden');
//        }
//        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        
        $data['titel'] = 'Ehab eetcafé | Dashboard - Admin';

        $this->load->model('gebruiker_model');

        $partials = array('hoofding' => 'dashboard_nav',
            'inhoud' => 'dashboard_admin',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

}
