<?php 

namespace mvc\php;

use mvc\core\App;

function getURL($name = "home") 
{
    return App::getInstance()->router->getURL($name);
}

?>