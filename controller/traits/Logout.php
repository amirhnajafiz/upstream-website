<?php

namespace mvc\controller\traits;

trait Logout
{
    /**
     * This method logs the user out of our website.
     * 
     */
    public function logout() {
        Auth::checkOut();
        header("Location: /");
    }
}

?>