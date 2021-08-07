<?php

namespace mvc\core\view;

use mvc\core\App;

class RenderEngine
{
    /**
     * Render view gets a callback with parameters, and renders the pages 
     * for us.
     * 
     * @param callback is the function to be executed
     * @param params is the parameters of the request
     */
    public static function renderView($view, $params = [])
    {
        $layout = $this->loadView("layouts/main");
        $header = $this->loadView("layouts/header");
        $footer = $this->loadView("layouts/footer");
        $layout = str_replace("{{navbar}}", $header, $layout);
        $layout = str_replace("{{footer}}", $footer, $layout);
        $view = $this->loadView($view, $params);
        return str_replace("{{content}}", $view, $layout);
    }

    /**
     * This method loads the view that we give to it, with its
     * parameters.
     * 
     */
    protected function loadView($view, $params = []) 
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT . "/view/" . $view . ".php";
        return ob_get_clean();
    }
}

?>