<?php 

namespace mvc\controller;

use mvc\core\auth\Auth;
use mvc\core\Message;

/**
 * Admin controller manages the admin abilities.
 * 
 */
class AdminController extends BaseController
{
    /**
     * This method sends the user to requests page, is it was authenticate.
     * 
     */
    public function requests() {
        if (Auth::canUserConfirm())
            return $this->render("requests");
        else {
            Message::addMessage("Forbidden for you.", Message::WARN);
            return $this->redirect("home", 307);
        }
    }

    /**
     * This method sends the user to users page, is it was authenticate.
     * 
     */
    public function users() {
        if (Auth::isUserAdmin())
            return $this->render("users");
        else {
            Message::addMessage("Can't access this page.", Message::WARN);
            return $this->redirect("home", 307);
        }
    }
}

?>