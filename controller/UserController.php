<?php

namespace mvc\controller;

use mvc\controller\traits\Login;
use mvc\controller\traits\Logout;
use mvc\controller\traits\Register;
use mvc\controller\BaseController;
use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\File;

/**
 * UserController manages the endpoints and actions
 * of a user in our website.
 * 
 */
class UserController extends BaseController
{
    // Traits
    use Login;
    use Logout;
    use Register;

    /**
     * This method returns the dashboard if user is authenticated.
     * 
     */
    public function index() {
        if (Auth::checkUser()) {
            $files = (new File())->getUserFiles(Auth::getUserName());
            $files = json_encode($files);
            return $this->render("dashboard", ['name' => Auth::getUserName(), 'files' => $files]);
        } else {
            Message::addMessage("You must be logged in first.", Message::WARN);
            return $this->redirect("login", 307);
        }
    }

    /**
     * This method sends the user to Upload panel.
     * 
     */
    public function upload() {
        return $this->render("userFileUpload", ['name' => Auth::getUserName()]);
    }
}

?>