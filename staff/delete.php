<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  // Prepare and execute the delete statement
  $stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo 'success';
  } else {
    echo 'error';
  }

  $stmt->close();
  $conn->close();
}
?>
