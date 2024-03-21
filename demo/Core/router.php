<?php

namespace Core;

class Router {

  protected $routes = [];

  public function get($uri, $controller) 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'GET'
    ];
  }

  public function post() 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'POST'
    ];
  }

  public function patch() 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'PATCH'
    ];
  }

  public function put() 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'PUT'
    ];
  }

  public function delete() 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'DELETE'
    ];
  }

  public function route($uri, $method) 
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        return require base_path($route['controller']);
      }
    }

    $this->abort();
  }

  protected function abort($value = 404) 
  {
  http_response_code($value);
  require base_path("views/{$value}.php");
  die();
  }

}

// function routeToController($uri, $routes) {
//   if (array_key_exists($uri, $routes)) {
//     require base_path($routes[$uri]);
//   } else {
//     abort();
//   }
// }



