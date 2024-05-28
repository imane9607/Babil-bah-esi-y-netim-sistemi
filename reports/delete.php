<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM reports WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Report deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="0;url=list.php">
</head>
<body>
</body>
</html>
