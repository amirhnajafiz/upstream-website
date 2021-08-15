<?php 

namespace mvc\middleware;

use mvc\core\Message;

class FileControl
{
    const DATA_LIMIT = 100000000;
    const DATA_TYPES = ['MKV', 'MP4', 'MOV', 'GIF', 'JPG', 'PNG'];

    public static function sizeCheck($data)
    {
        return $data > self::DATA_LIMIT;
    }

    public static function typeCheck($data)
    {
        return in_array(strtoupper($data), self::DATA_TYPES);
    }

    public static function validate($size, $type)
    {
        if (self::sizeCheck($size)) {
            Message::addMessage("File is too large. ( Maximum 500 MB file size is allowed )", Message::ERROR);
            return false;
        }
        if (self::typeCheck($type)) {
            Message::addMessage("File should be " . implode(", ", self::DATA_TYPES) . " .", Message::ERROR);
            return false;
        }
        return true;
    }
}

?>