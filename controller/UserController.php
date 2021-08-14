<?php

namespace mvc\controller;

use mvc\controller\traits\Login;
use mvc\controller\traits\Logout;
use mvc\controller\traits\Register;
use mvc\controller\BaseController;
use mvc\controller\AuthController;
use mvc\core\auth\Auth;
use mvc\core\Error;

/**
 * UserController manages the endpoints and actions
 * of a user in our website.
 * 
 */
class UserController extends BaseController
{
    // Traits
    use Login;
    use Logout;
    use Register;

    /**
     * This method returns the dashboard if user is authenticated.
     * 
     */
    public function index() {
        if (Auth::checkUser())
            return $this->render("dashboard", ['name' => Auth::getUserName()]);
        else {
            Error::setError("You must be logged in first");
            header("Location: /login"); 
        }
    }

    /**
     * This method sends the user to Upload panel.
     * 
     */
    public function upload() {
        return $this->render("userFileUpload", ['name' => Auth::getUserName()]);
    }
}

?>