<?php

namespace Anse\Service;

use Anse\Entity\MarqueEntity;
use Anse\Repository\MarqueRepository;

class MarqueService extends AbstractService
{
  private MarqueRepository  $marqueRepository;


  public function __construct()
  {
    $this->marqueRepository = new MarqueRepository();
  }

  public function getAllMarques()
  {
    $marques = $this->marqueRepository->getAllMarques();
    return $marques;
  }
  public function getMarqueById($id)
  {
  }
  public function addMarque(MarqueEntity $marque)
  {
    return $this->marqueRepository->addMarque($marque);
  }
}
