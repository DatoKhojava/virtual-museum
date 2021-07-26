<?php
  include_once './includes/connection.php';

  $id = $_GET['id'] ?? null;
  if (!$id) {
    header('Location: add.php');
    exit;
  }  

  $stmt = $conn->prepare('DELETE FROM exhibit WHERE id = :id');
  $stmt->bindValue(':id', $id);
  $stmt->execute();

  header('Location: exhibits.php');

?>