<?php

namespace Anse\Controllers;

use Anse\Entity\ArticleEntity;
use Anse\Entity\CategoryEntity;
use Anse\Entity\MarqueEntity;
use Anse\Entity\UserEntity;
use Anse\Service\ArticleService;
use Anse\Service\CategoryService;
use Anse\Service\UserService;

class AdminController extends  AbstractController
{

  private CategoryService $categoryService;
  private ArticleService $articleService;
  private UserService $userService;
  private $messages = [];
  public function __construct()
  {
    $this->articleService = new ArticleService();
    $this->categoryService = new CategoryService();
    $this->userService = new UserService();
  }

  public function admin()
  {
    if (!$this->loged("admin")) {

      $this->redirect("/admin/login");
    }

    $this->renderView("admin/admin");
  }

  public function addArticle()
  {
    if (!$this->loged("admin")) {
      $this->redirect("/admin/login");
    }
    if ($this->hasPosted()) {
      $title = $_POST["title"];
      $content = $_POST["content"];
      $categoryId = $_POST["category"];
      $userId = $_POST["user-id"];
      $excerpt = $_POST["excerpt"];
      $published = 0;
      if (isset($_POST["published"])) {
        $published = 1;
      }

      $article = new ArticleEntity();
      $article->setTitle($title)->setContent($content)->setCategorieId($categoryId)->setUserId($userId)->setPublished($published)->setExcerpt($excerpt);
      $resultat =  $this->articleService->addArticle($article);
      if ($resultat) {
        $this->messages["succes"] = "Bien Enregistré";
      } else {
        $this->messages["error"] = "Une erreur s'est produite lors de l'enregistrement ";
      }
      $data = [
        "error" => $this->messages["error"],
        "succes" => $this->messages["succes"],
      ];
      $this->renderView("admin/add-article", $data);
    }
    $categories = $this->categoryService->getAllCategories();

    $data = [
      "categories" => $categories
    ];
    $this->renderView("admin/add-article", $data);
  }

  public function addCategorie()
  {
    if (!$this->loged("admin")) {
      $this->redirect("/admin/login");
    }
    if ($this->hasPosted()) {
      $categorieName = $_POST["categorie"];
      $category = (new CategoryEntity())->setTitle($categorieName);
      $resultat = $this->categoryService->addCategorie($category);
      if ($resultat) {
        $this->messages["succes"] = "Bien Enregistré";
      } else {
        $this->messages["error"] = "la categorie existe deja ";
      }
    }

    $data = [
      "error" => $this->messages["error"],
      "succes" => $this->messages["succes"],
    ];

    $this->renderView("admin/add-categorie", $data);
  }

  public function createAdmin()
  {
    if (!$this->loged("admin")) {
      $this->redirect("/admin/login");
    }
    if ($this->hasPosted()) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $confirm_password = $_POST["confirm_password"];
      $role = $_POST["role"];

      $admin = new UserEntity();
      $admin->setName($name)->setEmail($email)->setPassword($password)->setRole($role);
      if ($password != $confirm_password) {
        $this->messages["error"] = "mot de pass non identique";
        $data = [
          "error" => $this->messages["error"]
        ];
        return $this->renderView("admin/create-admin", $data);
      }
      //cryptage mot de pass
      $password_h = password_hash($password, PASSWORD_DEFAULT);
      $admin = new UserEntity();
      $admin->setName($name)->setEmail($email)->setPassword($password_h)->setRole($role);
      $resultat = $this->userService->addUser($admin);
      if ($resultat) {
        $this->messages["succes"] = "Bien Enregistré";
      } else {
        $this->messages["error"] = "l'administrateur existe deja ";
      }
      $data = [
        "error" => $this->messages["error"] ?? "",
        "succes" => $this->messages["succes"] ?? ""
      ];
      return $this->renderView("admin/create-admin", $data);
    }
    $this->renderView("admin/create-admin");
  }
  public function adminLogin()
  {
    if ($this->loged("admin")) {
      $this->redirect("/admin");
    }

    if ($this->hasPosted()) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $resultat = $this->userService->userLogin($email, $password);
      if ($resultat instanceof UserEntity) {
        if (
          $resultat->getRole() == "admin" or
          $resultat->getRole() == "super_admin"
        ) {
          $_SESSION["user"] = ["id" => $resultat->getId(), "role" => $resultat->getRole()];
          header("Location:/admin");
          exit(502);
        } else {
          $_SESSION["user"] = ["id" => $resultat->getId(), "role" => $resultat->getRole()];
          header("Location:/");
          exit(502);
        }
      } else {
        $this->messages["error"] = "Verifier vos informations ";
      }
      $data = [
        "error" => $this->messages["error"] ?? "",
        "succes" => $this->messages["succes"] ?? ""
      ];
      return $this->renderView("admin/login", $data);
    }
    $this->renderView("admin/login");
  }
}
