<?php

$uriPath = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);



function routeToView(string $nameView, string | array $params = null)
{
    return require('views/layout.views.php');
}


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes))
    {
        require $routes[$uri];
    }
    else
    {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/errors/$code.php";
    die();
}


$routes = require 'routes.php';

routeToController($uriPath,$routes);