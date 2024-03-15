<?php 

$config = require(base_path("config.php"));
$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);
$currentUser = 2;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note,
]);