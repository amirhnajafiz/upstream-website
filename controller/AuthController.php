<?php

namespace mvc\controller;

use mvc\core\auth\Auth;

class AuthController
{
    public static function dataValidation($data)
    {
        $result = [
            'data' => '',
            'violations' => []
        ];

        if (strlen($data) > 64)
        {
            $result['violations'][] = "To long input";
        }

        $result['data'] = preg_replace("/[^a-zA-Z]+/", "", $data);

        if ($data != $result['data'])
        {
            $result['violations'][] = "No special characters allowed";
        }

        return $result;
    }
}

?>