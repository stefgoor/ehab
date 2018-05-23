<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gebruiker extends CI_Controller {

    // +----------------------------------------------------------
    // | TV Shop
    // +----------------------------------------------------------
    // | 2ITF - 201x-201x
    // +----------------------------------------------------------
    // | User Controller
    // |
    // +----------------------------------------------------------
    // | Thomas More
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function maakGebruiker() {
        $data['titel'] = 'Registreren';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker_nieuw',
            'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }

    private function stuurMail($geadresseerde, $boodschap, $titel) {
        $this->load->library('email');

        $this->email->from('xxx@gmail.com', 'xxx');
        $this->email->to($geadresseerde);
        $this->email->cc('yyy');
        $this->email->subject($titel);
        $this->email->message($boodschap);

        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
            return false;
        } else {
            return true;
        }
    }

    public function registreer() {
        // Ophalen ingevulde gegevens
        $wachtwoord = $this->input->post('wachtwoord');
        $naam = $this->input->post('naam');
        $email = $this->input->post('email');
        // Controleren van email
        $bevatApenstaart = false;
        if (strpos($email, '@') !== false) {
            $bevatApenstaart = true;
        }

        // Controleren van gegevens
        if (strlen($naam) > 2 && strlen($wachtwoord) > 3 && $bevatApenstaart) {
            $returnwaardeVanMethode = $this->authex->registreer($naam, $email, $wachtwoord);
            if ($returnwaardeVanMethode == 0) {
                // Toon foutmelding dat email bestaat
                redirect('gebruiker/toonMeldingEmailBestaatAl');
            } else {
                // Toon dat registreren gelukt is
                redirect('gebruiker/toonMeldingRegistratieOK/' . $returnwaardeVanMethode);
            }
        } else {
            // Toon foutmelding dat gegevens niet juist zijn ingevuld
            redirect('gebruiker/toonMeldingRegistratieNOK');
        }
    }

    public function activeer($id) {
        
    }

    public function toonMelding($titel, $boodschap, $link = null) {
        $data['titel'] = $titel;
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['boodschap'] = $boodschap;
        $data['link'] = $link;

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker_melding',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function toonMeldingRegistratieNOK() {
        $this->toonMelding("Fout", "Gelieve alle tekstvakken correct in te vullen!", array('url' => '/gebruiker/maakGebruiker', 'tekst' => 'Terug'));
    }

    public function toonMeldingEmailBestaatAl() {
        $this->toonMelding("Fout", "Email bestaat reeds. Probeer opnieuw!", array('url' => '/gebruiker/maakGebruiker', 'tekst' => 'Terug'));
    }

    public function toonMeldingRegistratieOK($nieuweGebruikerId) {
        $this->toonMelding("Registreren", "Gebruiker werd aangemaakt. Je kan hieronder de gebruiker activeren. <br> <br> (Aangezien de mail niet werkt "
                . "kan je hieronder activeren. De ID wordt wel weergegeven in de URL dus dit is geen goede oplossing.", array('url' => '/gebruiker/activeer/' . $nieuweGebruikerId, 'tekst' => 'Activeer gebruiker'));
    }

}

/* End of file User.php */
/* Location: ./applications/tvshop/controllers/User.php */
