<?php

namespace Anse\Controllers;

use Anse\Entity\MarqueEntity;
use Anse\Service\MarqueService;

class AdminController extends  AbstractController
{

  public function __construct()
  {
  }

  public function admin()
  {


    $this->renderView("admin/admin");
  }

  //Il verifie si le formulaire a ete soumis
  private function hasPosted()
  {
    return $_SERVER["REQUEST_METHOD"] == "POST";
  }

  //Il charge et enregistre une instance de MarqueEntity
  private function loadDataAndMarqueInstance()
  {
    //Je recupere les données
    $nom = $_POST["nom"];
    $descritpion = $_POST["description"];
    //dTO
    $marque = new MarqueEntity();
    $marque->setNom($nom);
    $marque->setDescription($descritpion);
    return $marque;
  }

  private function hasIsset(string $nameOfForm)
  {
    return isset($_POST[$nameOfForm]);
  }
}
