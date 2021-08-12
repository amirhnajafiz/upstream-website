<?php

namespace mvc\core;

class Error
{
    private static $errors = [];

    public static function setError($message)
    {
        array_push(self::$errors, $message);
    }

    public static function getErrors()
    {
        return self::$errors;
    }

    public static function clearErrors()
    {
        self::$errors = [];
    }
}

?>