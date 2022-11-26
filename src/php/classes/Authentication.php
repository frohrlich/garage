<?php

class Authentication extends Bdd
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login($userData)
  {
    $sql = "SELECT id, email, password, role FROM user WHERE email = ?";
    try {
      $stmt = $this->getConnection()->prepare($sql);
      $stmt->execute([$userData['email']]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    if ($user && password_verify($userData['password'], $user['password'])) {
      // Set last login time
      $loggedUser = new User($user['id']);
      $loggedUser->updateLastLogin();

      $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'role' => $user['role'],
      ];
      return true;
    } else {
      return false;
    }
  }

  public function logout()
  {
    unset($_SESSION['user']);
    echo 'Déconnecté';
    Header('Location: ../../../');
  }
}
