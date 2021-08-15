<?php 

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\Message;
use mvc\model\User;

trait Confirm
{
    public function upgrade($request) 
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            if ((new User())->changeConfirm($data['name'], 1)) {
                Message::addMessage("Upgrade sucessfully.", Message::OK);
            } else {
                Message::addMessage("Operation failed.", Message::ERROR);
            }
            return $this->redirect("users");
        } else {
            return $this->redirect("users", 307);
        }
    }

    public function downgrade($request)
    {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            if ((new User())->changeConfirm($data['name'], 0)) {
                Message::addMessage("Downgrade sucessfully.", Message::WARN);
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