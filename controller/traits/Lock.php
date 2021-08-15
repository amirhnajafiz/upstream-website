<?php 

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\Message;
use mvc\model\User;
use mvc\core\auth\Auth;

/**
 * This trait is for handling the user lock and unlocking.
 * 
 */
trait Lock
{
    /**
     * This method locks a user.
     * 
     */
    public function lock($request) 
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if (!Auth::isUserAdmin())
        {
            Message::addMessage("You don't have access.");
            return $this->redirect("home", 303);
        }

        if ($valid) {
            if ((new User())->lockByName($data['name'], 0)) {
                Message::addMessage("Locked sucessfully.", Message::WARN);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }

    /**
     * This method unlocks a user.
     * 
     */
    public function unlock($request)
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if (!Auth::isUserAdmin())
        {
            Message::addMessage("You don't have access.");
            return $this->redirect("home", 303);
        }

        if ($valid) {
            if ((new User())->lockByName($data['name'], 1)) {
                Message::addMessage("Unocked sucessfully.", Message::OK);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }
}

?>