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
    private static string $ADMIN_COOKIE = "isadmin";
    private static string $CONFIRM_COOKIE = "canconfirm";

    /**
     * This method logs the user in our website.
     * 
     * @param username is the name of user
     */
    public static function checkIn($username, $isAdmin = 0, $canConfirm = 0)
    {
        CookieHandler::set(self::$COOKIE_NAME, $username);
        CookieHandler::set(self::$ADMIN_COOKIE, $isAdmin);
        CookieHandler::set(self::$CONFIRM_COOKIE, $canConfirm);
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
        CookieHandler::set(self::$ADMIN_COOKIE, "", self::TERMINATOR);
        CookieHandler::set(self::$CONFIRM_COOKIE, "", self::TERMINATOR);
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

    /**
     * This method checks if the user is admin or not.
     * 
     * @return bool true or false
     */
    public static function isUserAdmin()
    {
        $res = CookieHandler::get(self::$ADMIN_COOKIE);
        if ($res === false) {
            return false;
        }
        return $res == 1;
    }

    /**
     * This method checks if the user is allowed to confirm or not.
     * 
     * @return bool true of false
     */
    public static function canUserConfirm()
    {
        $res = CookieHandler::get(self::$CONFIRM_COOKIE);
        if ($res === false) {
            return false;
        }
        return $res == 1;
    }
}

?>