<?php

namespace Anse\Controllers;

class AbstractController
{
  protected $templatePath = "/templates/";

  public function renderView($viewPath, $data = [])
  {
    //Nous a la racine du dossier templates
    $relativePath = dirname(__DIR__, 2) . $this->templatePath;
    if (file_exists($relativePath . $viewPath . ".php")) {

      extract($data);
      ob_start();
      //On inclu l'enfant
      include $relativePath . $viewPath . ".php";
      $content = ob_get_clean();
      include $relativePath . "template.php";
      //On inclu le parent
    } else {
      $content = "<h1> la view : $viewPath n'existe pas dans le templates </h1>";
      include $relativePath . "template.php";
    }
  }
  public function redirect($path, $status = null)
  {
    header("Location: $path");
    exit();
  }
  public function loged($role): bool
  {
    if ((isset($_SESSION["user"]) and isset($_SESSION["user"]["role"])) and ($_SESSION["user"]["role"] == "super_admin" or $_SESSION["user"]["role"] == $role)) {
      return true;
    }
    return false;
  }
  //Il verifie si le formulaire a ete soumis
  public function hasPosted()
  {
    return $_SERVER["REQUEST_METHOD"] == "POST";
  }


  public function hasIsset(string $nameOfForm)
  {
    return isset($_POST[$nameOfForm]);
  }
}
