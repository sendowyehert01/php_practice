<?php 

$config = require("config.php");
$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);

$heading = "My Notes";

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id', ['id' => 2])->get();

require "views/notes.view.php"
?>