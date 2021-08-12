<?php

namespace mvc\core\router;

use mvc\core\App;
use mvc\core\Request;
use mvc\core\Response;
use mvc\core\view\RenderEngine;

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
            return RenderEngine::renderView("errors/_404", compact('code'));
        }

        if (is_string($callback)) {
            return RenderEngine::renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }
}

?>