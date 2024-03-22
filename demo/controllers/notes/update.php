<?php 

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve('Core\Database');

$currentUser = 2;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUser);

$errors = [];

  if (! Validator::string($_POST['body'], 1 , 50)) {
    $errors['body'] = "A body of no more than 50 characters is required.";
  }
