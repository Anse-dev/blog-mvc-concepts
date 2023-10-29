<?php

namespace Anse\Controllers;

use Anse\Entity\UserEntity;
use Anse\Service\UserService;

class UserController extends AbstractController
{
  private $messages;
  private $userService;
  public function __construct()
  {

    $this->userService =  new UserService();
  }
  public function logout()
  {
    session_reset();
    session_unset();
    session_destroy();
    $this->redirect("/");
  }
  public function login()
  {
    if ($this->loged("user")) {
      $this->redirect("/");
    }

    if ($this->hasPosted()) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $resultat = $this->userService->userLogin($email, $password);
      if ($resultat instanceof UserEntity) {
        $_SESSION["user"] = ["id" => $resultat->getId(), "role" => $resultat->getRole()];
        header("Location:/");
        exit(502);
      } else {
        $this->messages["error"] = "Verifier vos informations ";
      }
      $data = [
        "error" => $this->messages["error"] ?? "",
        "succes" => $this->messages["succes"] ?? ""
      ];
      return $this->renderView("login", $data);
    }

    $this->renderView("login");
  }

  public function register()
  {

    if ($this->hasPosted()) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $confirm_password = $_POST["confirm_password"];
      if ($password != $confirm_password) {
        $this->messages["error"] = "mot de pass non identique";
        $data = [
          "error" => $this->messages["error"]
        ];
        return $this->renderView("register", $data);
      }
      //cryptage mot de pass
      $password_h = password_hash($password, PASSWORD_DEFAULT);
      $user = new UserEntity();
      $user->setName($name)->setEmail($email)->setPassword($password_h)->setRole("user");
      $resultat = $this->userService->addUser($user);
      if ($resultat) {
        $this->messages["succes"] = "Bien Enregistré";
        $this->redirect("/login");
      } else {
        $this->messages["error"] = "l'utilisateur existe deja ";
      }
      $data = [
        "error" => $this->messages["error"] ?? ""
      ];
      return $this->renderView("register", $data);
    }
    $this->renderView("register");
  }
}
