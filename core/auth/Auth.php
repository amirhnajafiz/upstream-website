<?php

namespace mvc\core\auth;

use mvc\utils\CookieHandler;

/**
 * Auth class manages the user authentications.
 * 
 */
class Auth 
{
    const TERMINATOR = -3601;
    private static string $COOKIE_NAME = "username";

    /**
     * This method logs the user in our website.
     * 
     * @param username is the name of user
     */
    public static function checkIn($username)
    {
        CookieHandler::set(self::$COOKIE_NAME, $username);
    }

    /**
     * This method checks if the user is login or not.
     * 
     * @return boolean user checked in or not
     */
    public static function checkUser()
    {
        return (bool)CookieHandler::get(self::$COOKIE_NAME);
    }

    /**
     * This method logs the user out of our website.
     * 
     */
    public static function checkOut()
    {
        CookieHandler::set(self::$COOKIE_NAME, "", self::TERMINATOR);
    }

    /**
     * This getter method, returns the user name.
     * 
     * @return string username
     */
    public static function getUserName()
    {
        return self::checkUser() ? CookieHandler::get(self::$COOKIE_NAME) : "Guest";
    }
}

?>