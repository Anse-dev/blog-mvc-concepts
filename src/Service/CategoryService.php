<?php

namespace Anse\Service;

use Anse\Entity\CategoryEntity;
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
  public function getArticlesByCategory($id)
  {
    $articles = $this->categoryRepository->getArticlesByCategory($id);
    return $articles;
  }
  public function addCategorie(CategoryEntity $category)
  {
    return $this->categoryRepository->createCategory($category->getTitle());
  }
}
