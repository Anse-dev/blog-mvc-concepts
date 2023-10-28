<?php

use Anse\Repository\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
  public function createCategory($name)
  {
    $query = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$name]);
  }

  public function updateCategory($categoryId, $name)
  {
    $query = "UPDATE categories SET name = ? WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$name, $categoryId]);
  }

  public function getArticlesByCategory($categoryId)
  {
    $query = "SELECT articles.* FROM articles
                  JOIN categories ON articles.category_id = categories.id
                  WHERE categories.id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$categoryId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getArticleCountByCategory($categoryId)
  {
    $query = "SELECT COUNT(*) as article_count FROM articles WHERE category_id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$categoryId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['article_count'];
  }
}
