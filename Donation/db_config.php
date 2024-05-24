<?php

$host = "localhost";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected to database successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>