<?php 

namespace mvc\controller;

use mvc\controller\BaseController;
use mvc\model\File;
use mvc\core\auth\Auth;

/**
 * Home controller class manages the end points 
 * of the home route.
 * 
 */
class HomeController extends BaseController
{
    /**
     * The home page, to show the files and ... 
     * 
     */
    public function index()
    {
        $files = (new File())->fetchTotal();
        $files = json_encode($files);
        return $this->render("home", ['files' => $files, 'isAdmin' => Auth::isUserAdmin()]);
    }
}

?>