<?php
require_once '/home/etu/temtsate/www/app/model/ModelPersonne.php';
require_once '/home/etu/temtsate/www/app/model/ModelSpecialite.php';
require_once '/home/etu/temtsate/www/app/model/ModelRendezVous.php';
//fonction de securite
    
    $nom = $prenom = $adresse = $login = $password = $statut = $idSpecialite ='';
    function securisation($donnees){
        $donnees = trim($donnees); //supprimer les caracteres invisible telsques les espaces 
        $donnees = stripcslashes($donnees); //Supprimer les anti slash etc...
        $donnees = strip_tags($donnees);  //supprime les balises htlm, php
        return $donnees;
    }

class ControllerConnexionInnovation {
    
    // Page d'acceuil
    public static function doctolibAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewDoctolibAccueil.php';
        if (DEBUG){echo ("ControllerConnexionInnovation : doctolibAccueil : vue = $vue");}
        require($vue);
    }

    // Page de présentation de la proposition de fonctionnalité originale
    public static function doctolibPropositionFonctionnaliteOriginale() {
        include 'config.php';
        $vue = $root . '/public/documentation/propositionFoncOriginale.php';
        require($vue);
    }

    // Page de présentation de l'amélioration du code MVC
    public static function doctolibPropositionAmelioMVC() {
        include 'config.php';
        $vue = $root . '/public/documentation/propositionAmelioMVC.php';
        require($vue);
    }

    // Page de connexion
    public static function doctolibConnect() {
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewDoctolibConnect.php';
        require($vue);
    }

    // Connexion au compte
    public static function doctolibConnected() {
    $login = filter_input (INPUT_GET,'login',FILTER_SANITIZE_STRING);
    $password = filter_input (INPUT_GET,'password',FILTER_SANITIZE_STRING);
    $results = ModelPersonne::testConnexion ($login,$password);
    if (!(empty($results))) {
      $_SESSION['id'] = $results [0] ['id'];
      $_SESSION['nom'] = $results [0] ['nom'];
      $_SESSION['prenom'] = $results [0] ['prenom'];
      $_SESSION['login'] = $results [0] ['login'];
      $_SESSION['statut'] = $results [0] ['statut'];

//Construction chemin de la vue

include 'config.php';
$vue = $root . '/app/view/connexion/viewDoctolibAccueil.php';
require ($vue);
} else {
include 'config.php';
$vue = $root . '/app/view/connexion/viewDoctolibConnect.php';
require ($vue);
    }
    
    }
    
    // Page pour récupérer les infos pour créer un compte
    public static function doctolibRegister() {
        $lesSpecialites = ModelSpecialite::getAll();
         include 'config.php';
        $vue = $root . '/app/view/connexion/viewDoctolibRegister.php';
         require($vue);
    }
    
    // Création du compte
    public static function doctolibRegistered() {
        include 'config.php';
        ModelPersonne::insert(
            $nom = securisation($_GET['nom']),
            $prenom = securisation($_GET['prenom']),
            $adresse = securisation($_GET['adresse']),
            $login = securisation($_GET['login']),
            $password = securisation($_GET['password']),
            $statut = securisation($_GET['statut']),
            $idSpecialite = securisation($_GET['idSpecialite'])
        );

        $vue = $root . '/app/view/connexion/viewDoctolibConnect.php';
        require($vue);
    }

    // Se déconnecter
    public static function doctolibDisconnect() {
        $_SESSION['id'] = 0;
        $_SESSION['nom'] = '';
        $_SESSION['prenom'] = '';
        $_SESSION['login'] = '';
        $_SESSION['statut'] = ModelPersonne::PERSONNE;
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewDoctolibAccueil.php';
        if (DEBUG){echo ("ControllerConnexionInnovation : doctolibAccueil : vue = $vue");}
        require($vue);
    }
}

?>


