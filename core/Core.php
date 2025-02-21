<?php
class Core {
    public function run($routes) {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $basePath = '/MVC'; 
        if (strpos($url, $basePath) === 0) {
            $url = substr($url, strlen($basePath));
        }
        $url = ($url != '/') ? rtrim($url, '/') : $url;
        $routerFound = false;

        foreach($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';
            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routerFound = true;
                [$currentController, $action] = explode('@', $controller);
                require_once __DIR__ . "/../controllers/$currentController.php";
                $newController = new $currentController();
                call_user_func_array([$newController, $action], $matches);
                return;
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}