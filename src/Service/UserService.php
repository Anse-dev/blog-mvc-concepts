<?php

namespace Anse\Service;

use Anse\Entity\UserEntity;
use Anse\Repository\UserRepository;

class UserService
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
  }

  public function userLogin($email, $password)
  {
    return $this->userRepository->loginUser($email, $password);
  }

  public function getUserById($id)
  {
  }

  public function addUser(UserEntity $user)
  {
    return $this->userRepository->createUser($user);
  }
}
