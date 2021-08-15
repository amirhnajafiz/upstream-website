<?php 

namespace mvc\controller;

use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\User;
use mvc\model\Request;
use mvc\controller\traits\Accept;
use mvc\controller\traits\Delete;
use mvc\controller\traits\Lock;

/**
 * Admin controller manages the admin abilities.
 * 
 */
class AdminController extends BaseController
{
    // traits
    use Accept;
    use Delete;
    use Lock;
    
    /**
     * This method sends the user to requests page, is it was authenticate.
     * 
     */
    public function requests() {
        if (Auth::canUserConfirm()) {
            $requests = (new Request)->getRequestMovies();
            $requests = json_encode($requests);
            return $this->render("requests", ['requests' => $requests]);
        } else {
            Message::addMessage("Forbidden for you.", Message::WARN);
            return $this->redirect("home", 307);
        }
    }

    /**
     * This method sends the user to users page, is it was authenticate.
     * 
     */
    public function users() {
        if (Auth::isUserAdmin()) {
            $users = (new User)->fetchTotal();
            foreach($users as $user) {
                unset($user->password);
            }
            $users = json_encode($users);
            return $this->render("users", ['users' => $users, 'current_admin' => Auth::getUserName()]);
        } else {
            Message::addMessage("Can't access this page.", Message::WARN);
            return $this->redirect("home", 307);
        }
    }
}

?>