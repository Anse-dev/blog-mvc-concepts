<?php

namespace Anse\Repository;

use Anse\Repository\AbstractRepository;
use PDO;

class CommentRepository extends AbstractRepository
{
  public function createComment($articleId, $userId, $content)
  {
    $query = "INSERT INTO comments (article_id, user_id, content) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$articleId, $userId, $content]);
  }

  public function updateComment($commentId, $content)
  {
    $query = "UPDATE comments SET content = ? WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$content, $commentId]);
  }

  public function deleteComment($commentId)
  {
    $query = "DELETE FROM comments WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$commentId]);
  }

  public function getCommentsForArticle($articleId)
  {
    $query = "SELECT * FROM comments WHERE article_id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$articleId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCommentCountByArticle($articleId)
  {
    $query = "SELECT COUNT(*) as comment_count FROM comments WHERE article_id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->execute([$articleId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['comment_count'];
  }
}
