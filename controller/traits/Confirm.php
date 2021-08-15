<?php 

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\Message;
use mvc\model\User;
use mvc\core\auth\Auth;

/**
 * Confirm trait will let the admin to set a member a
 * confirmer or not.
 * 
 */
trait Confirm
{
    /**
     * This method will upgrade a user to a confirmer.
     * 
     * @param request the user request
     */
    public function upgrade($request) 
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if (!Auth::isUserAdmin())
        {
            Message::addMessage("You don't have access.");
            return $this->redirect("home", 303);
        }

        if ($valid) {
            if ((new User())->changeConfirm($data['name'], 1)) {
                Message::addMessage("Upgrade sucessfully.", Message::OK);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }

    /**
     * This method will downgrade the user from a being a confirmer.
     * 
     * @param request the user request
     */
    public function downgrade($request)
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if (!Auth::isUserAdmin())
        {
            Message::addMessage("You don't have access.");
            return $this->redirect("home", 303);
        }

        if ($valid) {
            if ((new User())->changeConfirm($data['name'], 0)) {
                Message::addMessage("Downgrade sucessfully.", Message::WARN);
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