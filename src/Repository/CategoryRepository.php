<?php

namespace Anse\Repository;

use Anse\Entity\ArticleEntity;
use Anse\Entity\CategoryEntity;
use Anse\Repository\AbstractRepository;
use PDO;

class CategoryRepository extends AbstractRepository
{
  public function createCategory($name)
  {
    $query1 = "SELECT * FROM categories WHERE name = ?";
    $stmt = $this->connection->prepare($query1);
    $stmt->execute([$name]);
    if ($stmt->fetch()) {

      return false;
    }
    $query = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $this->connection->prepare($query);
    return $stmt->execute([$name]);
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
                  WHERE published = 1 AND categories.id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$categoryId]);

    $resultat =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $articles = [];
    foreach ($resultat as $article) {
      $articleEntity = new ArticleEntity();
      $articleEntity->setId($article["id"])->setCategorieId($article["category_id"])->setContent($article["content"])->setUserId($article["user_id"])->setTitle($article["title"]);
      $articles[] = $articleEntity;
    }
    return $articles;
  }

  public function getArticleCountByCategory($categoryId)
  {
    $query = "SELECT COUNT(*) as article_count FROM articles WHERE category_id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$categoryId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['article_count'];
  }
  public function getAllCategories()
  {
    $query = "SELECT * FROM categories";
    $stmt = $this->connection->query($query);
    $resultat =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $categories = [];
    foreach ($resultat as $category) {
      $categoryEntity = new CategoryEntity();
      $categoryEntity->setId($category["id"])->setTitle($category["name"]);
      $categories[] = $categoryEntity;
    }
    return $categories;
  }
}
