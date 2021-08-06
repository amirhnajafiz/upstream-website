<?php

namespace mvc\core;

use mvc\core\App;
use mvc\controller\UserController;

class Routes
{
    public static function getRoutes()
    {
        $app = App::get_instance();

        // Write your routes here
        $app->router->get('/', 'home');
        $app->router->get('/sign_up', 'sign_up');
        $app->router->get('/login', 'login');
        $app->router->get('/upload', 'fileUpload');

        // User routes
        $app->router->post('/dashboard', [UserController::class, 'index']);
        $app->router->post('/upload', [UserController::class, 'upload']);
    }
}

?>