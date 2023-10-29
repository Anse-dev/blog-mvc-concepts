<?php

namespace Anse\Repository;

use Anse\Entity\UserEntity;
use Anse\Repository\AbstractRepository;
use PDO;

class UserRepository extends AbstractRepository
{
  public function createUser(UserEntity $user)
  {
    // Vérifier si l'e-mail est déjà utilisé
    $query = "SELECT id FROM users WHERE email = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$user->getEmail()]);

    if ($stmt->fetch()) {
      return false;
    }

    // L'e-mail est unique, procédez à l'insertion

    $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    return $stmt->execute([$user->getName(), $user->getEmail(), $user->getPassword(), $user->getRole()]);
  }

  public function loginUser($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {

      $userEntity = new UserEntity();
      $userEntity->setId($user['id'])->setName($user['username'])->setEmail($user['email'])->setPassword($user['password'])->setRole($user['role']);
      return $userEntity;
    } else {
      return false;
    }
  }
}
