<?php

namespace mvc\core\auth;

class Auth 
{
    private static string $COOCKIE_NAME = "username";

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

    public static function checkUser()
    {
        return isset($_COOKIE[self::$COOCKIE_NAME]);
    }

    public static function checkOut()
    {
        $time = time() - 3600;
        $dir = "/";
        if (self::checkUser())
        {
            setcookie(self::$COOCKIE_NAME, "", $time, $dir);
        }
    }

    public static function getUserName()
    {
        return self::checkUser() ? $_COOKIE[self::$COOCKIE_NAME] : "";
    }
}

?>