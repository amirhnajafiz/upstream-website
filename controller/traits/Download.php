<?php 

namespace mvc\controller\traits;

use mvc\middleware\Validator;
use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\File;

trait Download
{
    public function download($request) {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if ($valid) {
            $file = (new File())->selectFileById($data['id']);
            if ($file) {
                $file->downloadFile($file->id, $file->download + 1);
                $file_url = $file->link;
                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: Binary"); 
                header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
                readfile($file_url); 
                return $this->redirect("home");
            } else {
                Message::addMessage("File not found.", Message::ERROR);
                return $this->redirect("home", 303);
            }
        } else {
            return $this->redirect("home", 303);
        }
    }
}

?>