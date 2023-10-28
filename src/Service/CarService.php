<?php

namespace Anse\Service;

use Anse\Repository\CarRepository;

class CarService
{
  private $carRepository;

  public function __construct()
  {
    $this->carRepository = new CarRepository();
  }

  public function getAllCars()
  {

    $cars = $this->carRepository->getAllCars();
    return $cars;
  }

  public function getCarById(int $idCar)
  {
    $car = $this->carRepository->getCarById($idCar);
  }

  public function addCar($car)
  {
  }
}
