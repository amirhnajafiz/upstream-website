<?php

namespace mvc\controller\traits;

trait Login
{
    /**
     * This method manages the user login feature.
     * 
     * @param request user data
     */
    public function login($request) {
        $data = $request->getBody();

        $valid_result = AuthController::dataValidation($data['username']);
        foreach($valid_result['violations'] as $message)
        {
            Error::setError($message);
        }

        Auth::checkIn($valid_result['data']);
        header("Location: /dashboard");
    }
}

?>