<?php 

namespace mvc\controller\traits;

use mvc\core\App;
use mvc\middleware\FileControl;
use mvc\middleware\Validator;
use mvc\core\auth\Auth;
use mvc\core\Message;
use mvc\model\File;
use mvc\model\Request;

trait Upload 
{
    public function uploadFile($request) {
        $data = $request->getBody();

        $valid = Validator::validate($data);

        if (!$valid) {
            return $this->redirect("upload");
        }

        $target_dir = App::$ROOT . "/uploads/";

        $imageFileType = $_FILES["file"]["type"];
        $imageFileType = explode('/', $imageFileType);
        $imageFileType = $imageFileType[1];

        $target_name = "file" . time() . "." . $imageFileType;
        $target_file = $target_dir . $target_name;

        if (!FileControl::validate($_FILES["file"]["size"], $imageFileType)) {
            return $this->redirect("upload");
        }

        $user = Auth::getUserName();
        $expiredate = "";

        if ($user == "Guest") {
            $expiredate = date(time() + 86400);
        }

        $file = (new File())->uploadFile($data["name"], $target_file, $user, $imageFileType, $_FILES["file"]["size"], $expiredate);

        if ($file != -1) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                (new Request())->insertRequest($file);
                Message::addMessage("Your file uploaded sucessfully. Wait for admin accept to see your file.", Message::OK);
                return $this->redirect("home");
            } else {
                (new File())->removeFile($file);
                Message::addMessage("File did not upload.", Message::ERROR);
                return $this->redirect("upload");
            }
        } else {
            Message::addMessage("Upload failed.", Message::ERROR);
            return $this->redirect("upload");
        }
    }
}

?>