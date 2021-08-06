<?php

namespace mvc\controller;

use mvc\core\App;

class BaseController
{
    public function render($view, $params = []) 
    {
        return App::$app->router->renderView($view, $params);
    }
}

?>