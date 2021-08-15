<?php 

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\Message;
use mvc\model\User;

trait Lock
{
    public function lock($request) 
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            if ((new User())->lockByName($data['name'], 0)) {
                Message::addMessage("Locked sucessfully.", Message::WARN);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }

    public function unlock($request)
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            if ((new User())->lockByName($data['name'], 1)) {
                Message::addMessage("Unocked sucessfully.", Message::OK);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }
}

?>