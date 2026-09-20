<?php

require_once __DIR__ . '/../routes/web.php';

$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri !== '/') {
    $uri = rtrim($uri, '/');
}

if (!isset($routes[$method][$uri])) {
    http_response_code(404);
    echo '404 - Page not found';
    exit;
}

$route = $routes[$method][$uri];

$controllerName = $route['controller'];
$action = $route['action'];

$controllerFile =
    __DIR__ . '/../app/controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    http_response_code(500);
    echo 'Controller not found.';
    exit;
}

require_once $controllerFile;

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    http_response_code(500);
    echo 'Action not found.';
    exit;
}

$controller->$action();