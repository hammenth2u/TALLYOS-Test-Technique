<?php

namespace AppHive\Controllers;

use AppHive\Models\HiveModel;
use AppHive\Models\InfosHiveModel;


class MainController extends CoreController {

    public function home() {
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

    public function getNbHives() {
        $infosHives = HiveModel::findAll();
        return count($infosHives);
    }


    public function infos() {
        $infosHives = InfosHiveModel::findAll();
        $infosHivesList = [];

        foreach($infosHives as $infosHive) {

            $hiveId = $infosHive->getHiveId();
            $hive = HiveModel:: findBis($hiveId);

            $createdAt= $infosHive->getCreatedAt();
            $createdAt = strtotime($createdAt);
            setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
            ;
            $createdAt = strftime ('%d %B %G %H'.'h'.'%M  ', $createdAt );

            $infosHivesList [] = [
                'weight' => $infosHive->getWeight(),
                'temperature' => $infosHive->getTemperature(),
                'humidityLevel' => $infosHive->getHumidityLevel(),
                'createdAt' => $createdAt,
                'nameHive' => $hive->getNameHive(), 
            ];
        }

        $this->show('infos', ['infosHives' => $infosHivesList]);
    }

    public function annexe() {
        $this->show('annexe');
    }
}