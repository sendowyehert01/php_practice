<?php 

namespace Core;
use Core\Session;

class Authenticator 
{
  public function attemp($email, $password)
  {
    $users = (App::resolve(Database::class))->query("SELECT * FROM users WHERE email = :email", [
      'email' => $email
    ])->find();

      if ($users) {
          if (password_verify($password, $users['password'])) {
            $this->login([
              'email' => $email,
            ]);

            return true;
        }
      }

    return false;
  }

  public function login($user) {
    $_SESSION['user'] = [
      'email' => $user['email'],
    ];
  
    session_regenerate_id();
  }
  
  public function logout() {
    Session::destroy();
  }
}

?>