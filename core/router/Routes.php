<?php

namespace mvc\core\router;

use mvc\core\App;
use mvc\controller\UserController;
use mvc\controller\LoginController;

/**
 * Routes class is the class for managing the routes of our
 * website.
 * 
 */
class Routes
{
    /**
     * This method generates the routes of our website.
     * 
     */
    public static function getRoutes()
    {
        $app = App::get_instance();

        // Write your routes here
        $app->router->get('/', 'home');
        $app->router->get('/sign_up', 'sign_up');
        $app->router->get('/login', 'login');

        // User routes
        $app->router->post('/login', [UserController::class, 'login']);
        $app->router->get('/logout', [UserController::class, 'logout']);
        $app->router->get('/dashboard', [UserController::class, 'index']);
        $app->router->get('/upload', [UserController::class, 'upload']);
    }
}

?>