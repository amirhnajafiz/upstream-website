<?php

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\User;

trait Register
{
    /**
     * This method registers the user in the website.
     * 
     */
    public function sign_up($request) {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            $user = (new User())->register($data['username'], $data['password']);
            if ($user == -1) {
                Message::addMessage("Registration failed.", Message::ERROR);
                return $this->redirect("register", 303);
            } else {
                Message::addMessage("Registration successfully.", Message::OK);
                return $this->redirect("login");
            }
        } else {
            return $this->redirect("register", 303);
        }
    }
}

?>