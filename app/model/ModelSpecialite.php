<?php

require_once '/home/etu/temtsate/www/app/model/Model.php';

class ModelSpecialite {

    private $id;
    private $label;

    public function __construct($id = NULL, $label = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
        }
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}

    public function getLabel() {return $this->label;}
    public function setLabel($label) {$this->label = $label;}

    // Get ALL
    public static function getAll() {
        try {
            $query = 'SELECT * FROM SPECIALITE';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelSpecialite');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste de tous les IDs
    public static function getAllId() {
        try {
            $query = 'SELECT id FROM SPECIALITE';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Get 1
    public static function getOne($id) {
        try {
            $query = 'SELECT * FROM SPECIALITE WHERE id = :id';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelSpecialite');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insert
    public static function insert($label) {
        try {
            $query = 'SELECT MAX(id) FROM SPECIALITE';
            $statement = Model::getInstance()->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = 'INSERT INTO SPECIALITE VALUE (:id, :label)';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label
            ]);
            return $id;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}

?>
