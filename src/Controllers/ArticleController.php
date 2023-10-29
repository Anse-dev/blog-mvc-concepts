<?php

namespace Anse\Controllers;

use Anse\Service\ArticleService;
use Anse\Service\CategoryService;

class ArticleController extends AbstractController
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
    $article = $this->articleService->getArticleById($id);

    $data = [
      "article" => $article
    ];
    $this->renderView("article/show", $data);
  }
}
