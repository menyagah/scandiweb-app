<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        return $this->routes['post'][$path] = $callback;
    }

    //This resolve function is meant to dispute errors when the url is not there
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404.php");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

/*    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }*/

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path];
        ob_start();



        if ($callback[1] === 'createProduct') {
            include_once Application::$ROOT_DIR . "/views/layout/$layout.php";
        } else {
            include_once Application::$ROOT_DIR . "/views/layout/list.php";
        }


        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
