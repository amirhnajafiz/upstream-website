<?php 

namespace mvc\middleware;

use mvc\core\Message;

/**
 * File control is a middleware to validate the
 * files that are uploading.
 * 
 */
class FileControl
{
    const DATA_LIMIT = 1000000000000000;
    const DATA_TYPES = ['MKV', 'MP4', 'MOV', 'GIF'];

    /**
     * This method validates the file size.
     * 
     */
    public static function sizeCheck($data)
    {
        return $data > self::DATA_LIMIT;
    }

    /**
     * This method validates the type of file.
     * 
     */
    public static function typeCheck($data)
    {
        return in_array(strtoupper($data), self::DATA_TYPES);
    }

    /**
     * This method does a full validation on the file.
     * 
     */
    public static function validate($size, $type)
    {
        if (self::sizeCheck($size)) {
            Message::addMessage("File is too large. ( Maximum 500 MB file size is allowed )", Message::ERROR);
            return false;
        }
        if (!self::typeCheck($type)) {
            Message::addMessage("File should be " . implode(", ", self::DATA_TYPES) . " . $type", Message::ERROR);
            return false;
        }
        return true;
    }
}

?>