<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakım Planı Düzenle - Babil Bahçeleri Yönetim Sistemi</title>
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

    .btn-create {
      float: right;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f2f2f2;
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

<!-- Üst Menü -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="../dashboard.php">Babil Bahçesi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Gezinmeyi Değiştir">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../dashboard.php">Gösterge Paneli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../plants/list.php">Bitkiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../events/list.php">Etkinlikler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../staff/list.php">Personel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../visitors/list.php">Ziyaretçiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../care_plans/list.php">Bakım Planları</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../reports/list.php">Raporlar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../profile.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Çıkış Yap</a>
      </li>
    </ul
    </div>
</nav>

<div class="container mt-5">
  <?php
  include('../config/db.php');

  // URL'den id parametresinin ayarlı olup olmadığını kontrol et
  if (isset($_GET['id'])) {
      // id parametresini al
      $id = $_GET['id'];

      // Form gönderildiğinde POST isteği ile güncelleme yap
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $plant_id = $_POST['plant_id'];
          $care_details = $_POST['care_details'];

          // SQL sorgusu ile bakım planını güncelle
          $sql = "UPDATE care_plans SET plant_id='$plant_id', care_details='$care_details' WHERE id=$id";

          // Sorgunun başarılı olup olmadığını kontrol et
          if ($conn->query($sql) === TRUE) {
              echo "<div class='alert alert-success'>Bakım planı başarıyla güncellendi</div>";
          } else {
              echo "<div class='alert alert-danger'>Hata: " . $sql . "<br>" . $conn->error . "</div>";
          }
      }

      // Düzenlenecek bakım planını almak için SQL sorgusu
      $sql = "SELECT * FROM care_plans WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
  }
  ?>

  <h2>Bakım Planını Düzenle</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label>Bitki ID:</label>
      <input type="number" name="plant_id" class="form-control" value="<?php echo $row['plant_id']; ?>" required>
    </div>
    <div class="form-group">
      <label>Bakım Detayları:</label>
      <textarea name="care_details" class="form-control" required><?php echo $row['care_details']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
  </form>
</div>

<!-- Alt Bilgi -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>