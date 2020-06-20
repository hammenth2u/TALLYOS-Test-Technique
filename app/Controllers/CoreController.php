<?php

namespace AppHive\Controllers;
use HiveController;

abstract class CoreController {

    protected $router;

    public function __construct() {
        //$this->router = $router;
    }

    protected function redirect($url) {
        header('Location: '.$url);
        exit;
    }

    protected function show($viewName, $viewVars = array()) {

        $baseUri = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $data = new MainController();
        $hives = $data->getNbHives();
        $viewVars['nb_hives'] = $hives;
        $viewVars['base_uri'] = $baseUri;

        extract($viewVars);

        $router = $this->router;
        
        require(__DIR__.'/../views/header.tpl.php');
        require(__DIR__.'/../views/'.$viewName.'.tpl.php');
        require(__DIR__.'/../views/footer.tpl.php');
    }

    /**
    * Méthode permettant d'afficher/retourner un JSON à l'appel Ajax effectué
    *
    * @param mixed $data
    */
    protected function showJson($data)
    {
        // Autorise l'accès à la ressource depuis n'importe quel autre domaine
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        // Dit au navigateur que la réponse est au format JSON
        header('Content-Type: application/json');
        // La réponse en JSON est affichée
        echo json_encode($data);
    }

}