<?php

namespace AppHive\Models;

use AppHive\Utils\Database;
use PDO;

class InfosHiveModel extends CoreModel {

    /**
     * weight of the hive
     * 
     * @var float
     */
    protected $weight;

    /**
     * temperature of the hive
     * 
     * @var float
     */
    protected $temperature;

    /**
     * humidity level of the hive
     * 
     * @var float
     */
    protected $humidityLevel;

    /**
     * id of the infos hiveive
     * 
     * @var int
     */
    protected $id;

    /**
     * id of the hive (related to hive table) 
     * 
     * @var int
     */
    protected $hiveId;


    const TABLE_NAME = 'infos_hive';

    /**
     * @return float
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * @param float $newWeight
     */
    public function setWeight($newWeight) {
        $this->weight = $newWeight;
    }

    /**
     * @return float
     */
    public function getTemperature() {
        return $this->temperature;
    }

    /**
     * @param float $newTemperature
     */
    public function setTemperature($newTemperature) {
        $this->temperature = $newTemperature;
    }

    /**
     * @return float
     */
    public function getHumidityLevel() {
        return $this->humidityLevel;
    }

    /**
     * @param float $newHumidityLevel
     */
    public function setHumidityLevel($newHumidityLevel) {
        $this->humidityLevel = $newHumidityLevel;
    }

    /**
     * Get the value of hiveId
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of hiveId
     */ 
    public function getHiveId()
    {
        return $this->hiveId;
    }

    /**
     * Set the value of id
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
     }

    /**
     * Méthode permettant de récupérer un objet HiveModel à partir de son ID
     * 
     * @param int $hiveId
     * 
     * @return HiveModel
     */
    public static function find($id) {
        // Saison 6 : version sécurisée
        $sql = "
            SELECT *
            FROM ".self::TABLE_NAME."
            WHERE id = :id
        ";

        $pdoStatement = Database::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $hiveModel = $pdoStatement->fetchObject('\AppHive\Models\HiveModel');
        
        return $hiveModel;
    }

    /**
     * Méthode permettant de mettre à jour les infos d'une ruche dans la BDD à partir 
     * de l'objet courant
     * 
     * @return bool
     */
    public function update() {
     }

    /**
     * Méthode permettant de retourner un tableau d'objets HiveModel
     * représentant toutes les lignes de la table hive
     * 
     * @return InfosHiveModel[]
     */
    public static function findAll() {
        $sql = "
            SELECT humidity_level AS humidityLevel, weight, temperature, i.created_at AS createdAt, i.updated_at AS updatedAt, i.id, id_hive AS hiveId, h.name_hive AS nameHive
            FROM infos_hive i
            INNER JOIN hive h ON id_hive = h.id
            ORDER BY nameHive, createdAt
             
        ";

        $pdoStatement = Database::getPDO()->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\AppHive\Models\InfosHiveModel');

        return $results;
    }


    public function jsonSerialize(){
        $data = [
            'id' => $this->getHiveId(),
            'weight' => $this->getWeight(),
            'temperature' => $this->getTemperature(),
            'humidityLevel' => $this->getHumidityLevel()
        ];

        return $data;
    }

}
