<?php

namespace Anse\Entity;

class ArticleEntity
{
  private int $id;
  private int $categorieId;
  private string $title;
  private string $content;
  private int $userId;
  private bool $published;

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of categorieId
   */
  public function getCategorieId()
  {
    return $this->categorieId;
  }

  /**
   * Set the value of categorieId
   *
   * @return  self
   */
  public function setCategorieId($categorieId)
  {
    $this->categorieId = $categorieId;

    return $this;
  }

  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of content
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set the value of content
   *
   * @return  self
   */
  public function setContent($content)
  {
    $this->content = $content;

    return $this;
  }

  /**
   * Get the value of userId
   */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * Set the value of userId
   *
   * @return  self
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;

    return $this;
  }

  /**
   * Get the value of published
   */
  public function getPublished()
  {
    return $this->published;
  }

  /**
   * Set the value of published
   *
   * @return  self
   */
  public function setPublished($published)
  {
    $this->published = $published;

    return $this;
  }
}
