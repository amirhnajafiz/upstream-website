<?php

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\User;

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
            $user = (new User())->login($data['username'], $data['password']);
            if ($user) {
                if ($user->status === 1) {
                    Auth::checkIn($data['username'], $user->isadmin, $user->canconfirm);
                    Message::addMessage("Logged in.", Message::OK);
                    return $this->redirect("dashboard");
                } else {
                    Message::addMessage("Your account is been locked.", Message::ERROR);
                    return $this->redirect("home");
                }
            } else {
                Message::addMessage("Username or password is incorrect.", Message::ERROR);
                return $this->redirect("login");
            }
        } else {
            return $this->redirect("login", 303);
        }
    }
}

?>