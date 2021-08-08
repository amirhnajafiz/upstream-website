<?php

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\core\auth\Auth;

/**
 * Login constroller manages the login or logout 
 * functions.
 * 
 */
class LoginController extends BaseController
{
    /**
     * This method manages the user login feature.
     * 
     * @param request user data
     */
    public function login($request) {
        $data = $request->getBody();
        Auth::checkIn($data['username']);
        header("Location: /dashboard");
    }

    /**
     * This method logs the user out of our website.
     * 
     */
    public function logout() {
        Auth::checkOut();
        header("Location: /");
    }

    public function sign_up() {
        # Do sign up
    }
}

?>