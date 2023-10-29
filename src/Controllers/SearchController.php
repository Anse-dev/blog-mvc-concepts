<?php

namespace Anse\Controllers;

use Anse\Service\ArticleService;
use Anse\Service\CategoryService;

class SearchController extends AbstractController
{

  private ArticleService $articleService;
  private CategoryService $categoryService;
  public function __construct()
  {
    $this->articleService =  new ArticleService();
    $this->categoryService =  new CategoryService();
  }



  public function index($q)
  {
    die($q);
  }
}
