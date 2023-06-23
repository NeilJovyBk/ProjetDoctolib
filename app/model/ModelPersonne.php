<?php

require_once '/home/etu/temtsate/www/app/model/Model.php';

class ModelPersonne {
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;
    const PERSONNE =- 1;

    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $login;
    private $password;
    private $statut;
    private $specialite_id;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
        }
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}

    public function getNom() {return $this->nom;}
    public function setNom($nom) {$this->nom = $nom;}

    public function getPrenom() {return $this->prenom;}
    public function setPrenom($prenom) {$this->prenom = $prenom;}

    public function getAdresse() {return $this->adresse;}
    public function setAdresse($adresse) {$this->adresse = $adresse;}

    public function getLogin() {return $this->login;}
    public function setLogin($login) {$this->login = $login;}

    public function getPassword() {return $this->password;}
    public function setPassword($password) {$this->password = $password;}

    public function getStatut() {return $this->statut;}
    public function setStatut($statut) {$this->statut = $statut;}

    public function getIdSpecialite() {return $this->specialite_id;}
    public function setIdSpecialite($specialite_id) {$this->specialite_id = $specialite_id;}

    // Liste des praticiens avec leur spécialité
    public static function getPraticiensAvecSpecialite() {
        try {
            $query = 'SELECT p.id, nom, prenom, adresse, s.label FROM PERSONNE p,SPECIALITE s WHERE s.id=specialite_id and p.statut = 1';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();

            $cols = array();
            for ($i = 0; $i < $statement->columnCount(); $i++) {
                array_push($cols,$statement->getColumnMeta($i)['name']);
            }

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols, $results);
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Nombre de praticiens par patient
    public static function getNbPraticiensParPatient() {
        try {
            $query = 'SELECT prenom, nom, COUNT(DISTINCT praticien_id) AS nbPraticiens FROM RENDEZVOUS INNER JOIN PERSONNE ON RENDEZVOUS.patient_id = PERSONNE.id WHERE patient_id <> 0 GROUP BY patient_id ORDER BY nom';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des personnes appartenant à un certain statut
    public static function getAllPersonnesStatut($statut) {
        try {
            $query = 'SELECT * FROM PERSONNE WHERE statut = :statut ORDER BY id;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'statut' => $statut
            ]);           
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Get ALL
    public static function getAll() {
        try {
            $query = 'SELECT * FROM PERSONNE';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    //Methode pour le testConnexion
    public static function testConnexion ($login, $password) {
try {
$database = Model::getInstance () ;
$query = "SELECT id, nom, prenom, login, statut FROM PERSONNE WHERE login = :login AND password = :password";
$statement = $database->prepare ($query) ;
$statement->execute ([
'login' => $login,
'password' => $password
]);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
return $results;
} catch (PDOException $e) {
printf ("8s - 8s<p/>\n", $e->getCode() , $e->getMessage());
return NULL;
}
    }   
    
    // Get one
    public static function getOne($id) {
        try {
            $query = 'SELECT * FROM PERSONNE WHERE id= :id';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $statement->setFetchMode(PDO::FETCH_CLASS, 'ModelPersonne');
            $results = $statement->fetch();
            if (!$results) {
                return false;
            }
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insert
    public static function insert($nom, $prenom, $adresse, $login, $password, $statut, $specialite_id) {
        try {
            $query = 'SELECT MAX(id) FROM PERSONNE';
            $statement = Model::getInstance()->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = 'INSERT INTO PERSONNE VALUE (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite_id' => $specialite_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}

?>
