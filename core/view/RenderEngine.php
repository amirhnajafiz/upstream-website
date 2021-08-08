<?php

namespace mvc\core\view;

use mvc\core\App;

/**
 * RenderEngine is the class that does the rendring and viewing stuff.
 * 
 */
class RenderEngine
{
    // Private fields
    private static string $BASE = "layouts/";
    private static string $LAYOUT_ADD = "main";
    private static string $HEADER_ADD = "header";
    private static string $FOOTER_ADD = "footer";

    /**
     * Render view gets a callback with parameters, and renders the pages 
     * for us.
     * 
     * @param callback is the function to be executed
     * @param params is the parameters of the request
     */
    public static function renderView($view, $params = [])
    {
        $layout = self::loadView(self::$BASE . self::$LAYOUT_ADD);
        $layout = str_replace("{{navbar}}", self::loadView(self::$BASE . self::$HEADER_ADD), $layout);
        $layout = str_replace("{{footer}}", self::loadView(self::$BASE . self::$FOOTER_ADD), $layout);
        return str_replace("{{content}}", self::loadView($view, $params), $layout);
    }

    /**
     * This method loads the view that we give to it, with its
     * parameters.
     * 
     * @param view is the address of that view
     * @param params is the view parameters
     */
    private static function loadView($view, $params = []) 
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