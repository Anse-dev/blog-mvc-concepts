<?php

use Anse\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
  public function createUser($username, $email, $password, $role = 'user')
  {
    // Vérifier si l'e-mail est déjà utilisé
    $query = "SELECT id FROM users WHERE email = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
      // L'e-mail est déjà utilisé, vous pouvez gérer l'erreur ici
      return false;
    }

    // L'e-mail est unique, procédez à l'insertion
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$username, $email, $hashedPassword, $role]);
  }

  public function loginUser($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    } else {
      return false;
    }
  }
}
