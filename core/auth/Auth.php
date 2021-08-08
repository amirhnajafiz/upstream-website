<?php

namespace mvc\core\auth;

/**
 * Auth class manages the user authentications.
 * 
 */
class Auth 
{
    private static string $COOCKIE_NAME = "username";

    /**
     * This method logs the user in our website.
     * 
     * @param username is the name of user
     */
    public static function checkIn($username)
    {
        $coockie_value = $username;
        $time = time() + (86400 * 30);
        $dir = "/";
        if (!self::checkUser())
        {
            setcookie(self::$COOCKIE_NAME, $coockie_value, $time, $dir);
        }
    }

    /**
     * This method checks if the user is login or not.
     * 
     * @return boolean user checked in or not
     */
    public static function checkUser()
    {
        return isset($_COOKIE[self::$COOCKIE_NAME]);
    }

    /**
     * This method logs the user out of our website.
     * 
     */
    public static function checkOut()
    {
        $time = time() - 3600;
        $dir = "/";
        if (self::checkUser())
        {
            setcookie(self::$COOCKIE_NAME, "", $time, $dir);
        }
    }

    /**
     * This getter method, returns the user name.
     * 
     * @return string username
     */
    public static function getUserName()
    {
        return self::checkUser() ? $_COOKIE[self::$COOCKIE_NAME] : "";
    }
}

?>