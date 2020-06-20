<?php

namespace AppHive\Controllers;

use AppHive\Models\HiveModel;
use AppHive\Models\InfosHiveModel;

class HiveController extends CoreController {

    /**
     * Méthode permettant d'afficher la page home.tpl.html pour la route /hives
     */
    public function showHives() {
        $hives = HiveModel::findAll();
        $hivesList = [];

        foreach($hives as $hive) {

            $hivesList [] = [
                'name' => $hive->getNameHive(),
                'latitude' => $hive->getLatitude(),
                'longitude' => $hive->getLongitude(),
                'id' => $hive->getHiveId(),
            ];
        }

        $this->show('home', ['hives' => $hivesList]);
    }

    /**
     * Méthode pour afficher toutes les ruches
     */
    public function getAllHives() {
        $hiveModel = new HiveModel();
        $allHives = $hiveModel->findAll();

        $this->showJson($allHives);
    }

    /**
     * Méthode pour afficher toutes les ruches
     */
    public static function getNbHives() {
        $hiveModel = new HiveModel();
        $allHives = $hiveModel->findAll();

        return count($allHives);
    }


    /**
     * Méthode pour créer une nouvelle ruche
     */
    public function newHive() {
        
        $hiveInsertedInDatabase = false;

        $nameHive = isset($_POST['nameHive']) ? trim($_POST['nameHive']) : '';
        $latitude = isset($_POST['latitude']) ? trim($_POST['latitude']) : '';
        $longitude = isset($_POST['longitude']) ? trim($_POST['longitude']) : '';

        // Avant de créer la liste, je m'assure que le nom est valide

        if (!empty($nameHive)) {
            // Créer la nouvelle ruche
            $newHive = new HiveModel();
            $newHive->setNameHive($nameHive);
            $newHive->setLatitude($latitude);
            $newHive->setLongitude($longitude);
            // Insertion de la nouvelle ruche
            $hiveInsertedInDatabase = $newHive->insert();
        }

        if ($hiveInsertedInDatabase) {
            $response = [
                'success' => true,
                'errorMessage' => ''
            ];
        } 
        // En cas d'erreur d'insertion, je renvoie false et un message d'erreur
        else {
            $response = [
                'success' => false,
                'errorMessage' => 'Données en entrée incorrectes, l\'ajout de la liste a échoué'
            ];
        }

        $this->showJson($response);        
      

    }

    // Méthode pour supprimer une ruche
    public function deleteHive($id) {

        // $hive = new HiveModel();

        // $hive->removeHive($id);

        $hiveDeletedInDatabase = false;


        // Vérification supplémentaire pour s'assurer que l'id est bien
        // un nombre positif
        if ($id > 0) {
            //dump($id);
            $hiveModel = HiveModel::find($id);
            $hiveDeletedInDatabase = $hiveModel->delete();
            //dump($hiveDeletedInDatabase);
        
        }

        if ($hiveDeletedInDatabase) {
            $response = [
                'success' => true,
                'errorMessage' => ''
            ];
        } 
        // En cas d'erreur d'insertion, je renvoie false et un message d'erreur
        else {
            $response = [
                'success' => false,
                'errorMessage' => 'Données en entrée incorrectes, l\'ajout de la liste a échoué'
            ];
        }

        $this->showJson($response); 
              
    }

    public function updateHive($hiveId) {
        
        // On récupère les infos envoyées en POST
        $hiveName = isset($_POST['nameHive']) ? trim($_POST['nameHive']) : '';
        $latitude = isset($_POST['latitude']) ? trim($_POST['latitude']) : '';
        $longitude = isset($_POST['longitude']) ? trim($_POST['longitude']) : '';

        $hiveModel = HiveModel::find($hiveId);
        $hiveModel->setNameHive($hiveName);
        $hiveModel->setLatitude($latitude);
        $hiveModel->setLongitude($longitude);
        $hiveUpdatedInDatabase = $hiveModel->update();
        
        if ($hiveUpdatedInDatabase) {
            $response = [
                'success' => true,
                'errorMessage' => ''
            ];
        } 
        // En cas d'erreur d'insertion, je renvoie false et un message d'erreur
        else {
            $response = [
                'success' => false,
                'errorMessage' => 'Données en entrée incorrectes,la mise à jour de la ruche a échoué'
            ];
        }

        $this->showJson($response);
    }
}