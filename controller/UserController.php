<?php

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\core\auth\Auth;

/**
 * UserController manages the endpoints and actions
 * of a user in our website.
 * 
 */
class UserController extends BaseController
{
    /**
     * This method returns the dashboard if user is authenticated.
     * 
     */
    public function index() {
        if (Auth::checkUser())
            return $this->render("dashboard", ['name' => Auth::getUserName()]);
        else 
            header("Location: /login"); 
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