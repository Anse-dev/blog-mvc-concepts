<?php

namespace Anse\Repository;

use Anse\Entity\ArticleEntity;
use Anse\Repository\AbstractRepository;

class ArticleRepository extends AbstractRepository
{
  public function createArticle(ArticleEntity $article)
  {
    $query = "INSERT INTO articles (title, content, category_id, user_id, published,created_date, updated_date, excerpt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    return $stmt->execute([$article->getTitle(), $article->getContent(), $article->getCategorieId(), $article->getUserId(), $article->getPublished(), date("d-m-y"), date("d-m-y"), $article->getExcerpt()]);
  }

  public function updateArticle($articleId, $title, $content)
  {
    $query = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$title, $content, $articleId]);
  }

  public function deleteArticle($articleId)
  {
    $query = "DELETE FROM articles WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$articleId]);
  }

  public function getPublishedArticleById(int $id)
  {
    $query = "SELECT * FROM articles WHERE published = 1 AND id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$id]);

    $resultat =  $stmt->fetch(\PDO::FETCH_ASSOC);

    $articleEntity = new ArticleEntity();
    $articleEntity->setId($resultat["id"])->setCategorieId($resultat["category_id"])->setContent($resultat["content"])->setUserId($resultat["user_id"])->setTitle($resultat["title"]);

    return $articleEntity;
  }
  public function  getPublishedArticles()
  {
    $query = "SELECT * FROM articles WHERE published = 1";
    $stmt = $this->connection->query($query);
    $resultat =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $articles = [];
    foreach ($resultat as $article) {
      $articleEntity = new ArticleEntity();
      $articleEntity->setId($article["id"])->setCategorieId($article["category_id"])->setContent($article["content"])->setUserId($article["user_id"])->setTitle($article["title"]);
      $articles[] = $articleEntity;
    }
    return $articles;
  }

  public function searchArticles($keyword)
  {
    $query = "SELECT * FROM articles WHERE published = 1 AND (title LIKE ? OR content LIKE ?)";
    $stmt = $this->connection->prepare($query);
    $searchTerm = "%" . $keyword . "%";
    $stmt->execute([$searchTerm, $searchTerm]);

    $resultat =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $articles = [];
    foreach ($resultat as $article) {
      $articleEntity = new ArticleEntity();
      $articleEntity->setId($article["id"])->setCategorieId($article["category_id"])->setContent($article["content"])->setUserId($article["user_id"])->setTitle($article["title"]);
      $articles[] = $articleEntity;
    }
    return $articles;
  }
}
