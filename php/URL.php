<?php 

namespace mvc\php;

use mvc\core\App;

class URL 
{
    public static function getURL($name = "home") 
    {
        return App::get_instance()->router->getURL($name);
    }
}

?>