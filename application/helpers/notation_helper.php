<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// databasedatum in juiste formaat zetten (van yyyy-mm-dd naar dd/mm/jjjj)

function zetOmNaarDDMMYYYY($input) {
    if ($input == "") {
        return "";
    } else {
        $datum = explode("-", $input);
        return $datum[2] . "/" . $datum[1] . "/" . $datum[0];
    }
}

function zetOmNaarDDMMYYYYHHMM($input) {
    if ($input == "") {
        return "";
    } else {
        $inputSplits = explode(" ", $input);
        $datum = explode("-", $inputSplits[0]);
        return $datum[2] . "/" . $datum[1] . "/" . $datum[0] . " " . zetOmNaarHHMM($inputSplits[1]);
    }
}

// ingegeven datum in formaat van database plaatsen (van dd/mm/jjjj naar yyyy-mm-dd)

function zetOmNaarYYYYMMDD($input) {
    if ($input == "") {
        return "";
    } else {
        $datum = explode("/", $input);
        return $datum[2] . "-" . $datum[1] . "-" . $datum[0];
    }
}

// database decimaal getal tonen met komma (van 999.99 naar 999,99)

function zetOmNaarKomma($input) {
    if ($input == "") {
        return "";
    } else {
        $getal = explode(".", $input);
        if (count($getal) == 2) {
            return $getal[0] . ',' . $getal[1];
        } else {
            return $getal[0];
        }
    }
}

// ingegeven decimaal getal omzetten in databaseformaat (van 999,99 naar 999.99)

function zetOmNaarPunt($input) {
    if ($input == "") {
        return "";
    } else {
        $getal = explode(",", $input);
        if (count($getal) == 2) {
            return $getal[0] . '.' . $getal[1];
        } else {
            return $getal[0];
        }
    }
}

function zetOmNaarHHMM($input) {
    if ($input == "") {
        return "";
    } else {
        $uur = explode(":", $input);
        return $uur[0] . ":" . $uur[1];
    }
}

function zetOmNaarHHMMSS($input) {
    if ($input == "") {
        return "";
    } else {
        $uur = explode(":", $input);
        return $uur[0] . ":" . $uur[1] . ":00";
    }
}

function verwijderSpatie($input) {
    if ($input == "") {
        return "";
    } else {
        $output = str_replace('\'', ' ', $input);
        return str_replace(' ', '_', $output);
    }
}

function getTypeProduct($input) {
    if ($input == "") {
        return "";
    } else {
        $type = 0;
        //haal alle nummers eruit
        $output = preg_replace('/[0-9]+/', '', $input);
        if ($output == "Klein") {
            $type = 1;
        } elseif ($output == "Groot") {
            $type = 2;
        }
        return $type;
    }
}

function getTotaalPrijs($karretje) {
    if ($karretje == "") {
        return "";
    } else {
        $totaalPrijs = 0;
        foreach ($karretje as $id => $aantal) {
            $productPrijs = $categorieen->$producten[$id]->prijsklein;
        }
    }
}

function getCurrentTime() {
    date_default_timezone_set("Europe/Brussels");
    return date("H:i:s");
}

function getCurrentDate() {
    date_default_timezone_set("Europe/Brussels");
    $date = getdate();
    return $date;
}

/* End of file notation_helper.php */
/* Location: helpers/notation_helper.php */