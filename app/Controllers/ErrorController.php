<?php

namespace AppHive\Controllers;

class ErrorController extends CoreController {

    public function error404() {
        $this->show('404');
    }
}