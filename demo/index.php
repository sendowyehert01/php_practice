<?php 
$business = [
  'name' => 'Laracasts',
  'cost' => 15,
  'categories' => ['Testing', 'PHP', 'Javascript']
  ];

function register($user) {
  //
}

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

$heading = "Home";

require 'views/index.view.php';