<?php

class Comment
{
  public $comment_id;
  public $photo_id;
  public $comment_author;
  public $comment_body;

  public function create_comment()
  {
    global $database;
    $sql = "INSERT INTO comments (photo_id, comment_author, comment_body) VALUES ($this->photo_id, '$this->comment_author', '$this->comment_body')";
    $query = $database->query($sql);

    if ($query) {
      $this->comment_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_comments($photo_id)
  {
    global $database;
    $sql = "SELECT * FROM comments WHERE photo_id = '$photo_id' ORDER BY photo_id ASC";
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    $comments =  mysqli_fetch_all($query, MYSQLI_ASSOC);
  }

  public static function instantiation_comment($photo_id, $comment_author, $comment_body)
  {
    if (!empty($photo_id) && !empty($comment_author) && !empty($comment_body)) {
      $comment = new Comment();
      $comment->photo_id = $photo_id;
      $comment->comment_author = $comment_author;
      $comment->comment_body = $comment_body;
      return $comment;
    } else {
      return false;
    }
  }
}