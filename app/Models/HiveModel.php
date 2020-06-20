<?php

namespace AppHive\Models;

// Ici, pas besoin de '\' devant Okanban ou PDO car on part toujours de la racine
// avec 'use'
use AppHive\Utils\Database;
use PDO;

class HiveModel extends CoreModel {

    /**
     * name of the hive
     * 
     * @var string
     */
    protected $nameHive;

    /**
     * latitude of the hive
     * 
     * @var string
     */
    protected $latitude;

    /**
     * longitude of the hive
     * 
     * @var string
     */
    protected $longitude;

    /**
     * id of the hive
     * 
     * @var int
     */
    protected $hiveId;


    const TABLE_NAME = 'hive';

    /**
     * @return string
     */
    public function getNameHive() {
        return $this->nameHive;
    }

    /**
     * @param string $newNameHive
     */
    public function setNameHive($newNameHive) {
        $this->nameHive = $newNameHive;
    }

    /**
     * @return string
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * @param string $newLatitude
     */
    public function setLatitude($newLatitude) {
        $this->latitude = $newLatitude;
    }

    /**
     * @return string
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * @param string $newLongitude
     */
    public function setLongitude($newLongitude) {
        $this->longitude = $newLongitude;
    }

    /**
     * Get the value of hiveId
     */ 
    public function getHiveId()
    {
        return $this->hiveId;
    }

    /**
     * Set the value of hiveId
     *
     * @return  self
     */ 
    public function setHiveId($hiveId)
    {
        $this->hiveId = $hiveId;

        return $this;
    }
    

    // #################################################################
    // Active Record : définition des méthodes CRUD
    // #################################################################

    /**
     * Méthode permettant d'ajouter une ligne dans la table hive
     * à partir des données de l'objet courant
     * 
     * @return bool
     */
    public function insert() {
        $sql = "
            INSERT INTO hive (name_hive, longitude, latitude)
            VALUES (:nameHive, :longitude, :latitude)
        ";

        // On prépare la requête, à ce stade, elle n'est pas exécutée
        $pdoStatement = Database::getPDO()->prepare($sql);

        // On définit les valeurs pour chaque placeholder
        $pdoStatement->bindValue(':nameHive', $this->nameHive, PDO::PARAM_STR);
        $pdoStatement->bindValue(':longitude', $this->longitude, PDO::PARAM_STR);
        $pdoStatement->bindValue(':latitude', $this->latitude, PDO::PARAM_STR);

        // On exécute la requête
        $result = $pdoStatement->execute();

        // On récupère le nombre de lignes affectées (insérées)
        //$affectedRows = $pdoStatement->rowCount();
        //dump($affectedRows);

        //$lastInsertId = Database::getPDO()->lastInsertId();

        //dump($lastInsertId);
        // Si $lastInsertId est plus grand que 0, j'ai réussi à insérer
        if ($result) {
            return true;
        }
        // Sinon, l'insertion a échouée
        else {
            return false;
        }
    }

    /**
     * Méthode permettant de récupérer un objet HiveModel à partir de son ID
     * 
     * @param int $hiveId
     * 
     * @return HiveModel
     */
    public static function find($hiveId) {
        // Saison 6 : version sécurisée
        $sql = "
            SELECT *
            FROM ".self::TABLE_NAME."
            WHERE id = :id
        ";

        // Préparation de la requête
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Désormais, je dois donner une valeur (et un type) pour chaque jeton
        $pdoStatement->bindValue(':id', $hiveId, PDO::PARAM_INT);

        // et une fois les bindValue effectués, j'exécute
        $pdoStatement->execute();

        // On souhaite récupérer le résultat sous la forme d'un objet
        // de la classe CardModel
        $hiveModel = $pdoStatement->fetchObject('\AppHive\Models\HiveModel');
        
        // Je retourne l'objet CardModel correspondant
        return $hiveModel;
    }

    /**
     * Méthode permettant de récupérer un objet HiveModel à partir de son ID
     * 
     * @param int $hiveId
     * 
     * @return HiveModel
     */
    public static function findBis($hiveId) {
        // Saison 6 : version sécurisée
        $sql = "
            SELECT name_hive AS nameHive, longitude, latitude, created_at AS createdAt, updated_at AS updatedAt, id AS hiveId
            FROM ".self::TABLE_NAME."
            WHERE id = :id
        ";

        // Préparation de la requête
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Désormais, je dois donner une valeur (et un type) pour chaque jeton
        $pdoStatement->bindValue(':id', $hiveId, PDO::PARAM_INT);

        // et une fois les bindValue effectués, j'exécute
        $pdoStatement->execute();

        // On souhaite récupérer le résultat sous la forme d'un objet
        // de la classe CardModel
        $hiveModel = $pdoStatement->fetchObject('\AppHive\Models\HiveModel');
        
        // Je retourne l'objet CardModel correspondant
        return $hiveModel;
    }

    /**
     * Méthode permettant de mettre à jour une carte dans la BDD à partir 
     * de l'objet courant
     * 
     * @return bool
     */
    public function update() {
        $sql = "
            UPDATE hive
            SET name_hive = :nameHive, latitude = :latitude, longitude = :longitude, updated_at = NOW()
            WHERE id = :id
        ";

        $pdoStatement = Database::getPDO()->prepare($sql);


        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $pdoStatement->bindValue(':nameHive', $this->nameHive, PDO::PARAM_STR);
        $pdoStatement->bindValue(':latitude', $this->latitude, PDO::PARAM_STR);
        $pdoStatement->bindValue(':longitude', $this->longitude, PDO::PARAM_STR);

        $result = $pdoStatement->execute();

        //$affectedRows = $pdoStatement->rowCount();

        //return ($affectedRows > 0);
        
        return $result;
    }

    /**
     * Méthode permettant de retourner un tableau d'objets HiveModel
     * représentant toutes les lignes de la table hive
     * 
     * @return HiveModel[]
     */
    public static function findAll() {
        $sql = "
            SELECT name_hive AS nameHive, longitude, latitude, created_at AS createdAt, updated_at AS updatedAt, id AS hiveId
            FROM hive
        ";

        $pdoStatement = Database::getPDO()->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\AppHive\Models\HiveModel');

        return $results;
    }


    public function jsonSerialize(){
        $data = [
            'id' => $this->getHiveId(),
            'nameHive' => $this->getNameHive(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude()
        ];

        return $data;
    }

}
