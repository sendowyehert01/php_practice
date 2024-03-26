<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

  if (! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email.";
  }

  if (! Validator::string($password, 7 , 255)) {
    $errors['password'] = "Please provide a password of atleast 7 characters.";
  }

  if (! empty($errors)) {
    return view('registration/create.view.php', [
      'heading' => 'Register',
      'errors' => $errors,
    ]);
  }

  $user = $db->query("SELECT * FROM users where email = :email", ['email' => $email])->find();


if ($user) {
  header('location: /');
  die();
  
} else {

  $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
    'email'=> $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
  ]);

  login($user);

  header('location: /register');
  die();
}

?>