<?php
$routes = require('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
}

function abort($value = 404) {
  http_response_code($value);
  require "views/{$value}.php";
  die();
}

routeToController($uri, $routes);