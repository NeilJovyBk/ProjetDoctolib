<?php

require_once '/home/etu/temtsate/www/app/model/ModelPersonne.php';
require_once '/home/etu/temtsate/www/app/model/ModelRendezVous.php';

class ControllerPraticien {

    // Liste des disponibilites
    public static function readListeDispo() {
        $results = ModelRendezVous::getListeDispo($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewDispoPraticien.php';
        if (DEBUG){echo ("ControllerPraticien : readListeDispo : vue = $vue");}
        require($vue);
        
    }

    // Page pour récupérer les infos pour créer un RDV
    public static function rdvCreate() {
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsert.php';
        require($vue);
    }

    // Création du RDV
    public static function rdvCreated() {
         include 'config.php';
        $listeIdRDV = array();
        for ($i = 0; $i < $_GET['nbRdv']; $i++) {
            $listeIdRDV[] = ModelRendezVous::insert($_SESSION['id'], $_GET['rdv_date'].' à ' . (10+$i) . 'h00');
        }

        $results = array();
        foreach ($listeIdRDV as $unIdRDV) {
            $results[] = ModelRendezVous::getOne($unIdRDV);
        }

        $vue = $root . '/app/view/praticien/viewInserted.php';
        require($vue);
    }

    // Liste des RDV d'un praticien
    public static function readListeRDV() {
        include 'config.php';
        $results = ModelRendezVous::getListeRDV($_SESSION['id']);
        $vue = $root . '/app/view/praticien/viewRdv.php';
       require($vue);
    }

    // Liste des patients d'un praticien sans doublon 
    public static function readListeMesPatients() {
        $results = ModelRendezVous::getListeMesPatients($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewPatientPraticien.php';
        require($vue);
    }
    
    //listes de notes des rdvs
    public static function readNotesRdv(){
        $results = ModelRendezVous::getNotePatricien($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewPratricienNote.php';
        require($vue);
    }
}

?>
