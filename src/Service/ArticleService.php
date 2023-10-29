<?php

namespace Anse\Service;

use Anse\Repository\ArticleRepository;

class ArticleService
{
  private ArticleRepository $articleRepository;

  public function __construct()
  {
    $this->articleRepository = new ArticleRepository();
  }

  public function getAllArticles()
  {
    $publishedArticles = $this->articleRepository->getPublishedArticles();
    return $publishedArticles;
  }
}
