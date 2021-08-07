<?php

namespace mvc\controller;

use mvc\core\view\RenderEngine;

class BaseController
{
    public function render($view, $params = []) 
    {
        return RenderEngine::renderView($view, $params);
    }
}

?>