<?php

namespace mvc\core;

use mvc\utils\CookieHandler;

/**
 * Message class handles the errors and messages that needed
 * to be sent to user.
 * 
 */
class Message
{
    // Private fields
    const ERROR = "danger";
    const OK = "success";
    const WARN = "warning";

    /**
     * Check if there is a message.
     * 
     * @return bool true of false
     */
    public static function check()
    {
        return (bool)CookieHandler::get("message");
    }

    /**
     * This method sets a new message.
     * 
     * @param content message body
     * @param type message type
     */
    public static function addMessage($content = "", $type = "warning")
    {
        CookieHandler::set("message", $content, 3600);
        CookieHandler::set("type", $type, 3600);
    }

    /**
     * This method clears the having message.
     * 
     */
    public static function clear()
    {
        CookieHandler::set("message", "", -3601);
        CookieHandler::set("type", "", -3601);
    }

    /**
     * This method gets the message body. 
     * 
     * @return content message body
     */
    public static function getMessage()
    {
        return CookieHandler::get("message");
    }

    /**
     * This method gets the message type.
     * 
     * @return type message type
     */
    public static function getType()
    {
        return CookieHandler::get("type");
    }
}

?>