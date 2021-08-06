<?php

namespace mvc\core;

/**
 * The router class, manages the routes of our website
 * based on the user request.
 * 
 */
class Router
{
    // Router tools
    public Request $request;
    public Response $response;
    // Router routes
    protected $routes = [];

    /**
     * The constructor of our router.
     * 
     * @param request is the user request to our website
     * @param response is the response for our user request
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Get method handles the get requests to our website.
     * 
     * @param path is the path of the request
     * @param callback is the function to be executed when the router engages
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Post method handles the post requests to our website.
     * 
     * @param path is the path of the request
     * @param callback is the function to be executed when the router engages
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Resolve method does the rendering in router.
     * 
     * @return view what will it show to user
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback === false) {
            $code = 404;
            $this->response->setStatusCode($code);
            $layout = $this->loadLayout();
            $layout = str_replace("{{navbar}}", "", $layout);
            $layout = str_replace("{{footer}}", "", $layout);
            $view = $this->loadView("errors/_404", compact('code'));
            return str_replace("{{content}}", $view, $layout);
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * Render view gets a callback with parameters, and renders the pages 
     * for us.
     * 
     * @param callback is the function to be executed
     * @param params is the parameters of the request
     */
    public function renderView($view, $params = [])
    {
        $layout = $this->loadLayout();
        $header = $this->loadHeader();
        $footer = $this->loadFooter();
        $layout = str_replace("{{navbar}}", $header, $layout);
        $layout = str_replace("{{footer}}", $footer, $layout);
        $view = $this->loadView($view, $params);
        return str_replace("{{content}}", $view, $layout);
    }

    /**
     * This method loads the view that we give to it, with its
     * parameters.
     * 
     */
    protected function loadView($view, $params = []) 
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT . "/view/" . $view . ".php";
        return ob_get_clean();
    }

    /**
     * This method renders the header of the website.
     * 
     * @param params is the parameters given to the header
     */
    protected function loadHeader($params = [])
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT . "/view/layouts/header.php";
        return ob_get_clean();
    }

    /**
     * This method loads the footer of the website.
     * 
     * @param params the parameters given to footer
     */
    protected function loadFooter($params = [])
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT . "/view/layouts/footer.php";
        return ob_get_clean();
    }

    /**
     * This method loads the bootstrap layout for our pages.
     * 
     */
    protected function loadLayout() 
    {
        ob_start();
        include_once App::$ROOT . "/view/layouts/main.php";
        return ob_get_clean();
    }
}

?>