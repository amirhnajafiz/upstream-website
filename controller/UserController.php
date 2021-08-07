<?php

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\core\auth\Auth;

class UserController extends BaseController
{
    public function index() {
        if (Auth::checkUser())
            return $this->render("dashboard", ['name' => Auth::getUserName()]);
        else 
            header("Location: /login"); 
    }

    public function upload() {
        return $this->render("userFileUpload", ['name' => 'User']);
    }
}

?>