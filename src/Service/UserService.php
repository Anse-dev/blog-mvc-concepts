<?php

namespace Anse\Service;

use Anse\Repository\UserRepository;

class UserService
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
  }

  public function getAllUsers()
  {
    $users = $this->userRepository->getAllUsers();
    return $users;
  }

  public function getUserById($id)
  {
    $user = $this->userRepository->getUserById($id);
    return $user;
  }

  public function addUser($user)
  {
    $this->userRepository->addUser($user);
  }
}
