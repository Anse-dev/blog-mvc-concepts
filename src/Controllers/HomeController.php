<?php

namespace Anse\Controllers;

use Anse\Service\ArticleService;
use Anse\Service\CategoryService;

class HomeController extends AbstractController
{

  private ArticleService $articleService;
  private CategoryService $categoryService;
  public function __construct()
  {
    $this->articleService =  new ArticleService();
    $this->categoryService =  new CategoryService();
  }



  public function index()
  {
    $articles = $this->articleService->getAllArticles();
    $categories = $this->categoryService->getAllCategories();
    $data = [
      "articles" => $articles,
      "categories" => $categories
    ];
    $this->renderView("index", $data);
  }

  public function show($id, $q)
  {
    var_dump($q);


    $articles = $this->articleService->getAllArticles();
    $categories = $this->categoryService->getAllCategories();
    $data = [
      "articles" => $articles,
      "categories" => $categories
    ];
    $this->renderView("index", $data);
  }
}
