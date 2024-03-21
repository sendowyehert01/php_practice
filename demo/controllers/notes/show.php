<?php 

use Core\Database;
use Core\Response;

$config = require(base_path("config.php"));
$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);

$currentUser = 2;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

  authorize($note['user_id'] === $currentUser);

  $db->query("DELETE from notes where id = :id", [ 'id' =>  $_GET['id'] ]);

  header('location: /notes');
  exit();

} else {

  $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

  authorize($note['user_id'] === $currentUser);

  view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note,
  ]);

}

