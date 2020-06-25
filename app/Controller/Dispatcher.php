<?php
declare(strict_types=1);
namespace App\Controller;
use App\Controller\MoviesController;
class Dispatcher
{
    public function dispatch(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'] ? parse_url($_SERVER['REQUEST_URI'])['path'] : '';
        $controllerName = $requestUri ? ucfirst(explode('/', trim($requestUri, '/'))[0]) : 'Index';

        $controllerClass = "\App\Controller\\{$controllerName}Controller";

        if (!class_exists($controllerClass)) {
            $controllerClass = MoviesController::class;
        }

        $controller = new $controllerClass;

        $response = $controller->execute();
        echo $response;
    }

}