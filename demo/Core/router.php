<?php

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    abort();
  }
}

function abort($value = 404) {
  http_response_code($value);
  require base_path("views/{$value}.php");
  die();
}

routeToController($uri, $routes);