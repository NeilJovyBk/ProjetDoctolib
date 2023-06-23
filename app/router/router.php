<?php

require '/home/etu/temtsate/www/app/controller/config.php';
require '/home/etu/temtsate/www/app/controller/ControllerConnexionInnovation.php';
require '/home/etu/temtsate/www/app/controller/ControllerAdministrateur.php';
require '/home/etu/temtsate/www/app/controller/ControllerPraticien.php';
require '/home/etu/temtsate/www/app/controller/ControllerPatient.php';

// Initialisation d'une session PHP
session_start();

// Récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// Fonction parse_str permet de construire une table de hachage (clé + valeur)
parse_str($query_string, $args);

// $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($args['action']);

// On supprime l'élément action de la structure
unset($args['action']);


// Méthodes autorisées
switch ($action) {
 case "specialiteReadAll" :
 case "specialiteReadId" :
 case "specialiteReadOne" :
 case "specialiteCreate" :
 case "specialiteCreated" :
 case "administrateurReadPraticiensAvecSpecialite" : 
 case "administrateurReadNbPraticiensParPatient" :
 case "administrateurReadInfos" : 
 case "getNotePraticien" :
 case "getNotePraticien2" :
  ControllerAdministrateur::$action($args);
  break;

 case "readInfosMonCompte":
 case "readListeRDVPatients":
 case "createRDVavecPraticien":
 case "createRDVavecPraticienForm2":
 case "createdRDVavecPraticien":
 case "noterUnRdv":
 case "noterUnRdv2":
     ControllerPatient::$action($args);
     break;
 
 case "readListeDispo":
 case "rdvCreate":
 case "rdvCreated":
 case "readListeRDV":
 case "readListeMesPatients":
 case "readNotesRdv" :
     ControllerPraticien::$action($args);
     break;
 
 case "doctolibAccueil":
 case "doctolibPropositionFonctionnaliteOriginale":
 case "doctolibPropositionAmelioMVC":
 case "doctolibConnect":
 case "doctolibConnected":
 case "doctolibRegister":
 case "doctolibRegistered":
 case "doctolibDisconnect":    
     
     ControllerConnexionInnovation::$action($args);
     break;
 
 // Tache par défaut
 default:
    $action = 'doctolibAccueil';
    ControllerConnexionInnovation::$action();
}
?>
