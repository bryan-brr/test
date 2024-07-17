<?php
//Crappy code for inserting data into a MySQL server
  require_once "DatabaseConnection.php";



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
      $db = Database::getInstance();
      $db_conn = $db->getConnection();
    
    $user_name = $_REQUEST["user_name"];
    $user_surname = $_REQUEST["user_surname"];
    $user_age = $_REQUEST["user_age"];
    $user_email = $_REQUEST["user_email"];

    $sql = "INSERT INTO users(user_name, user_surname, user_age, user_email) VALUES('$user_name', '$user_surname', '$user_age', '$user_email')";
    $statement = $db_conn->prepare($sql);
    $statement->execute();
    }
    catch (PDOException  $e) {
      echo "Error: " . $e;
    }
}
