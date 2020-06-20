<?php

namespace AppHive\Models;

use AppHive\Utils\Database;
use PDO;
use JsonSerializable;

// abstract signifie que je ne peux pas instancier la classe CoreModel
// La classe CoreModel met sert uniquement à regrouper les propriétés
// et méthodes communes à mes différents Model (Card,List,Label)
// Je ne souhaite donc pas l'instancier
abstract class CoreModel implements JsonSerializable {

    // Propriétés communes aux Models
    /**
     * @var int
     */
    protected $id;

    /**
     * Creation date of the entity
     * 
     * @var string
     */
    protected $createdAt;

    /**
     * Update date of the entity
     * 
     * @var string
     */
    protected $updatedAt;

    // J'écris les GETTERs
    // (aucun setters, car on ne veut pas laisser la possiblité d'écriture sur ces propriétés)

    /**
     * Getter for property $id
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Getter for property $createdAt
     * 
     * @return string
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Getter for property $updatedAt
     * 
     * @return string
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    // Ici, je force toutes les classes héritant de CoreModel
    // à implémenter cette méthode insert()
    abstract public function insert();

    abstract public function update();

    abstract static public function findAll();

    abstract static public function find($id);

    /**
     * Méthode permettant de supprimer une liste de la BDD à partir
     * de l'objet courant
     * 
     * @return bool
     */
    public function delete() {
        //dump('Table Name : '.static::TABLE_NAME);
        $sql = "
            DELETE FROM hive
            WHERE id = :id 
        ";

        // On prépare la requête, à ce stade, elle n'est pas exécutée
        $pdoStatement = Database::getPDO()->prepare($sql);

        // On définit les valeurs pour chaque placeholder
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        // On exécute la requête
        $result = $pdoStatement->execute();

        // On récupère le nombre de lignes affectées (supprimées)
        //dump($affectedRows);

        // On retourne vrai, si au moins une ligne affectées
        // Si j'ai affecté plus d'une ligne, je retourne true
        // sinon je retourne false
        // Je m'assure que ma requête a modifié/supprimé au moins une ligne 
        // dans la table
        if ($result) {
            return true;
        }
        // Sinon, l'insertion a échouée
        else {
            return false;
        }
    }
}
