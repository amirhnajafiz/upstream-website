<?php

namespace mvc\middleware;

use mvc\core\Message;

/**
 * Validator is a middleware to validate the
 * data that are sent.
 * 
 */
class Validator
{
    const DATA_LIMIT = 64;

    /**
     * Checks input length.
     * 
     */
    public static function dataValidation($data)
    {
        return strlen($data) > self::DATA_LIMIT;
    }

    /**
     * Checks input clean data.
     * 
     */
    public static function isCleanData($data)
    {
        $temp = $data;
        return preg_replace("/[^a-zA-Z0-9]+/", " ", $data) != $temp;
    }

    /**
     * This method does a full validation on the file.
     * 
     */
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