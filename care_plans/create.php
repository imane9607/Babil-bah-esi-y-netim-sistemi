<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yeni Bakım Planı Oluştur - Babil Bahçeleri Yönetim Sistemi</title>
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

    .footer {
      background-color: #4caf50;
      padding: 10px;
      color: #fff;
      text-align: center;
      border-radius: 10px;
      margin-top: 30px;
    }

    form label {
      font-weight: bold;
    }

    form input,
    form textarea,
    form button,
    form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form button {
      background-color: #4caf50;
      color: white;
      border: none;
      cursor: pointer;
    }

    form button:hover {
      background-color: #45a049;
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
      </</ul>
  </div>
</nav>

<div class="container mt-5">
  <h2>Yeni Bakım Planı Oluştur</h2>
  <?php
  include('../config/db.php');

  // İstek POST ile gönderildiyse yeni bakım planını kaydet
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $plant_id = $_POST['plant_id'];
      $care_details = $_POST['care_details'];

      // SQL sorgusu ile yeni bakım planını ekle
      $sql = "INSERT INTO care_plans (plant_id, care_details) VALUES ('$plant_id', '$care_details')";

      // Sorgunun başarılı olup olmadığını kontrol et
      if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success'>Yeni bakım planı başarıyla oluşturuldu</div>";
      } else {
          echo "<div class='alert alert-danger'>Hata: " . $sql . "<br>" . $conn->error . "</div>";
      }
  }
  ?>
  <form method="POST" action="">
    <label>Bitki ID:</label><br>
    <select name="plant_id" required>
      <option value="">Bir bitki seçin</option>
      <?php
      // Veritabanından mevcut bitkileri çekerek açılır menüyü doldur
      $plant_sql = "SELECT id, name FROM plants";
      $plant_result = $conn->query($plant_sql);
      if ($plant_result->num_rows > 0) {
          while ($plant_row = $plant_result->fetch_assoc()) {
              echo "<option value='{$plant_row['id']}'>{$plant_row['name']} (ID: {$plant_row['id']})</option>";
          }
      } else {
          echo "<option value=''>Bitki bulunamadı</option>";
      }
      ?>
    </select><br>
    <label>Bakım Detayları:</label><br>
    <textarea name="care_details" required></textarea><br>
    <button type="submit">Oluştur</button>
  </form>
</div>

<!-- Alt Bilgi -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>