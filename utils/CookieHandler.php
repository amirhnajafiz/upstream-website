<?php 

namespace mvc\utils;

/**
 * Cookie handler, manages the cookies of our website.
 * 
 */
class CookieHandler
{
    // Cookie path
    const PATH = "/";
    
    /**
     * This method sets a new cookie in our website.
     * 
     * @param key cookie key
     * @param value cookie value
     * @param life_time cookie life time
     */
    public static function set(string $key, string $value = "", int $life_time = 3600)
    {
        return setcookie($key, $value, [
            'expires' => time() + $life_time,
            'path' => self::PATH
        ]);
    }

    /**
     * This method gets value of a cookie.
     * 
     * @param key cookie key
     * @return value cookie value
     */
    public static function get(string $key)
    {
        return $_COOKIE[$key] ?? false;
    }
}

?>