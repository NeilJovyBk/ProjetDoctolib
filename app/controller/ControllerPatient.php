<?php

require_once '/home/etu/temtsate/www/app/model/ModelPersonne.php';
require_once '/home/etu/temtsate/www/app/model/ModelRendezVous.php';

class ControllerPatient {

    // Affichage des infos du compte
    public static function readInfosMonCompte() {
        $results = ModelPersonne::getOne($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInfoPatient.php';
        if (DEBUG){echo ("ControllerPatient : readInfosMonCompte : vue = $vue");}
        require($vue);
    }

    // Liste des RDV d'un patient
    public static function readListeRDVPatients() {
        $results = ModelRendezVous::getListeRDVduPatient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdv.php';
        require($vue);
    }

    // Prendre un RDV avec un praticien (selection de l'id)
    public static function createRDVavecPraticien() {
        $lesPraticiens = ModelPersonne::getAllPersonnesStatut(ModelPersonne::PRATICIEN);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertid.php';
        require($vue);
    }

    // Prendre un RDV avec un praticien (selection de la date)
    public static function createRDVavecPraticienForm2() {
        $results = ModelRendezVous::getListeDispo($_GET['idPraticien']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsertdate.php';
        require($vue);
    }

    // Mise à jour du RDV pour mettre l'idPatient dans le RDV
    public static function createdRDVavecPraticien() {
        $results = ModelRendezVous::update($_GET['idRendezvous'], $_SESSION['id']);
        include 'config.php';
        if ($results) {
            $leRDV = ModelRendezVous::getOne($_GET['idRendezvous']);
            $lePraticien = ModelPersonne::getOne($leRDV->getPraticienId());
        }
        
        $vue = $root . '/app/view/patient/viewUpdated.php';
        require($vue);
    }
    
    // noter un Rdv
    public static function noterUnRdv() {
        $results = ModelRendezVous::getListeRDVduPatient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewNoteRdv.php';
        require($vue);
    }
    
    public static function noterUnRdv2() {
        $idRendezVous=$_GET['idRendezVous'];
        $noteVal=$_GET['noteVal'];
        ModelRendezVous::updateNote($idRendezVous,$noteVal);
        $rdv=ModelRendezVous::getOne($idRendezVous);
        $lePraticien= ModelPersonne::getOne($rdv->getPraticienId());
        include 'config.php';
        $vue = $root . '/app/view/patient/viewNotedRdv.php';
        require($vue);
    }
}

?>
