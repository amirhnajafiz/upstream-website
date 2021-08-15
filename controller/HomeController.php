<?php 

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\model\File;
use mvc\core\auth\Auth;

class HomeController extends BaseController
{
    public function index()
    {
        $files = (new File())->fetchTotal();
        $files = json_encode($files);
        return $this->render("home", ['files' => $files, 'isAdmin' => Auth::isUserAdmin()]);
    }
}

?>