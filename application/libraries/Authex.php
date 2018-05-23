<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authex {

    public function __construct() {
        $CI = & get_instance();

        $CI->load->model('gebruiker_model');
    }

    function activeer($id) {
        // nieuwe gebruiker activeren
        $CI = & get_instance();

        $CI->gebruiker_model->activeer($id);
    }

    function getGebruikerInfo() {
        // geef gebruiker-object als gebruiker aangemeld is
        $CI = & get_instance();

        if (!$this->isAangemeld()) {
            return null;
        } else {
            $id = $CI->session->userdata('gebruiker_id');
            return $CI->gebruiker_model->get($id);
        }
    }

    function isAangemeld() {
        // gebruiker is aangemeld als sessievariabele gebruiker_id bestaat
        $CI = & get_instance();

        if ($CI->session->has_userdata('gebruiker_id')) {
            return true;
        } else {
            return false;
        }
    }

    function meldAan($naam, $wachtwoord) {
        // gebruiker aanmelden met opgegeven email en wachtwoord
        $CI = & get_instance();

        $gebruiker = $CI->gebruiker_model->getGebruiker($naam, $wachtwoord);

        if ($gebruiker == null) {
            return false;
        } else {

            $CI->session->set_userdata('gebruiker_id', $gebruiker->id);
            return true;
        }
    }

    function meldAf() {
        // afmelden, dus sessievariabele wegdoen
        $CI = & get_instance();

        $CI->session->unset_userdata('gebruiker_id');
    }

    function registreer($naam, $wachtwoord) {
        // nieuwe gebruiker registreren als email nog niet bestaat
        $CI = & get_instance();

            $id = $CI->gebruiker_model->voegToe($naam, $wachtwoord);
            return $id;

    } 
    

}
