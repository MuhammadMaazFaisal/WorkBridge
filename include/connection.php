<?php
$servername = "localhost";
$username = "u956659655_task_db";
$password = "Task_db123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=u956659655_task_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>