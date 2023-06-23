<?php

require_once '/home/etu/temtsate/www/app/model/Model.php';

class ModelRendezVous {
    private $idRendezvous;
    private $patient_id;
    private $praticien_id;
    private $rdv_date;
    private $note;

    public function __construct($idRendezvous = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL, $note = NULL) {
        if (!is_null($idRendezvous)) {
            $this->idRendezvous = $idRendezvous;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
            $this->note = $note;
        }
    }

    public function getIdRendezvous() {return $this->idRendezvous;}
    public function setIdRendezvous($idRendezvous) {$this->idRendezvous = $idRendezvous;}

    public function getPatientId() {return $this->patient_id;}
    public function setPatientId($patient_id) {$this->patient_id = $patient_id;}

    public function getPraticienId() {return $this->praticien_id;}
    public function setPraticienId($praticien_id) {$this->praticien_id = $praticien_id;}

    public function getDateRDV() {return $this->rdv_date;}
    public function setDateRDV($rdv_date) {$this->rdv_date = $rdv_date;}
    
    public function getNote() {return $this->note;}
    public function setNote($note) {$this->note = $note;}

    // Liste des RDV disponibles pour un praticien
    public static function getListeDispo($idPraticien) {
        try {
            $query = 'SELECT id, rdv_date FROM RENDEZVOUS WHERE praticien_id = :idPraticien AND patient_id = 0;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPraticien' => $idPraticien
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insert
    public static function insert($idPraticien, $rdv_date) {
        try {
            $query = 'SELECT MAX(id) FROM RENDEZVOUS';
            $statement = Model::getInstance()->query($query);
            $tuple = $statement->fetch();
            $idRendezvous = $tuple['0'];
            $idRendezvous++;

            $query = 'INSERT INTO RENDEZVOUS VALUE (:idRendezvous, 0, :idPraticien, :rdv_date, NULL)';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idRendezvous' => $idRendezvous,
                'idPraticien' => $idPraticien,
                'rdv_date' => $rdv_date
            ]);
            return $idRendezvous;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Update de l'ID patient
    public static function update($idRendezvous, $idPatient) {
        try {
            $query = 'UPDATE RENDEZVOUS SET patient_id = :idPatient WHERE id = :idRendezvous;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPatient' => $idPatient,
                'idRendezvous' => $idRendezvous
            ]);
            return 1;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return 0;
        }
    }

    // Get 1
    public static function getOne($idRendezvous) {
        try {
            $query = 'SELECT * FROM RENDEZVOUS WHERE id = :idRendezvous';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idRendezvous' => $idRendezvous
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelRendezVous');
            if (!$results) {
                return null;
            }
         print_r($results);
            return $results[0];
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Get ALL
    public static function getAll() {
        try {
            $query = 'SELECT * FROM RENDEZVOUS;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelRendezVous');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV d'un praticien
    public static function getListeRDV($idPraticien) {
        try {
            $query = 'SELECT PERSONNE.nom, PERSONNE.prenom, RENDEZVOUS.rdv_date FROM RENDEZVOUS INNER JOIN PERSONNE ON RENDEZVOUS.patient_id = PERSONNE.id WHERE RENDEZVOUS.praticien_id = :idPraticien AND patient_id != 0;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPraticien' => $idPraticien
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des patients (sans doublon) d'un praticien
    public static function getListeMesPatients($idPraticien) {
        try {
            $query = 'SELECT DISTINCT PERSONNE.nom, PERSONNE.prenom, PERSONNE.adresse FROM RENDEZVOUS INNER JOIN PERSONNE ON RENDEZVOUS.patient_id = PERSONNE.id WHERE RENDEZVOUS.praticien_id = :idPraticien AND patient_id != 0;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPraticien' => $idPraticien
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV d'un patient
    public static function getListeRDVduPatient($idPatient) {
        try {
            $query = 'SELECT RENDEZVOUS.id, PERSONNE.nom, PERSONNE.prenom, RENDEZVOUS.rdv_date FROM RENDEZVOUS INNER JOIN PERSONNE ON RENDEZVOUS.praticien_id = PERSONNE.id WHERE RENDEZVOUS.patient_id = :idPatient;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPatient' => $idPatient
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // note des rvd d'un praticien
    public static function getNotePatricien($idPraticien) {
        try {
            $query = 'SELECT patient_id,rdv_date,note from RENDEZVOUS where praticien_id= :idPraticien and patient_id !=0';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'idPraticien' => $idPraticien
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Ajouter une note
    public static function updateNote($idRendezVous,$noteVal) {
        try {
            $query = 'update RENDEZVOUS set note = :noteVal where id= :idRendezVous;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'noteVal' => $noteVal,
                'idRendezVous' => $idRendezVous
            ]);
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
        }
    }
}

?>
