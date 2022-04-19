<?php

class Photo
{
  public $photo_id;
  public $photo_title;
  public $photo_description;
  public $photo_file_name;
  public $photo_type;
  public $photo_size;

  public function create_photo()
  {
    global $database;
    $sql = "INSERT INTO photos (photo_title, photo_description, photo_file_name, photo_type, photo_size) VALUES ('$this->photo_title', '$this->photo_description', '$this->photo_file_name', '$this->photo_type', '$this->photo_size')";
    $query = $database->query($sql);

    if ($query) {
      $this->photo_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_photos()
  {
    global $database;
    $sql = "SELECT * FROM photos";
    $query = $database->query($sql);
    $photos =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_photo_objects = [];

    foreach ($photos as $photo) {
      $array_of_photo_objects[] = self::instantiation($photo);
    }

    return $array_of_photo_objects;
  }

  public static function get_photo_by_id($photo_id)
  {
    global $database;
    $sql = "SELECT * FROM photos WHERE photo_id = $photo_id";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    return self::instantiation($user);
  }

  public function update_photo()
  {
    global $database;
    $sql = "UPDATE photos SET photo_title = '$this->photo_title', photo_description = '$this->photo_description', photo_file_name = '$this->photo_file_name', photo_type = '$this->photo_type', photo_size = '$this->photo_size' WHERE photo_id = $this->photo_id ";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_photo()
  {
    global $database;
    $sql = "DELETE FROM photos WHERE photo_id = $this->photo_id";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public static function instantiation($db_photo)
  {
    $photo_object = new self;

    $photo_object->photo_id = $db_photo['photo_id'];
    $photo_object->photo_title = $db_photo['photo_title'];
    $photo_object->photo_description = $db_photo['photo_description'];
    $photo_object->photo_file_name = $db_photo['photo_file_name'];
    $photo_object->photo_type = $db_photo['photo_type'];
    $photo_object->photo_size = $db_photo['photo_size'];

    return $photo_object;
  }
}
