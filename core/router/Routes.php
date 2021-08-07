<?php

namespace mvc\core\router;

use mvc\core\App;
use mvc\controller\UserController;
use mvc\controller\LoginController;

class Routes
{
    public static function getRoutes()
    {
        $app = App::get_instance();

        // Write your routes here
        $app->router->get('/', 'home');
        $app->router->get('/sign_up', 'sign_up');
        $app->router->get('/login', 'login');

        // User routes
        $app->router->post('/login', [LoginController::class, 'login']);
        $app->router->get('/logout', [LoginController::class, 'logout']);
        $app->router->get('/dashboard', [UserController::class, 'index']);
        $app->router->get('/upload', [UserController::class, 'upload']);
    }
}

?>