<?php

namespace mvc\middleware;

use mvc\core\Message;

class Validator
{
    const DATA_LIMIT = 64;

    public static function dataValidation($data)
    {
        return strlen($data) > self::DATA_LIMIT;
    }

    public static function isCleanData($data)
    {
        $temp = $data;
        return preg_replace("/[^a-zA-Z0-9]+/", " ", $data) == $temp;
    }

    public static function validate($data)
    {
        foreach($data as $key => $value) {
            if (self::dataValidation($value)) {
                Message::addMessage("Input data is too long. ( Maximum 64 characters allowed )", Message::ERROR);
                return false;
            }
            if (self::isCleanData($value)) {
                Message::addMessage("Input data contains special characters, only letters and numbers are allowed.", Message::ERROR);
                return false;
            }
        }
        return true;
    }
}

?>