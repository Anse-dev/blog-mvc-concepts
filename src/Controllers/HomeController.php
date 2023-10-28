<?php

namespace Anse\Controllers;

use Anse\Service\MarqueService;

class HomeController extends AbstractController
{
  protected MarqueService $marqueService;
  public function __construct()
  {
    $this->marqueService = new MarqueService();
  }



  public function index()
  {
    $marques = $this->marqueService->getAllMarques();

    $data = [
      "marques" => $marques
    ];
    $this->renderView("home-view", $data);
  }
}
