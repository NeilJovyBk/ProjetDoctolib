<?php
require_once '/home/etu/temtsate/www/app/model/ModelPersonne.php';
require_once '/home/etu/temtsate/www/app/model/ModelSpecialite.php';

class ControllerAdministrateur {
    
    // liste des specialites
    public static function specialiteReadAll() { 
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAll.php';
        if (DEBUG){echo ("ControllerAdministrateur : specialiteReadAll : vue = $vue");}
        require($vue);
    }
     // selection d'une specialite
    public static function specialiteReadId() {
        $results = ModelSpecialite::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/admin/viewId.php';
        require($vue);
    }

    public static function specialiteReadOne() {
        $results = ModelSpecialite::getOne($_GET['id']);
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAll.php';
        require($vue);
    }
     //insertion d'une nouvelle specialite
    public static function specialiteCreate() {
        include 'config.php';
       $vue = $root . '/app/view/admin/viewInsert.php';
       require($vue);
    }

    public static function specialiteCreated() {
        $results = ModelSpecialite::insert(htmlspecialchars($_GET['label']));
        include 'config.php';
        $vue = $root . '/app/view/admin/viewInserted.php';
        require($vue);
    }
    // Liste des praticiens avec leur spécialité
    public static function administrateurReadPraticiensAvecSpecialite() {
        $results = ModelPersonne::getPraticiensAvecSpecialite();
        include 'config.php';
         $vue = $root . '/app/view/admin/viewspecialitePraticien.php';
         require($vue);
    }

    // Nombre de praticiens par patient
    public static function administrateurReadNbPraticiensParPatient() {
        $results = ModelPersonne::getNbPraticiensParPatient();
        include 'config.php';
        $vue = $root . '/app/view/admin/viewnbrePraticienPatient.php';
        require($vue);
    }

    // Page des infos de toutes les tables
    public static function administrateurReadInfos() {
        $listeSpecialites = ModelSpecialite::getAll();
        $listeAdministrateurs = ModelPersonne::getAllPersonnesStatut(ModelPersonne::ADMINISTRATEUR);
        $listePraticiens = ModelPersonne::getAllPersonnesStatut(ModelPersonne::PRATICIEN);
        $listePatients = ModelPersonne::getAllPersonnesStatut(ModelPersonne::PATIENT);
        $listeRdv = ModelRendezvous::getAll();
        include 'config.php';
       $vue = $root . '/app/view/admin/viewInfos.php';
       require($vue);
    }
    
    public static function getNotePraticien() {
       $lesPraticiens = ModelPersonne::getAllPersonnesStatut(ModelPersonne::PRATICIEN);
       include 'config.php';
       $vue = $root . '/app/view/admin/viewSelectPatricien.php';
       require($vue); 
    }
    public static function getNotePraticien2() {
       $results = ModelRendezVous::getNotePatricien($_GET['idPraticien']);
       include 'config.php';
       $vue = $root . '/app/view/praticien/viewPratricienNote.php';
       require($vue);
    }
}

?>
