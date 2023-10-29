<?php

namespace Anse\Service;

use Anse\Repository\CategoryRepository;

class CategoryService
{
  private CategoryRepository $categoryRepository;

  public function __construct()
  {
    $this->categoryRepository = new CategoryRepository();
  }

  public function getAllCategories()
  {
    $categories = $this->categoryRepository->getAllCategories();
    return $categories;
  }
}
