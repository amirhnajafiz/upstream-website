<?php

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\auth\Auth;
use mvc\core\Message;

trait Login
{
    /**
     * This method manages the user login feature.
     * 
     * @param request user data
     */
    public function login($request) {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            Auth::checkIn($data['username']);
            Message::addMessage("Logged in.", Message::OK);
            header("Location: /dashboard");
        } else {
            header("Location: /login");
        }
    }
}

?>