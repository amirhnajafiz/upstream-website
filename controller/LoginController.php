<?php

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\core\auth\Auth;

class LoginController extends BaseController
{
    public function login() {
        Auth::checkIn("Amirhossein");
        header("Location: /dashboard");
    }

    public function logout() {
        Auth::checkOut();
        header("Location: /");
    }

    public function sign_up() {
        # Do sign up
    }
}

?>