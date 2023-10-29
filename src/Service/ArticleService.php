<?php

namespace Anse\Service;

use Anse\Entity\ArticleEntity;
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
  public function getArticleById(int $id)
  {
    $publishedArticles = $this->articleRepository->getPublishedArticleById($id);
    return $publishedArticles;
  }
  public function addArticle(ArticleEntity $article)
  {
    return $this->articleRepository->createArticle($article);
  }
}
