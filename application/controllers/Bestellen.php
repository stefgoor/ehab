    <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bestellen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('notation');
        $this->load->helper('form');
        $this->load->library('session');
    }
    
    public function index() {
        $data['titel'] = 'Ehab eetcafé | Bestel';
        
        $this->load->model('product_model');
        $karretje = $this->haalOpKarretje();
        $data['karretje'] = $karretje;
        
        $this->load->model('categorie_model');
        $data['categorieen'] = $this->categorie_model->getAllByNaamWithProducten();
         $data['producten'] = $this->product_model->getProductenInKarretje($karretje);
        
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'bestel_1');
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
        
        //toevoegen aan karretje
        //controleren op groot of klein product
        if($type == 1){
            //klein product
            $karretje[$id.'Klein'] = $karretje[$id.'Klein'] + $aantal;
        }
        elseif($type == 2) {
            //groot product
            $karretje[$id.'Groot'] = $karretje[$id.'Groot'] + $aantal;
        }
        
        //karretje updaten en terug sturen
        $this->session->set_userdata('karretje', $karretje);
        redirect('bestellen/');
    }

    public function maakLeeg() {
        $this->session->unset_userdata('karretje');

        redirect('bestellen/');
    }
    
    public function verwijder($id){
        $karretje = $this->haalOpKarretje();
          
        if(isset($karretje[$id])){
            if ($karretje[$id] > 1) {
                --$karretje[$id];
            }
            else{
                unset($karretje[$id]); 
            }
            
            $this->session->set_userdata('karretje', $karretje);
        }
        
        redirect('bestellen/'); 
        
    }
    
    public function haalAjaxOp_Winkelmand() {
        $id = $this->input->get('id');
        $aantal = $this->input->get('aantal');
        $this->load->view("ajax/ajax_winkelmandje", $data);
    }
    
    public function haalAjaxOp_Winkelmandje() {
        
        $this->load->view("ajax/ajax_winkelmandje", $data);
    }

}