<?php 

require 'Validator.php';
$config = require("config.php");
$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);

$heading = "My Notes";

if(! Validator::email('sendo@gmail.com')) {
  dd('Invalid Email!');
}

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id', ['id' => 2])->get();

require "views/notes/index.view.php"
?>