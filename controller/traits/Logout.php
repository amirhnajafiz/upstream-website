<?php

namespace mvc\controller\traits;

use mvc\core\auth\Auth;

/**
 * This trait manages the user logging out.
 * 
 */
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