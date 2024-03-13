<?php 

$config = require("config.php");
$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);
$currentUser = 2;
$heading = "Note";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUser);

require "views/note.view.php"
?>