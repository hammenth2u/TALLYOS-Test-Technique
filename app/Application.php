<?php

namespace AppHive;

use AltoRouter;
use Dispatcher;

class Application {

    const ROUTES = array(
        // Views
        array('GET' ,'/', '\AppHive\Controllers\MainController::home','home'), 
        array('GET' ,'/infos', '\AppHive\Controllers\MainController::infos','infos'), 
        array('GET' ,'/annexe', '\AppHive\Controllers\MainController::annexe','annexes'), 
        
        // Hives
        array('GET' , '/hives', '\AppHive\Controllers\HiveController::showHives', 'hives'),
        array('POST', '/hive/new', '\AppHive\Controllers\HiveController::newHive', 'new_hive'),
        array('POST', '/hives/[i:id]/update', '\AppHive\Controllers\HiveController::updateHive', 'hive_update'),
        array('POST', '/hives/[i:id]/delete', '\AppHive\Controllers\HiveController::deleteHive', 'hive_delete'),

    );

    protected $router;

    public function __construct() {
        $this->router = new AltoRouter();
         $baseUri = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $this->router->setBasePath($baseUri);
        $this->router->addRoutes(self::ROUTES);
    }

    public function run() {
        $match = $this->router->match();
        $dispatcher = new Dispatcher($match, '\AppHive\Controllers\ErrorController::error404');
        $dispatcher->dispatch();
    }
}
