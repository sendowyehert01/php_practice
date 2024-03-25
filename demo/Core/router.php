<?php

namespace Core;

class Router {

  protected $routes = [];

  public function add($method, $uri, $controller) 
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => NULL,
    ];

    return $this;
  }

  public function get($uri, $controller) 
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller) 
  {
    return $this->add('POST', $uri, $controller);
  }

  public function patch($uri, $controller) 
  {
    return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller) 
  {
    return $this->add('PUT', $uri, $controller);
  }

  public function delete($uri, $controller) 
  {
    return $this->add('DELETE', $uri, $controller);
  }

  public function only($key) 
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;

    dd($this->routes);
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



