<?php

namespace mvc\controller;

use mvc\controller\BaseController;

class UserController extends BaseController
{
    public function index() {
        return $this->render("dashboard", ['name' => 'User']);
    }

    public function upload() {
        return $this->render("userFileUpload", ['name' => 'User']);
    }
}

?>