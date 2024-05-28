<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $visit_date = $_POST['visit_date'];

        $sql = "UPDATE visitors SET name='$name', contact='$contact', visit_date='$visit_date' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Visitor updated successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    $sql = "SELECT * FROM visitors WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ziyaretçi Düzenle - Babil Bahçeleri Yönetim Sistemi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #e8f5e9;
    }

    .header {
      background-color: #4caf50;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      color: #fff;
    }

    .header h1 {
      font-size: 32px;
      margin: 0;
    }

    .navbar {
      background-color: #4CAF50;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      background-color: #45a049;
      border-radius: 5px;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .footer {
      background-color: #4caf50;
      padding: 10px;
      color: #fff;
      text-align: center;
      border-radius: 10px;
      margin-top: 30px;
    }
  </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="../dashboard.php">Babil Bahçesi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Gezinmeyi Değiştir">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="../dashboard.php">Gösterge Paneli</a></li>
      <li class="nav-item"><a class="nav-link" href="../plants/list.php">Bitkiler</a></li>
      <li class="nav-item"><a class="nav-link" href="../events/list.php">Etkinlikler</a></li>
      <li class="nav-item"><a class="nav-link" href="../staff/list.php">Personel</a></li>
      <li class="nav-item"><a class="nav-link" href="../visitors/list.php">Ziyaretçiler</a></li>
      <li class="nav-item"><a class="nav-link" href="../care_plans/list.php">Bakım Planları</a></li>
      <li class="nav-item"><a class="nav-link" href="../reports/list.php">Raporlar</a></li>
      <li class="nav-item"><a class="nav-link" href="../profile.php">Profil</a></li>
      <li class="nav-item"><a class="nav-link" href="../logout.php">Çıkış Yap</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h2>Ziyaretçi Düzenle</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="name">Adı:</label>
      <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="form-group">
      <label for="contact">İletişim:</label>
      <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required>
    </div>
    <div class="form-group">
      <label for="visit_date">Ziyaret Tarihi:</label>
      <input type="date" id="visit_date" name="visit_date" class="form-control" value="<?php echo $row['visit_date']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Güncelle</button>
  </form>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>
