<?php

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\Message;
use mvc\model\Request;
use mvc\model\File;

trait Accept
{
    public function doAccept($request) {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            $id = $data['id'];
            (new Request())->removeRequest($id);
            if ( (new File())->makeValid($id) ) {
                Message::addMessage("Request accepted.", Message::OK);
            } else {
                Message::addMessage("Something went wrong.", Message::WARN);
                (new Request())->insertRequest($id);
            }
            return $this->redirect("requests");
        } else {
            return $this->redirect("home", 303);
        }
    }
}

?>