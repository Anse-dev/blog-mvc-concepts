<?php

namespace Anse\Controllers;

use Anse\Service\ArticleService;
use Anse\Service\CategoryService;

class CategoryController extends AbstractController
{

  private ArticleService $articleService;
  private CategoryService $categoryService;
  public function __construct()
  {
    $this->articleService =  new ArticleService();
    $this->categoryService =  new CategoryService();
  }



  public function index($id)
  {
    $articles = $this->categoryService->getArticlesByCategory($id);
    $categories = $this->categoryService->getAllCategories();
    $data = [
      "articles" => $articles,
      "categories" => $categories
    ];
    $this->renderView("category/show", $data);
  }
}
