<?php

namespace mvc\controller\traits;

use mvc\core\auth\Auth;

trait Logout
{
    /**
     * This method logs the user out of our website.
     * 
     */
    public function logout() {
        Auth::checkOut();
        return $this->redirect("login");
    }
}

?>