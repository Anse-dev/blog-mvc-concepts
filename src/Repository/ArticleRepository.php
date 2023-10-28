<?php

use Anse\Repository\AbstractRepository;

class ArticleRepository extends AbstractRepository
{
  public function createArticle($title, $content, $categoryId, $userId)
  {
    $query = "INSERT INTO articles (title, content, category_id, user_id, published) VALUES (?, ?, ?, ?, 1)";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$title, $content, $categoryId, $userId]);
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

  public function getPublishedArticles()
  {
    $query = "SELECT * FROM articles WHERE published = 1";
    $stmt = $this->connection->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchArticles($keyword)
  {
    $query = "SELECT * FROM articles WHERE published = 1 AND (title LIKE ? OR content LIKE ?)";
    $stmt = $this->connection->prepare($query);
    $searchTerm = "%" . $keyword . "%";
    $stmt->execute([$searchTerm, $searchTerm]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
