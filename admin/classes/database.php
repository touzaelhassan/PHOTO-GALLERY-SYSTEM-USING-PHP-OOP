<?php

class Database
{
  public $connection;

  function __construct()
  {
    $this->open_database_connection();
  }

  // Database Connection Method
  public function open_database_connection()
  {
    $this->connection = new mysqli('localhost', 'root', '', 'photo_gallery_system');
  }

  // Database Query Method
  public function query($sql)
  {
    return $this->connection->query($sql);
  }

  // Get The Id of The last inserted row on The database
  public function insert_id()
  {
    return $this->connection->insert_id;
  }
}

?>

<?php $database = new Database(); ?>

